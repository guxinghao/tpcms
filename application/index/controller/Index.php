<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use app\index\model\wxChat;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    //微信公众号列表页
    public function wxChat()
    {
        $request = Request::instance();
        $get = $request->get();
        unset($get['/index/index/wxchat_html']);
        if (empty($get)) {
            $get = [
                'name'=>'',
                'idendity'=>'',
                'main_body'=>'',
                'type'=>'',
                'province'=>'',
                'city'=>'',
                'district'=>'',
                'channel'=>'',
                'fans_number_st'=>'',
                'first_money_st'=>'',
                'first_money_ed'=>'',
                'quality'=>'',
                'classify'=>0,
            ];
        }
        //如果不为空 则拼接查询语句
        $che = self::checkEmpet($get);

        $where['is_del'] = 0;
        if ($che['is_empty']) {
            $where = array_merge($where,$che['where']);
        }
        // 查询状态为1的用户数据 并且每页显示10条数据
        $list = wxChat::where($where)->paginate(1);
        // $list = wxChat::where($where)->fetchSql(true)->select();
        // var_dump($list);die;
        // 获取分页显示
        $page = $list->render();
        // 模板变量赋值
        $this->assign('list', $list);
        $this->assign('page', $page);
        $this->assign('get', $get);
        // 渲染模板输出
        return $this->fetch();
    }
    //新增微信公众号列表页
    public function addDate()
    {
        $request = Request::instance();
        $data = $request->post();
        if (!$data['name']) {
            return ['status'=>250,'msg'=>'请填写公众号名称'];
        }
        if ($data['fans_number'] && (!is_numeric($data['fans_number']))) {
            return ['status'=>250,'msg'=>'粉丝数量需要为纯数字'];
        }
        if ($data['first_money'] && (!is_numeric($data['first_money']))) {
            return ['status'=>250,'msg'=>'首条成本需要为纯数字'];
        }
        if ($data['second_money'] && (!is_numeric($data['second_money']))) {
            return ['status'=>250,'msg'=>'次条成本需要为纯数字'];
        }
        if ($data['more_money'] && (!is_numeric($data['more_money']))) {
            return ['status'=>250,'msg'=>'3-N条成本需要为纯数字'];
        }
        if ($data['order_number'] && (!is_numeric($data['order_number']))) {
            return ['status'=>250,'msg'=>'订单数量需要为纯数字'];
        }
        $insert_data = [
            'name'=>$data['name']?trim($data['name']):'',
            'idendity'=>$data['idendity']?trim($data['idendity']):'',
            'main_body'=>$data['main_body']?trim($data['main_body']):'',
            'province'=>$data['province']?trim($data['province']):'',
            'city'=>$data['city']?trim($data['city']):'',
            'district'=>$data['district']?trim($data['district']):'',
            'type'=>$data['type']?trim($data['type']):'',
            'fans_number'=>$data['fans_number']?trim($data['fans_number']):0,
            'first_money'=>$data['first_money']?trim($data['first_money']):0,
            'second_money'=>$data['second_money']?trim($data['second_money']):0,
            'more_money'=>$data['more_money']?trim($data['more_money']):0,
            'order_number'=>$data['order_number']?trim($data['order_number']):0,
            'channel'=>$data['channel']?trim($data['channel']):'',
            'quality'=>$data['quality']?trim($data['quality']):'',
            'classify'=>$data['classify'],//0 未选择  1订阅号 2服务号
            'create_time'=>time(),
        ];
        $wxChat = wxChat::create($insert_data);
        if ($wxChat->id) {
            return ['status'=>200,'msg'=>'success'];
        }else{
            return ['status'=>250,'msg'=>'新增失败,请重试'];
        }
    }

    //判断传递的数组是否为空 如果不为空 则返回已不为空的数组 [key=>value]
    public static function checkEmpet(array $array)
    {
        $is_empty = 0;
        $arr = [];
        $fans_number = [];
        $first_money = [];
        foreach($array as $key => $a){
            if(!empty($a)){
                $is_empty++;
                if ($key=='fans_number_st' || $key=='fans_number_ed') {
                    if ($key=='fans_number_st') {
                        $fans_number['fans_number1'] = ['>=',$a?:0];
                    }else{
                        $fans_number['fans_number2'] = ['<=',$a?:0];
                    }
                }else if ($key=='first_money_st' || $key=='first_money_ed') {
                    if ($key=='first_money_st') {
                        $first_money['first_money1'] = ['>=',$a?:0];
                    }else{
                        $first_money['first_money2'] = ['<=',$a?:0];
                    }
                }else if($key == 'classify'){
                    $arr[$key] = $a;
                }else{
                    $arr[$key]  = ['like','%'.$a.'%'];
                }
            }
        }
        if (!empty($fans_number)) {
            $arr['fans_number'] = [
                $fans_number['fans_number1']?:0,$fans_number['fans_number2']
            ];
        }
        if (!empty($first_money)) {
            $arr['first_money'] = [
                $first_money['first_money1']?:0,$first_money['first_money2']
            ];
        }
        return ['is_empty'=>$is_empty,'where'=>$arr];
    }
}

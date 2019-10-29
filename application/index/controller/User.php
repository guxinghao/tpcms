<?php
namespace app\index\controller;
use think\Request;
use app\index\model\adminUser;
class User extends Base
{
    //微信公众号列表页
    public function index()
    {
        $request = Request::instance();
        $get = $request->get();
        $where['is_del'] = 0;
        $search = '';
        if (isset($get['search']) && empty(trim($get['search']))) {
            $search = trim($get['search'])?:'';
            $where['user_name|real_name|mobile'] = ['like','%'.$search.'%'];
        }
        $list = adminUser::where($where)->paginate(20);
        // 获取分页显示
        $page = $list->render();
        // 模板变量赋值
        $this->assign('list', $list);
        $this->assign('page', $page);
        $this->assign('search', $search);
        // 渲染模板输出
        return $this->fetch();
    }
    //新增微信公众号列表页
    public function addOrEditDate()
    {
        $request = Request::instance();
        $data = $request->post();
        if (!$data['user_name']) {
            return ['status'=>250,'msg'=>'请填写登录账号名称'];
        }
        if (!trim($data['pwd'])) {
            return ['status'=>250,'msg'=>'请填写登录密码'];
        }

        $insert_data = [
            'user_name'=>$data['user_name']?trim($data['user_name']):'',
            'real_name'=>$data['real_name']?trim($data['real_name']):'',
            'mobile'=>$data['mobile']?trim($data['mobile']):'',
            'password'=>md5(trim($data['pwd'])),
            'create_time'=>time(),
        ];
        //获取数据的id 如果存在则为修改 如果不存在 则为新增
        $id = $data['data_id']?:0;
        if ($id) {//修改
            unset($insert_data['create_time']);
            $adminUser = adminUser::where('id', $id)->update($insert_data);
            $msg = '修改失败,请重试';
            $flag = $adminUser?true:false;
        }else{
            $adminUser = adminUser::create($insert_data);
            $msg = '新增失败,请重试';
            $flag = $adminUser->id?true:false;
        }
        if ($flag) {
            $return = ['status'=>200,'msg'=>'success'];
        }else{
            $return = ['status'=>250,'msg'=>$msg];
        }
        return $return;
    }


    // 删除某条数据
    public function delDate($id)
    {
        $re = adminUser::update(['id' => $id, 'is_del' => 1]);
        if ($re['is_del']==1) {
            return ['status'=>200,'msg'=>'success'];
        }else{
            return ['status'=>250,'msg'=>'删除失败,请重试'];
        }
    }
}

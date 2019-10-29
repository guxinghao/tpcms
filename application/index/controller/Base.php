<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use think\Url;
class Base extends Controller{
    public function _initialize(){
        $uid = Session::get('user_id');
        if($uid == null){
            $this->redirect('Login/index');
        }

        //左侧菜单栏的显示隐藏
        $role_id = Session::get('role_id');
        $url1 = Url::build('index/wxChat');
        if ($role_id) {
            $url2 = Url::build('user/index');
            $html = "<li><a href=\"{$url1}\"> <i class=\"icon-home\"></i>公众号信息</a></li>
        <li><a href=\"{$url2}\"> <i class=\"icon-form\"></i>职员信息</a></li>";
        }else{
            $html = "<li><a href=\"{$url1}\"> <i class=\"icon-home\"></i>公众号信息</a></li>
        <li>";
        }
        $this->assign('html',$html);
    }
}

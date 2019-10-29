<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Session;
use app\index\model\adminUser;
class Login extends Controller
{
    //登录
    public function index()
    {
        return $this->fetch();
    }
    //登录
    public function login($user_name,$pwd)
    {
        if (!trim($user_name)) {
            return ['status'=>250,'msg'=>'用户名不能为空'];
            exit();
        }
        if (!trim($pwd)) {
            return ['status'=>250,'msg'=>'登录密码不能为空'];
            exit();
        }
        $pwd = md5(trim($pwd));
        $admin = adminUser::where(['user_name'=>trim($user_name),'password'=>$pwd,'is_del'=>0])->field('id,user_name,role_id')->find();
        if (empty($admin)) {
            return ['status'=>250,'msg'=>'账号密码不正确'];
        }
        Session::set('user_id',$admin['id']);
        Session::set('role_id',$admin['role_id']);
        return $admin;
    }

    //登录
    public function loginOut($user_id)
    {
        Session::delete('user_id');
        return ['status'=>200,'msg'=>'退出成功'];
    }

}
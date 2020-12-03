<?php

namespace app\photo\controller;

use think\Controller;
use think\Db;

class Login extends Controller
{
    //渲染登录页面
    public function login(){
        return view('login');
    }
    public function loginDo(){
        //验证参数
        $param = input();
//        dump($param);
//        die();
        $validate = $this->validate($param,
            [
                'username|用户名' => 'require',
                'password|密码' => 'require',
                'captcha|验证码'=>'require|captcha'
            ],
            [
                'username.require' => '用户名不能为空',
                'password.require' => '密码不能为空',
                'capthca.require' => '验证码不能为空'
            ]
        );
        if (true !== $validate){
            $this->error($validate);
        }
        $data=Db::table('user')->where('username',$param['username'])->find();
//        dump($data);
//        die();
        //判断
        if ($data){
            if ($data['password']==md5($param['password'])){
                //设置登录表示
                session("user",$data);
                $this->redirect('Photo/index');
            }else{
                $this->error('密码错误');
            }
        }else{
            $this->error('用户名错误');
        }
    }
    //退出登录
    public function loginout(){

    }
}

<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	$this->display();
    }

    public function login_handler()
    {
        $user = M("users")->where("name='".I("name")."'")->find();

        if (md5(I("password")) == $user['password'] && $user['admin']) 
        {
            session(array('expire'=>3600*2));
            session("uid", $user["uid"]);
            session("name", $user["name"]);
            session("admin", $user["admin"]);

            $this->redirect('index/index');
        }

        $this->redirect('login/index');

    }

    public function signout()
    {
        session_destroy();
        $this->redirect("login/index");
    }
}
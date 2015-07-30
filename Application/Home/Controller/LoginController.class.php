<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $this->display();
    }

    public function login_handler()
    {
        $user = M("users")->where("name='".I("name")."'")->find();

        if (md5(I("password")) == $user['password']) 
        {
            session(array('expire'=>3600*2));
            session("uid", $user["uid"]);
            session("name", $user["name"]);

            $this->redirect('index/index');
        }

        $this->redirect('login/index');

    }

    public function signup()
    {
        $this->area = M("depart")->where("pid=0")->select();
    	$this->display();
    }

    public function signup_ajax()
    {
         if (I("area")) 
        {
            $res = M("depart")->where("pid=".I("area"))->select();
            $this->ajaxReturn($res);
        }
        else if(I("depart"))
        {
            $res = M("depart")->where("pid=".I("depart"))->select();
            $this->ajaxReturn($res);
        }
    }

    public function signup_handler()
    {
        if (strlen(I("name")) == 0) 
        {
            $this->error = "用户名不能为空";
            $this->display("signup");
        }
        else if (strlen(I("password")) < 6)
        {
            $this->error = "密码不能低于6位";
            $this->display("signup");
        }
    	else if (I("password") != I("repassword"))
    	{
    		$this->error = "密码不一致";
            $this->display("signup");
    	}
        else
        {
            $res = M("users")->where("name='".I("name")."'")->find();

            if ($res) 
            {
                $this->error = "用户名已存在";
                $this->display("signup");
            }
            else
            {
                 $data = array(
                "name" => I("name"),
                "password" => md5(I("password")),
                "admin" => 9,
                "aid" => I("area"),
                "did" => I("depart"),
                "tid" => I("team"),
                );

                M("users")->add($data);
                $this->success("申请成功", "index/index");
            }
        }

        

		
    	
    }
}
<?php
namespace Admin\Controller;
class UserController extends AuthController{
    public function index()
    {
    	$count = M("users")->where("admin<=".session("admin"))->count();
    	$Page = new \Think\Page($count,25);
    	$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$this->users = M("users")->where("admin<=".session("admin"))->order("admin desc,dateline desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->page = $show;// 赋值分页输出

    	$this->display();
    }

    public function add_user()
    {
        $this->admin = session("admin");
    	$this->display();
    }

    public function add_user_handler()
    {
        $res = M('users')->where("name=".I("name"))->find();

        if ($res) 
        {
            $this->error = "用户名已存在";
            $this->display("add_user");
        }
        else
        {
            $data = array(
            "name" => I("name"),
            "password" => md5(I("password")),
            "admin" => I("admin"),
            );

            M("users")->add($data);
            $this->redirect("user/add_user");
        }
    }

    public function update_user()
    {
        $this->user = M("users")->field("uid,name,admin")->find(I("uid"));
        $this->display();
    }

    public function update_user_handler()
    {

        $data = array(
            "admin" => I("admin")
            );

        if (I("password")) $data["password"] = md5(I("password"));

        M("users")->where("uid=".I("get.uid"))->save($data);
        $this->redirect("user/index");
    }

    public function del_user()
    {
    	M("users")->delete(I("uid"));
    	$this->redirect("user/index");
    }

}
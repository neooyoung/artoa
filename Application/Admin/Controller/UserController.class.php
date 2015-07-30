<?php
namespace Admin\Controller;
class UserController extends AuthController{
    public function index()
    {
    	$count = M("users")->where("admin<=".session("admin")." or admin=9")->count();
    	$Page = new \Think\Page($count,25);
    	$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$this->users = M("users")->where("admin<=".session("admin")." or admin=9")->order("admin desc,dateline desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->page = $show;// 赋值分页输出

    	$this->display();
    }

    public function add_user($error='')
    {
        $this->admin = session("admin");

        $this->area = M("depart")->where("pid=0")->select();

        $this->error = $error;

    	$this->display();
    }

    public function add_user_handler()
    {
        $res = M('users')->where("name='".I("name")."'")->find();

        if ($res) 
        {
            $error = "用户名已存在";
            $this->redirect("user/add_user", array("error" => $error));
        }
        else
        {
            $data = array(
            "name" => I("name"),
            "password" => md5(I("password")),
            "admin" => I("admin"),
            "aid" => I("area"),
            "did" => I("depart"),
            "tid" => I("team"),
            );

            M("users")->add($data);
            $this->redirect("user/add_user");
        }
    }

    public function approve_user($uid)
    {
        M("users")->where("uid=".$uid)->save(array("admin" => 0));
        $this->redirect("user/index");
    }

    public function deny_user($uid)
    {
        M("users")->delete($uid);
        $this->redirect("user/index");
    }

    public function update_user($uid)
    {

        $this->admin = session("admin");

        $this->area = M("depart")->where("pid=0")->select();

        $this->user = M("users")->find($uid);
        $this->display();
    }

    public function update_user_handler($uid)
    {
        $data = array(
            "admin" => I("admin"),
            "aid" => I("area"),
            "did" => I("depart"),
            "tid" => I("team"),
            );
        if (I("password")) $data["password"] = md5(I("password"));

        M("users")->where("uid=".$uid)->save($data);
        $this->redirect("user/index");
    }

    public function del_user()
    {
    	M("users")->delete(I("uid"));
    	$this->redirect("user/index");
    }

    public function add_user_ajax()
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
}
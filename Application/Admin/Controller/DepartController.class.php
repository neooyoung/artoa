<?php
namespace Admin\Controller;
class DepartController extends AuthController{
    public function index()
    {
    	$area = M("depart")->where("pid=0")->order("id")->select();
        foreach ($area as &$v) 
        {
            $v["child"] = M("depart")->where("pid=".$v['id'])->select();
        }
        
        $this->area = $area;

    	$this->display();
    }

    public function add_area()
    {
    	$this->display();
    }

    public function add_area_handler()
    {
    	$data = array(
    		'name' => I("area"),
    		'pid' => 0
    		);

    	M("depart")->add($data);
    	$this->redirect("depart/index");
    }

    public function update_area($id)
    {
    	$this->area = M("depart")->find($id);
    	$this->display();
    }

    public function update_area_handler($id)
    {
    	$data = array(
    		"name" => I("area"),
    		);
    	M("depart")->where("id=".I($id))->save($data);
    	$this->redirect("depart/index");
    }

    public function del_area($id)
    {
        M("depart")->delete($id);
        $this->redirect("depart/index");
    }

    public function add_depart($id)
    {
        $this->id = $id;
        $this->display();
    }

    public function add_depart_handler($pid)
    {
        $data = array(
            'name' => I("depart"),
            'pid' => $pid,
            'topid' => $pid,
            );

        M("depart")->add($data);
        $this->redirect("depart/index");
    }

    public function update_depart($id)
    {
        $this->depart = M("depart")->find($id);
        $this->display();
    }

    public function update_depart_handler($id)
    {
        $data = array(
            "name" => I("depart"),
            );
        M("depart")->where("id=".$id)->save($data);
        $this->redirect("depart/index");
    }

    public function del_depart($id)
    {
        M("depart")->delete($id);
        $this->redirect("depart/index");
    }

    public function add_team($pid, $topid)
    {
        $this->pid = $pid;
        $this->topid = $topid;
        $this->display();
    }

    public function add_team_handler($pid, $topid)
    {


        $data = array(
            'name' => I("team"),
            'pid' => $pid,
            'topid' => $topid,
            );

        M("depart")->add($data);
        $this->redirect("depart/manage_team", array('pid'=>$pid, 'topid'=>$topid));
    }

    public function manage_team($pid, $topid)
    {
        $this->pid = $pid;
        $this->topid = $topid;
        $this->team = M("depart")->where("pid=".$pid)->select();
        $this->display();
    }

    public function update_team($id)
    {
        $this->id = $id;
        $this->team = M("depart")->find($id);
        $this->display();
    }

    public function del_team($id)
    {
        
        $pids = M("depart")->find($id);
        $pid = $pids['pid'];
        $topid = $pids['topid'];

        M("depart")->delete($id);

        $this->redirect("depart/manage_team", array('pid'=>$pid, 'topid'=>$topid));
    }

    public function update_team_handler($id)
    {
        $data = array(
            "name" => I("team"),
            );
        M("depart")->where("id=".$id)->save($data);

        $pids = M("depart")->find($id);
        $pid = $pids['pid'];
        $topid = $pids['topid'];

        $this->redirect("depart/manage_team", array('pid'=>$pid, 'topid'=>$topid));
    }
}
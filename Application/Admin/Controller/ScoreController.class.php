<?php
namespace Admin\Controller;
class ScoreController extends AuthController{
    public function index()
    {
    	$this->year = date("Y",time());
    	$this->month = date("m",time());
    	$this->area = M("depart")->where("pid=0")->select();
    	$this->display();
    }

    public function score_ajax()
    {
    	$aid = I("aid");
    	$did = I("did");
    	$tid = I("tid");
    	$year = I("year");
    	$month = I("month");

    	$where_sql = '';
    	if ($aid) {$where_sql .= " aid=".$aid." and";}
    	if ($did) {$where_sql .= " did=".$did." and";}
    	if ($tid) {$where_sql .= " tid=".$tid." and";}
    	if ($where_sql) 
    	{
    		$where_sql = substr($where_sql,0,-3);
    	}

    	$users = M("users")->where($where_sql)->select();

    	foreach ($users as &$v) 
    	{
    		$res = M('score')->where("uid=".$v['uid']." and year={$year} and month={$month}")->find();
    		if (!$res) 
    		{
    			$res = array('col1' => 0, 'col2' => 0, 'col3' => 0, 'col4' => 0, 'col5' => 0, 'col6' => 0, 'col7' => 0, 'total' => 0);
    		}
    		$v['child'] = $res;
    	}
    	unset($v);

    	$this->ajaxReturn($users);
    	
    }

    public function score_handler()
    {
    	$post = I('post.');
    	foreach ($post as $k=>$v) 
    	{
    		if ($k != "year" && $k != "month") 
    		{
    			$res = M("score")->where("uid=".substr($k,3)." and year=".$post['year']." and month=".$post['month'])->find();
    			// 有则修改
    			if ($res) 
    			{
    				foreach ($v as $key => $val) 
    				{
    					if (($key+1) != 8) 
    					{
    						$data["col".($key+1)] = $val;
    					}
    					else
    					{
    						$data["total"] = $val;
    					}
    				}
    				M("score")->where("uid=".substr($k,3)." and year=".$post['year']." and month=".$post['month'])->save($data);
    			}
    			else
    			{
    				foreach ($v as $key => $val) 
    				{
    					if (($key+1) != 8) 
    					{
    						$data["col".($key+1)] = $val;
    					}
    					else
    					{
    						$data["total"] = $val;
    					}
    				}

    				$data['uid'] = substr($k,3);
    				$data['year'] = $post['year'];
    				$data['month'] = $post['month'];

    				M("score")->add($data);
    			}

    		}
    	}

    	$this->redirect("score/index");	
    }

}
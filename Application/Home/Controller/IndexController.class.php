<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if (session("uid") && session("name")) 
    	{
    		$this->display();
    	}
    	else
    	{
    		$this->redirect("login/index");
    	}

       
    }
}
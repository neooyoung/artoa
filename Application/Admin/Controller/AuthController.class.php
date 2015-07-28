<?php
namespace Admin\Controller;
use Think\Controller;
class AuthController extends Controller {
    public function _initialize()
    {
        if (!session("uid") || !session("name") || !session("admin")) 
        {
            $this->redirect("login/index");
        }
    }
   
}
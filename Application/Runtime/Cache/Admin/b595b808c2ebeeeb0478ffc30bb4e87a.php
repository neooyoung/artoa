<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟 随其后！ -->
    <title>Artoa</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/artoa/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/artoa/Public/css/common.css">
    <link rel="stylesheet" href="/artoa/Public/css/admin.css">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    



    <nav class="nav-t navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-5" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">后台管理</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-5">
          <!-- <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">Mark Otto</a></p> -->
          <a class="navbar-text navbar-right" href="<?php echo U('login/signout');?>">退出</a>
        </div>
      </div>
    </nav>
    
    
      <div class="nav-l">
            <div class="list-group">
              <a href="<?php echo U('user/index');?>" target="menuFrame" class="list-group-item active">用户管理</a>
              <a href="<?php echo U('user/add_user');?>" target="menuFrame" class="list-group-item">添加用户</a>
              <a href="<?php echo U('user/index');?>" target="menuFrame" class="list-group-item">用户管理</a>
              <a href="<?php echo U('user/index');?>" target="menuFrame" class="list-group-item">用户管理</a>
              <a href="<?php echo U('user/index');?>" target="menuFrame" class="list-group-item">用户管理</a>
            </div>
      </div>
    
    <div class="main-con">
        <iframe name="menuFrame" src="<?php echo U('user/index');?>" style="overflow:visible;" scrolling="yes" frameborder="0" height="100%" width="100%"></iframe>
    </div>
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/artoa/Public/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/artoa/Public/js/bootstrap.min.js"></script>
    <script src="/artoa/Public/js/admin.js"></script>
  </body>
</html>
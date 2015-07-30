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
              <a href="<?php echo U('depart/index');?>" target="menuFrame" class="list-group-item">组织部门</a>
              <a href="<?php echo U('score/index');?>" target="menuFrame" class="list-group-item">员工评分</a>
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
    <script type="text/javascript">
	    $(function(){
	    	$(".admin select").val(<?php echo ($user['admin']); ?>);

	    	$(".area select").change(function(){
				var aid = $(this).val();
				$.post("<?php echo U('user/add_user_ajax');?>", {area:aid}, function(data){
					var str = "<option value='0'>全部</option>";
					for (var i in data)
					{
						str += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
					}

					$(".depart select").html(str);
					$(".depart select").change();
				})

				score();
			})

			$(".depart select").change(function(){
				var aid = $(this).val();
				$.post("<?php echo U('user/add_user_ajax');?>", {depart:aid}, function(data){
					var str = "<option value='0'>全部</option>";
					for (var i in data)
					{
						str += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
					}

					$(".team select").html(str);

					init();
					score();
					// $(".area select").val(<?php echo ($user['aid']); ?>);
			  //   	$(".depart select").val(<?php echo ($user['did']); ?>);
			  //   	$(".depart select").val(<?php echo ($user['tid']); ?>);

				})
			})


			$(".score select").change(function(){
				score();
			});

			$(".area select").change();

			$(".submit").click(function(){
				$("#score-f").submit();
			});

	    })




	    var flag = 1;

	    function init(){
	    	if (flag == 1) 
	    	{
	    		$(".area select").val(<?php echo ($user['aid']); ?>);
		    	$(".depart select").val(<?php echo ($user['did']); ?>);
		    	$(".team select").val(<?php echo ($user['tid']); ?>);
	    	};
	    	flag = 0;
	    }

	    function score(){
	    	var ye = $(".year").val();
				var mon = $(".month").val();
				var area = $(".area select").val();
				var depart = $(".depart select").val();
				var team = $(".team select").val();
				$.post("<?php echo U('score/score_ajax');?>", {year:ye,month:mon,aid:area,did:depart,tid:team}, function(data){
					var str = " ";
					for (var i in data)
					{
						str += "<tr><td>"+data[i]['name']+"</td>";

						for (var j = 1; j < 8; j++) {
							str += "<td><input name='col"+data[i]['uid']+"[]' type='number' min='0' value='"+data[i]['child']['col'+j]+"'/></td>";
						};

						str += "<td><input type='text' name='col"+data[i]['uid']+"[]' value='"+data[i]['child']['total']+"'/></td></tr>";
					}
					$(".score .scorelist").html(str);

					$(".score td input").change(function(){
						// 总分计算
						var index = $(this).parent().parent().find('td');
						
						var t = index.eq(1).find('input').val()*5+index.eq(2).find('input').val()*4+index.eq(3).find('input').val()*3+index.eq(4).find('input').val()*2.5+index.eq(5).find('input').val()*2+index.eq(6).find('input').val()*1-index.eq(7).find('input').val()*5;

						index.eq(8).find('input').val(t);
					})
				})
	    }

    </script>
  </body>
</html>
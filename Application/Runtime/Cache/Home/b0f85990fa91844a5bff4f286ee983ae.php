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
    <link rel="stylesheet" href="/artoa/Public/css/swiper.min.css">
    <link rel="stylesheet" href="/artoa/Public/css/common.css">
    <link rel="stylesheet" href="/artoa/Public/css/home.css">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container" style="padding-left: 0;padding-right: 0">
    <div class="swiper-container slider">
      <div class="swiper-wrapper">
          <div class="swiper-slide" style="background:url(/artoa/Public/img/slider1.jpg) no-repeat center top; background-size: cover"></div>
          <div class="swiper-slide" style="background:url(/artoa/Public/img/slider2.jpg) no-repeat center top; background-size: cover"></div>
          <div class="swiper-slide" style="background:url(/artoa/Public/img/slider3.jpg) no-repeat center top; background-size: cover"></div>
      </div>
      <!-- 如果需要分页器 -->
      <div class="swiper-pagination swiper-pagination-white"></div>
      
      <!-- 如果需要导航按钮 -->
      <!-- <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div> -->
    </div>
  </div>


	
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="login panel panel-default">
					<div class="panel-heading sh">员工注册</div>
					<div class="panel-body">
						<?php if ($error): ?>
							<div class="alert alert-danger">
								<?php echo ($error); ?>
								<!-- <strong>Whoops!</strong> There were some problems with your input.<br><br> -->
								<!-- <ul>
										<li>333</li>
								</ul> -->
							</div>
						<?php endif; ?>
							
						<form class="form-horizontal" role="form" method="POST" action="<?php echo U('home/login/signup_handler');?>">
							<input type="hidden" name="_token" value="">

							<div class="form-group">
								<label class="col-md-3 control-label">用户名：</label>
								<div class="col-md-7">
									<input type="name" placeholder="name" class="form-control" name="name">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">密码：</label>
								<div class="col-md-7">
									<input type="password" placeholder="password" class="form-control" name="password">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">确认密码：</label>
								<div class="col-md-7">
									<input type="password" placeholder="password" class="form-control" name="repassword">
								</div>
							</div>

							<div class="area form-group">
								<label class="col-md-3 control-label">地区：</label>
								<div class="col-md-7">
									<select class="form-control" name="area">
										<?php foreach ($area as $v): ?>
											<option value=<?php echo ($v["id"]); ?>><?php echo ($v["name"]); ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<div class="depart form-group">
								<label class="col-md-3 control-label">部门：</label>
								<div class="col-md-7">
									<select class="form-control" name="depart">
										
									</select>
								</div>
							</div>

							<div class="team form-group">
								<label class="col-md-3 control-label">小组：</label>
								<div class="col-md-7">
									<select class="form-control" name="team">
										
									</select>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-7 col-md-offset-3">
									<button type="submit" class="btn btn-primary">提交</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/artoa/Public/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/artoa/Public/js/bootstrap.min.js"></script>
    <script src="/artoa/Public/js/swiper.min.js"></script>
    <script src="/artoa/Public/js/common.js"></script>
    <script>

    	$(".area select").change(function(){
				var aid = $(this).val();
				$.post("<?php echo U('login/signup_ajax');?>", {area:aid}, function(data){
					var str = ' ';
					for (var i in data)
					{
						str += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
					}

					$(".depart select").html(str);
					$(".depart select").change();
				})
			})

			$(".depart select").change(function(){
				var aid = $(this).val();
				$.post("<?php echo U('login/signup_ajax');?>", {depart:aid}, function(data){
					var str = ' ';
					for (var i in data)
					{
						str += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
					}

					$(".team select").html(str);

				})
			})

			$(".area select").change();

	   
    </script>
  </body>
</html>
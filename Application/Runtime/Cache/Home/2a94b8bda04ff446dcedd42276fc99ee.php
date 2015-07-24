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
	<div class="">
		<table class="t-nav table table-bordered">
			<tbody>
				<tr>
					<td width="75%" colspan="3">
						<label>日期：</label>
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								2015年 <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>

						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								1月 <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>

						<br>
						
						<label>地区：</label>
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								2015年 <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Anothe</a></li>
								<li><a href="#">Someth</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separa</a></li>
							</ul>
						</div>
						&nbsp;
						<label>部门：</label>
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								2015年 <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Anothe</a></li>
								<li><a href="#">Someth</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separa</a></li>
							</ul>
						</div>
						&nbsp;
						<label>小组：</label>
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								2015年 <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Anothe</a></li>
								<li><a href="#">Someth</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separa</a></li>
							</ul>
						</div>
						&nbsp;
						<div class="search btn-group">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search for...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">搜索</button>
								</span>
							</div><!-- /input-group -->
						</div>

					</td>
					<td class="countdown">
						距离十一国庆<br/>
						还有80天
					</td>
				</tr>
				<tr class="sub-nav">
					<td>个人排行榜</td>
					<td>小组排行榜</td>
					<td>部门排行榜</td>
					<td>公司排行榜</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="table-responsive">	
		<table class="t-body table table-hover table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Username</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
				</tr>
				<tr>
					<th scope="row">2</th>
					<td>Jacob</td>
					<td>Thornton</td>
					<td>@fat</td>
				</tr>
				<tr>
					<th scope="row">3</th>
					<td>Larry</td>
					<td>the Bird</td>
					<td>@twitter</td>
				</tr>
			</tbody>
		</table>
	</div>
	

</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/artoa/Public/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/artoa/Public/js/bootstrap.min.js"></script>
    <script src="/artoa/Public/js/swiper.min.js"></script>
    <script src="/artoa/Public/js/common.js"></script>
  </body>
</html>
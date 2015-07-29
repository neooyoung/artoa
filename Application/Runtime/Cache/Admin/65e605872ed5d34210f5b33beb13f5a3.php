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
    


<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th width="10%">用户名</th>
			<th width="10%">级别</th>
			<th width="15%">添加时间</th>
			<th width="30%">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($users)): foreach($users as $key=>$v): ?><tr>
				<td><?php echo ($v["name"]); ?></td>
				<td><?php echo ($v["admin"]); ?></td>
				<td><?php echo ($v["dateline"]); ?></td>
				<td>
				<a href="<?php echo U('user/update_user', array('uid'=>$v['uid']));?>">修改</a>
				<a href="<?php echo U('user/del_user', array('uid'=>$v['uid']));?>">删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
	</tbody>
	
</table>
<div class="pages">
		<?php echo ($page); ?>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/artoa/Public/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/artoa/Public/js/bootstrap.min.js"></script>
    <script src="/artoa/Public/js/admin.js"></script>
    <script type="text/javascript">
	    $(function(){
	    	$(".area select").change(function(){
				var aid = $(this).val();
				$.post("<?php echo U('user/add_user_ajax');?>", {area:aid}, function(data){
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
				$.post("<?php echo U('user/add_user_ajax');?>", {depart:aid}, function(data){
					var str = ' ';
					for (var i in data)
					{
						str += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
					}

					$(".team select").html(str);
				})
			})

			$(".area select").change();

	    })
    </script>
  </body>
</html>
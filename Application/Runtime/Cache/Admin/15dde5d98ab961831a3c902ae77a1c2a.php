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
    


	<table class="table table-hover">
		<tr>
		<th><a href="<?php echo U('depart/add_area');?>">添加地区</a></th>
		</tr>
		<?php foreach ($area as $v): ?>
			<tr>
				<th>
					<?php echo ($v['name']); ?>
					<a href="<?php echo U('depart/update_area', array('id'=>$v['id']));?>">[修改]</a>
					<a href="<?php echo U('depart/del_area', array('id'=>$v['id']));?>">[删除]</a>
					<a href="<?php echo U('depart/add_depart', array('id'=>$v['id']));?>">[添加部门]</a>
				</th>
			</tr>
			<?php if ($v['child']): ?>
				<tr>
					<td>
						<?php foreach ($v['child'] as $val): ?>
							<?php echo ($val["name"]); ?>
							<a href="<?php echo U('depart/update_depart', array('id'=>$val['id']));?>">[修改]</a>
							<a href="<?php echo U('depart/del_depart', array('id'=>$val['id']));?>">[删除]</a>
							<a href="<?php echo U('depart/manage_team', array('pid'=>$val['id'], 'topid'=>$val['topid']));?>">[管理小组]</a>
							&nbsp;
						<?php endforeach; ?>
					</td>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>
	</table>
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
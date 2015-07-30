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
    




	<div class="">
		<table class="score t-nav table table-bordered">
			<tbody>
				<tr>
					<td>
						<label>日期：</label>
						<select class="year">
							<option value="2015">2015年</option>
							<option value="2016">2016年</option>
							<option value="2017">2017年</option>
						</select>
						<select class="month">
							<option value="1">1月</option>
							<option value="2">2月</option>
							<option value="3">3月</option>
							<option value="4">4月</option>
							<option value="5">5月</option>
							<option value="6">6月</option>
							<option value="7">7月</option>
							<option value="8">8月</option>
							<option value="9">9月</option>
							<option value="10">10月</option>
							<option value="11">11月</option>
							<option value="12">12月</option>
						</select>
						&nbsp;
						
						<label>地区：</label>
						<span class="area">
							<select>
								<option value="0">全部</option>
								<?php foreach ($area as $v): ?>
								<option value=<?php echo ($v["id"]); ?>><?php echo ($v["name"]); ?></option>
								<?php endforeach; ?>
							</select>
						</span>
						
						&nbsp;
						<label>部门：</label>
						<span class="depart">
							<select>
								
							</select>
						</span>
						&nbsp;
						<label>小组：</label>
						<span class="team">
							<select>
								
							</select>
						</span>
						&nbsp;

						<div class="search btn-group">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search for...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button">搜索</button>
								</span>
							</div><!-- /input-group -->
						</div>

						<button class="submit btn btn-default">提交</button>

					</td>
					
				</tr>
				
			</tbody>
		</table>
	</div>

	<form id="score-f" action="<?php echo U('score/score_handler');?>" method="post">
		<div class="score table-responsive">	
			<table class="t-body table table-hover table-bordered">
				<thead>
					<tr>
						<th width="11%">姓名</th>
						<th width="11%">施工（5）</th>
						<th width="11%">设计/意向（4）</th>
						<th width="11%">定金（3）</th>
						<th width="11%">VIP卡（2.5）</th>
						<th width="11%">二访（2）</th>
						<th width="11%">一访（1）</th>
						<th width="11%">退单（-5）</th>
						<th width="11%">总积分</th>
					</tr>
				</thead>
				
					<tbody class="scorelist">
						
					</tbody>
				
			</table>
		</div>
	</form>
	



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/artoa/Public/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/artoa/Public/js/bootstrap.min.js"></script>
    <script src="/artoa/Public/js/admin.js"></script>
    <script type="text/javascript">
	    $(function(){
	    	$(".year").val(<?php echo ($year); ?>);;
	    	$(".month").val(<?php echo ($month); ?>);	

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
					var str = "<input type='hidden' name='year' value='"+ye+"'/><input type='hidden' name='month' value='"+mon+"'/>";
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
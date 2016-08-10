<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>用户列表</title>

	<link rel="stylesheet" href="/learn/tp1625/Public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/learn/tp1625/Public/bootstrap/css/bootstrap-theme.min.css">
	<script src="/learn/tp1625/Public/bootstrap/js/jquery-1.11.0.min.js"></script>
	<script src="/learn/tp1625/Public/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
	<center><h1>用户列表</h1></center>
	<div style="width:30%;float:left;">
		<ul style="list-style:none;">
			<li>
				<button type="button" style="width:100%;" class="btn btn-success">success</button>
				<div style="display:block;">
					<button type="button" style="width:80%;" class="btn btn-default">(默认样式)</button>
					<button type="button" style="width:80%;" class="btn btn-default">(默认样式)</button>
					<button type="button" style="width:80%;" class="btn btn-default">(默认样式)</button>
				</div>
			</li>
			<li>
				<button type="button" style="width:100%;" class="btn btn-success">success</button>
				<div style="display:none;">
					<button type="button" style="width:80%;" class="btn btn-default">(默认样式)</button>
					<button type="button" style="width:80%;" class="btn btn-default">(默认样式)</button>
					<button type="button" style="width:80%;" class="btn btn-default">(默认样式)</button>
				</div>
			</li>
			<li>
				<button type="button" style="width:100%;" class="btn btn-success">success</button>
				<div style="display:none;">
					<button type="button" style="width:80%;" class="btn btn-default">(默认样式)</button>
					<button type="button" style="width:80%;" class="btn btn-default">(默认样式)</button>
					<button type="button" style="width:80%;" class="btn btn-default">(默认样式)</button>
				</div>
			</li>
		</ul>
	</div>
	<div style="width:70%;float:right;">
		<table class="table table-bordered">
			<tr>
				<th>1</th>
				<th>id</th>
				<th>用户名</th>
				<th>性别</th>
				<th>邮箱</th>
				<th>生日</th>
			</tr>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
				<th>1</th>
				<th><?php echo ($data["user_id"]); ?></th>
				<th><?php echo ($data["user_name"]); ?></th>
				<th><?php echo ($data["sex"]); ?></th>
				<th><?php echo ($data["email"]); ?></th>
				<th><?php echo ($data["birthday"]); ?></th>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
		<center style="clear:both;">
			<a style="float:left;" href="/learn/tp1625/index.php/Home/User/user_list/?type=minus&page=<?php echo ($page); ?>" class="btn btn-primary">上一页</a>
			<a style="float:right;" href="/learn/tp1625/index.php/Home/User/user_list/?type=add&page=<?php echo ($page); ?>" class="btn btn-primary">下一页</a>
			<h3><?php echo ($pageShow); ?>/<?php echo ($pageMax); ?></h3>
		</center>
	</div>

<script type="text/javascript">
	$('.btn-success').click(function(){
		if ($(this).siblings('div').css('display')=='block') {
			$('.btn-success').siblings('div').css('display','none');
			$(this).siblings('div').slideUp();
		}else{
			$('.btn-success').siblings('div').css('display','none');
			$(this).siblings('div').slideDown();
		}
	})
</script>
</body>
</html>
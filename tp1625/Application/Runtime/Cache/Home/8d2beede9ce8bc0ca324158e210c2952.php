<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>用户列表</title>

	<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap-theme.min.css">
	<script src="/Public/bootstrap/js/jquery-1.11.0.min.js"></script>
	<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
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
		<a href="/index.php/Home/User/openAdd" type="button" class="btn btn-default">增</a>
		<table class="table table-bordered">
			<tr>
				<th>1</th>
				<th>id</th>
				<th>用户名</th>
				<th>性别</th>
				<th>邮箱</th>
				<th>生日</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr id="<?php echo ($data["user_id"]); ?>">
				<th>1</th>
				<th><?php echo ($data["user_id"]); ?></th>
				<th><?php echo ($data["user_name"]); ?></th>
				<th><?php echo ($data["sex"]); ?></th>
				<th><?php echo ($data["email"]); ?></th>
				<th><?php echo ($data["birthday"]); ?></th>
				<th>
				<div>
					<center style="clear:both;">
						<!-- <a style="float:left;"  onclick="member_edit('/index.php/Home/User/openEdit/',<?php echo ($data["user_id"]); ?>)" class="btn btn-primary">改</a> -->
						<a style="float:left;" href="/index.php/Home/User/openEdit/?user_id=<?php echo ($data["user_id"]); ?>" class="btn btn-primary">改</a>
						<a style="float:right;" onclick="member_del(this,<?php echo ($data["user_id"]); ?>)" class="btn btn-primary">删</a>
					</center>
				</div>
				</th>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
		<center style="clear:both;">
			<a style="float:left;" href="/index.php/Home/User/user_list/?type=minus&page=<?php echo ($page); ?>" class="btn btn-primary">上一页</a>
			<a style="float:right;" href="/index.php/Home/User/user_list/?type=add&page=<?php echo ($page); ?>" class="btn btn-primary">下一页</a>
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

/*用户-编辑*/
//function member_edit(url,id){
//	redirect(url+'?user_id='+id);
//}

	/*用户-删除*/
function m2ember_del(obj,id){
	confirm('确认要删除吗？',function(index){
		alert(index);
		$.ajax({
			type : 'post',
			url : '/index.php/Home/User/userDel',
			data : {'user_id' : id},
			datatype : 'JSON',
			success : function(res){
				alert(123);
			}
		});
	});

}

/*用户-删除*/
function member_del(obj,id)
{
var r=confirm("确认要删除吗？");
if (r==true)
  {
  $.ajax({
			type : 'post',
			url : '/index.php/Home/User/userDel',
			data : {'user_id' : id},
			datatype : 'JSON',
			success : function(res){
				$('#'+id).remove();
			}
		});
  }
}
</script>
</body>
</html>
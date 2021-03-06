<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>商品列表</title>

	<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap-theme.min.css">
	<script src="/Public/bootstrap/js/jquery-1.11.0.min.js"></script>
	<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
	<center><h1>商品列表</h1></center>
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
		<div>
			
		</div>
	</div>
	<div style="width:70%;float:right;">
		<a href="/index.php/Home/Goods/openAdd" type="button" class="btn btn-default">增</a>
		<table class="table table-bordered">
			<tr>
				<th>1</th>
				<th>id</th>
				<th>商品名</th>
				<th>商品数量</th>
				<th>商品价格</th>
				<th style="width:300px;">商品描述</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr id="<?php echo ($data["goods_id"]); ?>">
				<th>1</th>
				<th><?php echo ($data["goods_id"]); ?></th>
				<th><?php echo ($data["goods_name"]); ?></th>
				<th><?php echo ($data["goods_number"]); ?></th>
				<th><?php echo ($data["market_price"]); ?></th>
				<th style="width:300px;"><?php echo ($data["keywords"]); ?></th>
				<th>
				<div>
					<center style="clear:both;">
						<a style="float:left;" href="/index.php/Home/Goods/openEdit/?goods_id=<?php echo ($data["goods_id"]); ?>" class="btn btn-primary">改</a>
						<a style="float:right;" onclick="member_del(this,<?php echo ($data["goods_id"]); ?>)" class="btn btn-primary">删</a>
					</center>
				</div>
				</th>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
		<center style="clear:both;">
			<a style="float:left;" href="/index.php/Home/Goods/goods_list/?type=minus&page=<?php echo ($page); ?>" class="btn btn-primary">上一页</a>
			<a style="float:right;" href="/index.php/Home/Goods/goods_list/?type=add&page=<?php echo ($page); ?>" class="btn btn-primary">下一页</a>
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

/*用户-删除*/
function member_del(obj,id)
{
var r=confirm("确认要删除吗？");
if (r==true)
  {
  $.ajax({
			type : 'post',
			url : '/index.php/Home/Goods/goodsDel',
			data : {'goods_id' : id},
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
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title><?php echo ($title); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!--标准mui.css-->
		<link rel="stylesheet" href="/Public/mui/css/mui.min.css">
		<!--App自定义的css-->
		<link rel="stylesheet" type="text/css" href="/Public/mui/css/app.css"/>
		<style>
			h5{
		        padding-top: 8px;
		        padding-bottom: 8px;
		        text-indent: 12px;
		    }
		    
			.mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body{
				font-size: 15px;
				margin-top:8px;
				color: #333;
			}
		</style>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">mui—购物车</h1>
		</header>
		<div class="mui-content">
				
			<div class="title">
				<h5 style="background-color:#efeff4">购物车</h5>
			</div>
			<ul class="mui-table-view">
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media">
				<div style="float:left;width:70%;">
					<a href="javascript:;" class="">
						<img class="mui-media-object mui-pull-left" src="/Public/img/<?php echo ($vo["goods_img"]); ?>">
						<div class="mui-media-body">
							<?php echo ($vo["goods_name"]); ?>
							<p class="mui-ellipsis">￥<span class="goods_price"><?php echo ($vo["goods_price"]); ?></span></p>
						</div>
					</a>
					<div class="mui-numbox" data-numbox-min="1" data-numbox-max="">
						<button class="mui-btn mui-btn-numbox-minus" type="button">-</button>
						<input id="number" class="mui-input-numbox number" type="number" name="number" value="<?php echo ($vo["goods_number"]); ?>">
						<input type="hidden" class="del_id" value="<?php echo ($vo["goods_id"]); ?>">
						<button class="mui-btn mui-btn-numbox-plus" type="button">+</button>
					</div>
				</div>
					
					<div style="float:right;width:30%">
						<button class="del" type="button" class="mui-btn mui-btn-warning mui-btn-outlined">删除订单</button>
						<p>小计￥<span class="total"><?php echo ($vo["total"]); ?></span></p>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
				<p style="float:right;font-size:20px;color:red;">总计：	￥ <span id="total"></span></p>
			</ul>
			<div>
				<a href="<?php echo U('Goods/sublist');?>">
					<button type="button"  style="position:fixed;bottom:40px;" class="mui-btn mui-btn-danger mui-btn-block">提交订单</button>
				</a>
			</div>
		</div>
				
		<nav class="mui-bar mui-bar-tab">
			<div>
				<a class="mui-tab-item " id="btn1" href="<?php echo U('Index/index');?>">
					<span class="mui-icon mui-icon-home"></span>
					<span class="mui-tab-label">首页</span>	
				</a>
				<a class="mui-tab-item " href="<?php echo U('Goods/goods_category');?>" >
					<span class="mui-icon mui-icon-bars"></span>
					<span class="mui-tab-label">商品分类</span>
				</a>
				<a class="mui-active mui-tab-item" href="<?php echo U('Goods/cart');?>">
					<span class="mui-icon mui-icon-download"><?php echo ($cart_mount); ?></span>
					<span class="mui-tab-label">购物车</span>
				</a>
				<a class="mui-tab-item" href="<?php echo U('Index/user_center');?>">
					<span class="mui-icon mui-icon-contact"></span>	
					<span class="mui-tab-label">用户中心</span>
				</a>
			</div>
		</nav>
		<script src="/Public/mui/js/mui.min.js"></script>
		<script src="/Public/mui/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			mui('body').on('tap','a',function(){document.location.href=this.href;});
			window.onload = function(){
				var slider = mui("#slider");
				slider.slider({
						interval: 5000
					});
			} 

			window.onload = function(){
				$('li').each(function(){
					$(this).find('.total').html(($(this).find('.goods_price').html() * $(this).find('.number').val()).toFixed(2));
					//var a = $(this).find('.goods_price').html() * $(this).find('.number').val();
					//alert($(this).find('.goods_price').html());
					//alert($(this).find('.number').val());
					//alert(a);
				})	

				var all = 0;
				for (var i = 0 ; i < $('.total').length ; i++) {
					all -= - $('.total').eq(i).html();
				}
				//alert(all);
				$('#total').html(all.toFixed(2));
			}

			$('input').change(function(){
				var number = $(this).val();
				var subtotal = $(this).parents('li').find('.total');
				var goods_id = $(this).siblings('input').val();
					$.ajax({
						type : 'post',
						url : '/index.php/Admin/Goods/changeGoods/',
						data : {goods_id : goods_id,
								goods_number : number},
					});

					$('li').each(function(){
						$(this).find('.total').html(($(this).find('.goods_price').html() * $(this).find('.number').val()).toFixed(2));
					})	
				
					var all = 0;
					for (var i = 0 ; i < $('.total').length ; i++) {
						all -= - $('.total').eq(i).html();
					}
					$('#total').html(all.toFixed(2));
			})


			$('.del').click(function(){
				var goods_id =　$(this).parents('li').find('.del_id').val();
				var op = $(this).parents('li');
				var all = 0;
				mui.confirm('确定要删除吗？','',['确认','取消'],function(e){
					//alert(e.index);
					if (e.index == 0) {
					$.ajax({
						type : 'post',
						url : '/index.php/Admin/Goods/delCart',
						data : {goods_id : goods_id},
						success : function(res){
							if (res == 1) {
								op.remove();
								mui.alert('删除成功');

								for (var i = 0 ; i < $('.total').length ; i++) {
									all -= - $('.total').eq(i).html();
								}
								$('#total').html(all.toFixed(2));
							}else{
								mui.alert('删除失败');
							}

						}
					});
					}
					//alert(goods_id);
					
				})
				
			})
		</script>
	</body>

</html>
<body>

</body>
</html>
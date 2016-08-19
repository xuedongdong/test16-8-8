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
			<h1 class="mui-title">mui—商品明细</h1>
		</header>
		<div id="slider" class="mui-slider" >
			<div class="mui-slider-group mui-slider-loop">
				<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="#">
						<img src="/Public/mui/images/yuantiao.jpg">
					</a>
				</div>
				<!-- 第一张 -->
				<div class="mui-slider-item">
					<a href="#">
						<img src="/Public/mui/images/shuijiao.jpg">
					</a>
				</div>
				<!-- 第二张 -->
				<div class="mui-slider-item">
					<a href="#">
						<img src="/Public/mui/images/muwu.jpg">
					</a>
				</div>
				<!-- 第三张 -->
				<div class="mui-slider-item">
					<a href="#">
						<img src="/Public/mui/images/cbd.jpg">
					</a>
				</div>
				<!-- 第四张 -->
				<div class="mui-slider-item">
					<a href="#">
						<img src="/Public/mui/images/yuantiao.jpg">
					</a>
				</div>
				<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="#">
						<img src="/Public/mui/images/shuijiao.jpg">
					</a>
				</div>
			</div>
			<div class="mui-slider-indicator">
				<div class="mui-indicator mui-active"></div>
				<div class="mui-indicator"></div>
				<div class="mui-indicator"></div>
				<div class="mui-indicator"></div>
			</div>
		</div>

		<div class="mui-card" style="margin:0px 0px 0px 0px;">
			<form method="post" action="<?php echo U('Goods/Addgoods');?>">

				<img src="/Public/img/<?php echo ($data["goods_img"]); ?>" alt="" style="width:50%;float:left;">
				<div class="mui-card-content" style="width:50%;float:right;">
					<div class="mui-card-content-inner">
						<h4><?php echo ($data["keywords"]); ?></h4>
						<s style="color:red;">原价：￥<?php echo ($data["market_price"]); ?></s>
						<h5 style="color:red;">惊爆价：￥<?php echo ($data["shop_price"]); ?></h5>
					</div>
					<div class="mui-numbox" data-numbox-min="1" data-numbox-max="<?php echo ($data["goods_number"]); ?>">
						<button class="mui-btn mui-btn-numbox-minus" type="button">-</button>
						<input id="test" class="mui-input-numbox" type="number" name="number" value="<?php echo ($number); ?>">
						<button class="mui-btn mui-btn-numbox-plus" type="button">+</button>
					</div>
				</div>
				<input id="goods_id" type="hidden" name="goods_id" value="<?php echo ($data["goods_id"]); ?>">
				<!-- <input id="user_name" type="hidden" name="user_name" value="<?php echo ($user_name); ?>"> -->

				<div style="padding: 10px 10px;">
					<div id="segmentedControl" class="mui-segmented-control">
						<a class="mui-control-item mui-active" href="#item1">
							商品简介
						</a>
						<a class="mui-control-item" href="#item2">
							商品摘要
						</a>
						<a class="mui-control-item" href="#item3">
							商品情况
						</a>
					</div>
				</div>
				<div style="margin-bottom:150px;">
					<div id="item1" class="mui-control-content mui-active">
						<!-- <div id="scroll" class="mui-scroll-wrapper" data-scroll="1">
							<div class="mui-scroll" style="transform: translate3d(0px, 0px, 0px) translateZ(0px);">
								<?php echo ($data["goods_desc"]); ?>
							</div>
						</div> -->
						<?php echo ($data["goods_desc"]); ?>
					</div>
					<div id="item2" class="mui-control-content">
						<?php echo ($data["goods_brief"]); ?>
					</div>
					<div id="item3" class="mui-control-content">
						<ul>
							<li>
								编号<?php echo ($data["goods_sn"]); ?>		
							</li>
							<li>
								重量：<?php echo ($data["goods_weight"]); ?>		
							</li>
							<li>
								数量：<?php echo ($data["goods_number"]); ?>		
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div>
				<button type="submit" style="position:fixed;bottom:40px;" class="mui-btn mui-btn-danger mui-btn-block">加入购物车</button>
			</div>
			</form>
		</div>

		<nav class="mui-bar mui-bar-tab">
			<div>
				<a class="mui-active mui-tab-item " id="btn1" href="<?php echo U('Index/index');?>">
					<span class="mui-icon mui-icon-home"></span>
					<span class="mui-tab-label">首页</span>	
				</a>
				<a class="mui-tab-item " href="<?php echo U('Goods/goods_category');?>" >
					<span class="mui-icon mui-icon-bars"></span>
					<span class="mui-tab-label">商品分类</span>
				</a>
				<a class="mui-tab-item" href="<?php echo U('Goods/cart');?>">
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
		<script type="text/javascript" charset="utf-8">
			mui('body').on('tap','a',function(){document.location.href=this.href;});
			window.onload = function(){
				var slider = mui("#slider");
				slider.slider({
						interval: 5000
					});
			} 
		</script>
	</body>

</html>
<body>

</body>
</html>
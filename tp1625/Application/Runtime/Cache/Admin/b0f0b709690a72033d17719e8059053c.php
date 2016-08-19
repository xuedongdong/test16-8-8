<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head><!DOCTYPE html>
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
			<h1 class="mui-title">mui—商城首页</h1>
		</header>
		<div class="mui-content">
			<ul class="mui-table-view mui-table-view-chevron">
				<li id="switch" class="mui-table-view-cell">
					示例
					<div class="mui-switch">
						<div class="mui-switch-handle"></div>
					</div>
				</li>
			</ul>
		</div>
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
		<div class="mui-content" style="background-color:#fff">
		   
		    <ul class="mui-table-view mui-grid-view">
		     	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media mui-col-xs-6">
		            <a href="<?php echo U('Goods/goods_detail');?>/?goods_id=<?php echo ($vo["goods_id"]); ?>">
		                <img class="mui-media-object" src="/Public/img/<?php echo ($vo["goods_img"]); ?>">
		                <div class="mui-media-body"><?php echo ($vo["goods_name"]); ?></div>
		                <div class="mui-media-body"><?php echo ($vo["shop_price"]); ?></div>
		            </a>
		        </li><?php endforeach; endif; else: echo "" ;endif; ?>
		    </ul>
		    <ul class="mui-pager">
		    	<li style="float:left;margin-left:40px;margin-bottom:40px;">
		    		<a href="/index.php/Admin/Index/index?type=minus&page=<?php echo ($page); ?>">
		    			上一页
		    		</a>
		    	</li>
		    	<li style="float:right;margin-right:40px;">
		    		<a href="/index.php/Admin/Index/index?type=add&page=<?php echo ($page); ?>">
		    			下一页
		    		</a>
		    	</li>
		    	<span><?php echo ($page); ?>/<?php echo ($pageMax); ?></span>
		    </ul>    
		    
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
			mui.init({
				swipeBack:true //启用右滑关闭功能
			});
			var slider = mui("#slider");
			document.getElementById("switch").addEventListener('toggle', function(e) {
				if (e.detail.isActive) {
					slider.slider({
						interval: 5000
					});
				} else {
					slider.slider({
						interval: 0
					});
				}
			});
		</script>
	</body>

</html>
<body>

</body>
</html>
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
		<link rel="stylesheet" type="text/css" href="/Public/mui/css/app.css" />
		<style>
			.mui-row.mui-fullscreen>[class*="mui-col-"] {
				height: 100%;
			}
			.mui-col-xs-3,
			.mui-control-content {
				overflow-y: auto;
				height: 100%;
			}
			.mui-segmented-control .mui-control-item {
				line-height: 50px;
				width: 100%;
			}
			.mui-segmented-control.mui-segmented-control-inverted .mui-control-item.mui-active {
				background-color: #fff;
			}
		</style>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">category</h1>
		</header>
		
		<div class="mui-content mui-row mui-fullscreen">
			<div class="mui-col-xs-3">
				<div id="segmentedControls" class="mui-segmented-control mui-segmented-control-inverted mui-segmented-control-vertical">
				   <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><a class="mui-control-item" href="#content<?php echo ($k); ?>"><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>	
				</div>
			</div>
			<div id="segmentedControlContents" class="mui-col-xs-9" style="border-left: 1px solid #c8c7cc;">
			   <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div id="content<?php echo ($k); ?>" class="mui-control-content mui-active">
					<ul class="mui-table-view">	
				   	  <?php if(is_array($vo["child"])): $k1 = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($k1 % 2 );++$k1;?><li class="mui-table-view-cell">
							<a class="" href="<?php echo U('Goods/sort_goods');?>?cat_id=<?php echo ($child["cat_id"]); ?>"><?php echo ($child["cat_name"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>	
	   	  		 </div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>


			<!-- <div>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mui-input-row mui-radio">
						<p><?php echo ($vo["child"]); ?></p>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div id="segmentedControlContents" class="mui-col-xs-9" style="border-left: 1px solid #c8c7cc;">
				<div id="item1" class="mui-control-content mui-active">
				</div>
				<div id="item2" class="mui-control-content">
				</div>
				<div id="item3" class="mui-control-content">
				</div>
			</div> -->
		


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

		<script src="/Public/mui//js/mui.min.js"></script>
		<script>
			// mui.init({
			// 	swipeBack: true //启用右滑关闭功能
			// });
			// var controls = document.getElementById("segmentedControls");
			// var contents = document.getElementById("segmentedControlContents");
			// var html = [];
			// var i = 1,
			// 	j = 1,
			// 	m = 16, //左侧选项卡数量+1
			// 	n = 21; //每个选项卡列表数量+1
			// for (; i < m; i++) {
			// 	html.push('<a class="mui-control-item" href="#content' + i + '">选项' + i + '</a>');
			// }
			// controls.innerHTML = html.join('');
			// html = [];
			// for (i = 1; i < m; i++) {
			// 	html.push('<div id="content' + i + '" class="mui-control-content"><ul class="mui-table-view">');
			// 	for (j = 1; j < n; j++) {
			// 		html.push('<li class="mui-table-view-cell">第' + i + '个选项卡子项-' + j + '</li>');
			// 	}
			// 	html.push('</ul></div>');
			// }
			// contents.innerHTML = html.join('');
			//  //默认选中第一个
			// controls.querySelector('.mui-control-item').classList.add('mui-active');
			// contents.querySelector('.mui-control-content').classList.add('mui-active');
		</script>

	</body>

</html>
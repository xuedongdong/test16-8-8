<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title><?php echo ($title); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!--标准mui.css-->
		<link rel="stylesheet" href="/Public/mui/css/mui.min.css">
		<!--App自定义的css-->
		<link rel="stylesheet" type="text/css" href="/Public/mui/css/app.css"/>
		<link href="/Public/mui/css/mui.picker.css" rel="stylesheet" />
		<link href="/Public/mui/css/mui.poppicker.css" rel="stylesheet" />
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
			.mui-btn {
				font-size: 16px;
				padding: 8px;
				
			}
			h5.mui-content-padded {
				margin-left: 3px;
				margin-top: 20px !important;
			}
			h5.mui-content-padded:first-child {
				margin-top: 12px !important;
			}
			.ui-alert {
				text-align: center;
				padding: 3px 10px;
				font-size: 16px;
			}
		</style>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">mui—支付</h1>
		</header>
		<div class="mui-content">

			<div class="title">
				<h5 style="background-color:#efeff4">支付</h5>
			</div>

			<form class="mui-input-group" action="<?php echo U('Goods/subShow');?>" method="post">
			
				<div class="title">
					<h5 style="background-color:#efeff4">支付地址</h5>
				</div>
				<div class="mui-content-padded">
					<div id='cityResult' class="ui-alert"></div>
						<button id='showCityPicker3' class="mui-btn mui-btn-block" type='button'>选择地区</button>
					<!-- <div id='cityResult3' class="ui-alert"></div> -->
					<p id="selected_addr" class="ui-alert"></p>
					<input type="hidden" name="cityselected" id='cityselected'>
					
				</div>
				<div class="mui-content-padded" style="border:1px;">
					<input type="text" name="address" placeholder="可填写具体地址">
				</div>

				<div>
					<div class="title">
						<h5 style="background-color:#efeff4">支付方式</h5>
					</div>
					<div class="mui-card">

						<?php if(is_array($paylist)): $i = 0; $__LIST__ = $paylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="mui-input-row mui-radio">
								<label><?php echo ($vo["pay_name"]); ?></label>
								<input name="pay_id" type="radio" value="<?php echo ($vo["pay_id"]); ?>">
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			
				<button type="submit" style="position:fixed;bottom:40px;font-size:30px;" class="mui-btn mui-btn-danger mui-btn-block">提交</button>
			</form>	
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
		<script src="/Public/mui/js/mui.picker.js"></script>
		<script src="/Public/mui/js/mui.poppicker.js"></script>
		<script src="/Public/mui/js/city.data.js" type="text/javascript" charset="utf-8"></script>
		<script src="/Public/mui/js/city.data-3.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
			mui('body').on('tap','a',function(){document.location.href=this.href;});
				(function($, doc) {
				$.init();
				$.ready(function() {
					//-----------------------------------------
					//					//级联示例
					var cityPicker3 = new $.PopPicker({
						layer: 3
					});
					cityPicker3.setData(cityData3);
					var showCityPickerButton = doc.getElementById('showCityPicker3');
					/*var cityResult3 = doc.getElementById('cityResult3');*/
					var cityselected = doc.getElementById('cityselected');
					var sel_addr = doc.getElementById('selected_addr');
					showCityPickerButton.addEventListener('tap', function(event) {
						cityPicker3.show(function(items) {
							sel_addr.innerText = "你选择的城市是:" + (items[0] || {}).text + " " + (items[1] || {}).text + " " + (items[2] || {}).text;
							var str = sel_addr.innerText.substr(8);
							cityselected.value = str;
							//返回 false 可以阻止选择框的关闭
							//return false;
						});
					}, false);
				});
			})(mui, document);
		</script>
	</body>

</html>
<body>

</body>
</html>
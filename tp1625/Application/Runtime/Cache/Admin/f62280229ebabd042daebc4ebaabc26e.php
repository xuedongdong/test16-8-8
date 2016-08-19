<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<!--标准mui.css-->
		<link rel="stylesheet" href="/Public/mui/css/mui.min.css">
		<!--App自定义的css-->
		<link rel="stylesheet" type="text/css" href="/Public/mui/css/app.css" />
		<link href="/Public/mui/css/mui.picker.css" rel="stylesheet" />
		<link href="/Public/mui/css/mui.poppicker.css" rel="stylesheet" />
		<!--<link rel="stylesheet" type="text/css" href="../css/mui.picker.min.css" />-->
		<style>
			.mui-btn {
				font-size: 16px;
				padding: 8px;
				margin: 3px;
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
				padding: 20px 10px;
				font-size: 16px;
			}
		</style>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">picker（选择器）</h1>
		</header>
		<div class="mui-content">
			<div class="mui-content-padded">
				
				<div id='cityResult' class="ui-alert"></div>
				<button id='showCityPicker3' class="mui-btn mui-btn-block" type='button'>三级联动示例 ...</button>
				<div id='cityResult3' class="ui-alert"></div>
			</div>
		</div>
		<script src="/Public/mui/js/mui.min.js"></script>
		<!--<script src="../js/mui.picker.min.js"></script>-->
		<script src="/Public/mui/js/mui.picker.js"></script>
		<script src="/Public/mui/js/mui.poppicker.js"></script>
		<script src="/Public/mui/js/city.data.js" type="text/javascript" charset="utf-8"></script>
		<script src="/Public/mui/js/city.data-3.js" type="text/javascript" charset="utf-8"></script>
		<script>
			(function($, doc) {
				$.init();
				$.ready(function() {
					
					var cityPicker3 = new $.PopPicker({
						layer: 3
					});
					cityPicker3.setData(cityData3);
					var showCityPickerButton = doc.getElementById('showCityPicker3');
					var cityResult3 = doc.getElementById('cityResult3');
					showCityPickerButton.addEventListener('tap', function(event) {
						cityPicker3.show(function(items) {
							cityResult3.innerText = "你选择的城市是:" + (items[0] || {}).text + " " + (items[1] || {}).text + " " + (items[2] || {}).text;
							//返回 false 可以阻止选择框的关闭
							//return false;
						});
					}, false);
				});
			})(mui, document);
		</script>
	</body>

</html>
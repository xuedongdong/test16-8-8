<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title>登陆</title>
	<meta charset="utf8">
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">

	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<link rel="stylesheet" href="../public/css/bootstrap-theme.min.css">

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->	
	<script src="../public/js/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="../public/js/bootstrap.min.js"></script>
</head>
<body style="">
	<form method="post" action="../controller/user.php" style="width:30%;margin:auto;">
<!-- 		用户名:<input type="text" name="name">
		密  码:<input type="password" name="password">
		<input type="submit" value="提交"> -->

		<div class="form-group">
    		<label for="exampleInputName1">用户名</label>
    		<input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="用户名">
 		 </div>
  		<div class="form-group">
    		<label for="exampleInputPassword1">密&nbsp;&nbsp;&nbsp;码</label>
   			<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="密&nbsp;&nbsp;&nbsp;码">
  		</div>
  		<div class="form-group">
    		<label for="exampleInputFile">File input</label>
   			<input type="file" id="exampleInputFile">
    		<p class="help-block">Example block-level help text here.</p>
  		</div>
  		<div class="checkbox">
    		<label>
      		<input type="checkbox"> Check me out
    		</label>
  		</div>
  	<button type="submit" class="btn btn-default">提交</button>
	</form>
</body>
</html>

<!-- <input type="text" name="username">
<input type="password" name="password">
<input type="hidden" name="login" value="123">
<input type="submit">

if($_POST['login']&&$_POST['login']=="123"){
	echo "点击了提交按钮，";
} -->
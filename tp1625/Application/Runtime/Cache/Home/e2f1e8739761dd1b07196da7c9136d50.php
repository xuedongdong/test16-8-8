<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta charset="utf-8">
		<title>login</title>
		<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="/learn/tp1625/Public/bootstrap/css/bootstrap.min.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="/learn/tp1625/Public/bootstrap/css/bootstrap-theme.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="/learn/tp1625/Public/bootstrap/js/jquery-1.11.0.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="/learn/tp1625/Public/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body style="width:100%;">
		
	<form action="/learn/tp1625/index.php/Home/Index/do_register/" method="post" style="width:50%;margin:auto;">
  	<div class="form-group">
    	<label for="exampleInputEmail1">用户名</label>
    	<input type="text" class="form-control" name="user_name" id="user_name" placeholder="User_name">
  	</div>
  	<div class="form-group">
    	<label for="exampleInputPassword1">密码</label>
    		<input type="password" class="form-control" name="password1" id="password" placeholder="Password">
      <label for="exampleInputPassword1">请再次输入密码</label>
        <input type="password" class="form-control" name="password2" id="password" placeholder="Password">
  		<div class="form-group">
      <?php echo ($msg); ?>
      </div>
  	</div>
  	<input type="submit" class="btn btn-default" value="提交"></button>
	</form>

	</body>
</html>
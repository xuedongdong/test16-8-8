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
		
	<form action="/learn/tp1625/index.php/Home/Index/do_login/" method="post" style="width:50%;margin:auto;border:1px;">
  	<div class="form-group">
    	<label for="exampleInputEmail1">用户</label>
    	<input type="text" class="form-control" name="user_name" id="user_name" placeholder="User_name">
  	</div>
  	<div class="form-group">
    	<label for="exampleInputPassword1">Password</label>
    		<input type="password" class="form-control" name="password" id="password" placeholder="Password">
  		<div class="checkbox">
    	<label>
     	 <input type="checkbox"> Check me out
    	</label>
      <div class="form-group">
      <?php echo ($msg); ?>
      </div>
  		</div>
  	</div>
  	<input type="submit" class="btn btn-default" value="登陆">
    <a href="/learn/tp1625/index.php/Home/Index/open_register/" class="btn btn-default" >注册</a>
    <!-- <input type="button" class="btn btn-default" value="注册" onclick="open_register()"> -->
	</form>

  <script type="text/javascript">
  /*$('#register_button').click(function(){
    $.ajax({
      type : 'post',
      url : '/learn/tp1625/index.php/Home/Index/doRegister/',
      data : {
        user_name:$('#register_username').val(),
        password:$('#register_password').val(),
        repassword:$('#register_repassword').val()
      },
      success:function(res){
        if (res == '1') {
          $('$register_label').html('用户名不能为空')；
        }else if(res == '2') {
          $('$register_label').html('密码不能为空')；
        }else if(res == '3') {
          $('$register_label').html('两次密码不一样')；
        }else if(res == '4') {
          $('$register_label').html('用户名存在')；
        }else{
          $('$register_label').html('成功')；
        }
      }
    });
  })*/
  </script>

	</body>
</html>
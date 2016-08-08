<?php 
header("Content-type:text/html;charset=utf8");
	if(!empty($_POST['yanse'])){
		echo $bianhuan=$_POST["yanse"];
	}
	
?>
<html>
	<head>
	</head>	
	<body style="background-color: <?php  echo $bianhuan; ?>; ">
	<form action="test1.php" method="post">
		<select name="yanse">
			<option value="red">红色</option>
			<option value="yellow">黄色</option>
			<option value="blue">蓝色</option>
		</select>

		<input type="submit" value="提交">

	</form>
	</body>
</html>
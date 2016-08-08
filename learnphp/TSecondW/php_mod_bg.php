<?php 
	header("Content-Type:text/html;charset=utf-8");
	$color = $_POST['inputColor'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo "PHP修改网页背景色"; ?></title>
</head>
<body style="background-color:<?php echo $color;?>">
	<?php
		echo "<h1>改变背景颜色</h1>";
		echo '<form method="POST" action="php_mod_bg.php">'; 
		echo "<p>请选择一个颜色:</p>";
		echo '<select name="inputColor">';
		if ($color=="#ff0000")
			echo '<option value="#ff0000" selected>红色</option>';
		else
			echo '<option value="#ff0000">红色</option>';
		if ($color=="#00ff00")
			echo '<option value="#00ff00" selected>绿色</option>';
		else
			echo '<option value="#00ff00">绿色</option>';
		if ($color=="#0000ff")
			echo '<option value="#0000ff" selected>蓝色</option>';
		else
			echo '<option value="#0000ff">蓝色</option>';
		// echo '<option value="#00ff00">绿色</option>';
		// echo '<option value="#0000ff">蓝色</option>';
		echo '</select>';
		echo '&nbsp;<input type="submit" value="提交"/>';
		echo "</form>";
	?>
</body>
</html>
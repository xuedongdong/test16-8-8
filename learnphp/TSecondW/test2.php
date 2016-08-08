<?php 
header("Content-type:text/html;charset=utf8");
	$shuzi1 = $_POST["shu1"];
	$fuhaowei = $_POST["fuhao"];
	$shuzi2 = $_POST["shu2"];
	//echo $str = $shuzi1.$fuhaowei.$shuzi2;
	if ($fuhaowei == '+') {
		$jieguo = intval($shuzi1) + intval($shuzi2);
	}elseif ($fuhaowei == '-') {
		$jieguo = intval($shuzi1) - intval($shuzi2);
	}elseif ($fuhaowei == '*') {
		$jieguo = intval($shuzi1) * intval($shuzi2);
	}elseif ($fuhaowei == '/') {
		$jieguo = intval($shuzi1) / intval($shuzi2);
	}
	
?>

<html>
	<head>
		<title>jisuanqi</title>
	</head>

	<body>
		<form action="test2.php" method="post">
			<h3>实现一个计算器</h3>
			<br>
			<h5>第一个数：</h5>
			<input type="text" name="shu1" value="10">
			<br>
			<select name="fuhao">
				<option>+</option>
				<option>-</option>
				<option>*</option>
				<option>/</option>
			</select>
			<h5>第二个数：</h5>
			<input type="text" name="shu2" value="20">
			<br>
			<input type="submit" value="提交">
			<br>
			结果为：<?php echo $shuzi1.$fuhaowei.$shuzi2."=".$jieguo; ?>

		</form>
	</body>

</html>
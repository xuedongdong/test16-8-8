<?php 
	header("Content-type:text/html;charset=utf8");
	$shuchu = "";
	if(!empty($_POST['shuru'])){
		$shuchu=$_POST["shuru"];
	}
?>


<html>
	<head>
		<title>表单练习</title>
	</head>

	<body>
		<form action="9.php" method="post">
			<h3>表单练习：</h3>
			<br>
			<h5>请输入一月份；</h5>
			<input type="text" name="shuru" value=<?php 
				switch ($shuchu) {
					case '1':echo "本月有31天";break;
					case '2':echo "本月有28天";break;
					case '3':echo "本月有31天";break;
					case '4':echo "本月有30天";break;
					case '5':echo "本月有31天";break;
					case '6':echo "本月有30天";break;
					case '7':echo "本月有31天";break;
					case '8':echo "本月有31天";break;
					case '9':echo "本月有30天";break;
					case '10':echo "本月有31天";break;
					case '11':echo "本月有30天";break;
					case '12':echo "本月有31天";break;
			}
			?>>
			<h5>1-12</h5>
			<br>
			<input type="submit" value="提交">
			<br>
		</form>
	</body>

</html>
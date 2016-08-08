<?php
	//a)将102这个数字分别以以二进制、八进制、十六进制输出
	echo "a:<br>";
	$num1 = 102;
	$a1 = sprintf("%b", $num1);
	echo $a1."<br>";
	$b1 = sprintf("%o", $num1);
	echo $b1."<br>";
	$c1 = sprintf("%x", $num1);
	echo $c1;
	echo "<br><br>";

	//b)将12.123乘以2后保留小数位两位输出。
	echo "b:<br>";
	$num2 = 12.123;
	$a2 = $num2*2;
	echo sprintf("%.2f", $a2);
	echo "<br><br>";

	//c)将字串#1024*两侧的*号与#号去除后输出。
	echo "c:<br>";
	$str1 = "#1024*";
	$a3 = trim($str1,"# *");
	echo $a3;
	echo "<br><br>";

	//d)将字串strtoupper传化成大写后倒序输出。
	echo "d:<br>";
	$str2 = "strtoupper";
	$a4 = strtoupper($str2);
	echo $a4."<br>";
	$b4 = "";
	for ($i=1; $i <= strlen($a4); $i++) { 
		$b4 .= substr($a4, -$i, 1);
	}
	echo $b4;
	echo "<br><br>";

	//e)将字串<div class="bord02"></div>保持原样输出。
	echo "e:<br>";
	$str3 = '<div class = "bord02"></div>';
	$a5 = htmlspecialchars($str3);
	echo $a5;
	echo "<br><br>";

	//f)将10:20:30:40:50中：号换成，号
	echo "f:<br>";
	$str4 = "10:20:30:40:50";
	$a6 = str_replace(":", ",", $str4);
	echo $a6;
?>
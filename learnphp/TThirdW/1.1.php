<?php
header("Content-type:text/html;charset=utf8");

	/*$a = 9;
	$b = 6;
	if ($a > $b) {
		echo "$a 大于 $b";
	}*/

	$week = date("D");            //获取当前的星期值，如Mon、Tue、Wed等等
	echo date("D")."<br />";
	echo date("Y/m/d")."<br />";
	echo date("Y.m.d")."<br />";
	echo date("Y-m-d")."<br />";

	if ($week == "Mon") {
		echo "星期一";
	}elseif ($week == "Tue") {
		echo "星期二";
	}elseif ($week == "Wed") {
		echo "星期三";
	}elseif ($week == "Thu") {
		echo "星期四";
	}elseif ($week == "Fri") {
		echo "星期五";
	}elseif ($week == "Sat") {
		echo "星期六";
	}elseif ($week == "Sun") {
		echo "星期日";
	}

	echo "<br />";
	echo "<br />";

	date_default_timezone_set("Etc/GMT-8");
	echo "当前时间".date("Y-m-d H:i:s",time())."";
	$hour = date("H");
	if ($hour < 6) {
		echo "凌晨好！";
	}elseif ($hour < 9) {
		echo "早上好！";
	}elseif ($hour < 12) {
		echo "上午好！";
	}elseif ($hour < 14) {
		echo "中午好！";
	}elseif ($hour < 17) {
		echo "下午好！";
	}elseif ($hour < 19) {
		echo "傍晚好！";
	}elseif ($hour < 22) {
		echo "晚上好！";
	}else {
		echo "夜里好！";
	}

	echo "<br />";
	echo "<br />";

	switch ( $week ) {
		case 'Mon':echo "星期一";break;
		case 'Tue':echo "星期二";break;
		case 'Wed':echo "星期三";break;
		case 'Thu':echo "星期四";break;
		case 'Fri':echo "星期五";break;
		case 'Sat':echo "星期六";break;
		case 'Sun':echo "星期日";break;
	}

	echo "<br />";
	echo "<br />";


	$sex = "MAN";
	$age = 23;
	if ($sex == "MAN") {
		if ($age >= 60) {
			echo "这个男士已退休".($age-60)."年了";
		}else{
			echo "这个男士在工作，还有".(60-$age)."年才能退休";
		}
	}else{
		if ($age >= 55) {
			echo "这个女士已退休".($age-55)."年了";
		}else{
			echo "这个女士在工作，还有".(55-$age)."年才能退休";
		}

	}

	echo "<br />";
	echo "<br />";

	$count = 1;
	while ($count <= 10) {
		echo "这是第<b> $count </b>次循环执行输出的结果<br>";
		$count++;
	}

	echo "<br />";
	echo "<br />";

	/*$i = 1;
	$sum = 0;
	while ( $i <= 100) {
		$sum += $i;
		$i++;
	}
	echo $sum;*/

	function sum($j){
		$i = 1;
		$sum = 0;
		while ( $i <= $j) {
			$sum += $i;
			$i++;
		}
		return $sum;		
	}

	$sum = sum(4563);
	echo $sum;

	echo "<br />";
	echo "<br />";

	for ($i=1; $i <=10 ; $i++) { 
		echo "这是第<b> $i </b>次循环执行输出的结果<br>";
	}

	echo "<br />";

	$i=1;
	for (; $i <=10 ; $i++) { 
		echo "这是第<b> $i </b>次循环执行输出的结果<br>";
	}

	echo "<br />";
	
	$i=1;
	for (; $i <=10 ; ) { 
		echo "这是第<b> $i </b>次循环执行输出的结果<br>";
		$i++;
	}

	echo "<br />";
	
	$i=1;
	for (;  ; ) {
		if ($i <=10)
			break;
		echo "这是第<b> $i </b>次循环执行输出的结果<br>";
		$i++;
	}

	echo "<br />";

	for ($i=9; $i >=1 ; $i--) { 
		/*if ($i < 5) 
			break;*/
		for ($j = $i; $j >= 1 ; $j--) { 
			/*if ($j < 5) 
			break 1;*/
			echo "$j * $i=".$j * $i."&nbsp;&nbsp;";	
		}
		echo "<br>";

	}

	$sum = 0;
	for ($i=1; $i <=100 ; $i++) { 
		if ($i%10 == 3) 
		continue;
		$sum += $i;
	}
	echo "结果为：$sum";
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>输出</title>
	</head>
	<body>
		<table align="center" border="1" width=600>
			<caption><h1>使用While循环嵌套输出表格</h1></caption>
			<?php
				$out = 0;
				while ($out <= 10) {
					$bgcolor = $out%2==0 ? "#FFF" : "#DDDDDD";
					echo "<tr bgcolor= ".$bgcolor.">";
					$in = 0;
					while ($in <= 10) {
						echo "<td>".($out*10+$in)."</td>";
						$in++;
					}
					echo "</tr>";
					$out++;
				}
			?>
		</table>
	</body>
</html>
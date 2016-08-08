<?php
header("Content-type:text/html;charset=utf8");

	echo "第一个<br />";
	$p = "Hello world!";
	for ($i=1; $i <=6 ; $i++) { 
		echo "<h".$i.">".$p."</h".$i."><?br>";
	}

	echo "<br />";
	echo "<br />";
	echo "第二个<br />";

	for ($i=10; $i <=20 ; $i++) { 
		echo "$i&nbsp";
	}
	echo "<br />";

	$i=10;
	while ( $i<= 20) {
		echo "$i&nbsp";
		$i++;
	}
	echo "<br />";

	$i=10;
	do {
		echo "$i&nbsp";
		$i++;
	} while ($i <= 20);

	echo "<br />";
	echo "<br />";
	echo "第三个<br />";

	$sum = 0;
	for ($i=1; $i <=50 ; $i++) { 
		if ($i%2 == 0) {
			echo "$i&nbsp";
		$sum += $i;
		}
	}
	echo "<br />";
	echo "$sum";

	echo "<br />";
	$sum = 0;
	$i=1;
	while ( $i <=50) {
		if ($i%2 == 0) {
			echo "$i&nbsp";
			$sum += $i;
		}
		$i++;
	}
	echo "<br />";
	echo "$sum";

	echo "<br />";
	echo "<br />";


?>

<html>
	<head>
		<!-- <meta charset="utf-8">
		<title>输出</title> -->
	</head>
	<body style="font-family:Courier New;">
		<?php
			echo "<br />";
			echo "第四个<br />";
			for ($i=1; $i <=9 ; $i++) { 
				for ($j = 1; $j <= $i ; $j++) { 
					if ($j == 2) {
						if ($i == 3) {
							echo "$j * $i=".$j * $i."&nbsp;&nbsp;&nbsp;";
						}elseif ($i == 4) {
							echo "$j * $i=".$j * $i."&nbsp;&nbsp;&nbsp;";
						}
						else{
							echo "$j * $i=".$j * $i."&nbsp;&nbsp;";	
						}
					}else{
						echo "$j * $i=".$j * $i."&nbsp;&nbsp;";	
					}
				}
				echo "<br />";
			}
			echo "<br />";
			echo "<br />";
			echo "第五个<br />";
		?>
		<table border="1" width=600>
			<?php
				$out = 1;
				for (; $out <=8 ;) { 
					$bgcolor = $out%2==1 ? "#FFF" : "#DDDDDD";
					echo "<tr bgcolor= ".$bgcolor.">";
					$in = 1;
					for (;$in <= 5;) {
						echo "<td>aaa</td>";
						$in++;
					}
					echo "</tr>";
					$out++;
				}
							?>
		</table>
	</body>
</html>

<?php
	echo "<br />";
	echo "<br />";
	echo "第六个<br>";
	$out = 0;
	while ($out <= 5) {
		$in = 1;
		if ($out==0) {
			while ($in < 10) {
				echo "0".$in."&nbsp&nbsp";
			$in++;
			}
			echo $in."&nbsp&nbsp";
		}else{
			while ($in <= 10) {
			echo ($out*10+$in)."&nbsp&nbsp";
			$in++;
			}
		}
		echo "<br>";
		$out++;
	}
?>
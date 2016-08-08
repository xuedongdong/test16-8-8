<?php
header("Content-type:text/html;charset=utf8");
	echo "第一个<br>";
	for ($i=1; $i <= 10 ; $i++) { 
		for ($j=1; $j <= $i ; $j++) { 
			echo "* ";
		}
		echo "<br>";
	}

	echo "<br>";
	echo "<br>";
	echo "第二个<br>";

	for ($i=1; $i <= 10 ; $i++) { 
		for ($j=$i; $j <= 10 ; $j++) { 
			echo "&nbsp";
		}
		for ($j=1; $j <= $i ; $j++) { 
			echo "* ";
		}
		echo "<br>";
	}

	echo "<br>";
	echo "<br>";
	echo "第三个<br>";

	for ($i=1; $i <= 10 ; $i++) { 
		for ($j=$i; $j <= 10 ; $j++) { 
			echo "&nbsp";
		}
		for ($j=1; $j <= 10 ; $j++) { 
			echo "* ";
		}
		echo "<br>";
	}

	echo "<br>";
	echo "<br>";
	echo "第四个<br>";

	for ($i=1; $i <= 10 ; $i++) { 
		for ($j=$i; $j <= 10 ; $j++) { 
			echo "&nbsp";
		}
		for ($j=1; $j <= $i ; $j++) { 
			if ($j == 1) {
				echo "* ";
			}else{
				for ($a=$j; $a <= $j+1 ; $a++) { 
					echo "* ";
				}
			}
			
		}
		echo "<br>";
	}

	echo "<br>";
	echo "<br>";
	echo "第五个<br>";

	for ($i = 1; $i <= 10 ; $i ++) { 
		for ($j = 1; $j <= $i ; $j ++) { 
			echo "&nbsp";
		}
		for ($a = 10; $a >= $i ; $a --) { 
			if ($a == 10) { 
				echo "* ";
			}else{
				for ($b=$a; $b <=$a+1 ; $b++) {
					echo "* ";
				}
			
			}
		}
		echo "<br>";
	}

	echo "<br>";
	echo "<br>";
	echo "第六个<br>";

	for ($i=1; $i <= 5 ; $i++) { 
		for ($j=$i; $j <= 5 ; $j++) { 
			echo "&nbsp";
		}
		for ($j=1; $j <= $i ; $j++) { 
			if ($j == 1) {
				echo "* ";
			}else{
				for ($a=$j; $a <= $j+1 ; $a++) { 
					echo "* ";
				}
			}
			
		}
		echo "<br>";
	}
	for ($i = 2; $i <= 5 ; $i ++) { 
		for ($j = 1; $j <= $i ; $j ++) { 
			echo "&nbsp";
		}
		for ($a = 5; $a >= $i ; $a --) { 
			if ($a == 5) { 
				echo "* ";
			}else{
				for ($b=$a; $b <=$a+1 ; $b++) {
					echo "* ";
				}
			
			}
		}
		echo "<br>";
	}

	echo "<br>";
	echo "<br>";
	echo "<br>";

	echo "第七个";
	echo "<br>";
	$n = 5;
	$f = false;
	$i = 0;
	while ( $i >= 0) {
		for ($j=0; $j < $n-$i-1 ; ++$j) { 
			echo "&nbsp;";
		}
		for ($j=0; $j < 2*$i+1; ++$j) { echo "* ";}
			echo "<br>";
			if ($i+1 ==$n ) {
				$f = true;}
			if ($f) {
				--$i;
			}else{
				++$i;
			}
	}

	$out = 0;
	while ($out <= 10) {
	$in = 1;
	while ($in <= 10) {
	echo ($out*10+$in)."&nbsp&nbs";
	$in++;
	}
	echo "<br>";
	$out++;
	}
?>

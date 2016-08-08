<?php
header("Content-type:text/html;charset=utf8");
	/*$num = -123;
	echo $num."<br>";
	print $num."<br>";
	$txt = sprintf("With 2 decimals:%1\$.2f<br>With no dacimals:%1\$u",	 $num);
	echo $txt;*/

	$str = "\r\nHello World!\r\n";
	echo strlen($str)."<br>"; 
	echo "Without trim: " . $str;
	echo "<br />";
	echo "With trim: " . trim($str);
	echo "<br /><br />";

	$str1 = "a";
	$str2 = "b";
	echo trim($str1).trim($str2);
	echo trim($str2, " ");
	echo "<br><br>";

	$lnmp = "lnmp is composed if Linux、Nginx、MySQL and PHP";
	echo strtolower($lnmp)."<br>";
	//lnmp is composed if linux、nginx、mysql and php
	echo strtoupper($lnmp)."<br>";
	//LNMP IS COMPOSED IF LINUX、NGINX、MYSQL AND PHP
	echo ucfirst($lnmp)."<br>";
	//Lnmp is composed if Linux、Nginx、MySQL and PHP
	echo ucwords($lnmp)."<br>";
	//Lnmp Is Composed If Linux、Nginx、MySQL And PHP
	echo "<br><br>";

	echo nl2br("One line. \n Another line. \n heiheihei.");
	echo "<br><br>";

	echo strrev("http://www.chinagpx.com");
	echo "<br><br>";

	$str = "   lnmp  ";
	echo strlen($str)."<br>";//输出字符串的总长度
	echo strlen( ltrim($str) )."<br>";//删除左边空格
	echo strlen( rtrim($str) )."<br>";//删除右边空格
	echo strlen( trim($str) )."<br>";//删除左右两边空格

	$str = "123 This is a test ...";
	echo ltrim($str, "0..9")."<br>";
	echo rtrim($str, ".")."<br>";
	echo trim($str, "0..9 A..Z .")."<br>";//删除两边的0..9 A..Z .
	echo "<br><br>";

	$salt = "app";
	if (md5(md5($_POST['password']).$salt)== "b06198faa02ca28b31461eec226fc79c") {
		echo "true";
	}else{
		echo "false";
	}
	echo "<br><br>";

/*	$v = 123;
	echo md5(md5($v).$salt);*/

	$files = array(
		"file11.txt",
		"file22.txt",
		"file1.txt",
		"file2.txt"
	);
	function mySort($arr, $select = false){
		for ($i=0; $i < count($arr); $i++) { 
			for ($j=0; $j < count($arr)-1; $j++) { 
				if ($select) {
					if (strcmp($arr[$j], $arr[$j+1]) > 0) {
						$tmp = $arr[$j];
						$arr[$j] = $arr[$j+1];
						$arr[$j+1] = $tmp;
					}
				} else {
					if (strnatcmp($arr[$j], $arr[$j+1]) > 0) {
						$tmp = $arr[$j];
						$arr[$j] = $arr[$j+1];
						$arr[$j+1] = $tmp;
					}
				}
			}
		}
		return $arr;
	}
	print_r(mySort($files,true));
	print_r(mySort($files,false));
?>

<html>
	<body>
		<form action="" method="post">
			<p>输入密码：</p>
			<input type="password" name="password">
			<input type="submit">
		</form>

		<?php
			$str = "<B> WebServer:</B> & 'Linux' & 'Apache'";
			echo htmlspecialchars($str, ENT_COMPAT);
			echo "<br>\n";
			echo htmlspecialchars($str, ENT_QUOTES);
			echo "<br>\n";
			echo htmlspecialchars($str, ENT_NOQUOTES);
			echo "<br><br>";
		?>
		
		<form action="zifuchuanchuli.php" method="post">
			<input type="text" size="30" name="str" value="<?php echo html2Text(@$_POST['str']);?>">
			<input type="submit" name="submit" value="提交"><br>
		</form>

		<?php
		if (isset($_POST["submit"])) {
			echo "原型输出".$_POST['str']."<br>";
			echo "转换实例：".htmlspecialchars($_POST['str'])."<br>";
			echo "删除斜线和转换实体：".html2Text($_POST['str'])."<br>";
		}
		function html2Text($input){
			return htmlspecialchars(stripcslashes($input));
		}
		?>
	</body>
</html>
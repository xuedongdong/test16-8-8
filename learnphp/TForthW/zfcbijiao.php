<?php
header("Content-type:text/html;charset=utf8");
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
	echo "<br>";
	print_r(mySort($files,false));
	echo "<br><br>";

	$userName = "Admin";
	$password = "chinagpx";
	if (strcasecmp($userName, "admin")== 0) {
		echo "用户名存在<br>";
	}
	if (strcasecmp(strtolower($userName), strtolower("admin")) == 0) {
		echo "用户名存在<br>";
	}
	switch (strcmp($password, "chinagpx")) {
		case 0:
			echo "两个字符串相等<br>";
			break;
		case 1:
			echo "第一个字符串大于第二个字符串<br>";
			break;
		case -1:
			echo "第一个字符串小于第二个字符串<br>";
			break;
	}
	echo "<br><br>";

	//函数把字符串分割为数组
	$str = "Hello world. It's a beautiful day.";
	print_r (explode(" ", $str, 4));
	echo "<br><br>";

	//函数把数组元素组合为一个字符串
	$arr = array('Hello','World!','Beautiful','Day!');
	echo implode(" ",$arr);
	echo "<br><br>";

	echo substr("1234567", 1, -1)."<br>";
	echo substr(123456, -1, 4);
	echo "<br><br>";

	echo strstr("Hello world!","world")."<br>";	
	echo strstr("Hello world!", 111);
	echo "<br><br>";
	echo strrchr("Hello world!",111)."<br>";
	echo strrchr("Hello world w!", "world");//显示w!  strrchrzh()只匹配第一个字符
	echo "<br><br>";

	echo str_replace("world","John","Hello world!")."<br>";

	$arr = array("bule","red","green","yellow");
	print_r(str_replace("red", "pink", $arr,$i));
	echo "Replacements: $i<br>";

	$find = array("Hello","world");
	$replace = array("B");
	$arr = array("Hello", "world","!");
	print_r(str_replace($find, $replace, $arr));
	echo "<br><br>";

	echo strpos("Hello world!","wo")."<br>";
	echo strrpos("Hello world w!","wo")."<br>";

?>
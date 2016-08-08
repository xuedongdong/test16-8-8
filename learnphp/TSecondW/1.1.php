<?php 
header("Content-type:text/html;charset=utf8");
	
	/*$var = '111';
		//申明变量$var 赋予一个空值
	if (empty($var)) {
		//结果为true，因为$var为空
		echo "$var is  either 0 or not set at all";
	}

	if (!isset($var)) {
		//结果为false,因为$var已设置
		echo "$var is not set at all";
	}

	unset($var);
		//销毁单个变量$var，在内存中释放
	
	if (isset($var)) {
		//结果为false, 因为已经销毁
		echo "This var is set so I will print.";
	}*/

	/*$name = "china";
	$Name = "gpx";
	echo $name.$Name;*/

	/*$bool = TRUE;
	$str = "foo";
	$int = 12;
	var_dump($bool);
	var_dump($str);
	var_dump($int);*/

	/*$beer = 'Heineken';
	echo "$beer's taste is great";
	echo "<br>";
	echo "He drank some $beers";
	echo "<br>";
	echo "He drank some ${beer}s";
	echo "<br>";
	echo "He drank some {$beer}s";
	echo "<br>";*/

	/*$foo = 10;
	$bar = (boolean)$foo;
	var_dump($bar);*/ //强行转换成bool

	/*$str = "123.45abc12";
	var_dump($str = "123.45abc12");
	var_dump($int = intval($str));
	var_dump($flo = floatval($str));
	var_dump($str = strval(123.45));*///获得字符串值

	/*$bool = TRUE;
	$str = "foo";
	$int = 12;

	echo  gettype($bool);
	echo "<br>";
	var_dump($str);

	if (is_int($int)){
		$int += 4;
		echo "Integer $int";
	}
	echo "<br>";

	if (is_string($bool)) {
		echo "String:$bool";
	}
	echo "<br>";

	if (is_bool($bool)) {
		echo "boolean:$bool";
	}
	echo "<br>";*/

	/*define( "CON_INT" , 100);
	echo CON_INT."<br>";
	define( "FLO" , 99.99);
	echo FLO."<br>";
	define("BOO", true);
	echo BOO."<br>";
	define("CONSTANT", "Hello world.");
	echo CONSTANT."<br>";
	echo Constant."<br>";
	define("GREETING", "Hello you.", true);
	echo GREETING."<br>";
	echo Greeting."<br>";
	if (defined('CONSTANT')) {
		echo CONSTANT."<br>";
	}*/

	/*echo "当前系统操作系统是：".PHP_OS."<br>";
	echo "当前使用PHP的版本是：".PHP_VERSION."<br>";
	echo "当前的PHP文件是：".__FILE__."<br>" ;
	echo "当前的行号：:".__LINE__."<br>";
	echo __DIR__;*/

	/*$x = 5;
	echo $x."<br>";
	echo $x+++$x++."<br>";
	echo $x."<br>";
	echo $x---$x--."<br>";
	echo $x;*/

	/*$a = "Hello";
	$b = $a. "World!";
	
	$a = "Hello";
	$a .= "World!";
	echo $a;
	echo $b;*/

	$a = 20;
	$b = 30;
	$c = $a & $b;
	echo $c;
?>
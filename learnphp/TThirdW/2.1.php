<?php
header("Content-type:text/html;charset=utf8");
	/*function hailStone(){
		echo "1";
	}
	if (function_exists('hailStone')) {
		echo 'haukStone is exists!';
	}*/

	/*$a = 20;
	function hailStone($b){
		$b++;
		return $b;
	}
	$a = hailStone($a);
	echo $a;*/

	/*$a = 0;
	function print_A(){
		$a = 3;
		echo "在函数中显示局部变量a值：$a <p>";
		return $a;
	}
	$b = print_A();
	echo "在函数外显示局部变量b值：$b<br>";
	echo $a;*/

	/*$A = "Hello !!";
	function print_A(){
		global $A;
		$A = $A."111";
		echo $A;
	}	
	print_A();*/

	/*function test(){
		static $a = 0;   //静态变量
		echo $a;
		$a ++;
	}

	test();
	test();
	test();*/

	/*require 'config.php';
	if ( $condition ) 
		include 'file.txt';
	else
		include ('other.php');
	require('somefile.txt');*/

	/*function test($arg){
		$arg = 200;
	}	
	$var = 100;
	test($var);
	echo $var."<br>";

	function test2( &$arg ){
		$arg = 200;
	}	
	$var2 = 100;
	test2($var2);
	echo $var2;	*/

	/*function person($name = "张三",$age = 20, $sex = "男"){
		echo "我的名字是：{$name},我的年龄：{$age},性别:{$sex}<br>
";}
	person();
	person("李四");
	person("王五",22);
	person("贾六",18,"女");*/

	/*function more_args(){
		$args = func_get_args();
		for ($i=0; $i < count($args); $i++) { 
			echo "第{$i}个参数是{$args[$i]}<br>";
		}
	}
	more_args("one","two","three",1,2,3);

	function more_args2(){
		for ($i=0; $i < func_num_args(); $i++) { 
			echo "第{$i}个参数是".func_get_arg($i)."<br>";
		}
	}
	more_args2("one","two","three",1,2,3);*/

	/*function one($a,$b){
		return $a + $b;
	}
	function two($a,$b){
		return $a*$b + $b*$b;
	}

	$result = "one";
	$result = "two";
	echo "运算结果是：".$result;*/

	/*function filter($fun){
		for ($i=0; $i <=100 ; $i++) { 
			if ($fun($i)) {
				continue;
			}
			echo $i."<br>";
		}
	}
	function one($num){
		return $num%3 == 0;
	}
	function two($num){
		return $num == strrev($num);
	}
	filter("one");
	echo '-----------<br>';
	filter("two");*/

	function fun($msg1,$msg2){
		echo "$msg1".$msg1;
		echo "<br>";
		echo "$msg2".$msg2;
	}
	call_user_func_array('fun', array('互联网+电商','gpx'));

	//HUI H+UI MUI ZUI FRAMEWORK7 BOOTSTRAP
?>
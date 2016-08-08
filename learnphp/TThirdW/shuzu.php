<?php
header("Content-type:text/html;charset=utf8");
	/*foreach ($_SERVER as $key => $value) {
		echo '$_SERVER['.$key.']='.$value.'<br>';
	}

	echo 'pre';
	print_r($_SERVER);
	echo '</pre>';

	echo $_SERVER['REMOTE_ADDR'];*/

	/*echo "主机名（域名）：".$_SERVER['HTTP_HOST']."<br/>";
	echo "服务器端IP：".$_SERVER['SERVER_ADDR']."<br/>";
	echo "客户端IP：".$_SERVER['REMOTE_ADDR']."<br/>";
	echo "服务器端的WEB根路径：".$_SERVER['DOCUMENT_ROOT']."<br/>";
	echo "被访问文件绝对路径及文件名：".$_SERVER['SCRIPT_FILENAME']."<br/>";
	echo "被访问文件的URL地址：".$_SERVER['REQUEST_URI']."<br/>";*/

	
	/*foreach ($_ENV as $key => $value) {
		echo '$ENV['.$key.']='.$value.'<br>';
	}*/

	/*$lamp = array("a"=>"Linux", "b"=>"Apache", "c"=>"MySQL","d"=>"PHP");
	print_r(array_keys($lamp));
	print_r(array_keys($lamp,"Apache"));

	echo "<br>";
	$a  = array(10,20,30,"10");
	print_r(array_keys($a,"10",false));

	echo "<br>";
	$a  = array(10,20,30,"10");
	print_r(array_keys($a,"10",true));*/

	/*$contact = array(
		"ID" => 1,
		"姓名" => "高某",
		"公司" => "A公司",
		"地址" => "北京市",
		"电话" => "(010)98765432"
 		);

	print_r(array_values($contact));
	echo "<br>";
	print_r($contact);*/


	/*$os = array("Mac", "NT", "Irix", "Linux");
	if (in_array("Irix", $os)) {
		echo "Got Irix";
	}
	if (in_array("mac", $os)) {
		echo "Got mac";
	}

	echo "<br>";

	$a = array('1.10', 12.4, 1.13);
	if (in_array('12.4', $a, true)) {
	 	echo "'12.4' found with strict check\n";
	}
	if (in_array(1.13, $a, true)) {
	 	echo "1.13 found with strict check\n";
	}

	echo "<br>";

	$a = array(array('p', 'h'),array('p', 'r'),'o');
	if (in_array(array('p','h'), $a)) {
			echo "'hp' was found\n";
	}	
	if (in_array(array('h','p'), $a)) {
			echo "'hp' was found\n";
	}*/	

	/*$a = array("name" => "张三", "age" => "20", "sex" => "男");
	$b = array_flip($a);
	foreach($b as $k => $v){
		echo "$k => $v";
	}*/

	/*$array = array(1, "php", 1, "mysql", "php");
	$newArray = array_count_values($array);
	print_r($newArray);*/

	/*$a = array("a"=>"php", "b"=>"msyql", "c"=>'php');
	print_r(array_unique($a));*/

	/*function myFun($var){
		if ($var % 2 == 0) {
			return true;
		}
	}
	$array = array("a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5);
	print_r(array_filter($array, "myFun"));
	echo "<br>";
	echo array_filter($array, "myFun");
	echo "<br>";
	var_dump(array_filter($array, "myFun"));
	echo "<br>";
	print(array_filter($array, "myFun"));
	echo "<br>";*/	

	/*function myfun1($value, $key){
		echo "The key $key has the value $value<br>";
	}
	$lamp = array("a"=>"Linux", "b"=>"Apache", "c"=>"MySQL", "d"=>"PHP");
	array_walk($lamp, "myfun1");

	function myfun2($value, $key, $p){
		echo "$key $p $value <br>";
	}
	array_walk($lamp, "myfun2", "has the value");

	function myfun3(&$value, $key){
		$value = "web";
	}
	array_walk($lamp, "myfun3");
	print_r($lamp);*/

	/*function myfun1($v){
		if ($v === "MySQL") {
			return "Oracle";
		}
		return $v;		
	}
	$lamp = array("Linux", "Apache", "MySQL", "PHP");
	print_r(array_map("myfun1", $lamp));
	echo "<br>";

	function myfun2($v1, $v2){
		if ($v1 === $v2) {
			return "same";
		}
		return "different";
	}
	$a1 = array("Linux", "PHP", "MySQL");
	$a2 = array("Unix", "PHP", "Oracle");
	print_r(array_map("myfun2", $a1, $a2));
	echo "<br>";

	$a1 = array("Linux", "Apache");
	$a2 = array("MySQL", "PHP");
	print_r(array_map(null, $a1, $a2));*/

	/*$lamp = array("OS"=>"Linux", "WebServer"=>"Apache", "Datebase"=>"MySQL", "language"=>"PHP");
	print_r(array_reverse($lamp));*/

	/*$date = array(5, 8, 1, 7, 2);
	print_r($date);
	echo "<br>";
	sort($date);
	print_r($date);
	echo "<br>";
	rsort($date);
	print_r($date);
	echo "<br>";*/
	
	/*$lamp = array("Linux","Apache", "MySQL", "PHP");
	usort($lamp, "sortBylen");
	print_r($lamp);
	function sortBylen($one, $two){
		if (strlen($one) == strlen($two)) {
			return 0;
		}else{
			return(strlen($one)>strlen($two))?1:-1;
		}
	}*/

	/*$date =array("1"=>"Linux", "a" =>"Apache", "m"=>"MySQL", "p"=>"PHP");
	asort($date);
	print_r($date);//Array ( [a] => Apache [1] => Linux [m] => MySQL [p] => PHP )
	echo "<br>";
	arsort($date);
	print_r($date);//Array ( [p] => PHP [m] => MySQL [1] => Linux [a] => Apache ) 
	echo "<br>";
	rsort($date);
	print_r($date);//Array ( [0] => PHP [1] => MySQL [2] => Linux [3] => Apache )
	echo "<br>";*/

	/*$date = array(5=>"five", 8=>"eight", 1=>"one", 7=>"seven", 2=>"two");
	ksort($date);
	print_r($date); //Array ( [1] => one [2] => two [5] => five [7] => seven [8] => eight ) 
	echo "<br>";
	krsort($date);
	print_r($date); //Array ( [8] => eight [7] => seven [5] => five [2] => two [1] => one )
*/

	/*$lamp = array("Linux", "Apache", "MySQL", "PHP");
	print_r(array_slice($lamp, 1, 2));      //Array ( [0] => Apache [1] => MySQL ) 
	echo "<br>";
	print_r(array_slice($lamp, -2, 1));     //Array ( [0] => MySQL )
	echo "<br>";
	print_r(array_slice($lamp, 1, 2, true));//Array ( [1] => Apache [2] => MySQL ) 如果数组有字符串键名，默认返回的数组将保留键名
	echo "<br>";*/

	/*$input = array("Linux", "Apache", "MySQL", "PHP");
	array_splice($input, 2);
	print_r($input);
	echo "<br>";
	$input = array("Linux", "Apache", "MySQL", "PHP");
	array_splice($input, 1, -1);
	print_r($input);
	echo "<br>";
	$input = array("Linux", "Apache", "MySQL", "PHP");
	array_splice($input, 1, count($input), "web");
	print_r($input);
	echo "<br>";
	$input = array("Linux", "Apache", "MySQL", "PHP");
	array_splice($input, -1, 1,array("web", "www"));
	print_r($input);
	echo "<br>";*/

	$a1 = array("a"=>"Linux", "b"=> "Apache");
	$a2 = array("c"=>"MySQL", "d"=> "PHP");
	print_r(array_merge($a1, $a2));
	echo "<br>";

	$a = array("3"=>"MySQL", "4"=> "PHP");
	print_r(array_merge($a));

?>


<?php
header("Content-type:text/html;charset=utf8");
	$pattern = '/<a.*?(?: |\\t|\\r|\\n)?href=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\n)+.*?)?>(.+?)<\/a.*?>/sim';
	$content = "请进单击进入<a href='http://www.chinagpx.com'>互联网+电商</a>gpx电商项目";
	
	//使用preg_match()函数进行正则表达式的模式匹配
	if(preg_match($pattern, $content)) {    
		echo "成功匹配，在第二个参数中包含有效的HTML链接标签字符串。";
	} else {
		echo "在第二个参数的字符串中搜索不到有效的HTML链接标签。";
	} 	
	echo "<br><br>";


//一个用于匹配URL的正则表达式
	$pattern = '/(https?|ftps?):\/\/(www)\.([^\.\/]+)\.(com|net|org)(\/[\w-\.\/\?\%\&\=]*)?/i'; 
	//被搜索字符串
	$subject = "网址为http://www.chinagpx.com/index.php的位置是chinagpx互联网+电商";	
	
	//使用preg_match()函数进行匹配
	if(preg_match($pattern, $subject, $matches)) {       	
		echo "搜索到的URL为：".$matches[0]."<br>";	//数组中第一个元素保存全部匹配结果
		echo "URL中的协议为：".$matches[1]."<br>";	//数组中第二个元素保存第一个子表达式
		echo "URL中的主机为：".$matches[2]."<br>";	//数组中第三个元素保存第二个子表达式
		echo "URL中的域名为：".$matches[3]."<br>";	//数组中第四个元素保存第三个子表达式
		echo "URL中的顶域为：".$matches[4]."<br>";	//数组中第五个元素保存第四个子表达式
		echo "URL中的文件为：".$matches[5]."<br>";	//数组中第六个元素保存第五个子表达式
	} else {
		echo "搜索失败！";     						//如果和正则表达式没有匹配成功则输出
	} 	

	$array = array("Linux RedHat9.0", "Apache2.2.9", "MySQL5.0.51", "PHP5.2.6", "LAMP", "100");
	
	//返回数组中以字母开始和以数字结束，并且没有空格的单元，赋给变量$version
	$version = preg_grep("/^[a-zA-Z]+(\d|\.)+$/", $array);  
	
	print_r($version);      
	
	//输出：Array ( [1] => Apache2.2.9 [2] => MySQL5.0.51 [3] => PHP5.2.6 )

?>
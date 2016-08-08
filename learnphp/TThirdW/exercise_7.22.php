<?php
	header("Content-Type:text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP练习作业_7.22</title>
	<style>
		table {
			border-collapse: collapse;
		}
		td {
			text-align: center;
		}
		.calendar {
			text-align: center;
			font-weight: bold;
		}
		.Sun {
			color: red;
		}
		.Sat {
			color: green;
		}
	</style>
</head>
<body>
	<h1>作业7.22</h1>
	<p>1、自定义一个函数printTable用来动态输出表格</p>
	<?php printTable(5,6,"cell",480,1);	?>
	<p>2、指定两个变量，打印出该月的日历</p>
	<?php printCalendar(31,"Fri"); ?>
	<p>3、练习数组相关函数</p>
	<?php try_array_func(); ?>
	<p>4、PHP读写文件实例</p>
	<?php php_file_io();?>
	<?php
	/**
	* @name 	printTable
	* @author 	Nike
	* @param 	$rows 		表格有多少行
	* @param 	$cols 		表格有多少列
	* @param 	$content 	单元格中显示的内容
	* @param 	$width 		表格的宽度值
	* @param 	$border		表格的边框值
	*/
	function printTable($rows,$cols,$content,$width=400,$border=1){
		echo "<table border=\"$border\" width=\"$width\">";
		echo "<caption>PHP产生的表格</caption>";
		for($out = 0; $out < $rows; $out++) {
              	//指定外层循环，并且循环次数为$rows次
                $bgcolor = ($out%2 == 0) ? "#FFFFFF" : "#DDDDDD";
                echo "<tr bgcolor=".$bgcolor.">";
                //执行输出行并指定背景颜色
                for($in = 0; $in < $cols; $in++) {
                //指定内层循环，并且循环次数为$cols次
                    echo "<td>".$content."</td>";
                    //执行一次，输出一个单元格
                }
                echo "</tr>";//输出行关闭标记
            }
        echo "</table>";
	}
	/**
	* @name 	printCalendar
	* @author 	Nike
	* @param 	$days 	本月有多少天
	* @param 	$w 		本月1号是周几，如:Fri
	* @return 	
	*/
	function printCalendar($days, $w){
		echo "<table class=\"calendar\" border=\"1\" width=\"480\">";
		echo "<caption>PHP输出的日历(2016.7)</caption>";
		echo "<tr bgcolor=\"#DDDDDD\">";
		echo "<td>星期日</td><td>星期一</td><td>星期二</td><td>星期三</td>";
		echo "<td>星期四</td><td>星期五</td><td>星期六</td></tr>";
		echo "<tr>";
		$weekdays = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");//星期几
		//如果$w在上述数组中，则计算出它的偏移量
		//$blank_count:第一个数字前应该显示多少个空单元格
		if (in_array($w, $weekdays))
			$blank_count = array_search($w, $weekdays);
		else
		{
			echo "<script>alert('请确认本月1号是星期几！');</script>";
			return;
		}
		$saturdays = array(7-$blank_count, 14-$blank_count, 21-$blank_count, 28-$blank_count, 35-$blank_count);//这些天是周六
		$sundays = array(8-$blank_count, 15-$blank_count, 22-$blank_count, 29-$blank_count, 36-$blank_count);//这些天是周日
		$rows = 1;//该日历需要用多少行来显示日期
		for($i=0;$i<$blank_count;$i++)
			echo "<td> </td>";//输出空单元格
		for($j=1;$j<=$days;$j++){
			if(in_array($j, $saturdays)){
				//周六需要使用绿色字体
				echo "<td class=\"Sat\">".$j."</td>";
				//换行，然后新开始一行
				echo "</tr><tr>";
				++$rows;
			}
			elseif(in_array($j, $sundays)){
				//周日需要使用红色字体
				echo "<td class=\"Sun\">".$j."</td>";
			}
			else {
				echo "<td>".$j."</td>";
				//这些都是普通的单元格
			}
		}
		for($k = 0; $k < $rows * 7 - $days - $blank_count; $k++)
			echo "<td></td>";//在最后补上空单元格
		echo "</tr>";
		echo "</table>";
	}
	function try_array_func(){
		$stulist=array(
			array("name"=>"张三","age"=>20,"sex"=>"女"),
			array("name"=>"李四","age"=>21,"sex"=>"男"),
			array("name"=>"王五","age"=>22,"sex"=>"女"),
			array("name"=>"赵六","age"=>24,"sex"=>"男"));
		//首先输出原来的数组
		print_r("<pre>");//将数组内容输出在pre标签中
		print_r($stulist);
		print_r("</pre>");
		echo "<p>3.1、array_filter函数</p>";
		filter($stulist);
		echo "<p>3.2、array_walk函数</p>";
		walk($stulist);
		echo "<p>3.3、自定义排序</p>";
		cust_sort($stulist);
	}
	function myfunc($var){
		foreach ($var as $key => $value) {
			if($value=="男")
				return true;
		}
	}
	function filter($arr){
		print_r('<pre>');
		print_r(array_filter($arr,"myfunc"));
		print_r('</pre>');
	}
	function myfunc2(&$value, $key){
		if($value['sex']=="男")
			$value['age']+=2;
	}
	function walk($arr){
		array_walk($arr,"myfunc2");
		print_r('<pre>');
		print_r($arr);
		print_r('</pre>');
	}
	function myfunc3($var1, $var2){
		if($var1['age']==$var2['age'])
			return 0;
		else
			return ($var1['age']<$var2['age'])?1:-1;
	}
	function cust_sort($arr){
		usort($arr,"myfunc3");
		print_r('<pre>');
		print_r($arr);
		print_r('</pre>');
	}
	function php_file_io(){
		$str = file_get_contents("b.txt");
		echo "str的值为 ".$str;
		echo "<br/>";
		//首先将字符串中的:替换为;
		$str = str_replace(":",";",$str);
		//分割字符串
		$aa = explode(";",$str);
		$sum = 0;//数之总和
		foreach ($aa as $value) {
			echo $value." ";
			$sum += intval($value);
		}
		echo "<br/>总和为 ".$sum."<br/>";
		$s = implode("#",$aa);
		echo $s."<br/>";
		//file_put_contents返回写入的数据长度
		if(file_put_contents("c.txt",$s))
			echo "成功将数据写入文件！";
	}
	?>
</body>
</html>
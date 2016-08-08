<?php
header("Content-type:text/html;charset=utf8");
//数组练习题2
	$a = array(10, 20,"a"=>30,"b"=>40,"c"=>50);
	$c= array(20, 60, 50, 10);	
	//foreach循环遍历数组
	foreach ($a as $key => $value) {
		echo $key."=>" . $value . "<br />";
	}
	echo "<br>";

	//数组$a中所有的值赋给$list
	$list = array_values($a);
	var_dump($list);
	echo "<br>";
	echo "<br>";


	//使用for循环遍历输出数组$list中的值
	for ($i=0; $i < count($list) ; $i++) { 
		echo $list[$i]."<br>";
	}
	echo "<br>";

	//遍历数组$c,使用in_array( )函数判断每个值是否在$list中存在，若存在则将值放到一个新数组$d中,最后输出数组$d
	for ($i=0; $i < count($list); $i++) { 
			if (in_array($list[$i], $c)) {
				$d[] = $list[$i];
			}
		}
	var_dump($d);
	echo "<br>";
	echo "<br>";

	//使用排序函数对$a做从小到大排序。并输出结果
	asort($a);
	print_r($a);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";








//数组练习题3
	$stulist=array(
		array("name"=>"张三","age"=>20,"sex"=>"女"),
		array("name"=>"李四","age"=>21,"sex"=>"男"),
		array("name"=>"王五","age"=>22,"sex"=>"女"),
		array("name"=>"赵六","age"=>24,"sex"=>"男"),
	);
	Function guo(){}

	Foreach($stulist  as  $val){
		Array_filter($val);
		$arr[] = $val;
	}
	Var_dump($arr);
	echo "<br>";
	echo "<br>";

	//使用array_filter函数将$stulist数组中相别为”女”信息过滤掉，并输出结果。
	Function guo1($i){
		if(deep_in_array("女",$i))
			{return false;}
		return true;
	}
	function deep_in_array($value, $array) {   
    	foreach($array as $item) {   
        	if(!is_array($item)) {   
            	if ($item == $value) {  
                	return true;  
            	} else {  
                	continue;   
            	}  
        	}   
           
        	if(in_array($value, $item)) {  
            	return true;      
        	} else if(deep_in_array($value, $item)) {  
            	return true;      
        	}  
    	}   
    	return false;   
	} 
	print_r(array_filter($stulist, "guo1"));

	echo "<br>";
	echo "<br>";
	
	//使用array_walk函数对$stulist数组中的值信息修改，把性别为”男”的年龄信息加2。最后输出信息
	Function guo2(&$value, $key){
		if($value['sex']=="男")
			$value['age']+=2;
/*		if(deep_in_array("男", $arrAy)){
			return $value['age'] += 2;	//？？？多维数组中给指定值修改不知道怎么指定
		}*/

		/*foreach ($arrAy as &$val)
        {   
           foreach($val as $k => &$v) Warning: Invalid argument supplied for foreach() 
			错误提示 Warning:Invalid argument supplied for foreach() 的中文意思是说foreach需要是一个数组而给它的是一个无效的参数.
           
           {
               if($k == "age")
                   $v = $v + 2;
           }
            
        }*/
	} 
	print_r(array_walk($stulist, "guo2"));		

	echo "<br>";
	echo "<br>";





	//使用自定义排序，对 $stulist数值中的年龄值进行从大到小排序，并输出信息。

	Function guo3($vas as $key => $value ) {
		//依次循环可以用对age进行排序判断
		for ($i=1; $i < count($v) ; $i++) { 
			if ($i == 1) {
				$value = $value
			}elseif ($value['age'] > $) {
				# code...
			}{}				
		}
	} 
	/*asort($stulist);*/
	$xin = guo3($stulist)
	print_r($xin);

	echo "<br>";
	echo "<br>";




//函数练习题4
	//其中参数：$rows:行数,$cols:列数,$content:填充内容,$width宽度,$border边框线
	function printTable($rows,$cols,$content,$width=400,$border=1){
		$a="<table width='".$width."' border='".$border."'>";
		for($i=1;$i<=$rows;$i++){
			$a.="<tr>";
			for($j=1;$j<=$cols;$j++){
				$a.="<td>".$content."</td>";
			}
			$a.="</tr>";
		}
		$a.="</table>";
		return $a;
	}
	echo printTable(9,9,"123"); //在此输入行，列，内容，宽度，边框线 
	echo "<br>";
	echo "<br>";



?>

<!-- 函数练习题5 -->
<!-- 定义两个变量：$day(本月多少天)，$w本月的一号是星期几，根据这两个变量来定义一个函数是下面表格的输出。 -->
<html>
	<head>
		<meta charset="utf-8">
		<title>输出</title> 
	</head>
	<body style="font-family:Courier New;">
		<table border="1" width=600 align="center">
		<tr align="center" bgcolor="#DDDDDD">
			<td><font color="red">星期日</font></td>
			<td>星期一</td>
			<td>星期二</td>
			<td>星期三</td>
			<td>星期四</td>
			<td>星期五</td>
			<td><font color="green">星期六</font></td>
		</tr>	
<?php
	Function Rilixinshi($day, $w){
		
		if ($w == 7) {
			/*直接循环*/
			if ($day == 28) {	//判断28的时候出错，对28重新进行定义
				for ($i=0; $i < $day/7; $i++) { 
					echo '<tr align="center">';
					for ($j=1; $j <= 7 ; $j++) { 
				 		echo "<td>".($i*7+$j)."&nbsp</td>";
					} 
					echo "</tr>";
				}
			}else{
				for ($i=0; $i < $day/7-1; $i++) { 
					echo '<tr align="center">';
					for ($j=1; $j <= 7 ; $j++) { 
				 		echo "<td>".($i*7+$j)."&nbsp</td>";
					} 
						echo "</tr>";
				}
				echo '<tr align="center">';
				for ($j=1; $j <= $day%7 ; $j++) { 
				 		echo "<td>".($i*7+$j)."&nbsp</td>";
					}
				for ($j=1; $j <= 7-$day%7 ; $j++) { 
				 		echo "<td>&nbsp</td>";
					}
				echo "</tr>";
			}
		}else{
			/*空格后循环*/
			echo '<tr align="center">';
			for ($m=0; $m < $w%7 ; $m++) { 
				echo "<td>&nbsp</td>";
			}
			for ($n=1; $n <= 7-$w; $n++){
				echo "<td>".$n."&nbsp</td>";
			}
			echo '</tr>';
			for ($i=0; $i < ($w+$day)/7-2; $i++) { 
				echo '<tr align="center">';
				for ($j=0; $j < 7 ; $j++) { 
				 	echo "<td>".($n+$j+$i*7)."&nbsp</td>";
				} 
					echo "</tr>";
			}
			echo '<tr align="center">';
			for ($j=0; $j <= ($w+$day-1)%7 ; $j++) { 
				 	echo "<td>".($n+$j+$i*7)."&nbsp</td>";
				}
			for ($j=0; $j <= 5-($w+$day-1)%7 ; $j++) { 
				 	echo "<td>&nbsp</td>";
				}	 
					echo "</tr>";	
			}
			echo "</table>";
	}

	Rilixinshi(28,1);  //在此进行输入天数和该月第一天为星期几 
?>
		</table>
		<p>基本上差不多，在每个tr的第一个和最后一个td定义字体颜色</p>
	</body>
</html>
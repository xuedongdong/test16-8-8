<?php
header("Content-type:text/html;charset=utf8");
public function __construct(){
	define("HOST","localhost");
	define("USER", "root");
	define("PASS", "root");
	define("DBNAME", "lamp61");

	$link = @mysql_connect(HOST, USER, PASS);

	if (!$link) {
		die("数据库连接失败！".mysql_error());
	}
}
mysql_select_db(DBNAME,$link);

mysql_set_charset("utf8");

$sql = "select * from stu";

$result = mysql_query($sql, $link);

$row = mysql_fetch_assoc($result);

echo $row['id'].":".$row['name'].":".$row['age'];

public function __destruct(){
	mysql_free_result($result);
	mysql_close($link);
}
/*$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }else{
  	echo "连接成功！";
  }

// some code

mysql_close($con);*/
?>
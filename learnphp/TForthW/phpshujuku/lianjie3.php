<?php
header("Content-type:text/html;charset=utf8");

define("HOST","localhost");
define("USER", "root");
define("PASS", "root");
define("DBNAME", "lamp61");

$link = @mysql_connect(HOST, USER, PASS);

if (!$link) {
	die("数据库连接失败！".mysql_error());
}

mysql_select_db(DBNAME,$link);

mysql_set_charset("utf8");

$sql = "select id, name, age, sex from stu";
$result = mysql_query($sql, $link);

echo "<h2>";
echo "当前结果集中共有".mysql_num_rows($result)."条数据</br>";
echo "当前结果集中共有".mysql_num_fields($result)."列</br>";
echo "</h2>";

echo "<p>使用mysql_fetch_assoc()函数解析结果集（关联数组）:</p>";
$row = mysql_fetch_assoc($result);
print_r($row);
echo "<hr/>";

echo "<p>使用mysql_fetch_row()函数解析结果集（索引数组）:</p>";
$row = mysql_fetch_row($result);
print_r($row);
echo "<hr/>";

echo "<p>使用mysql_fetch_array()函数解析结果集（索引加关联数组）:</p>";
$row = mysql_fetch_array($result);
print_r($row);
echo "<hr/>";

echo "<p>使用mysql_fetch_assoc()函数解析结果集（指定第二个参数）:</p>";
$row = mysql_fetch_assoc($result,MYSQL_ASSOC);
print_r($row);
echo "<hr/>";

echo "<p>使用mysql_fetch_object()函数解析结果集（对象类型）:</p>";
$row = mysql_fetch_object($result);
print_r($row);
echo "<hr/>";
/*$row = mysql_fetch_assoc($result);

echo $row['id'].":".$row['name'].":".$row['age'];*/

mysql_free_result($result);
mysql_close($link);

?>
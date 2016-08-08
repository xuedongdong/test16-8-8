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

$sql = "select * from stu where classid='lamp61'";

$result = mysql_query($sql, $link);

echo "<h3>学生信息</h3>";
echo "<table width='500' border='1'>";
echo "<tr><th>id号</th><th>姓名</th><th>年龄</th><th>性别</th><th>班级</th></tr>";
	while ($row = mysql_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>{$row['id']}</td>";
		echo "<td>{$row['name']}</td>";
		echo "<td>{$row['age']}</td>";
		echo "<td>{$row['sex']}</td>";
		echo "<td>{$row['classid']}</td>";
		echo "</tr>";
	}
echo "</table>";

/*$row = mysql_fetch_assoc($result);

echo $row['id'].":".$row['name'].":".$row['age'];*/

mysql_free_result($result);
mysql_close($link);

?>
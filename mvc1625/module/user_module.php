<?php
header("Content-type:text/html;charset=utf8");
class usermodel{
	public $user = 'root';
	public $pwd = 'root';
	public $dbname = 'lamp61';
	public $tablename = 'stu';
	public function __construct(){
		$link = @mysql_connect("localhost",$this->user,$this->pwd);
		mysql_query("SET NAMES utf8");
		mysql_select_db($this->dbname,$link);
	/*if (!$link) {
		die("数据库连接失败！".mysql_error());
	}*/
	}

	public function getUserInfo(){
		$sql = "select * from stu";
		$data = mysql_query($sql);
		return $data;
	}
/*$row = mysql_fetch_assoc($result);

echo $row['id'].":".$row['name'].":".$row['age'];*/

	public function __destruct(){
		/*mysql_free_result($result);*/
		@mysql_close($link);
	}
}

?>
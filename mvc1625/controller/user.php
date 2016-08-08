<?php
header("Content-type:text/html;charset=utf8");
$username = $_POST['name'];
$password = $_POST['password'];

include "../module/user_module.php";
$user = new usermodel;
$data = $user->getUserInfo();
/*$result = mysql_fetch_array($data);
print_r("<pre>");
print_r($result);
print_r("<pre>");

if ($username == $result['name']) {
	if ($password == $result['password']) {
		echo "输入正确";
	}else{
		echo "密码错误";
	}
}else{
	echo "没有该用户";
}*/

while($row=mysql_fetch_assoc($data)){
	if($username==$row['name']){
		if($password==$row['password']){
			die("success");
		}
		else{
			die("密码错误");
		}
	}
}
echo "没有该用户";

?>
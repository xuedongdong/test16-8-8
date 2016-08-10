<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf8");
class IndexController extends Controller {
    public function index(){
        //$this->show('Hello world!');
    	$this -> assign('msg','请认真填写');
    	$this -> display('login');
    }

  	public function do_login(){
  		if (empty($_POST['user_name'])) {
  			$this -> assign('msg','用户名为空!');
    		$this -> display('login');
    		exit;
  		}
  		if (empty($_POST['password'])) {
  			$this -> assign('msg','密码为空!');
    		$this -> display('login');
    		exit;
  		}

  		//var_dump($_POST);exit;
  		$data = $_POST['user_name'];
  		//var_dump($data);exit;
  		$user = M('users');
  		$result = $user-> where('user_name='.'"'.$data.'"') -> find();
   		//$result1 = $array_keys($result,'password');
   		//？把二维数组中的password提取出来
  		//var_dump($result); var_dump($result1); exit;
  		//var_dump($result);
  		if (!empty($result)) {
  			//var_dump($result);var_dump($_POST); exit;
  			$salt = 'ha';
  			$password = md5(md5($_POST['password']).$salt);
  			//var_dump($password);exit;
  			if ($result['password'] == $password) {
  				echo "success";
  			}else{
  				echo "密码错误";
  				//var_dump($result);var_dump($data1);
  			}
  		}else{
  			echo "没有该用户";
  		}
  	}

  	public function open_register($data='请认真填写'){
  		$this -> assign('msg',$data);
  		$this -> display('register');
  	}

  	public function do_register(){
  		if (empty($_POST['user_name'])) {
  			$this -> open_register('用户名为空!');
  			//$this -> assign('msg','用户名为空!');
    		//$this -> display('do_register');
    		exit;
  		}
  		if (empty($_POST['password1'])) {
  			$this -> open_register('密码为空!');
  			//$this -> assign('msg','密码为空!');
    		//$this -> display('do_register');
    		exit;
  		}
  		if (empty($_POST['password2'])) {
  			$this -> open_register('请再次输入密码!');
  			//$this -> assign('msg','请再次输入密码!');
    		//$this -> display('do_register');
    		exit;
  		}

  		//var_dump($_POST);exit;
  		$data['user_name'] = $_POST['user_name'];
  		$salt = 'ha';
  		$data['salt'] = $salt;
  		$password = md5(md5($_POST['password1']).$salt);
  		$data['password'] = $password;
      //$data1 = $_POST['user_name'];
  		//var_dump($data); var_dump($data1);exit;
  		$user = M('users');
  		$result = $user-> where('user_name='.'"'.$data.'"') -> find();
  		if (empty($result)) {
  			//var_dump($result);var_dump($_POST); exit;
  			if ($_POST['password1'] == $_POST['password2']) {
  				$user = M('users');
  				//$data['user_name']=$_POST['user_name'];
  				//$data['password']=$_POST['password1'];
  				$user -> data($data)->add();
  				echo "注册成功success";
  			}else{
  				echo "两次密码不同error1";
  				//var_dump($result);var_dump($data1);
  			}
  		}else{
  			echo "该用户已存在";
  		}
  	}
}
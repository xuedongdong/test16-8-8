<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function user_list(){
		//$this-> load ->view('user_list');
		
		$this -> load ->database();
		$this -> load ->model('user_model');
		$data = $this -> user_model ->user_list();
		$this -> assign('data',$data);
		$this -> assign('count',count($data));
		$this -> assign('tipe','123');
		$this -> display('user_list.php');
	}

	public function open_add(){
		$this->assign('msg','');
		$this -> display('add_user.php');
	}
	
	public function user_add(){
		//var_dump($_POST);
		if (empty($_POST['user_name'])) {
			$this->assign('msg','用户名不能为空');
			$this->display('add_user.php');	
			exit;
		}
		if (empty($_POST['password'])) {
			$this->assign('msg','密码不能为空');
			$this->display('add_user.php');	
			exit;
		}
		if (empty($_POST['birthday'])) {
			$this->assign('msg','生日不能为空');
			$this->display('add_user.php');	
			exit;
		}
		if (empty($_POST['email'])) {
			$this->assign('msg','邮箱不能为空');
			$this->display('add_user.php');	
			exit;
		}

		$this -> load ->database();
		$this -> load ->model('user_model');
		$user['user_name'] = $_POST['user_name'];
		$data = $this -> user_model ->user($user);
		if ($data) {
			$this->assign('msg','用户名存在');
			$this->display('add_user.php');	
			exit;
		}

		/*$this -> load ->database();
		$this -> load ->model('user_model');*/
		$result = $this -> user_model ->user_add($_POST);
		if (!empty($result)) {
			echo "输入成功，请刷新页面";
		}else{
			$this->assign('msg','用户名已存在');
			$this->display('add_user.php');	
			exit;
		}
		/*$this -> load -> view('add_user');*/
	}

	public function edit_user($user_id='',$result=''){
		//var_dump($_GET);
		/*$this->assign('msg','');
		if (empty($_POST['user_name'])) {
			$this->assign('msg','用户名不能为空');
			$this->display('add_user.php');	
			exit;
		}
		$this -> display('edit_user.php');*/
		$this -> load ->database();
		$this -> load ->model('user_model');
		if (!empty($user_id)) {
			$op['user_id'] = $user_id;
			/*$data = $this -> user_model ->user($op);
			$this->assign('data',$data);*/
		}else{
			$op['user_id'] = $_GET['user_id'];
			//var_dump($_GET['user_id']);exit;
			/*$data = $this -> user_model ->user($op);
			$this->assign('data',$data);*/
		}

		$data = $this -> user_model ->user($op);
		$this->assign('data',$data);
		$this->assign('msg',$result);
		$this->display('edit_user.php');	
	}

	public function user_edit(){
		//var_dump($_POST);exit;

		if (empty($_POST['user_name'])) {
			$this->edit_user($_POST['user_id'],'用户名不能为空');	
			/*$this->assign('msg','用户名不能为空');
			$this->display('edit_user.php');*/	
			exit;
		}
		if (empty($_POST['birthday'])) {
			$this->edit_user($_POST['user_id'],'生日不能为空');
			/*$this->assign('msg','生日不能为空');
			$this->display('edit_user.php');*/	
			exit;
		}
		if (empty($_POST['email'])) {
			$this->edit_user($_POST['user_id'],'邮箱不能为空');
			/*$this->assign('msg','邮箱不能为空');
			$this->display('edit_user.php');	*/
			exit;
		}

		$this -> load ->database();
		$this -> load ->model('user_model');
		$user['user_name'] = $_POST['user_name'];
		$id['user_id'] = $_POST['user_id'];

		$data1 = $this -> user_model ->user($id);
		if ($data1['user_name']==$_POST['user_name']) {
			$result = $this -> user_model ->edit_user($_POST);
			if ($result) {
				echo "修改成功";
			}else{
				echo "修改失败";
			}
			exit;
		}else{
			$data2 = $this -> user_model ->user($user);
			if ($data2) {
				$this->edit_user($_POST['user_id'],'用户名已存在');	
				exit;
			}
		}
		$result = $this -> user_model ->edit_user($_POST);
		if ($result) {
			echo "修改成功";
		}else{
			echo "修改失败";
		}
	}

	public function del_user(){
		$this -> load ->database();
		$this -> load ->model('user_model');
		$result = $this -> user_model ->del($_POST);
		if ($result) {
			echo "success";
		}else{
			echo "fail";
		}
	}
	
}
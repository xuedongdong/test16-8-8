<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf8");
class UserController extends Controller {
	public function user_list(){
		$user = M('users');
		$result = $user->select();
		$count = count($result);
		//var_dump($count);exit;
		//$page = 0;
		$pageMin = 1;
		//判断分页
		if ($count%8==0) {
			$pageMax = $count/8;
		}else{
			$pageMax = intval($count/8) +1;
		}
		//判断$_GET
		if ($_GET) {
			//判断是minus还是add
			if ($_GET['type']=='minus') {
				//判断是否为第一页
				if ($_GET['page'] == $pageMin-1) {
					$page = $_GET['page'];
				}else{
					$page = $_GET['page'] -1;
				}
			}else{
				//判断是否为最后一页
				if ($_GET['page'] == $pageMax-1) {
					$page = $_GET['page'];
				}else{
					$page = $_GET['page'] -(-1);
				}
			}
		}else{
			$page = 0;
		}
		//var_dump($page);

		$this -> assign('page',$page);
		$pageNow = 8*$page;
		$user = M('users');
		$data = $user->order('user_id')->limit($pageNow,8)->select();
		$this -> assign('list',$data);
		$pageShow = $page +1;
		$this -> assign('pageShow',$pageShow);
		$this -> assign('pageMax',$pageMax);
		$this -> display('user_list');
	}

//打开添加用户
	public function openAdd(){
		$this ->assign('msg','');
		$this ->display('user_add');
	}

//添加用户
	public function userAdd(){
		//var_dump($_POST);exit;

		if (empty($_POST['user_name'])) {
			$this->assign('msg','用户名不能为空');
			$this->display('user_add');	
			exit;
		}
		if (empty($_POST['birthday'])) {
			$this->assign('msg','生日不能为空');
			$this->display('user_add');	
			exit;
		}
		if (empty($_POST['email'])) {
			$this->assign('msg','邮箱不能为空');
			$this->display('user_add');	
			exit;
		}

		$data['user_name'] = $_POST['user_name'];
		$user = M('users');
  		$result = $user-> where('user_name='.'"'.$data['user_name'].'"') -> find();
  		//var_dump($result);exit;
		if ($result) {
			$this->assign('msg','用户名存在');
			$this->display('user_add');	
			exit;
		}else{
			$user = M('users');
			$user -> data($_POST)->add();
			echo "输入成功，请刷新页面";
		}
	}

	public function openEdit(){
		//var_dump($_GET);exit;
		$user = M('users');
  		$datashow = $user-> where('user_id='.'"'.$_GET['user_id'].'"') -> find();
		$this ->assign('msg','');
		$this ->assign('data',$datashow);
		$this -> display('user_edit');

	}

	public function userEdit(){
		$user = M('users');
		if (empty($_POST['user_name'])) {
			$datashow = $user-> where('user_id='.'"'.$_POST['user_id'].'"') -> find();
			$this->assign('msg','用户名不能为空');
			$this ->assign('data',$datashow);
			$this->display('user_edit');	
			exit;
		}
		if (empty($_POST['birthday'])) {
			$datashow = $user-> where('user_id='.'"'.$_POST['user_id'].'"') -> find();
			$this->assign('msg','生日不能为空');
			$this ->assign('data',$datashow);
			$this->display('user_edit');	
			exit;
		}
		if (empty($_POST['email'])) {
			$datashow = $user-> where('user_id='.'"'.$_POST['user_id'].'"') -> find();
			$this->assign('msg','邮箱不能为空');
			$this ->assign('data',$datashow);
			$this->display('user_edit');	
			exit;
		}

		$data['user_name'] = $_POST['user_name'];
		$id['user_id'] = $_POST['user_id'];
		
		$user = M('users');
  		$data1 = $user-> where('user_id='.'"'.$id['user_id'].'"') -> find();
		//var_dump($data1);exit;
		if ($data1['user_name']==$data['user_name']) {
			//echo "string"; 
			$user = M('users');
			$result = $user-> where('user_id='.'"'.$id['user_id'].'"') -> save($_POST); 
			if ($result) {
				echo "修改成功！！！";
			}else{
				echo "未修改！！！";
			}
			exit;
		}else{
			$data2 = $user-> where('user_name='.'"'.$data['user_name'].'"') -> find();
			if ($data2) {
				$datashow = $user-> where('user_id='.'"'.$_POST['user_id'].'"') -> find();
				$this->assign('msg','用户名已存在');
				$this ->assign('data',$datashow);
				$this->display('user_edit');	
				exit;
			}
		}
		$user = M('users');
		$result = $user-> where('user_id='.'"'.$id['user_id'].'"') -> save($_POST); ;
		if ($result) {
			echo "修改成功！！！";
		}else{
			echo "修改失败！！！";
		}
	}

	public function userDel(){
		$data['user_id'] = $_POST['user_id'];
		$user = M('users');
		$result = $user ->where('user_id='.'"'.$data['user_id'].'"') ->delete();
		if ($result) {
			echo "success";
		}else{
			echo "fail";
		}
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function goods_list(){
		$this -> load ->database();
		$this -> load ->model('goods_model');
		$data = $this -> goods_model ->goods_list();
		$this -> assign('data',$data);
		$this -> assign('count',count($data));
		//$this -> assign('tipe','123');

		$this -> display('product_list.php');
	}

	public function open_add(){
		$this->assign('msg','');
		$this -> display('add_product.php');
	}

	public function add_prodect(){

		if (empty($_POST['goods_id'])) {
			$this->assign('msg','产品ID不能为空');
			$this->display('add_product.php');	
			exit;
		}
		if (empty($_POST['goods_name'])) {
			$this->assign('msg','产品名不能为空');
			$this->display('add_product.php');	
			exit;
		}
		if (empty($_POST['keywords'])) {
			$this->assign('msg','产品描述不能为空');
			$this->display('add_product.php');	
			exit;
		}
		if (empty($_POST['goods_number'])) {
			$this->assign('msg','产品数量不能为空');
			$this->display('add_product.php');	
			exit;
		}

		$this -> load ->database();
		$this -> load ->model('goods_model');
		$goods['goods_id'] = $_POST['goods_id'];
		$data = $this -> goods_model ->goods($goods);
		if ($data) {
			$this->assign('msg','id存在');
			$this->display('add_product.php');	
			exit;
		}

		$result = $this -> goods_model ->goods_add($_POST);
		if (!empty($result)) {
			echo "输入成功，请刷新页面";
		}else{
			$this->assign('msg','产品名已存在');
			$this->display('add_product.php');	
			exit;
		}

		//$this -> load ->database();
		//$this -> load ->model('goods_model');
			//$user['user_name'] = $_POST['user_name'];
			//$data = $this -> user_model ->user($user);
		//$result = $this -> goods_model ->prodect_add($_POST);
	}

	public function open_edit($goods_id='',$result=''){
		
		$this -> load ->database();
		$this -> load ->model('goods_model');
		if (!empty($goods_id)) {
			$op['goods_id'] = $goods_id;
		}else{

			$op['goods_id'] = $_GET['goods_id'];
			//var_dump($op);  exit;			
		}
		$data = $this -> goods_model ->goods($op);
		$this->assign('data',$data);
		$this->assign('msg',$result);
		$this->display('edit_goods.php');	
	}

	public function edit_goods(){

		if (empty($_POST['goods_name']) && $_POST['goods_name'] !== '0') {
			$this->open_edit($_POST['goods_id'],'产品名不能为空');	
			//var_dump($_POST);
			exit;
		}
		if (empty($_POST['keywords']) && $_POST['keywords'] !== '0') {
			$this->open_edit($_POST['goods_id'],'产品描述不能为空');
			exit;
		}
		if (empty($_POST['goods_number']) && $_POST['goods_number'] !== '0') {
			$this->open_edit($_POST['goods_id'],'产品数量不能为空');
			exit;
		}

		$this -> load ->database();
		$this -> load ->model('goods_model');
		$goods['goods_name'] = $_POST['goods_name'];
		$id['goods_id'] = $_POST['goods_id'];

		$data1 = $this -> goods_model ->goods($id);
		if ($data1['goods_name']==$_POST['goods_name']) {
			$result = $this -> goods_model ->goods_edit($_POST);
			if ($result) {
				echo "修改成功";
			}else{
				echo "修改失败";
			}
			exit;
		}else{
			$data2 = $this -> goods_model ->goods($goods);
			if ($data2) {
				$this->goods_edit($_POST['goods_id'],'产品名已存在');	
				exit;
			}
		}
		$result = $this -> goods_model ->goods_edit($_POST);
		if ($result) {
			echo "修改成功";
		}else{
			echo "修改失败";
		}
	}

}
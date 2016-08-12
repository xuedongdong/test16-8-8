<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf8");
class CartController extends Controller {

	public function cart_list(){
		$cart = M('cart');
		$result = $cart->select();
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
		$goods = M('cart');
		$data = $cart->order('rec_id')->limit($pageNow,8)->select();
		$this -> assign('list',$data);
		$pageShow = $page +1;
		$this -> assign('pageShow',$pageShow);
		$this -> assign('pageMax',$pageMax);
		$this -> display('cart_list');
	}

	public function openAdd(){
		$this ->assign('msg','');
		$this ->display('cart_add');
	}

	public function cartAdd(){
		//var_dump($_POST);exit;

		if (empty($_POST['user_id'])) {
			$this->assign('msg','用户id不能为空');
			$this->display('cart_add');	
			exit;
		}
		if (empty($_POST['goods_id'])) {
			$this->assign('msg','商品id不能为空');
			$this->display('cart_add');	
			exit;
		}
		if (empty($_POST['goods_name'])) {
			$this->assign('msg','商品名称不能为空');
			$this->display('cart_add');	
			exit;
		}
		if (empty($_POST['goods_number'])) {
			$this->assign('msg','商品数量不能为空');
			$this->display('cart_add');	
			exit;
		}

		$data['user_id'] = $_POST['user_id'];
		$cart = M('cart');
  		$result = $cart-> where('user_id='.'"'.$data['user_id'].'"') -> find();
  		//var_dump($result);exit;
		if ($result) {
			$this->assign('msg','该用户订单存在');
			$this->display('cart_add');	
			exit;
		}else{
			$cart = M('cart');
			$result = $cart -> data($_POST)->add();
			if($result){    
			//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']    
				$this->success('新增成功', '/index.php/Home/Cart/cart_list');
			} 
			else {    
			//错误页面的默认跳转页面是返回前一页，通常不需要设置    
				$this->error('新增失败');
			}
			//echo "输入成功，请刷新页面";
		}
	}

	public function openEdit(){
		//var_dump($_GET);exit;
		$cart = M('cart');
  		$datashow = $cart-> where('rec_id='.'"'.$_GET['rec_id'].'"') -> find();
		$this ->assign('msg','');
		$this ->assign('data',$datashow);
		$this -> display('cart_edit');

	}

	public function cartEdit(){
		$cart = M('cart');
		if (empty($_POST['user_id'])) {
			$datashow = $cart-> where('rec_id='.'"'.$_POST['rec_id'].'"') -> find();
			$this->assign('msg','用户id不能为空');
			$this->display('cart_edit');	
			exit;
		}
		if (empty($_POST['goods_id'])) {
			$datashow = $cart-> where('rec_id='.'"'.$_POST['rec_id'].'"') -> find();
			$this->assign('msg','商品id不能为空');
			$this ->assign('data',$datashow);
			$this->display('cart_edit');	
			exit;
		}
		if (empty($_POST['goods_name'])) {
			$datashow = $cart-> where('rec_id='.'"'.$_POST['rec_id'].'"') -> find();
			$this->assign('msg','商品名称不能为空');
			$this->display('cart_edit');	
			exit;
		}
		if (empty($_POST['goods_number'])) {
			$datashow = $cart-> where('rec_id='.'"'.$_POST['rec_id'].'"') -> find();
			$this->assign('msg','商品数量不能为空');
			$this->display('cart_edit');	
			exit;
		}
		

		$data['user_id'] = $_POST['user_id'];
		$id['rec_id'] = $_POST['rec_id'];
		
		$cart = M('cart');
  		$data1 = $cart-> where('rec_id='.'"'.$id['rec_id'].'"') -> find();
		//var_dump($data1);exit;
		if ($data1['user_id']==$data['user_id']) {
			//echo "string"; 
			$cart = M('cart');
			$result = $cart-> where('rec_id='.'"'.$id['rec_id'].'"') -> save($_POST); 
			if ($result) {
				//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']    
				$this->success('修改成功', '/index.php/Home/Cart/cart_list');
				//echo "修改成功！！！";
			}else{
				//错误页面的默认跳转页面是返回前一页，通常不需要设置    
				$this->error('修改失败');
				//echo "修改失败！！！";
			}
			exit;
		}else{
			$data2 = $cart-> where('user_id='.'"'.$data['user_id'].'"') -> find();
			if ($data2) {
				$datashow = $cart-> where('rec_id='.'"'.$_POST['rec_id'].'"') -> find();
				$this->assign('msg','订单表已存在');
				$this ->assign('data',$datashow);
				$this->display('cart_edit');	
				exit;
			}
		}
		$cart = M('cart');
		$result = $cart-> where('rec_id='.'"'.$id['rec_id'].'"') -> save($_POST); ;
		if ($result) {
			//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']    
			$this->success('修改成功', '/index.php/Home/Cart/cart_list');
			//echo "修改成功！！！";
		}else{
			//错误页面的默认跳转页面是返回前一页，通常不需要设置    
			$this->error('修改失败');
			//echo "修改失败！！！";
		}
	}

	public function cartDel(){
		$data['rec_id'] = $_POST['rec_id'];
		$cart = M('cart');
		$result = $cart ->where('rec_id='.'"'.$data['rec_id'].'"') ->delete();
		if ($result) {
			echo "success";
		}else{
			echo "fail";
		}
	}


}
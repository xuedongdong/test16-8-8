<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf8");
class GoodsController extends Controller {

	public function goods_list(){
		$goods = M('goods');
		$result = $goods->select();
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
		$goods = M('goods');
		$data = $goods->order('goods_id')->limit($pageNow,8)->select();
		$this -> assign('list',$data);
		$pageShow = $page +1;
		$this -> assign('pageShow',$pageShow);
		$this -> assign('pageMax',$pageMax);
		$this -> display('goods_list');
	}

	public function openAdd(){
		$this ->assign('msg','');
		$this ->display('goods_add');
	}

	public function goodsAdd(){
		//var_dump($_POST);exit;

		if (empty($_POST['goods_name'])) {
			$this->assign('msg','商品名称不能为空');
			$this->display('goods_add');	
			exit;
		}
		if (empty($_POST['goods_number'])) {
			$this->assign('msg','商品数量不能为空');
			$this->display('goods_add');	
			exit;
		}
		if (empty($_POST['market_price'])) {
			$this->assign('msg','商品价格不能为空');
			$this->display('goods_add');	
			exit;
		}
		if (empty($_POST['keywords'])) {
			$this->assign('msg','商品描述不能为空');
			$this->display('goods_add');	
			exit;
		}

		$data['goods_name'] = $_POST['goods_name'];
		$goods = M('goods');
  		$result = $goods-> where('goods_name='.'"'.$data['goods_name'].'"') -> find();
  		//var_dump($result);exit;
		if ($result) {
			$this->assign('msg','商品存在');
			$this->display('goods_add');	
			exit;
		}else{
			$goods = M('goods');
			$goods -> data($_POST)->add();
			echo "输入成功，请刷新页面";
		}
	}

	public function openEdit(){
		//var_dump($_GET);exit;
		$goods = M('goods');
  		$datashow = $goods-> where('goods_id='.'"'.$_GET['goods_id'].'"') -> find();
		$this ->assign('msg','');
		$this ->assign('data',$datashow);
		$this -> display('goods_edit');

	}

	public function goodsEdit(){
		$goods = M('goods');
		if (empty($_POST['goods_name'])) {
			$datashow = $goods-> where('goods_id='.'"'.$_POST['goods_id'].'"') -> find();
			$this->assign('msg','商品名称不能为空');
			$this ->assign('data',$datashow);
			$this->display('goods_edit');	
			exit;
		}
		if (empty($_POST['goods_number'])) {
			$datashow = $goods-> where('goods_id='.'"'.$_POST['goods_id'].'"') -> find();
			$this->assign('msg','商品数量不能为空');
			$this->display('goods_add');	
			exit;
		}
		if (empty($_POST['market_price'])) {
			$datashow = $goods-> where('goods_id='.'"'.$_POST['goods_id'].'"') -> find();
			$this->assign('msg','商品价格不能为空');
			$this->display('goods_add');	
			exit;
		}
		if (empty($_POST['keywords'])) {
			$datashow = $goods-> where('goods_id='.'"'.$_POST['goods_id'].'"') -> find();
			$this->assign('msg','商品描述不能为空');
			$this->display('goods_add');	
			exit;
		}

		$data['goods_name'] = $_POST['goods_name'];
		$id['goods_id'] = $_POST['goods_id'];
		
		$goods = M('goods');
  		$data1 = $goods-> where('goods_id='.'"'.$id['goods_id'].'"') -> find();
		//var_dump($data1);exit;
		if ($data1['goods_name']==$data['goods_name']) {
			//echo "string"; 
			$goods = M('goods');
			$result = $goods-> where('goods_id='.'"'.$id['goods_id'].'"') -> save($_POST); 
			if ($result) {
				echo "修改成功！！！";
			}else{
				echo "未修改！！！";
			}
			exit;
		}else{
			$data2 = $goods-> where('goods_name='.'"'.$data['goods_name'].'"') -> find();
			if ($data2) {
				$datashow = $goods-> where('goods_id='.'"'.$_POST['goods_id'].'"') -> find();
				$this->assign('msg','用户名已存在');
				$this ->assign('data',$datashow);
				$this->display('goods_edit');	
				exit;
			}
		}
		$goods = M('goods');
		$result = $goods-> where('goods_id='.'"'.$id['goods_id'].'"') -> save($_POST); ;
		if ($result) {
			echo "修改成功！！！";
		}else{
			echo "修改失败！！！";
		}
	}

	public function goodsDel(){
		$data['goods_id'] = $_POST['goods_id'];
		$goods = M('goods');
		$result = $goods ->where('goods_id='.'"'.$data['goods_id'].'"') ->delete();
		if ($result) {
			echo "success";
		}else{
			echo "fail";
		}
	}

}
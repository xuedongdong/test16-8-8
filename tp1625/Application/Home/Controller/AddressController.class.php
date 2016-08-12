<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf8");
class AddressController extends Controller {

	public function address_list(){
		$address = M('user_address');
		$result = $address->select();
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
		$address = M('user_address');
		$data = $address->order('address_id')->limit($pageNow,8)->select();
		$this -> assign('list',$data);
		$pageShow = $page +1;
		$this -> assign('pageShow',$pageShow);
		$this -> assign('pageMax',$pageMax);
		$this -> display('address_list');
	}

	public function openAdd(){
		$this ->assign('msg','');
		$this ->display('address_add');
	}

	public function addressAdd(){
		//var_dump($_POST);exit;

		if (empty($_POST['address_name'])) {
			$this->assign('msg','地址名不能为空');
			$this->display('address_add');	
			exit;
		}
		if (empty($_POST['city'])) {
			$this->assign('msg','城市不能为空');
			$this->display('address_add');	
			exit;
		}
		if (empty($_POST['address'])) {
			$this->assign('msg','地址不能为空');
			$this->display('address_add');	
			exit;
		}
		if (empty($_POST['tel'])) {
			$this->assign('msg','联系方式不能为空');
			$this->display('address_add');	
			exit;
		}

		$data['address_name'] = $_POST['address_name'];
		$address = M('user_address');
  		$result = $address-> where('address_name='.'"'.$data['address_name'].'"') -> find();
  		//var_dump($result);exit;
		if ($result) {
			$this->assign('msg','地址存在');
			$this->display('address_add');	
			exit;
		}else{
			$address = M('user_address');
			$result = $address -> data($_POST)->add();
			if($result){    
			//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']    
				$this->success('新增成功', '/index.php/Home/Address/address_list');
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
		$address = M('user_address');
  		$datashow = $address-> where('address_id='.'"'.$_GET['address_id'].'"') -> find();
		$this ->assign('msg','');
		$this ->assign('data',$datashow);
		$this -> display('address_edit');

	}

	public function addressEdit(){
		$address = M('user_address');
		if (empty($_POST['address_name'])) {
			$datashow = $address-> where('address_id='.'"'.$_POST['address_id'].'"') -> find();
			$this->assign('msg','地址名称不能为空');
			$this ->assign('data',$datashow);
			$this->display('address_edit');	
			exit;
		}
		if (empty($_POST['city'])) {
			$datashow = $address-> where('address_id='.'"'.$_POST['address_id'].'"') -> find();
			$this->assign('msg','城市不能为空');
			$this->display('address_add');	
			exit;
		}
		if (empty($_POST['address'])) {
			$datashow = $address-> where('address_id='.'"'.$_POST['address_id'].'"') -> find();
			$this->assign('msg','地址不能为空');
			$this->display('address_add');	
			exit;
		}
		if (empty($_POST['tel'])) {
			$datashow = $address-> where('address_id='.'"'.$_POST['address_id'].'"') -> find();
			$this->assign('msg','联系方式不能为空');
			$this->display('address_add');	
			exit;
		}

		$data['address_name'] = $_POST['address_name'];
		$id['address_id'] = $_POST['address_id'];
		
		$address = M('user_address');
  		$data1 = $address-> where('address_id='.'"'.$id['address_id'].'"') -> find();
		//var_dump($data1);exit;
		if ($data1['address_name']==$data['address_name']) {
			//echo "string"; 
			$address = M('user_address');
			$result = $address-> where('address_id='.'"'.$id['address_id'].'"') -> save($_POST); 
			if ($result) {
				//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']    
				$this->success('修改成功', '/index.php/Home/Address/address_list');
				//echo "修改成功！！！";
			}else{
				//错误页面的默认跳转页面是返回前一页，通常不需要设置    
				$this->error('修改失败');
				//echo "修改失败！！！";
			}
			exit;
		}else{
			$data2 = $address-> where('address_name='.'"'.$data['address_name'].'"') -> find();
			if ($data2) {
				$datashow = $address-> where('address_id='.'"'.$_POST['address_id'].'"') -> find();
				$this->assign('msg','地址已存在');
				$this ->assign('data',$datashow);
				$this->display('address_edit');	
				exit;
			}
		}
		$address = M('user_address');
		$result = $address-> where('address_id='.'"'.$id['address_id'].'"') -> save($_POST); ;
		if ($result) {
			//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']    
			$this->success('修改成功', '/index.php/Home/Address/address_list');
			//echo "修改成功！！！";
		}else{
			//错误页面的默认跳转页面是返回前一页，通常不需要设置    
			$this->error('修改失败');
			//echo "修改失败！！！";
		}
	}

	public function addressDel(){
		$data['address_id'] = $_POST['address_id'];
		$address = M('user_address');
		$result = $address ->where('address_id='.'"'.$data['address_id'].'"') ->delete();
		if ($result) {
			echo "success";
		}else{
			echo "fail";
		}
	}


}
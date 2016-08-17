<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf8");
class GoodsController extends Controller {
	public function goods_detail($goods_id){
		//var_dump($_GET);exit;
		if ($goods_id) {
			$_GET['goods_id'] = $goods_id;
		}
		$goods = M('goods');
		$data = $goods -> where('goods_id="'.$_GET['goods_id'].'"')->find();
		//var_dump($data);exit;
		$number = session('number');
		session('number',null);
		$this ->assign('number',$number);
		$this->assign('data',$data);
		$this->display('goods_detail');
	}	

	public function Addgoods(){
		//var_dump($_POST);exit;
		$user_name = session('user_name');
		var_dump($user_name);var_dump($_POST);exit;
		if(!$user_name) {
			session('goods_id',$_POST['goods_id']);
			session('number',$_POST['number']);
			$this -> Login();
		}

		$_POST['goods_number'] = $_POST['number'];
		unset($_POST['number']);

		$user = M('users');
		$userdata = $user ->where ('user_name="'.$user_name.'"') ->find();
		$_POST['user_id'] = $userdata['user_id'];

		$goods = M('goods');
		$goodsdata = $goods ->where('goods_id="'.$_POST['goods_id'].'"') ->find();
		$_POST['goods_name'] = $goodsdata['goods_name'];
		$_POST['market_price'] = $goodsdata['market_price'];
		$_POST['goods_price'] = $goodsdata['shop_price'];
		$_POST['goods_sn'] = $goodsdata['goods_sn'];

		$cart = M('cart');
		$cartdata = $cart ->where('goods_id="'.$_POST['goods_id'].'" AND user_id="'.$_POST['user_id'].'"')->find();
		if ($cartdata) {
			$cartdata['goods_number'] -= -$_POST['goods_number'];
			$update['goods_number'] = $cartdata['goods_number'];
			$cart->where('goods_id="'.$_POST['goods_id'].'" AND user_id="'.$_POST['user_id'].'"')->save($update);
			echo "修改成功";
		}else{
			$result = $cart->add($_POST);
			if($result){
				//echo "添加成功";
				$this->cart();
			}else{
				echo "添加失败";
			}
		}
		//$this -> Cart();
	}

	public function Login(){
        //$this->show('123');
        //var_dump($_POST);exit;
        $this->assign('msg','');
        $this->assign('title','mui商城-首页');
    	$this->display('login');
    }

    public function doLogin(){
    	//var_dump($_POST);
    	if (empty($_POST['user_name']) && $_POST['user_name'] !== '0') {
    		$this->assign('msg','用户不能为空');
    		$this->assign('title','mui商城-首页');
    		$this->display('login');
    		exit;
    	}
    	if (empty($_POST['password']) && $_POST['password'] !== '0') {
    		$this->assign('msg','密码不能为空');
    		$this->assign('title','mui商城-首页');
    		$this->display('login');
    		exit;
    	}

    	$user = M('users');
    	$data = $user-> where('user_name="'.$_POST['user_name'].'"') -> find();
    	if (!empty($data)) {
    		$salt = $data['salt'];
    		$password = md5(md5($_POST['password']).$salt);
    		if ($data['password']==$password) {
                session('user_name',$_POST['user_name']);
    			//echo "登陆成功";
    			$goods_id = session('goods_id');
    			session('goods_id',null);
                $this->goods_detail($goods_id);
    		}else{
	    		$this->assign('msg','登陆失败');
	    		$this->assign('title','mui商城-首页');
	    		$this->display('login');
	    		exit;
    		}
    	}else{
    		$this->assign('msg','没有该用户');
    		$this->assign('title','mui商城-首页');
    		$this->display('login');
    		exit;
    	}	
    }
		
	public function cart(){
		//echo "加入购物车";
		$this -> display('cart');
	}


}
?>
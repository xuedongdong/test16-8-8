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
		$this -> assign('title', 'mui商城-商品明细');
		$this->display('goods_detail');
	}	

	public function Addgoods(){
		//var_dump($_POST);exit;
		$user_name = session('user_name');
		//var_dump($user_name);var_dump($_POST);exit;
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
			//echo "修改成功";
			$this->redirect('cart');
		}else{
			$result = $cart->add($_POST);
			if($result){
				//echo "添加成功";
				$this->redirect('cart');
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
		$user_name = session('user_name');
		if (!$user_name) {
			$this -> redirect('Index/Login');
		}
		$user = M('users');
		$userdata = $user->where('user_name="'.$user_name.'"')->find();
		$user_id = $userdata['user_id'];

		$goods = M('goods');
		$cart = M('cart');
		$cartdata = $cart->where('user_id="'.$user_id.'"')->select();
		foreach ($cartdata as &$value) {
			$goodsdata = $goods->where('goods_id="'.$value['goods_id'].'"')->find();
			$value['goods_img'] = $goodsdata['goods_img'];
			$value['total'] = $value['goods_number'] * $value['goods_price'];
		}
		//echo "<pre>";
		//var_dump($cartdata);exit;
		$this -> assign('data', $cartdata);
		$this -> assign('title', 'mui商城-购物车');
		$this -> display('cart');
	}

	public function changeGoods(){
		//var_dump($_POST);exit;
		$user_name = session('user_name');
		$user = M('users');
		$userdata = $user->where('user_name="'.$user_name.'"')->find();
		$user_id = $userdata['user_id'];

		$cart = M('cart');
		//$cartdata = $cart->where('goods_id="'.$_POST['goods_id'].'" AND user_id="'.$user_id.'"')->find();
		
		$data['goods_number'] = $_POST['goods_number'];
		$result = $cart->where('goods_id="'.$_POST['goods_id'].'" AND user_id="'.$user_id.'"')->save($data);
		
/*		if ($result) {
			$res = $data['goods_number'] * $cartdata['goods_price'];
			echo $res;
		}else{
			echo err;
		}*/
	}

	public function delCart(){
		$user_name = session('user_name');
		$user = M('users');
		$userdata = $user->where('user_name="'.$user_name.'"')->find();
		$user_id = $userdata['user_id'];

		$cart = M('cart');
		$result = $cart->where('goods_id="'.$_POST['goods_id'].'" AND user_id="'.$user_id.'"')->delete();
		if($result){
			echo 1;
		}else{
			echo 2;
		}
	}

	public function sublist(){

		$payment = M('payment');
		$paymentdata = $payment->select();
		//echo "<pre>";
		//var_dump($paymentdata);exit;


		$this->assign('paylist',$paymentdata);
		$this->assign('title','mui商城-支付');
		$this->display('sublist');
	}

	public function subShow(){
		//var_dump($_POST);exit;
		$data = $_POST;
		$citystr = $_POST['cityselected'];
		unset($data['cityselected']);
		$cityarray = split(' ', $citystr);

		$region = M('region');
		$regiondata0 = $region->where('region_name="'.$cityarray['0'].'" AND region_type="1"')->find();
		$data['province'] = $regiondata0['region_id'];
		
		$regiondata1 = $region->where('region_name="'.$cityarray['1'].'" AND region_type="2"')->find();
		$data['city'] = $regiondata1['region_id'];
		
		$regiondata2 = $region->where('region_name="'.$cityarray['2'].'" AND region_type="3"')->find();
		$data['district'] = $regiondata2['region_id'];
		
		$payment = M('payment');
		$paymentdata = $payment->where('pay_id="'.$data['pay_id'].'"')->find();
		$data['pay_name'] = $paymentdata['pay_name'];

		$user_name = session('user_name');
		$user = M('users');
		$userdata = $user->where('user_name="'.$user_name.'"')->find();
		$data['user_id'] = $userdata['user_id'];
		$data['email'] = $userdata['email'];
		//$data['tel'] = $userdata['tel'];
		//$data['mobile'] = $userdata['mobile'];

		$cart = M('cart');
		$cartdata = $cart->where('user_id="'.$userdata['user_id'].'"')->select();
		foreach ($cartdata as &$value) {
			$value['total'] -=  -($value['goods_number'] * $value['goods_price']);
		}

		for ($i=0; $i < count($cartdata); $i++) { 
			$a = $cartdata[$i]['total'];
			$data['money_paid'] -= -intval($a);
		}

		$data['order_sn'] =strval(date('Ymd')) . strval(time()-strtotime(date("Y-m-d")));

		//echo "<pre>";
		//var_dump($data);exit;

		$order_info = M('order_info');
		$order_info->add($data);

		$datashow = $data;
		$datashow['user_name'] = $user_name;
		$datashow['address'] = $citystr.'&nbsp'.$data['address'];
		$this->assign('title','mui商城-支付');
		$this->assign('data',$datashow);
		$this->display('subshow');
	}

	public function subShowRes(){
		//var_dump($_POST);exit;
		if($_POST){
			redirect('/Admin/Index/index', 3, '支付成功。。。');
		}
	}

	public function goods_category(){
		$category = M('category');
		$data = $category->select();
		$list = $this->tree_list($data);
		//echo "<pre>";
		//var_dump($list);exit;
		$this->assign('list',$list);
		$this->display('category');
	}	

	public function sort_goods(){
		//var_dump($_GET);exit();
		$goods = M('goods');
        $data = $goods->where("cat_id='".$_GET['cat_id']."'")->select();
        $this->assign('list',$data);
        $this->display('main');
	}


	private function tree_list(&$list,$parent_id = 0){
		$tree = array();
		if (!$list) return false;

		foreach ($list as &$val) {
			if ($parent_id == $val['parent_id']) {
				$val['child'] = $this->tree_list($list,$val['cat_id']);
				$tree[] = $val;
			}
		}
		return $tree;
	}


}
?>
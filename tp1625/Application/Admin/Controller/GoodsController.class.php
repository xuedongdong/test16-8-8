<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf8");
class GoodsController extends Controller {
	public function goods_detail(){
		//var_dump($_GET);exit;
		$goods = M('goods');
		$data = $goods -> where('goods_id="'.$_GET['goods_id'].'"')->find();
		//var_dump($data);exit;
		$this->assign('data',$data);
		$this->display('goods_detail');
	}	

	
	
}
?>
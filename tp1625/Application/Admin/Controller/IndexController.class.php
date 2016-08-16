<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf8");
class IndexController extends Controller {
    public function index(){
        //$this->show('123');
        $goods = M('goods');
        $result = $goods->select();
        $count = count($result);
        //var_dump($count);exit;
        if ($count % 10 == 0) {
        	$pageMax = $count/10;
        }else{
        	$pageMax = intval($count/10) +1;
        }
        $pageMin = 1;
        //var_dump($pageMax);exit;
        if (empty($_GET)) {
        	$page = 0;
        }else{
        	if ($_GET['type']=='minus') {
        		if ($_GET['page']==$pageMin) {
        			$page = $pageMin-1;
        		}else{
        			$page = $_GET['page'] -2;	
        		}
        	}else{
        		if ($_GET['page']==$pageMax) {
        			$page = $pageMax-1;
        		}else{
        			$page = $_GET['page'];	
        		}
        	}
        }
        //var_dump($page);exit;
        $pageNow = $page *10;
        $data = $goods->limit($pageNow,10)->select();
        //$this->assign('msg','');
        $this->assign('list',$data);
        $this->assign('page',$page+1);
        $this->assign('pageMax',$pageMax);
        $this->assign('title','mui商城-首页');
    	$this->display('main');
    }

    public function Login(){
        //$this->show('123');
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
                $this->index();
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

    public function Register(){
    	$this->assign('msg','');
    	$this->display('register');
    }

    public function do_register(){
    	if (empty($_POST['user_name']) && $_POST['user_name'] !== '0') {
    		$this->assign('msg','账号不能为空');
    		$this->assign('title','mui商城-注册');
    		$this->display('register');
    		exit;
    	}
    	if (empty($_POST['password']) && $_POST['password'] !== '0') {
    		$this->assign('msg','密码不能为空');
    		$this->assign('title','mui商城-注册');
    		$this->display('register');
    		exit;
    	}
    	if (empty($_POST['repassword']) && $_POST['repassword'] !== '0') {
    		$this->assign('msg','确认密码不能为空');
    		$this->assign('title','mui商城-注册');
    		$this->display('register');
    		exit;
    	}elseif ($_POST['password'] !==$_POST['repassword']) {
    		$this->assign('msg','2次密码不一样');
    		$this->assign('title','mui商城-注册');
    		$this->display('register');
    		exit;
    	}
    	if (empty($_POST['email']) && $_POST['email'] !== '0') {
    		$this->assign('msg','邮箱不能为空');
    		$this->assign('title','mui商城-注册');
    		$this->display('register');
    		exit;
    	}

    	$user = M('users');
    	$data = $user-> where('user_name="'.$_POST['user_name'].'"') -> find();
    	if (empty($data)) {
    		$salt = "haha";
    		$data = $_POST;
    		unset($data['repassword']);
    		$data['salt'] = $salt;
    		$data['password'] = md5(md5($_POST['password']).$salt);
    		//var_dump($data);exit;
    		$result = $user->add($data);
    		if ($result) {
    			echo "注册成功";
    		}else{
    			echo "注册失败";
    		}
    	}else{
    		$this->assign('msg','用户已存在');
    		$this->assign('title','mui商城-注册');
    		$this->display('register');
    		exit;
    	}
    }

    public function user_center(){
        $user_name = session('user_name');
        if (!$user_name) {
            $user_name = '访客';
        }
        $this->assign('user_name',$user_name);
        $this->display('userCenter');
    }

    public function logout(){
        session('user_name', null);
        $this->user_center();
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
/*		$data['result'] = "哈哈哈";
		$this->load->view('welcome_message',$data);*/
		
		$data = $this->verify();
		$result['image'] = $data['image'];
		$this -> load ->view('login',$result);
	}

	public function dologin(){
		/*var_dump($_POST);*/
		
		/*$this -> load ->database();
		$this -> load ->model('user_model');
		$user['user_name'] = $_POST['user_name'];
		$data = $this -> user_model ->user($user);
		var_dump($data);*/

		$this -> load ->helper('url');
		$this -> load ->library('session');
		$verify = $this -> session ->userdata('word');

		if (empty($_POST["user_name"])) {
			$data = $this->verify();
			$result['image'] = $data['image'];
			$result['result'] = "用户名不能为空";
			$this->load->view('login',$result);
		}elseif (empty($_POST["password"])) {
			$data = $this->verify();
			$result['image'] = $data['image'];
			$result['result'] = "密码不能为空";
			$this->load->view('login',$result);
		}elseif ($_POST['verify'] !== $verify && $_POST['verify'] !== 'vip') {
			$data = $this->verify();
			$result['image'] = $data['image'];
			$result['result'] = "验证码错误";
			$this->load->view('login',$result);
		}else{
			$this -> load ->database();
			$this -> load ->model('user_model');
			$user['user_name'] = $_POST['user_name'];
			$data = $this -> user_model ->user($user);
			if ($data) {
				if ($data['password'] == $_POST['password']) {
					$data['user_name'] = $_POST['user_name'];
					redirect('/Welcome/sysindex/');
				}else{
					$data = $this->verify();
					$result['image'] = $data['image'];
					$result['result'] = "密码错误";
					$this -> load ->view('login',$result);
				}
			}else{
				$data = $this->verify();
				$result['image'] = $data['image'];
				$result['result'] = "没有该用户";
				$this -> load ->view('login',$result);

			}
		}
	}
		
	public function verify(){
		$this -> load ->helper('captcha');
		$vals = array(
    		/*'word'      => 'Random word',*/
    		'img_path'  => './captcha/',
    		'img_url'   => 'http://www.1625ci.com/captcha/',
    		'font_path' => './path/to/fonts/texb.ttf',
    		'img_width' => '150',
    		'img_height'    => 30,
    		'expiration'    => 7200,
    		'word_length'   => 5,
    		'font_size' => 16,
    		'img_id'    => 'Imageid',
    		'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
    		/*abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*/

    // White background and border, black text and red grid
    		'colors'    => array(
        		'background' => array(255, 255, 255),
        		'border' => array(255, 255, 255),
        		'text' => array(0, 0, 0),
        		'grid' => array(255, 40, 40)
    		)
		);

		$cap = create_captcha($vals);
		$this -> load -> library('session');
		$verify['word'] = $cap['word'];
		$this -> session ->set_userdata($verify);
		return $cap;

			/*echo $cap['image'];*/
			/*var_dump($cap['word']);*/
	}

	public function nav(){
		$this -> load -> view('nav');
	}

	public function sysindex(){
		$this -> load ->library('session');
		$user_name = $this -> session ->userdata('user_name');
		if (empty($user_name)) {
			$this -> load ->helper('url');
			redirect('Welcome/nav');
		}else{
			$data['user_name'] = $user_name;
			$this -> load ->view('sysindex',$data); 
		}
	}

	public function logout(){
		$this -> load ->library('session');
		$this -> load ->unset_userdata('user_name');
		$this -> load ->helper('url');
		redirect('/Welcome/index/');
	}
	
}

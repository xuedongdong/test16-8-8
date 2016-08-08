<?php
class MY_Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('CI_Smarty');
	}

	public function display($msg){
		$this->ci_smarty->display($msg);
	}

	public function assign($msg,$data){
		$this->ci_smarty->assign($msg,$data);
	}



}
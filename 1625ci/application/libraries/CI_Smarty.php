<?php
require_once APPPATH.'third_party/smarty/libs/Smarty.class.php';

class CI_Smarty extends Smarty{

    public  function  __construct(){

        parent::__construct();

        $this->setTemplateDir(APPPATH.'views/templates');
        $this->setCompileDir(APPPATH.'views/templates_c');

    }

}
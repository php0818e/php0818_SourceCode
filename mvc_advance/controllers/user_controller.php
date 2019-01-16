<?php
require_once 'controllers/base_controller.php';
class UserController extends BaseController{

	public function __construct(){
		$this->folder = "user";
	}

	public function add(){
		$data = array('name'=>'Admin','age'=>30);
		$this->render('register',$data);
	}

	public function login(){
		$this->render('login');
	}
}
?>
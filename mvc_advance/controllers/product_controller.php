<?php
require_once "controllers/base_controller.php";

class ProductController extends BaseController{
	public function __construct(){
		$this->folder = "product";
	}

	public function index(){

		$this->render("index");
	}


}
?>
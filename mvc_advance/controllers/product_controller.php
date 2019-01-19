<?php
require_once "controllers/base_controller.php";
require_once "models/products.php";

class ProductController extends BaseController{
	public function __construct(){
		$this->folder = "product";
	}

	public function index(){
		//Xuống Model lấy tất cả dữ liệu từ bảng 'products'
		$products = new Products();
		$data = $products->getAllProduct();
		$this->render("index",$data);
	}

	public function detail(){
		$id = $_GET['id'];
		$products = new Products();
		$data = $products->getProductById($id);
		$this->render("detail",$data);
	}


}
?>



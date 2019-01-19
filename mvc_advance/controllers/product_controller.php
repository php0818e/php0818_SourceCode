<?php
require_once "controllers/base_controller.php";

class ProductController extends BaseController
{
    public function __construct()
    {
        $this->foder = "product";
    }

    public function index()
    {
        require_once "models/products.php";
        //Xuống model lấy tất cả dữ liệu từ bảng sản phẩm
        $products = new Products();
        $data = $products->getAllProduct();
        $this->render("index", $data);
    }
}

?>
<?php
require_once "model/Model.php";

class Controller{
	//Tạo một thuộc tính của Controler đại diên
	//Đối tượng Model
	public $model;

	//Tạo một hàm khởi tạo để gán giá trị cho $model
	public function __construct(){
		$this->model = new Model();
	}

	//Tạo phương thức lấy dữ liệu từ Model
	public function invoke(){
		//Kiểm tra sự tồn tại của tham số 'book' trên URL
		//Nếu 'book' tồn tại trên URL, thì
		if(!isset($_GET['book'])){
			//Lấy toàn bô các cuốn sách từ CSDL
			$books = $this->model->getBookList();
			include "view/booklist.php";
		}else{
			//Ngược lại lấy sách theo 'ID'
			$book = $this->model->getBook($_GET['book']);
			include "view/viewbook.php";
		}
	}
}
?>
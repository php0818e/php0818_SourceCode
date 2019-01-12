<?php
require_once "model/Model.php";

class Controller{
	//Tạo một thuộc tính của controller đại diện
	//đối tượng Model
	public $model;

	//Tạo 1 hàm khởi tạo để gán giá trị cho $model
	public function __construct(){
		$this->model = new Model();
	}

	//Tạo một phương thức lấy dữ liệu từ Model
	public function invoke(){
		//Kiểm tra sự tồn tại tại tham số 'book' trên URL
		//Nếu 'book' tồn tại tại trên URL, thì
		if(!isset($_GET['book'])){
			//Lấy toàn bộ dữ liệu các cuốn sách từ CSDL
			$books = $this->model->getBookList();
			include "view/booklist.php";
		}else{
			//Ngược lại lấy sách theo 'id'
			$book = $this->model->getBook($_GET['book']);
			include "view/viewbook.php";
		}
	}
}

?>










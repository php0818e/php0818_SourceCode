<?php
class Model{
	public function getBookList(){
		$dataBooks = array(
			'html'	=> array('Tài liệu HTML','ThoPN','Sách về ngôn ngữ HTML'),
			'css'	=> array('CSS beginner', 'HungPM', 'Dành cho người mới học'),
			'php'	=> array('PHP Advanced', "Tom", "Document PHP")
		);
		return $dataBooks;
	}

	public function getBook($_category){
		$all = $this->getBookList();
		return $all[$_category];
	}
}

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
			echo "Tất cả các quyển sách có trong Thư viện:<br>";
			foreach ($books as $key => $value) {
				echo "<a href='?book=$key'>".$value[0]."</a><br>";
			}
		}else{
			//Ngược lại lấy sách theo 'id'
			$book = $this->model->getBook($_GET['book']);
			echo "Thông tin chi tiết của sách:<br>";

			echo "Tiêu đề: ".$book[0];
			echo "<br>Tác giả: ".$book[1];
			echo "<br>Mô tả chi tiết: ".$book[2];
		}
	}
}

//Khởi tạo đối tượng Controller
$controller = new Controller();

//Truy cập tới phương thức invoke()
$controller->invoke();
?>
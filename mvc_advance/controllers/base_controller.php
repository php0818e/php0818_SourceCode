<?php
class BaseController{
	protected $folder;

	public function render($file, $data = array()){
		$view_file = 'views/'.$this->folder.'/'.$file.'.php';

		//Kiểm tra sự tồn tại của file đã có trong thư mục chưa
		if(is_file($view_file)){
			//Phân rã dữ liệu từ mảng 'data'
			extract($data);
			//Khởi động bộ nhớ của máy tính để lưu trữ dữ liệu
			ob_start();
			require $view_file;
			//Đẩy dữ liệu từ bộ nhớ đệm vào biến '$content'
			$content = ob_get_clean();

			//Require template 'Application' để biểu diễn dữ liệu từ '$content'
			require_once 'views/layouts/application.php';
		}else{
			header("location:index.php?controller=pages&action=error");
		}
	}
}
?>




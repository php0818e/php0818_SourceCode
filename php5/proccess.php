<?php
	//Khởi động session từ phía server
	session_start();

	function checkLogin($user, $pass){
		//Tạo giả lập CSDL dưới dạng 1 mảng
		$listAccount = array(
			array("admin", "123456"),
			array("customer", "123456"),
			array("manager", "123456")
		);

		//B2: Tiến hành so sánh dữ liệu vừa nhận được với dữ liệu từ CSDL
		foreach ($listAccount as $k => $v) {
			if(($v[0] == $user) && ($v[1] == $pass)){
				return true;
				break;
			}
		}
		return false;
	}

	//Kiểm tra người dùng đã kích vào nút "Đăng ký" từ form login hay chưa
	if(isset($_POST['btnLogin'])){
		//Nếu đã kích
		//B1: Tiếp nhận giá trị của txtUser và txtPass truyền từ login sang
		$user = $_POST['txtUser'];
		$pass = $_POST['txtPass'];

		if(checkLogin($user,$pass)==true){
			//Tiến hành tạo phiên làm việc $_SESSION
			$_SESSION['logged_in'] = true;
			$_SESSION['user'] = $user;

			header("location: index.php");
		}else{
			header("location: login.html");
		}
		//echo "<pre>";
		//print_r($listAccount);
	}else{
		//Nếu truy cập trang proccess.php thông qua URL
		header("location: login.html");
	}
?>

















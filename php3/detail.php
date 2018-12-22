<?php
	if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['price']))
	{
		$ma = $_REQUEST['id'];
		$ten = $_GET['name'];
		$gia = $_GET['price'];

		echo "<h3>THÔNG TIN CHI TIẾT SẢN PHẨM</h3>";
		echo "Mã sản phẩm: ". $ma;
		echo "<br>Tên sản phẩm: ". $ten;
		echo "<br>Giá sản phẩm: ". $gia;
	}else{
		//echo "Không có tham số phù hợp!";
		//Điều hướng người dùng về index.php
		header("location: index.php");
	}
	
?>
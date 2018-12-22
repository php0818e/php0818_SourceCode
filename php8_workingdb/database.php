<?php
//Bước 1: Khai báo các thông số của CSDL
$host = "localhost";
$db_name = "EcomDB";
$user = "root";
$pass = "";

//Khởi tạo đối tượng CSDL cần khai thác
try{
	$db = new PDO("mysql:host={$host};dbname={$db_name};charset=utf8",$user,$pass);
}catch(PDOException $ex){
	echo "Lỗi xảy ra trong quá trình kết nối: ". $ex->getMessage();
}

?>
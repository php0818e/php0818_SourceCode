<?php
	//Gọi kết nối CSDL
	require_once "connection.php";

	//Kiểm tra tham số 'controller' trên URL
	if(isset($_GET['controller'])){
		$controller = $_GET['controller'];
		//Kiểm tra tham số 'action' trên URL
		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}else{
			$action = "index";
		}
	}else{
		//Gán controller và action mặc định
		$controller = "pages";
		$action		= "home";
	}

	require_once "routes.php";
	//echo "Controller đang gọi: ".$controller;
	//echo "<br>Action đang gọi: ".$action;
?>
<?php
session_start();

if(isset($_SESSION['logged_in'])){
	//Huỷ phiên làm việc của 'logged_in'
	//session_destroy();
	unset($_SESSION['logged_in']);
	//Điều hướng về index.php
	header("location:index.php");
}else{
	header("location:index.php");
}
?>
<?php
session_start();

if(isset($_COOKIE['username'])){
	//Huỷ cookie 'username'
	setcookie('username', "", time() - 3600);
	//Điều hướng về index.php
	header("location:index.php");
}else{
	header("location:index.php");
}
?>
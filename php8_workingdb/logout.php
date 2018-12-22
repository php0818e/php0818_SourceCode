<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['role']==3){
	unset($_SESSION['logged_in']);
	unset($_SESSION['user']);
	header("location:index.php");

}elseif (isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && ($_SESSION['role']==1 || $_SESSION['role']==2 || $_SESSION['role']==4)) {
	unset($_SESSION['logged_in']);

	unset($_SESSION['user']);

	header("location:login.php");
}
?>
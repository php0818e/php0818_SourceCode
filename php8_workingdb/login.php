<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang đăng nhập</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<?php
	if(isset($_POST['btnLogin'])){
		$u = $_POST['txtUser'];
		$p = $_POST['txtPass'];

		require "database.php";

		$query = "SELECT * FROM account WHERE username=:u AND password=:p LIMIT 0,1";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":u", $u);
		$stmt->bindParam(":p", md5($p));
		$stmt->execute();
		$count = $stmt->rowCount();
		
		if($count>0){
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		 	//Tạo phiên làm việc cho tài khoản đăng nhập thành công
		 	$_SESSION['logged_in'] = true;
		 	$_SESSION['user'] = $row['fullname'];
		 	$_SESSION['role'] = $row['role'];
		 	$_SESSION['accountid'] = $row['accountid'];

		 	if($row['role']==1){
		 		header("location:admin.php");
		 	}elseif($row['role']==2) {
		 		header("location:admin.php");
		 	}elseif($row['role']==4){
		 		header("location:admin.php");
		 	}else{
		 		header("location:checkout.php");
		 	}
		 	
		}

	}
	?>
	<div class="container">
		<h3 class="page-header">Trang đăng nhập</h3>
		<form action="login.php" method="post">
			<table class="table table-bordered table-responsive">
				<tr>
					<td>Tên đăng nhập</td>
					<td><input type="text" name="txtUser" placeholder="Vui lòng nhập tên đăng nhập" class="form-control"></td>
				</tr>
				<tr>
					<td>Mật khẩu</td>
					<td><input type="password" name="txtPass" placeholder="Vui lòng nhập mật khẩu" class="form-control"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="btnLogin" value="Đăng nhập" class="form-control btn btn-success"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
<?php
	session_start();
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['role'] == 3){
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		</head>
		<body>
			<div class="container">
				<h3 class="page-header">THÔNG TIN ĐƠN HÀNG</h3>
				<?php 
				if(isset($_SESSION['cart'])){
					echo "<div>Khách hàng: ".$_SESSION['user']. "</div>";
				?>
				<div>Sản phẩm có trong đơn hàng:</div>
				<table class="table table-hover table-responsive table-bordered">
					<tr>
						<th>Tên sản phẩm</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
					</tr>
					<?php
						$total = 0;
						foreach ($_SESSION['cart'] as $key => $value) {
					?>
						<tr>
							<td><?php echo $value['name']; ?></td>
							<td><?php echo $value['quantity']; ?></td>
							<td><?php echo $value['price']*$value['quantity']; ?></td>
						</tr>
					<?php
						$total += $value['price']*$value['quantity'];
						}
					?>
					<tr>
						<th colspan="2" style="text-align:right">Tổng tiền:</th>
						<td><?echo $total;?></td>
					</tr>
				</table>

				<div class="row">
					<div class="col-xs-12">
						<a href="order.php" class="btn btn-success form-control">Hoàn tất mua hàng</a>
					</div>
				</div>
				<?php
				}else{
					echo "<div class='alert alert-danger'>Không có sản phẩm nào trong giỏ hàng</div>";
				}
				?>
			</div>
		</body>
		</html>
		<?php
		//Hien thi thong tin don hang va thong tin khach hang
	}else{
		//Yeu cau dang nhap hoac chua co tai khoan thi phai dang ky
		echo "<a href='login.php'>Mời bạn đăng nhập</a>";
		echo "Nếu bạn chưa có tài khoản? Kích để ";
		echo "<a href='register.php'>Đăng ký thành viên</a>";
	}
?>
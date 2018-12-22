<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang quản trị</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<?php
	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
	?>

	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				Chào mừng các bạn đến với trang Quản trị
			</div>
			<div class="col-xs-6" style="text-align:right;">
				Xin chào: <?php echo $_SESSION['user']; ?>
				&nbsp;&nbsp; | &nbsp;&nbsp;
				<a href="logout.php">Đăng xuất</a>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-2">
				<ul>
					<li><a href="#">Bảng điều khiển</a></li>
					<li><a href="#">Quản lý sản phẩm</a></li>
					<li><a href="#">Quản lý danh mục</a></li>
					<li><a href="#">Quản lý khách hàng</a></li>
					<li><a href="#">......</a></li>
				</ul>
			</div>
			<div class="col-xs-10">
				<div class="page-header">
					<a href="create.php" class="btn btn-success">Thêm mới</a>
				</div>
				
				<table class="table table-bordered table-hover table-responsive">
					<tr>
						<th>TT</th>
						<th>Tên sản phẩm</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Chức năng</th>
					</tr>
					<?php
					require "database.php";
					$query = "SELECT * FROM products ORDER BY price DESC";
					$stmt = $db->prepare($query);
					$stmt->execute();
					$count = $stmt->rowCount();
					if($count>0){
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
							$id = $row['productid'];
					?>
					<tr>
						<td></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['price'];?></td>
						<td><?php echo $row['quantity'];?></td>
						<td>
							<a href="update.php?id=<?php echo $id;?>" class="btn btn-default">
								<span class="glyphicon glyphicon-pencil"></span>							
							</a>
							<a href="delete.php?id=<?php echo $id;?>" class="btn btn-danger">
								<span class="glyphicon glyphicon-remove"></span>							
							</a>
						</td>
					</tr>
					<?php
						}
					}else{
						echo "<div class='alert alert-danger'>Khong co SP nao</div>";
					}
					?>
				</table>
			</div>
		</div>
	</div>

	<?php
	}else{
		header("location:login.php");
	}
	?>
</body>
</html>
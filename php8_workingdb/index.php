<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
		.item{
			border: 1px solid gray;
		}
	</style>
</head>
<body>
	<?php
	require "database.php";
	$query = "SELECT productid, name, price, quantity, image FROM products ORDER BY price DESC";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$count = $stmt->rowCount();

	//echo "<pre>";
	//print_r($result);exit();
	?>
	<div class="container">
		
		<div class="row page-header">
			<div class="col-xs-6">Danh sách sản phẩm</div>
			<div class="col-xs-6" style="text-align: right;">
				<?php
				if(isset($_SESSION['cart'])){
					echo "<a href='cart.php'>";
					echo "Giỏ hàng (".count($_SESSION['cart']).")";
					echo "</a>";
				}else{
					echo "<a href='cart.php'>";
					echo "Giỏ hàng (0)";
					echo "</a>";


					if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['role'] == 3){

							echo "&nbsp;&nbsp; | &nbsp;&nbsp;";
							echo "Khách hàng:";
							echo "<a href='profile.php'> ";
							echo $_SESSION['user'];
							echo "</a>";
							echo "&nbsp;&nbsp; |<a href='logout.php'> Thoát</a>";
					}else{
						echo "<a href='login.php'>Đăng nhập</a>";
						echo "&nbsp;&nbsp; hoặc &nbsp;&nbsp;";
						echo "<a href='register.php'>Đăng ký</a>";
					}

				}
				?>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-3">Các tiêu chí lọc dữ liệu</div>
			<div class="col-xs-9 container">
				<div class="row">
				<?php
				if($count>0){
					while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					{
						$image = explode(";", $row['image']);

				?>
					<div class="col-xs-3 item">
						<a href="detail.php?id=<?php echo $row['productid'];?>">
						<img src="upload/<?php echo $image[0];?>" alt="" width="100%" height="200px"></a>
						<div><?php echo $row['name'];?></div>
						<div>Giá: <?php echo $row['price'];?></div>
						<div>
							Trạng thái: 
							<?php 
							if($row['quantity']>0){
								echo "<span style='color:green'>Còn hàng</span>";
							}else{
								echo "<span style='color:red'>Hết hàng</span>";
							}
							?>
							
						</div>
					</div>
				<?php
					}
				}else{
					echo '<div class="alert alert-danger">Không có sản phẩm nào</div>';
				}
				?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
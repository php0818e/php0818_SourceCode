<!DOCTYPE html>
<html>
<head>
	<title>Trang chi tiet</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<?php
	//Lay du lieu cua tham so 'id' tu URL
	$id = isset($_GET['id']) ? $_GET['id'] : "";
	if(!empty($id)){
		//Tao truy van
		require "database.php";
		$query = "SELECT * FROM products WHERE productid = :id";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count>0){
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$image = explode(";", $row['image']);
			?>
			<div class="container">
				<h3 class="page-header">Chi tiet san pham</h3>
				<div class="row">

					<div class="col-xs-6">
						<div><img src="<?php echo "upload/".$image[0];?>" width="100%" height="350px"></div>
						<div class="row">
							<?php 
							for($i=0; $i<count($image); $i++){
							?>
								<div class="col-xs-3">
									<img src="<?php echo "upload/".$image[$i];?>" width="100%" height="150px">
								</div>
							<?php
							}
							?>
						</div>
					</div>

					<div class="col-xs-6">
						<h4><?php echo $row['name'];?></h4>
						<div>Gia: <?php echo $row['price'];?></div>
						<div class="row">
							<div class="col-xs-6">
								<button class="form-control btn-success">Mua ngay</button>
							</div>
							<div class="col-xs-6">
								<a href="cart.php?id=<?php echo $row['productid'];?>" class="form-control btn-info">Them vao gio</a>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="container" style="border:1px solid gray;"><?php echo $row['description'];?></div>
			<?php
		}else{
			echo "<div class='alert alert-danger'>Sản phẩm này không tồn tại</div>";
		}
	}else{
		header("location:index.php");
	}
	?>

	

</body>
</html>









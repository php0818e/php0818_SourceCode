<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<?php
	if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == false){
		//Điều hướng về trang đăng nhập
		header("location:login.php");
	}else{

		//Lấy dữ liệu từ Category
		require "database.php";
		$sql = "SELECT categoryid, name FROM category";
		$stmt1 = $db->prepare($sql);
		$stmt1->execute();

		$id = isset($_GET['id']) ? $_GET['id'] : "";
		if(!empty($id)){
			
			$query = "SELECT * FROM products WHERE productid = ?";
			$stmt = $db->prepare($query);
			$stmt->bindParam(1, $id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count>0){
				$r = $stmt->fetch(PDO::FETCH_ASSOC);
	?>
	<div class="container">
		<h3 class="page-header">Chức năng cập nhật sản phẩm</h3>
		<?php
			//Tiếp nhận dữ liệu từ các controls trên Form
			if(isset($_POST['btnUpdate'])){
				//Tạo ra các biến
				$name = $_POST['txtName'];
				$price = $_POST['txtPrice'];
				$quantity = $_POST['txtQuantity'];
				$description = $_POST['txtDescription'];
				$image = $_FILES['image'];

				$categoryid = $_POST['cbCategory'];

				//Lấy tên các file nối lại, phân tách bởi dấu ";"
				$imageStr = implode(";", $_FILES['image']['name']);

				//Xu ly cap nhat xuong CSDL

			}
		?>
		<form action="update.php" method="post" enctype='multipart/form-data'>
			<table class='table table-responsive table-hover table-bordered'>
				<tr>
					<td>Tên sản phẩm</td>
					<td><input type='text' name='txtName' class='form-control' value="<?php echo $r['name'];?>"></td>
				</tr>
				<tr>
					<td>Giá</td>
					<td><input type='text' name='txtPrice' class='form-control' value="<?php echo $r['price'];?>"></td>
				</tr>
				<tr>
					<td>Số lượng</td>
					<td><input type='number' name='txtQuantity' class='form-control' value="<?php echo $r['quantity'];?>"></td>
				</tr>
				<tr>
					<td>Mô tả chi tiết</td>
					<td><textarea name="txtDescription" class='form-control'><?php echo $r['description'];?></textarea></td>
				</tr>
				<tr>
					<td>Hình ảnh</td>
					<td><input type='file' name='image[]' multiple class='form-control'></td>
				</tr>
				<tr>
					<td>Danh mục</td>
					<td>
						<select name='cbCategory' class='form-control'>
							<?php
							while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
							{
								//So sanh giá trị categoryid từ bảng 'products' với giá trị categoryid từ bảng 'category'
								if($r['categoryid'] == $row['categoryid']){
							?>
									<option selected value='<?php echo $row['categoryid'];?>'>
										<?php echo $row['name'];?>
									</option>
							<?php
								}else{
									?>
									<option value='<?php echo $row['categoryid'];?>'>
										<?php echo $row['name'];?>
									</option>
									<?php
								}
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type='submit' name='btnUpdate' value="Cập nhật" class="btn btn-success form-control">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<?php
		}
		}
	}
	?>
</body>
</html>




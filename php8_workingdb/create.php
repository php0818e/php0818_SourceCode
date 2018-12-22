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

	?>
	<div class="container">
		<h3 class="page-header">Chức năng thêm mới sản phẩm</h3>
		<?php
			//Tiếp nhận dữ liệu từ các controls trên Form
			if(isset($_POST['btnAdd'])){
				//Tạo ra các biến
				$name = $_POST['txtName'];
				$price = $_POST['txtPrice'];
				$quantity = $_POST['txtQuantity'];
				$description = $_POST['txtDescription'];
				$image = $_FILES['image'];

				$categoryid = $_POST['cbCategory'];

				//Lấy tên các file nối lại, phân tách bởi dấu ";"
				$imageStr = implode(";", $_FILES['image']['name']);

				//echo "<pre>";
				//print_r($image);exit();

				
				//Bước 2: Tạo truy vấn
				$query = "INSERT INTO products SET name=:n, price=:p, quantity=:q, description =:d, categoryid=:c, image=:i";
				//echo $query;exit();
				//Buoc 3: Prepare cau truy van neu la: INSERT, UPDATE, DELETE
				$stmt = $db->prepare($query);
				//Buoc 4: Truyen gia tri cho cac tham so gia dinh
				$stmt->bindParam(":n", $name);
				$stmt->bindParam(":p", $price);
				$stmt->bindParam(":q", $quantity);
				$stmt->bindParam(":d", $description);
				$stmt->bindParam(":c", $categoryid);
				$stmt->bindParam(":i", $imageStr);

				//Buoc 5: Thuc thi truy van
				if($stmt->execute()){
					//Bóc tác file upload
					//Xác định số lượng file được upload
					$countFile = count($_FILES['image']['name']);
					//Lần lượt di chuyển từng file từ thư mục tạm 'tmp_name' vào thư mục 'upload' củ project
					for($i=0; $i<$countFile; $i++){
						move_uploaded_file($_FILES['image']['tmp_name'][$i], 'upload/'.$_FILES['image']['name'][$i]);
					}
					echo "<div class='alert alert-success'>Them moi san pham thanh cong.</div>";
				}else{
					echo "<div class='alert alert-danger'>Qua trinh them moi that bai.</div>";
				}

			}
		?>
		<form action="create.php" method="post" enctype='multipart/form-data'>
			<table class='table table-responsive table-hover table-bordered'>
				<tr>
					<td>Tên sản phẩm</td>
					<td><input type='text' name='txtName' class='form-control'></td>
				</tr>
				<tr>
					<td>Giá</td>
					<td><input type='text' name='txtPrice' class='form-control'></td>
				</tr>
				<tr>
					<td>Số lượng</td>
					<td><input type='number' name='txtQuantity' class='form-control'></td>
				</tr>
				<tr>
					<td>Mô tả chi tiết</td>
					<td><textarea name="txtDescription" class='form-control'></textarea></td>
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
							while($r = $stmt1->fetch(PDO::FETCH_ASSOC))
							{
							?>
							<option value='<?php echo $r['categoryid'];?>'><?php echo $r['name'];?></option>
							<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type='submit' name='btnAdd' value="Lưu" class="btn btn-success form-control">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<?php
	}
	?>
</body>
</html>




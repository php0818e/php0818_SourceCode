<?php
session_start();

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$quantity = 1;

	//Truy van vao bang 'products' lay du lieu theo id
	require "database.php";
	$sql = "SELECT model, name, price  FROM products WHERE productid = :id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$r[] = $row;

	$item = array(
		$r[0]['model'] 	=> array(
			'name' 		=> $r[0]['name'],
			'price' 	=> $r[0]['price'],
			'quantity'	=> $quantity
		)
	);

	if(!empty($_SESSION['cart'])){
		if(in_array($r[0]['model'], array_keys($_SESSION['cart']))){
			foreach ($_SESSION['cart'] as $k => $v){
				if($r[0]['model'] == $k){
					$_SESSION['cart'][$k]['quantity'] += 1;
				}
			}
		}else{
			$_SESSION['cart'] = array_merge($_SESSION['cart'],$item);
		}
	}else{
		$_SESSION['cart'] = $item;
		
	}

	//echo "<pre>";
	//print_r($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h3 class="page-header">Giỏ hàng</h3>
		<?php 
		if(isset($_SESSION['cart'])){
		?>
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
			<div class="col-xs-6">
				<a href="index.php" class="btn btn-default form-control">Tiếp tục mua hàng</a>
			</div>
			<div class="col-xs-6">
				<a href="checkout.php" class="btn btn-success form-control">Thanh toán</a>
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


















<?php
	//3. Mảng kiểu Multidimentional (Mảng của mảng)
	$productList = array(
		'sp1'	=>	array("Macbook", "Apple", 1, 20),
		'sp2'	=>	array("HP Pavilion", "HP", 2, 30),
		'sp3'	=>	array("Sony Vaio", "Sony", 1, 18)
	);

	//Hiển thị tất cả các mã sản phẩm của '$productList'
?>
	<table border="1">
		<tr>
			<th>Mã SP</th>
			<th>Tên SP</th>
			<th>Hãng</th>
			<th>Số lượng</th>
			<th>Giá</th>
		</tr>
		<?php
		foreach ($productList as $k => $v) {
		?>
		<tr>
			<td><?php echo $k; ?></td>
			<td>
				<a href="<?php echo "detail.php?id=$k&name=$v[0]&price=$v[3]";?>">
					<?php echo $v[0];?>
				</a>
			</td>
			<td><?php echo $v[1];?></td>
			<td><?php echo $v[2];?></td>
			<td><?php echo $v[3];?></td>
		</tr>
		<?php
		}
		?>

	</table>
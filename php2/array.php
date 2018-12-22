<?php
	//Mảng trong PHP: index, association, 
	//                multidimetional
	
	//1. Mảng index (chỉ số): Là mảng chứa các phần tử có cùng kiểu dữ liệu
	//Cú pháp: array(pt1, pt2, ....)
	//Tình huống: Tạo một mảng sản phẩm chứa tên các sản phẩm
	$product = array("IPhone X", "Samsung Note 9", "Oppa");

	//Các thao tác trên mảng:
	//Thêm phần tử mới cho mảng $product
	$product[3] = "Nokia Lumia";

	//Hiển thị tất cả các phẩn tử trong mảng $product
	echo "Các sản phẩm bao gồm: ";
	for($i =0 ; $i < count($product); $i++){
		echo $product[$i]. " ; ";
	}
	

	//2. Mảng Association (Kết hợp): là tập hợp các phần tử, trong đó mỗi phần tử được tổ chức thành 2 phần: key và value
	//Cú pháp: array(key1 => value1, key2 => value2, ....)
	
	//Tình huống: Tạo 1 mảng Danh mục sản phẩm gồm 4 phần tử
	$category = array(
		'd1' 	=> 	"Thời trang",
		'd5'	=>	"Phụ kiện",
		'd3'	=>	"Điện tử",
		'd4'	=>	'Điện lạnh'
	);

	//Thêm một phần tử cho mảng $category
	$category['d2'] = "Đồ cổ";

	echo "<pre>";
	print_r($category);

	//Hiển thị Tên danh mục có mã 'd5'
	echo "<br>". $category["d5"];

	echo "<br> Các danh mục sản phẩm mà cửa hàng kinh doanh:<br>";
?>
	<table border="1" width="100%">
		<tr>
			<th>Ma danh muc</th>
			<th>Ten danh muc</th>
		</tr>
		<?php 
		foreach($category as $k => $v){
		?>
		<tr>
			<td><?php echo $k; ?></td>
			<td><?php echo $v; ?></td>
		</tr>
		<?php
		}
		?>
	</table>

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
			<td><?php echo $v[0];?></td>
			<td><?php echo $v[1];?></td>
			<td><?php echo $v[2];?></td>
			<td><?php echo $v[3];?></td>
		</tr>
		<?php
		}
		?>

	</table>




















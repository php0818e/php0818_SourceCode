<!DOCTYPE html>
<html>
<head>
	<title>Biến trong PHP</title>
</head>
<body>
	<p>
		Họ tên tôi là: 
		<?php
			//Mã PHP sẽ đặt tại đây
			//Khai báo và gán giá trị cho biến
			$fullname = "Phạm Ngọc Thọ";
			$age = 32;
			$gender = true;

			echo $fullname;
			echo "<br>";
			echo "Năm nay tôi: ". $age. " tuổi. <br>";
			echo "Giới tính của tôi là: ". $gender;
		?>

	</p>
</body>
</html>




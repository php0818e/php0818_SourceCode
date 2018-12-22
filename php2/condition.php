<?php
	//1. Cấu trúc điều kiện: IF
	//Tình huống: so sánh giá trị của 2 biến
	$x = 10;
	$y = 20;

	if($x > $y){
		echo "Giá trị của X lớn hơn giá trị của Y";
	}else{
		echo "Giá trị của X nhỏ hơn giá trị của Y";
	}
	
	echo "<br>";
	//2. Cấu trúc điều kiện: SWITCH ... CASE
	$country = "JP";
	switch($country){
		case "VN":
			echo "Bạn là người Việt Nam"; break;
		case "IN":
			echo "Bạn là người Indonesia"; break;
		case "JP":
			echo "Bạn là người Japan"; break;
		default:
			echo "Bạn là người Lao"; break;
	}


	//3. Cấu trúc vòng lặp: FOR, WHILE, DO ... WHILE, FOREACH
	//3.1. FOR
	//Tình huống: Hiển thị 10 số nguyên dương đầu tiên
	echo "<br>10 số nguyên dương đầu tiên: ";
	for($i=1; $i<=10; $i++){
		echo $i. " , ";
	}

	//3.2. WHILE
	//Tình huống: Hiển thị 10 giá trị nguyên dương chẵn đầu tiên.

	echo "<br> 10 giá trị nguyên dương chẵn đầu tiên: ";
	$j = 2;
	while($j<=20){
		echo $j. " , ";
		$j += 2;
	}

	//3.3. DO ... WHILE
	//Tình huống: Hiển thị 10 giá trị nguyên dương chẵn đầu tiên.
	echo"<br> 10 số nguyên dương đầu tiên là :";
	$m = 2;
	do{
		echo $m. " , ";
		$m = $m+2;
	}while($m<22);


	//3.4. FOREACH - Sử dụng trong dữ liệu Mảng (Array)

	$name = array("Quân", "Phong", "Gió", "Vân", "Mây");
	//Hiển thị Tên các phần tử
	for($i = 0; $i<count($name); $i++){
		echo "<br> Thành viên thứ ". ($i+1). " là: ". $name[$i]; 
	}

	echo "<br>";
	$k = 1;
	foreach($name as $value){
		echo "<br> Thành viên thứ ". $k . " là: ". $value;
		$k++;
	}

?>








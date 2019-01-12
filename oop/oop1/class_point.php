<?php
	class Point
	{
		//Khai bao thuoc tinh cho class
		private $x;
		private $y;

		public function __construct($x1=15,$y1=20){
			//$this->x = $x1;
			//$this->y = $y1;
			echo "Điểm ban đầu có toạ độ: (".$x1.",".$y1.")";
		}

		//Phương thức gán giá trị cho 2 thuộc tính của class
		public function setX($_x){
			$this->x = $_x;
		}
		public function setY($_y){
			$this->y = $_y;
		}

		//Phương thức hiển thị dữ liệu của 2 thuộc tính
		public function getX(){
			return $this->x;
		}
		public function getY(){
			return $this->y;
		}

	}

	//Khởi tạo đối tượng có kiểu Point
	$p = new Point(30,45);
	//Tạo ra điểm thứ nhất có toạ độ (x=5, y =10)
	$p->setX(5);
	$p->setY(10);
	echo "<br>Điểm thứ nhất có toạ độ: (".$p->getX().",".$p->getY().")";
	$p->setX(5);
	$p->setY(7);
	echo "<br>Điểm thứ hai có toạ độ: (".$p->getX().",".$p->getY().")";

?>







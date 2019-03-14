<?php
require "human.php";
class son extends human{
	public $age;

	public function __construct($_age){
		parent::__construct(175,"Nguyễn Văn",10000000000);
		$this->age = $_age;
	}
	

	//Tạo  phương thức hien thi thong tin

	public function display(){
		$this->displayInfor();
		echo "<br>Tuổi: ".$this->age."<br>";
		$this->displayAcc();
	}
}

//Thực thi class con
$con = new son(16);
$con->display();

$cha = new human(180,"ABC",10000000);
$cha->displayInfor();
$cha->displayAcc();
?>





<?php
class human{
	public $height;
	public $name;
	protected $account;

	public function __construct($h, $n, $a){
		$this->height = $h;
		$this->name = $n;
		$this->account = $a;
	}

	public function displayInfor(){
		echo "Tên: ".$this->name. "; Chiều cao: ".$this->height."<br>";
	}

	protected function displayAcc(){
		echo "Tiền trong TK:". $this->account."<br>";
	}
}
?>
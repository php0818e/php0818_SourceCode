<?php
require_once "connection.php";

class Products{
	private $productId;
	private $name;
	private $price;
	private $description;
	private $image;

	public function getAllProduct(){
		$result = array();
		$sql = "SELECT productId, name, price, image FROM products";
		$stmt = DB::getInstance()->prepare($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count>0){
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$result[] = $row;
			}
		}

		return $result;
	}



}
?>
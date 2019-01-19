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
		$sql = "SELECT productid, name, price, image FROM products";
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

	public function getProductById($id){
		$sql = "SELECT productid, name, price, image FROM products WHERE productid=?";
		$stmt = DB::getInstance()->prepare($sql);
		$stmt->bindParam(1,$id);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count>0){
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		}

		return $row;
	}


}
?>





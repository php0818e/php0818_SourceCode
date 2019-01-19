<?php
/**
 * Class khởi tạo đối tượng CSDL
 */
class DB
{
	//Khai báo đối tượng CSDL
	private static $instance = NULL;

	public static function getInstance(){
		//Kiểm tra giá trị của đối tượng CSDL 'instance'
		if(!isset(self::$instance)){
			try{
				self::$instance = new PDO("mysql:host=localhost;dbname=EcomDB;charset=utf8","root","");
			}catch(PDOException $e){
				die("Lỗi: ". $e->getMessage());
			}
		}

		return self::$instance;
	}
		
}
?>
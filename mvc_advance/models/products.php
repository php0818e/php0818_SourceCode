<?php
require_once "connection.php";

class Products
{
    private $productid;
    private $name;
    private $price;
    private $description;
    private $image;

    public function getAllProduct()
    {
        $sql="select productid, name, price, image from products ";
        $stmt=DB::getInstance()->prepare($sql);
        $stmt->execute();
        $count=$stmt->rowcount();
        $result=array();
        if($count>0)
        {
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
                $result[]=$row;
            }
        }
        return $result;

    }
}

?>
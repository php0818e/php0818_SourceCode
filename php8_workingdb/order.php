<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['role'] == 3){
			$accountid = $_SESSION['accountid'];

			require "database.php";
			$sql1 = "INSERT INTO orders SET accountid=:acc";
			$stmt1 = $db->prepare($sql1);
			$stmt1->bindParam(":acc", $accountid);

			if($stmt1->execute() == true){
				//Lay orderid vua duoc chen vao bang 'orders'
				$orderid = $db->lastInsertId();
				
				foreach ($_SESSION['cart'] as $k => $v) {
					$model 		= $k;
					$price 		= $v['price'];
					$quantity 	= $v['quantity'];

					$sql2 = "INSERT INTO orderdetail SET orderid=:o, model=:m, unitprice=:u, quantity=:q";
					$stmt2 = $db->prepare($sql2);
					$stmt2->bindParam(":o", $orderid);
					$stmt2->bindParam(":m", $model);
					$stmt2->bindParam(":u", $price);
					$stmt2->bindParam(":q", $quantity);

					$stmt2->execute();
				}

				unset($_SESSION['cart']);
				header("location: message.php");
			}
		}

	?>
</body>
</html>









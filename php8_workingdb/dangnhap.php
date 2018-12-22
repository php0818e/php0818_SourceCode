<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		if(isset($_POST['btnLogin'])){
			$u = $_POST['txtUser'];
			$p = $_POST['txtPass'];

			if(isset($_POST['chkRemember'])){
				$_SESSION['u'] = $u;

				setcookie('tdn', $u, time()+7200);
				setcookie('mk', $p, time()+7200);

				echo "Xin chào: ". $_SESSION['u'];
			}
		}
	?>
</body>
</html>
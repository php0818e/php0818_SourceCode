<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="page-header">
			<div class="row">
				<?php
				if(isset($_COOKIE['username'])){
				?>
					<div class="col-xs-6" style="text-align: left;">
						
					</div>	
					<div class="col-xs-6" style="text-align: right;">
						Xin chào: <?php echo $_COOKIE['username'];?> | 
						<a href="logout.php">Đăng xuất</a>
					</div>	
				<?php
				}else{
				?>
					<div class="col-xs-6" style="text-align: left;">
						<a href="login.html">Đăng nhập</a> | 
						<a href="register.html">Đăng ký</a>
					</div>	
					<div class="col-xs-6" style="text-align: right;">
						
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>

</body>
</html>
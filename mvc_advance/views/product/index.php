<div class="container">
	<div class="row">
		<?php
		foreach($data as $k => $v){
		?>
		<div class="col-xs-3 items">
			<a href="<?php echo PATH;?>/?controller=product&action=detail&id=<?php echo $v['productid'];?>">
				<img src="test.jpg" width="100%" height="200px">
			</a>
			<a href="<?php echo PATH;?>/?controller=product&action=detail&id=<?php echo $v['productid'];?>">
				<div class="name"><?php echo $v['name'];?></div>
			</a>
			<div class="price"><?php echo $v['price'];?></div>
		</div>
		<?php 
		}
		?>
	</div>
</div>
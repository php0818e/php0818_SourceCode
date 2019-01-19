<div class="container">
	<div class="row">
		<?php
		foreach($data as $k => $v){
		?>
		<div class="col-xs-3 items">
			<img src="test.jpg" width="100%" height="200px">
			<div class="name"><?php echo $v['name'];?></div>
			<div class="price"><?php echo $v['price'];?></div>
		</div>
		<?php 
		}
		?>
	</div>
</div>
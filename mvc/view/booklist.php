Tất cả các quyển sách có trong Thư viện:<br>
<?php
foreach ($books as $key => $value) {
	echo "<a href='?book=$key'>".$value[0]."</a><br>";
}
?>
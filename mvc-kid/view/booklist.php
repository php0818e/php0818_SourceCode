Tất cả các cuốn sách có trong thư viện:<br>
<?php
//echo "<pre>";
//print_r($books);

foreach ($books as $key => $value) {
	echo "<a href='?book=$key'>".$value[0]."</a><br>";
}
?>
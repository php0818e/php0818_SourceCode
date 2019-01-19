<?php
//Khai báo controller và action sẽ được tạo ra
$controllers = array(
  //'pages' => ['home', 'error']
  'user'	=> ['add','login','error','index'],
  'product'	=> ['index','detail']
);

//Kiểm tra controller và action xem đã tồn tại trong project chưa
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
	//Nếu chưa thì sẽ gọi controller là 'pages' và action là 'error'
  $controller = 'pages';
  $action = 'error';
}

include_once('controllers/' . $controller . '_controller.php');

$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
?>
<?php
function __autoload($classname){
	include_once("../controllers/$classname.class.php");
}
$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

if (isset($_GET['c'])) {
	if ($_GET['c'] == 'page') {
		$controller = new Page();
	} else if ($_GET['c'] == 'user') {
		$controller = new User();
	} else if ($_GET['c'] == 'admin') {
	    $controller = new Admin();
    }
} else {
	$controller = new Page();
}
$controller->Request($action); //в функцию Request (controller.class.php) передается значение action_act

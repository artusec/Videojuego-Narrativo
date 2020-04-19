<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';

$uri = $_SERVER["REQUEST_URI"];
$username = $_POST["username"];

header("Content-type: text/html");

if (User::borrar_usuario($username)){
	print(0);
}
else{
	print(1);	
}
exit();

# 0 -> Success
# 1 -> Failed
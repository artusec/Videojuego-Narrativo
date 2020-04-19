<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';

$uri = $_SERVER["REQUEST_URI"];
$username = $_POST["username"];
header("Content-type: text/html");

$result = User::guardar_estadisticas($username);
if ($result == false) {
	print(1);
}
else{
	print(0);
}
exit();

# 0 -> Success
# 1 -> Failed
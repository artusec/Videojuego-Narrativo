<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';

$uri = $_SERVER["REQUEST_URI"];
$username = $_POST["username"];
$time = $_POST["time"];
header("Content-type: text/html");

$result = Game::guardar_estadisticas($username, $time);
if ($result == false) {
	print(0);
	exit();
}
print(1);
exit();

# 0 -> Success
# 1 -> Failed
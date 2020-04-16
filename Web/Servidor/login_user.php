<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';

$uri = $_SERVER["REQUEST_URI"];

$username = $_POST["username"];
$pass = $_POST["pass"];

header("Content-type: text/html");

$user = User::login($username, $pass);
if ($user == false) {
	print(1);
	exit();
}

print(0);
exit();

# 0 -> Success
# 1 -> Failed
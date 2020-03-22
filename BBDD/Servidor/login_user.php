<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';

$uri = $_SERVER["REQUEST_URI"];

$username = $_POST["username"];
$pass = $_POST["pass"];

header("Content-type: text/html");

$user = User::login($username, $pass);
if ($user == false) {
	echo "Usuario y/o contraseña incorrectos";
	exit();
}

print "Hola!";
exit();
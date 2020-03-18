<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';

$username = $_POST["username"];
$pass = $_POST["pass"];

if User::login($username, $pass) == false {
	echo "Usuario y/o contraseña incorrectos";
	exit()
}
echo "Hola!";
exit();
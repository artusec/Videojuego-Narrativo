<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';


$username = $_POST["username"];
$pass = $_POST["pass"];

$user = User::login($username, $pass);
if ($user == false) {
	echo "Usuario y/o contraseña incorrectos";
	exit();
}

session_name($username);
session_start();
$_SESSION[$_POST["username"] = $username;

echo "Hola!";
exit();
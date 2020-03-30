<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';

$uri = $_SERVER["REQUEST_URI"];
$username = $_POST["username"];

header("Content-type: text/html");

if (User::borrar_usuario("paco")){
	print("Hecho!");
	exit();
}
print("Algo ha fallado");
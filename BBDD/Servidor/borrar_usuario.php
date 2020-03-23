<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';

$uri = $_SERVER["REQUEST_URI"];
$id_user = $_POST["id_user"];

header("Content-type: text/html");

if (User::borrar_usuario($id_user)){
	print("Hecho!");
	exit();
}
print("Algo ha fallado");
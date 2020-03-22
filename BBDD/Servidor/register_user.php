<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';

$uri = $_SERVER["REQUEST_URI"];

$username = $_POST["username"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$pass2 = $_POST["pass2"];

header("Content-type: text/html");

if (User::find_by_username($username) == false){
	if($pass == $pass2){
			$app = User::insert_user($username, $email, $pass);
			print("Registro realizado con exitoooo!");
			exit();
	}
	print("Las contraseñas no coinciden");
	exit();
}
print("Ya existe un usuario con ese nombre, prueba con otro");
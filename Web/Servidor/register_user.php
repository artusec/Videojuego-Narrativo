<?php

# -----------------------------------------------------------------------------
#								register_user.php 							  |
# -----------------------------------------------------------------------------
#																			  |
# Clase que recibe por POST los siguientes datos de un usuario:				  |
#	- username: nombre de usuario, único									  |
#	- email: email del usuario											      |
#	- pass: contraseña														  |
#	- pass2: contraseña repetida											  |
#																			  |
# Y lo crea en la base de datos si no existe uno igual y si las contraseñas   |
# coinciden.																  |
#																			  |
# 0 -> Success																  |
# 1 -> User duplicated														  |
# 2 -> Pass do not match													  |
#																			  |
# -----------------------------------------------------------------------------

require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';

$uri = $_SERVER["REQUEST_URI"];

$username = $_POST["username"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$pass2 = $_POST["pass2"];

header("Content-type: text/html");

if (User::find_user_by_username($username) == false){
	if($pass == $pass2){
			$app = User::insert_user($username, $email, $pass);
			print(0);
	} else {
		print(2);
	}
} else {
	print(1);
}
exit();

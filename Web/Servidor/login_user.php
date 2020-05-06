<?php

# -----------------------------------------------------------------------------
#							    	login_user.php 							  |
# -----------------------------------------------------------------------------
#																			  |
# Clase que recibe por POST un nombre de usuario y una contraseña y comprueba |
# si son correctos para identificar al usuario.								  |
#																			  |
# 0	-> Success																  |
# 1	-> Failed														  		  |
#																			  |
# -----------------------------------------------------------------------------

require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';

$uri = $_SERVER["REQUEST_URI"];

$username = $_POST["username"];
$pass = $_POST["pass"];

header("Content-type: text/html");

$user = User::login($username, $pass);
if ($user == false) {
	print(1);
}
else{
	print(0);
}
exit();

# 0 -> Success
# 1 -> Failed
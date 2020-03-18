<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';

$username = $_POST["username"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$pass2 = $_POST["pass2"];

if (User::find_by_username($username) == false){
	if($pass == $pass2){
			$app = User::insert_user($username, $email, $pass);
			echo "Registro realizado con exito!";
	}
}
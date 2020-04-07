<?php
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
			exit();
	}
	print(2);
	exit();
}
print(1);
exit();

# 0 -> Success
# 1 -> User duplicated
# 2 -> Pass do not match
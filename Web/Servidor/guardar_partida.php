<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/Game.php';

$uri = $_SERVER["REQUEST_URI"];

$datos = array();

# Pisar la lista entera de objetos con los que nos pasan

# "username" 		-> <username>
# "nombre_objeto" 	-> <tipo>:<estado>
# "time"			-> <tiempo>


header("Content-type: text/html");

# $peticion = "username=paco&llave=1:1&caja=2:2&puerta=2:3.......&time=4,3";

/*$peticion = array(
    "username" 	=> "paco",
    "llave" 	=> "1:1",
    "caja" 		=> "2:3",
    "tabla" 	=> "1:5",
    "time" 		=> "4,2"
);*/

if (Game::guardar_partida_individual($_POST)){
	print(0);
	exit();
}
print(1);
exit();

# 0 -> Success
# 1 -> Failed
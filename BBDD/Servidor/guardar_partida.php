<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/Game.php';

$uri = $_SERVER["REQUEST_URI"];

$datos = array();

# Pisar la lista entera de objetos con los que nos pasan

# "username" -> <username>
# "nombre_objeto" -> <tipo>:<estado>



header("Content-type: text/html");

# $peticion = "username=paco&llave=1:1&caja=2:2&puerta=2:3";

/*$peticion = array(
    "username" => "paco",
    "llave" => "1:1",
    "caja" => "2:3",
    "tabla" => "1:5",
);*/

if (Game::guardar_partida_individual($_POST)){
	print("Hecho!");
	exit();
}
print("Algo ha fallado");
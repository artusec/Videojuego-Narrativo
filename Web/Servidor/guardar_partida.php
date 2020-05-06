<?php

# -----------------------------------------------------------------------------
#								guardar_partida.php 						  |
# -----------------------------------------------------------------------------
#																			  |
# Clase que recibe por POST los siguientes datos en un diccionario:			  |
#																			  |
# "username" 		-> <username>											  |
# "nombre_objeto" 	-> <tipo>:<estado>										  |
# "time"			-> <tiempo>												  |
#																			  |
# Se pueden pasar todos los objetos que se quieran siempre con el mismo       |
# formato.																	  |
#																			  |
# 0 -> Success																  |
# 1 -> Failed																  |
#																			  |
# -----------------------------------------------------------------------------

require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/Game.php';

$uri = $_SERVER["REQUEST_URI"];

$datos = array();

# Pisar la lista entera de objetos con los que nos pasan




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


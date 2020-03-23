<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/Game.php';

$uri = $_SERVER["REQUEST_URI"];
$user = $_POST["username"];

$datos = array();

# En POST debe ser un diccionario con una entrada llamada "username"
# y lo demas informacion del estado de los objetos; 1 -> 2
# objeto 1, estado 2.
foreach($_POST as $clave=>$valor) {
	if($clave == "username"){
		$username = $valor;
	}
	else{
		$datos[$clave] = $valor;
	}
}

header("Content-type: text/html");

#$array = array(
#    1 => 2,
#    2 => 2,
#);

if (Game::guardar_partida_individual($username, $array)){
	print("Hecho!");
	exit();
}
print("Algo ha fallado");
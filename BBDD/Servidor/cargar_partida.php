<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/Game.php';

$uri = $_SERVER["REQUEST_URI"];
$user = $_POST["username"];

$datos = array();
header("Content-type: text/html");
$datos = array();
if ($datos = Game::cargar_partida_individual($user)){
	print("");
	echo "<br>";
	foreach($datos as $clave=>$valor) {
		print($clave."-".$valor."<br>");
	}
	exit();
}
print("Algo ha fallado");
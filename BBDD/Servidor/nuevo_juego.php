<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/Game.php';

$uri = $_SERVER["REQUEST_URI"];
$user = $_POST["username"];
header("Content-type: text/html");
if (Game::inicia_nuevo_juego_individual(1)){
	print("Hecho!");
	exit();
}
print("Algo ha fallado");
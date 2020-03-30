<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/Game.php';

$uri = $_SERVER["REQUEST_URI"];
$username = $_POST["username"];

header("Content-type: text/html");

if (Game::inicia_nuevo_juego_individual("paco")){
	print("Hecho!");
	exit();
}
else{
	print("Algo ha fallado creando el juego");
}
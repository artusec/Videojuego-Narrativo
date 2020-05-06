<?php

# -----------------------------------------------------------------------------
#								nuevo_juego.php 							  |
# -----------------------------------------------------------------------------
#																			  |
# Clase que recibe por POST un nombre de usuario y crea una partida nueva.	  |
#																			  |
# 0 -> Success																  |
# 1 -> Failed																  |
#																			  |
# -----------------------------------------------------------------------------

require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/Game.php';

$uri = $_SERVER["REQUEST_URI"];
$username = $_POST["username"];

header("Content-type: text/html");

if (Game::inicia_nuevo_juego_individual($username)){
	print(0);
}
else{
	print(1);
}
exit();

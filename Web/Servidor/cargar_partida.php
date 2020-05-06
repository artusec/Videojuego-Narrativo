<?php

# -----------------------------------------------------------------------------
#								cargar_partida.php 							  |
# -----------------------------------------------------------------------------
#																			  |
# Clase que recibe por POST un nombre de usuario y devuelve los objetos de la |
# partida actual de un usuario.												  |
#																			  |
# 0--Data 	-> Success														  |
# 1 		-> Failed														  |
#																			  |
# -----------------------------------------------------------------------------

require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/Game.php';

$uri = $_SERVER["REQUEST_URI"];
$user = $_POST["username"];

$datos = array();
header("Content-type: text/html");
$datos = array();
if ($datos = Game::cargar_partida_individual($user)){
	print(0 . "\n");
	foreach($datos as $clave=>$valor) {
		print($clave."-".$valor.",");
	}
	exit();
}
print(1);
exit();


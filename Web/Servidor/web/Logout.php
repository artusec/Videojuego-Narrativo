<?php
	require_once '../DB_data.php';
	unset($_SESSION['nombre']);
	unset($_SESSION['login']);
	unset($_SESSION['id']);
	unset($_SESSION['username']);
	session_destroy();
	require_once __DIR__.'/inicio.php';
?>

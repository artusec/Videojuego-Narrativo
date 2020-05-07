<?php
	require_once '../DB_data.php';
	require_once 'FormularioRegistro.php';
	ob_start();
?>

<!DOCTYPE HTML>
<html lang="ES">
	
	<meta charset="UTF-8">
	<meta name="description" content="ASHED MEMORIES - JUEGO ACCESIBLE - REGISTRAR" >
	<meta name="keywords" content="ACCESIBILIDAD, JUEGO, ASHED, MEMORIES, REGISTAR">
	<meta  name="viewport" content="width=device-width, initial-scale=1.0">  
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
	 <!--- FUENTES DEL TITULO-->
	 <link href='https://fonts.googleapis.com/css?family=Julee' rel='stylesheet'>   

    <link rel="stylesheet" type="text/css" href="loginstyle.css">

    <script src="./js/cookies.js"></script>

<head>
<link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
	<title>Registrar</title>
	<meta charset="utf-8" />
</head>
<body>

		
<header>
<?php
    require_once './generic/header.php';
?>
</header>

	
<main id="main">
	<div class="container-fluid">
	<br aria-hidden="true">
	<br aria-hidden="true">
	<br aria-hidden="true">
	<ol class="breadcrumb" aria-label="breadcrumb">
        <li><a class="bread-link" href="./inicio.php" aira-label="Ir al la página principal">Inicio</a></li>
        <li><a class="bread-link" href="./inicio.php" aira-label="Ir a la página para identificarte y acceder a mi perfil">Acceder</a></li>
        <li class="active" aria-current="page">Minijuego - Simon says</li>        
    </ol>
	<br aria-hidden="true">
		<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
<?php	
		$form = new FormRegistro();
		$form->gestiona();
?>
				</div>
				<div class="col-sm-4"></div>
				<br aria-hidden="true">
				<br aria-hidden="true">
		</div>
		<br aria-hidden="true">
		<br aria-hidden="true">
	</div>
</main>
	
<?php
    require_once  './generic/footer.html';
?>
<script>
<?php
    require_once './js/scripts.js';
    require_once './js/contrasteResto.js';
	ob_end_flush();
?>

</script>
</body>
</html>
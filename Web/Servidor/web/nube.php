<?php
	require_once '../DB_data.php';
	
?>

<!DOCTYPE HTML>
<html lang="ES">


<meta charset="UTF-8">
<meta name="description" content="ASHED MEMORIES - JUEGO ACCESIBLE - NUBE" >
<meta name="keywords" content="ACCESIBILIDAD, JUEGO, ASHED, MEMORIES, NUBE">
<meta  name="viewport" content="width=device-width, initial-scale=1.0">  

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script
			  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
			  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
			  crossorigin="anonymous"></script>


 <!--- FUENTES DEL TITULO-->
 <link href='https://fonts.googleapis.com/css?family=Julee' rel='stylesheet'>   

<link rel="stylesheet" type="text/css" href="minigames.css">

<script src="./js/cookies.js"></script>


<head>
<link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
	<title>Servidor en la nube</title>
		<meta charset="utf-8" />
</head>

<body>
		

<header>
<?php
    require_once './generic/header.php';
?>
<section id="cabecera">
        <div class="row logo">
            <div class="col-lg-4 col-md-12">
                    <div class="Name">
                    <p class="text-center Name-font">ASHED</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12" id="cabecera-logo">
                    <img src="./imagenes/eyebeat.gif" id="Logo" class="hidden" alt="Imagen del logo del juego">
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="Name">
                    <p class="text-center Name-font">MEMORIES</p>
                    </div>
                </div>
        </div>
    </section>
</header>


<main id="main">
    <ol class="breadcrumb" aria-label="breadcrumb">
        <li><a class="bread-link" href="./inicio.php" aira-label="Ir al la página principal">Inicio</a></li>
        <li class="active" aria-current="page">Nube</li>        
    </ol>

    <section  aria-label="La Nube">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                <br aria-hidden="true">
                    <h1 class="text-center">DESARROLLO EN LA NUBE</h1>
                    <br aria-hidden="true">
                    <p>El juego tiene implementado dos sistemas de guardado de tus datos y partidas:</p>

                    <p><strong>- Guardado en local.</strong> Esta opción te permite guardar los datos localmente, de forma que siempre tendrás que jugar en el mismo dispositivo. No tendrás que registrarte y podrás jugar sin conexión a internet.</p>

                    <p><strong>- Guardado en la nube.</strong> Esta opción requiere una conexión a internet y estar registrado en la aplicación. Te permite cambiar de dispositivo y continuar exactamente en el punto donde lo dejaste.</p>

                    <br aria-hidden="true">
                </div>
                <div class="col-md-2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-4">
                    <img src="./imagenes/guardado_nube.png"  alt="Pantalla de ordenador, pantalla de ordenador portátil, tablet y movil conectados a una nube"/>
                </div>
                <div class="col-md-2">
                </div>
            </div>  
            <br aria-hidden="true">
        </div>
    </section>
</main>

<?php
    require_once './generic/footer.html';
?>
<script>

<?php
    require_once './js/scripts.js';
    require_once './js/contrasteInicio.js';
?>

</script>
</body>
</html>
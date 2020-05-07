<?php
	require_once '../DB_data.php';
	require_once 'FormularioLogin.php';
?>

<!DOCTYPE HTML>
<html lang="ES">

<meta charset="UTF-8">
<meta name="description" content="ASHED MEMORIES - JUEGO ACCESIBLE - COOKIES" >
<meta name="keywords" content="ACCESIBILIDAD, JUEGO, ASHED, MEMORIES, COOKIES">
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

  <script
			  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
			  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
			  crossorigin="anonymous"></script>
 

<link rel="stylesheet" type="text/css" href="minigames.css">

<script src="./js/cookies.js"></script>


<head>

<link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
	<title>POLITICA DE COOKIES</title>
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

    
<main>


    <section  aria-label="Accesibilidad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                <br aria-hidden="true">
                <h1 class="text-center">POLITICA DE COOKIES</h1>
                <br aria-hidden="true">
                <p>RELLENAR</p>

                <br aria-hidden="true">
                </div>
                <div class="col-md-2">
                </div>
            </div>
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
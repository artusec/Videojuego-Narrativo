<?php
	require_once '../DB_data.php';
	require_once 'FormularioLogin.php';
?>

<!DOCTYPE HTML>
<html lang="ES">


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

<link rel="stylesheet" type="text/css" href="minigames.css">

<script src="./js/cookies.js"></script>


<head>
<link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
	<title>Accesibilidad</title>
		<meta charset="utf-8" />
</head>

<body>
		

		
<header>
<?php
    require_once './generic/header.php';
?>
</header>

	

    <div class="img-container">
        <div class="row logo">
            <div class="col-md-4">
                <div class="Name">
                <p class="text-center Name-font">ASHED</p>
                </div>
            </div>
            <div class="col-md-4">
                <img src="./imagenes/eyebeat.gif" id="Logo" alt="Imagen del logo del juego">
            </div>
            <div class="col-md-4">
                <div class="Name">
                <p class="text-center Name-font">MEMORIES</p>
                </div>
            </div>
        </div>
    </div> 

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
            <p>&nbsp</p>
            <h1><p class="text-center">ACCESIBLIDAD</p></h1>
            <p>&nbsp</p>
            <p>Lo más habitual al desarrollar aplicaciones accesibles para personas invidentes son los lectores de pantalla. Estos sistemas capturan ciertos gestos simples del usuario facilitando la navegación por los elementos en pantalla. Algunos ejemplos son <a href="https://www.freedomscientific.com/products/software/jaws/"><strong>JAWS</strong></a> para sobremesas, <a href="https://www.apple.com/es/accessibility/iphone/vision/"><strong>Voice Over</strong></a> en dispositivos iOS y <a href="https://support.google.com/accessibility/android/answer/6283677?hl=es"><strong>TalkBack</strong></a> en dispositivos Android. </p>

            <p>En el juego estos gestos son deslizamientos rápidos horizontales para moverte entre los elementos y pulsaciones dobles en la pantalla para acceder o interactuar con el objeto actual.</p>

            <p>Esto requiere que al lanzar la aplicación se indique al usuario que apague su lector de pantalla. Es decir, el juego ya está implementado con los controles accesibles por defecto.</p>

            <p>Las secciones de minijuegos tendrían controles propios, que se explicarían en cada uno.</p>

            <p>&nbsp</p>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 order-lg-1 col-md-2 order-md-1">
            </div>
            <div class="col-lg-4 order-lg-2 col-md-10 order-md-2">
                <img src="./imagenes/accesibilidad1.png"  alt=""/>
            </div>
            <div class="col-lg-4 order-lg-3 col-md-10 order-md-4">
                <img src="./imagenes/accesibilidad2.png"  alt=""/>
            </div>
            <div class="col-lg-2 order-lg-4 col-md-2 order-md-3">
            </div>
        </div>    
    </div>
<?php
    require_once './generic/footer.html';
?>
</body>
<?php
    require_once './js/scripts.js';
?>
</html>
<?php
	require_once '../DB_data.php';
	require_once 'FormularioLogin.php';
?>

<!DOCTYPE HTML>
<html lang="ES">

<meta charset="UTF-8">
<meta name="description" content="ASHED MEMORIES - JUEGO ACCESIBLE - ACCESIBILIDAD" >
<meta name="keywords" content="ACCESIBILIDAD, JUEGO, ASHED, MEMORIES">
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
	<title>Accesibilidad</title>
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

    <ol class="breadcrumb" aria-label="Migas de pan" role="navigation">
        <li><a class="bread-link" href="./inicio.php" aira-label="Ir al la página principal">Inicio</a></li>
        <li class="active" aria-current="page">Accesibilidad</li>        
    </ol>

    <section  aria-label="Accesibilidad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                <br aria-hidden="true">
                <h1 class="text-center">ACCESIBILIDAD</h1>
                <br aria-hidden="true">
                <p>Lo más habitual es que las personas invidentes utilicen lectores de pantalla cuando interactuan con dispositivos móviles. Estos sistemas capturan ciertos gestos simples del usuario facilitando la navegación por los elementos en pantalla. Algunos ejemplos son <a class="links" href="https://www.freedomscientific.com/products/software/jaws/"><strong>JAWS</strong></a> para sobremesas, <a  class="links" href="https://www.apple.com/es/accessibility/iphone/vision/"><strong>Voice Over</strong></a> en dispositivos iOS y <a href="https://support.google.com/accessibility/android/answer/6283677?hl=es"  class="links"><strong>TalkBack</strong></a> en dispositivos Android. </p>

                <p>En el juego estos gestos son deslizamientos rápidos horizontales para moverte entre los elementos y pulsaciones dobles en la pantalla para acceder o interactuar con el objeto actual.</p>

                <p>Esto requiere que al lanzar la aplicación se indique al usuario que apague su lector de pantalla. Es decir, el juego ya está implementado con los controles accesibles por defecto.</p>

                <p>Las secciones de minijuegos tendrían controles propios, que se explicarían en cada uno.</p>

                <br aria-hidden="true">
                </div>
                <div class="col-md-2">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 order-lg-1 col-sm-2 order-sm-1">
                </div>
                <div class="col-lg-4 order-lg-2 col-sm-12 order-sm-2">
                    <img class="minijuegos-img" src="./imagenes/accesibilidad1.png"  alt="Pantalla de movil con una mano tocándola de izquierda a derecha"/>
                </div>
                <div class="col-lg-4 order-lg-3 col-sm-12 order-sm-4">
                    <img class="minijuegos-img" src="./imagenes/accesibilidad2.png"  alt="Pantalla de móvil con una mano tocandola en el centro"/>
                </div>
                <div class="col-lg-2 order-lg-4 col-sm-2 order-sm-3">
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
<?php
	require_once '../DB_data.php';
	require_once 'FormularioLogin.php';
?>

<!DOCTYPE HTML>
<html lang="ES">

<meta charset="UTF-8">
<meta name="description" content="ASHED MEMORIES - JUEGO ACCESIBLE - MINIJUEGO GANZÚA" >
<meta name="keywords" content="ACCESIBILIDAD, JUEGO, ASHED, MEMORIES, GANZÚA">
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
    <title>Ganzua</title>
	<meta charset="utf-8"/>
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

    <ol class="breadcrumb" aria-label="breadcrumb">
        <li><a class="bread-link" href="./inicio.php" aira-label="Ir al la página principal">Inicio</a></li>
        <li class="active" aria-current="page">Minijuego - Ganzúa</li>        
    </ol>

    <section  aria-label="Minijuego de ganzúa">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <br aria-hidden="true">
                    <h1 class="text-center">GANZÚA </h1>
                    <br aria-hidden="true">
                    <h2>Concepto</h2>
                    <p>La idea de este minijuego surgió de las clásicas películas de ladrones, en las que alguien intenta abrir una caja fuerte encontrando la combinación del candado únicamente por sonido. El ladrón coloca la oreja en la puerta y escucha los pequeños “clicks” que hace el candado al ser girado, y cuando el sonido es ligeramente distinto, es que ha encontrado la posición de la combinación. </p>
                    <p>En este pequeño puzle el objetivo del jugador es hallar el punto de desbloqueo del candado de una caja con una ganzúa anteriormente recogida. El minijuego se basa en el apartado sonoro, hay que escuchar y encontrar el sonido distinto en el candado.</p>
                    <p>&nbsp</p>
                    <h2>¿Como se juega?</h2>
                    <p>El jugador deberá deslizar el dedo de forma circular por la pantalla, como si estuviera rotando el objeto. Mientras rotas, sonarán unos pequeños clicks, y en la posición de desbloqueo será distinto. Cuando el jugador encuentre ese click distinto, bastará con levantar el dedo para desbloquear el candado.</p>
                    <br aria-hidden="true"><br aria-hidden="true">
                </div>
                <div class="col-md-2">
                </div>
            </div>
    
            <div class="row">
                <div class="col-lg-2 order-lg-1 col-md-2 order-md-1">
                </div>
                <div class="col-lg-4 order-lg-2 col-md-10 order-md-2">
                    <img class="minijuegos-img" src="./imagenes/ganzua1.png"  alt="Llaves de la caja fuerte"/>
                </div>
                <div class="col-lg-4 order-lg-3 col-md-10 order-md-4">
                    <img class="minijuegos-img" src="./imagenes/ganzua2.png"  alt="Caja fuerte entreabierta"/>
                </div>
                <div class="col-lg-2 order-lg-4 col-md-2 order-md-3">
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
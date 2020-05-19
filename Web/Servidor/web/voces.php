<?php
	require_once '../DB_data.php';
    require_once 'FormularioLogin.php';
    require_once '../Minijuego.php';
?>

<!DOCTYPE HTML>
<html lang="ES">


<meta charset="UTF-8">
<meta name="description" content="ASHED MEMORIES - JUEGO ACCESIBLE - MINIJUEGO VOCES" >
<meta name="keywords" content="ACCESIBILIDAD, JUEGO, ASHED, MEMORIES, VOCES">
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
<script src="./js/starRating.js"></script>


<head>

<link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
	<title>Voces a lo lejos</title>
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
        <li class="active" aria-current="page">Minijuego - Voces</li>        
    </ol>

    <section  aria-label="Minijuego de voces a lo lejos">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <br aria-hidden="true">
                    <h1 class="text-center">VOCES A LO LEJOS</h1>
                    <br aria-hidden="true">
                    <h2>Concepto</h2>
                    <p> La idea principal para el desarrollo de este juego fue la utilización de las propiedades del sonido 3D. Esto se basa en utilizar el sonido de manera que el jugador pudiera percibir el sonido de una manera más directa. Para ello se necesita utilizar auriculares. </p>
                    <p>Con esta idea en mente se optó por realizar un laberinto 3D, en el cual el jugador se va moviendo de manera automática hacia delante hasta llegar a una bifurcación del camino, momento en el cual se le ofrecerá al jugador un sonido procedente del camino correcto. De ese modo el jugador irá avanzando por el camino hasta llegar a la meta.</p>
                    <br aria-hidden="true">
                    <h2>¿Como se juega?</h2>
                    <p>Los controles del minijuego son realmente sencillos y directos. Los únicos movimientos que puede realizar el jugador son deslizamientos hacia la izquierda o hacia la derecha en la pantalla. Cuando el jugador llegue a una bifurcación del camino y se reproduzca el sonido correspondiente, el jugador deberá reconocer si el sonido proviene de su izquierda o de su derecha, y realizar el deslizamiento acorde en la pantalla antes de que el sonido cese de reproducirse. En caso de que el jugador gire hacia el lado erróneo, o tarde demasiado en tomar la decisión, se le restará una vida u oportunidad. En el momento en el que el jugador pierde un total de dos vidas, perderá, y deberá comenzar de nuevo el minijuego desde el principio.</p>
                    <br aria-hidden="true">
                    <br aria-hidden="true">
                </div>
                <div class="col-md-2">
                </div>
            </div>

            <div class="row logo">
                <div class="col-lg-4 col-md-3">
                </div>
                <div class="col-lg-4 col-md-6">
                    <img src="./imagenes/audio.gif"  class="img-width" alt="Imagen de unos cascos auriculares recibiendo sonidos de derecha, izquierda y ambas a la vez"/>
                </div>
                <div class="col-lg-4 col-md-3">
                </div>
                <br aria-hidden="true">
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <?php  if (isset($_SESSION['login']) && $_SESSION['login'] === true){
                            $score = Minijuego::get_puntUM($_SESSION['id'], 'voces');
                            if($score == 0) {
                                echo "
                                <form  id='star_rating' class='rating'>
                                    <legend><h2>Puntúa el minijuego:</h2></legend>
                                        <div id='estrellas'>
                                        <input value='1' id='star1'
                                            type='radio' name='rating' class='visuallyhidden'>
                                        <label for='star1'>
                                            <span class='visuallyhidden'>1 Estrella</span>
                                            <svg viewBox='0 0 512 512'><path d='M512 198.525l-176.89-25.704-79.11-160.291-79.108 160.291-176.892 25.704 128 124.769-30.216 176.176 158.216-83.179 158.216 83.179-30.217-176.176 128.001-124.769z'></path></svg>
                                        </label>

                                        <input value='2' id='star2'
                                            type='radio' name='rating' class='visuallyhidden'>
                                        <label for='star2'>
                                            <span class='visuallyhidden'>2 Estrellas</span>
                                            <svg viewBox='0 0 512 512'><path d='M512 198.525l-176.89-25.704-79.11-160.291-79.108 160.291-176.892 25.704 128 124.769-30.216 176.176 158.216-83.179 158.216 83.179-30.217-176.176 128.001-124.769z'></path></svg>
                                        </label>

                                        <input value='3' id='star3'
                                            type='radio' name='rating' class='visuallyhidden'>
                                        <label for='star3'>
                                            <span class='visuallyhidden'>3 Estrellas</span>
                                            <svg viewBox='0 0 512 512'><path d='M512 198.525l-176.89-25.704-79.11-160.291-79.108 160.291-176.892 25.704 128 124.769-30.216 176.176 158.216-83.179 158.216 83.179-30.217-176.176 128.001-124.769z'></path></svg>
                                        </label>

                                        <input value='4' id='star4'
                                            type='radio' name='rating' class='visuallyhidden'>
                                        <label for='star4'>
                                            <span class='visuallyhidden'>4 Estrellas</span>
                                            <svg viewBox='0 0 512 512'><path d='M512 198.525l-176.89-25.704-79.11-160.291-79.108 160.291-176.892 25.704 128 124.769-30.216 176.176 158.216-83.179 158.216 83.179-30.217-176.176 128.001-124.769z'></path></svg>
                                        </label>

                                        <input value='5' id='star5'
                                            type='radio' name='rating' class='visuallyhidden'>
                                        <label for='star5'>
                                            <span class='visuallyhidden'>5 Estrellas</span>
                                            <svg viewBox='0 0 512 512'><path d='M512 198.525l-176.89-25.704-79.11-160.291-79.108 160.291-176.892 25.704 128 124.769-30.216 176.176 158.216-83.179 158.216 83.179-30.217-176.176 128.001-124.769z'></path></svg>
                                        </label>
                                        </div>
                                        <output></output><img id='sent-img' src='./imagenes/sent.png' alt=''>
                                </form>  ";
                            }
                            else {
                                $html = "<h2>TU PUNTUACION</h2>";
                                $html .= "<div class='rating-done' aria-label='Puntuacion $score sobre 5 '>";
                                for($i=1;$i<=$score;$i++){
                                    $html .='<span>★</span>';
                                }
                                while($i<=5){
                                    $html .='<span>☆</span>';
                                    $i++;
                                }  
                                $html .='</div>';
                                echo $html;
                            }
                }          
                ?>
                </div>
                 
                <div class="col-md-2"></div>
            </div>
            <br aria-hidden="true">  
                <br aria-hidden="true"> 
            <br aria-hidden="true">
        </div>
    </section>
</main>	



<?php
    require_once  './generic/footer.html';
    ?>
 
<script>
<?php
    require_once './js/scripts.js';
    require_once './js/contrasteInicio.js';
?>

var radios = document.querySelectorAll('#star_rating input[type=radio]');
var output = document.querySelector('#star_rating output');


var do_something = function(stars) {

    output.textContent = stars;
    $('#sent-img').css("display", "block");
    var puntuacion = stars[0];
    var url = "ajax/actualizarPuntuacion.php?minijuego=voces&puntuacion=" + puntuacion;
            $.get(url,borrar);
    console.log(puntuacion);

};

</script>
</body>



</html>
<?php
	require_once '../DB_data.php';
    require_once 'FormularioLogin.php';
    require_once '../Minijuego.php';
?>

<!DOCTYPE HTML>
<html lang="ES">

<meta charset="UTF-8">
<meta name="description" content="ASHED MEMORIES - JUEGO ACCESIBLE - MINIJUEGO FORMAS" >
<meta name="keywords" content="ACCESIBILIDAD, JUEGO, ASHED, MEMORIES, FORMAS">
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
	<title>Formas</title>
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
    <ol class="breadcrumb" aria-label="breadcrumb">
        <li><a class="bread-link" href="./inicio.php" aira-label="Ir al la página principal">Inicio</a></li>
        <li class="active" aria-current="page">Minijuego - Formas</li>        
    </ol>

    <section  aria-label="Minijuego de formas">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <br aria-hidden="true">
                    <h1 class="text-center">FORMAS</h1>
                    <br aria-hidden="true">
                    <h2>Concepto</h2>
                    <p>El objetivo de este minijuego es distinguir objetos por medio del tacto, similar a cuando intentamos coger algo en una habitación oscura o rebuscamos en un cajón. No nos queda más remedio que ir palpando los objetos hasta reconocer el que queremos. Con este objetivo se implementó el minijuego, en el cual se presenta una forma en la pantalla solamente reconocible por medio de la vibración. El usuario debe reconocer tres formas distintas para poder continuar. .</p>
                    <br aria-hidden="true">
                    <h2>¿Como se juega?</h2>
                    <p>El jugador deberá ir moviendo el dedo por la pantalla del dispositivo móvil para encontrar las zonas en las que se activa la vibración y las zonas en las que esto no ocurre. Con estos trazados se espera que el jugador se vaya haciendo una idea de la forma estimada que se le ha presentado. Una vez se tenga una idea más o menos clara de qué forma podría ser, el usuario tendrá que hacer doble clic sobre cualquier lado de la pantalla para pasar de la fase de reconocimiento a la fase de selección.</p>
                    <p>En esta nueva fase se desactivan por completo las vibraciones del móvil y se le ofrecen al jugador varias opciones de selección para la forma presentada de las cuales sólo una de ellas es correcta. Además, en la fase de selección también se da la opción de volver a la fase de reconocimiento. Por medio de deslizamientos, el jugador irá moviéndose por las opciones, para finalmente elegir la opción que crea que coincide con la forma que ha reconocido previamente. En el caso de acertar, se avanza al siguiente nivel con una nueva forma a reconocer.</p>
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
                    <img class="minijuegos-img" src="./imagenes/formas.gif" alt="Esfera, cubo y cono rotando"/>
                </div>
                <div class="col-lg-4 col-md-3">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <?php  if (isset($_SESSION['login']) && $_SESSION['login'] === true){
                            $score = Minijuego::get_puntUM($_SESSION['id'], 'formas');
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
    require_once './generic/footer.html';
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
    var url = "ajax/actualizarPuntuacion.php?minijuego=formas&puntuacion=" + puntuacion;
            $.get(url,borrar);
    console.log(puntuacion);

};

</script>
</body>
</html>
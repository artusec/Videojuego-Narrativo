<?php
    require_once '../DB_data.php';
?>

<!DOCTYPE html>
<html lang="es">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="mystyle.css">

    <!--- FUENTES DEL TITULO-->
    <link href='https://fonts.googleapis.com/css?family=Julee' rel='stylesheet'>   
 
    <script
			  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
			  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
			  crossorigin="anonymous"></script>

    <script src="./js/cookies.js"></script>


<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
    <title>ASHED MEMORIES - Inicio</title>
    <meta charset="UTF-8"/>
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
                    <img src="./imagenes/eyebeat.gif" id="Logo"  alt="Imagen del logo del juego">
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="Name">
                    <p class="text-center Name-font">MEMORIES</p>
                    </div>
                </div>
        </div>
    </section>
</header>


<main id="main" >

    <section aria-labelledby="Introducción">
    <div class="container-fluid">

      
        <p>&nbsp</p>
        <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true){
        ?>
        <h1 class="text-center" id='1' >¡TE DAMOS LA BIENVENIDA DE NUEVO, <?php echo $_SESSION['username'] ?>!</h1>
        <p>&nbsp</p>  
        <?php
            }else{  ?>
                <h1><p class="text-center" id='1'>¡TE DAMOS LA BIENVENIDA A ASHED MEMORIES!</p></h1>
                <p>&nbsp</p>  
        <?php    }
        ?>
        <p class="text-center">
            Un videojuego donde tendrás que agudizar el oido y el tacto para escapar de tu propia casa derruida
             y conocer lo que pasó allí tiempo atrás.</p>
        <p>&nbsp</p>
        <p class="text-center">Desarrollado en Unity <img id="unity" alt="" src="./imagenes/unity.png"> para la plataforma Android  <img src="./imagenes/android.png">.</p>

        <p>&nbsp</p>
        
        <div class="col text-center" id='4'>
            <button class="btn btn-danger btn-lg" id="donwload-button"><a id="descarga" aria-label="Descarga Ashed Memories"
             download="AshedMemories.apk" href="./apk/AshedMemories_1.0.apk" alt="">¡Descarga ya!<img src="./imagenes/download.png" alt=""></a></button>
        </div>
        <p>&nbsp</p>

        <div class="text-center " id="agradecimientos"><h2>¡Muchas gracias por confiar en nostros!</h2></div>

        <p>&nbsp</p>
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4 ">    
            <div class="minijuegosOut ">
                    <div class="card cartas-prop">
                        <a href="./accesibilidad.php"><img src="./imagenes/accesibility.png"  class="card-img-top" alt="" aria-label="Leer mas sobre accesibilidad"></a>
                        <div class="card-body">
                            <p class="card-text"><h2>ACCESIBILIDAD</h2></p>
                            <p class="card-text">El juego es accesible de forma nativa ya que imita los movimientos de un lector de pantalla.</p>
                            <a href="./accesibilidad.php" class="leer-mas" aria-label="Leer mas sobre accesibilidad">Leer mas</a>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-4">    
            <div class="minijuegosOut">
                    <div class="card cartas-prop">
                        <a href="./nube.php"> <img src="./imagenes/nube.png"  class="card-img-top "alt="" aria-label="Leer mas sobre la nube"> </a>
                        <div class="card-body">
                            <p class="card-text"><h2>NUBE</h2></p>
                            <p class="card-text">El juego tiene implementado dos sistemas de guardado de tus datos y partidas. Local y en la nube.</p>
                            <a href="./nube.php" class="leer-mas" aria-label="Leer mas sobre la nube">Leer mas</a>
                        </div>
                    </div>
            </div>
        </div>
        </div>
        <div class="col-smd-2"></div>
    </div>
</section>


<section aria-labelledby="Minijuegos" id="minijuegos">
    <div class="container-fluid">
        <p>&nbsp</p>
        <p>&nbsp</p>
        <h1 class="fade-in" id="minijuegos-title"><p class="text-center">¡Conoce los minijuegos!</p></h1>
        <p class="text-center"><img src="./imagenes/jigsaw.png" alt=""></p>
        <p>&nbsp</p>
        <p>&nbsp</p>
            <div class="row">
                <div class="col-sm-4">
                    <div class="minijuegosOut">
                            <div class="card cartas-minijuegos">
                                <a href="./ganzua.php"><img class="card-img-top" src="./imagenes/safe_box.png" alt="" aria-label="Leer mas sobre el minijuego ganzua"></a>
                                <div class="card-body">
                                  <p class="card-text"><h2>GANZUA</h2></p>
                                  <p class="card-text">Hacer círculos con el dedo sobre la pantalla hasta oír el desbloqueo de la caja fuerte.</p>
                                  <a href="./ganzua.php" class="leer-mas" aria-label="Leer mas sobre el minijuego ganzua">Leer mas</a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-sm-4">   
                    <div class="minijuegosOut">
                        <div class="card cartas-minijuegos">
                            <a href="./voces.php"><img class="card-img-top" src="./imagenes/earphone.png" alt="" aria-label="Leer mas sobre el minijuego voces a lo lejos"></a>
                            <div class="card-body">
                            <p class="card-text"><h2>VOCES A LO LEJOS</h2></p>
                            <p class="card-text">Mover el dedo por la pantalla siguiendo unas voces que podrás oír en alguna dirección.</p>
                              <a href="./voces.php" class="leer-mas" aria-label="Leer mas sobre el minijuego voces a lo lejos">Leer mas</a>
                            </div>
                        </div>
                </div>
                </div>
                <div class="col-sm-4">    
                    <div class="minijuegosOut">
                            <div class="card cartas-minijuegos">
                                <a href="./formas.php"><img class="card-img-top" src="./imagenes/geometry.png" alt="" aria-label="Leer mas sobre el minijuego formas"></a>
                                <div class="card-body">
                                <p class="card-text"><h2>FORMAS</h2></p>
                                <p class="card-text">Pasar el dedo por la pantalla y detectar vibraciones para adivinar la forma del objeto escondido.</p>
                                <a href="./formas.php" class="leer-mas" aria-label="Leer mas sobre el minijuego formas">Leer mas</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <p>&nbsp</p>
            <p>&nbsp</p>
            <section>
<div class="container-fluid">
<p>&nbsp</p>
    <p>&nbsp</p>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="ojo">
                <div class="shut">
                    <span></span>
                </div>
                <div class="ball">
                    <div class='eye'>
                        <div class='luz'></div>
                    </div>
                </div>
            </div>
        <div class="col-sm-4"></div>
    </div>
    <p>&nbsp</p>
    <p>&nbsp</p>
    <p>&nbsp</p>
    <p>&nbsp</p>
</div>
</section>
            <p>&nbsp</p>
            <p>&nbsp</p>
            <p>&nbsp</p>
            <div class="row">
            <div class="col-sm-2"></div>
                <div class="col-sm-4">    
                    <div class="minijuegosOut">
                            <div class="card cartas-minijuegos">
                                <a href="./puntos.php"><img class="card-img-top" src="./imagenes/diana.png" alt="" aria-label="Leer mas sobre el minijuego puntos calientes"></a>
                                <div class="card-body">
                                <p class="card-text"><h2>PUNTOS CALIENTES</h2></p>
                                <p class="card-text">Pasar el dedo por la pantalla y detectar zonas de vibración más intensa para encontrar el punto exacto.</p>
                                <a href="./puntos.php" class="leer-mas" aria-label="Leer mas sobre el minijuego puntos calientes">Leer mas</a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-sm-4">    
                    <div class="minijuegosOut">
                            <div class="card cartas-minijuegos">
                                <a href="./simon.php"><img class="card-img-top" src="./imagenes/simondice.png" alt="" aria-label="Leer mas sobre el minijuego formas"></a>
                                <div class="card-body">
                                <p class="card-text"><h2>SIMON SAYS</h2></p>
                                <p class="card-text">Pasar el dedo por la pantalla y jugar al "Simon says" de toda la vida que hemos jugado todos de pequeños.</p>
                                <a href="./simon.php" class="leer-mas" aria-label="Leer mas sobre el minijuego formas">Leer mas</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        <p>&nbsp</p>
        <p>&nbsp</p>
        &nbsp
    </div>
</section>
</main>


<?php
    require_once './generic/footer.html';
?>

<a href="#"  aria-label="Volver al principio de la página" class="back-to-top"><img id="top-icon" src="./imagenes/top.png"></a>

</body>

<script>



<?php
    require_once './js/scripts.js';
    require_once './js/contrasteInicio.js';
?>



 /*BOTON DE IR ARRIBA*/
 $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });

  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });


  /*ANIMACION DEL OJO*/
$("body").mousemove(function(event) {
    var eye = $(".eye");
    var eyex = (eye.offset().left) + (eye.width() / 2);
    var eyey = (eye.offset().top) + (eye.height() / 2);
    var radeye = Math.atan2(event.pageX - eyex, event.pageY - eyey);
    var eyerot = (radeye * (180 / Math.PI) * -1) + 180;
    eye.css({
    '-webkit-transform': 'rotate(' + eyerot + 'deg)',
    '-moz-transform': 'rotate(' + eyerot + 'deg)',
    '-ms-transform': 'rotate(' + eyerot + 'deg)',
    'transform': 'rotate(' + eyerot + 'deg)'
    });
});




/*DIV DE AGRADECIMIENTOS*/

    $("#descarga").click(function() {
        $("#agradecimientos").show( "clip", 1000 );
    });
        
            
            

</script>

</html>
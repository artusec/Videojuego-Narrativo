<?php
    require_once '../DB_data.php';
?>

<!DOCTYPE html>
<html lang="es">
    
    <head>
       
    <meta charset="UTF-8">
    <meta name="description" content="ASHED MEMORIES - JUEGO ACCESIBLE" >
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

    <link rel="stylesheet" type="text/css" href="mystyle.css">

    <!--- FUENTES DEL TITULO-->
    <link href='https://fonts.googleapis.com/css?family=Julee' rel='stylesheet'>   

    <script
            src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
            integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
            crossorigin="anonymous"></script>

    <script src="./js/cookies.js"></script>
    <script src="./js/contrasteInicio.js"></script>
    <script src="./js/scripts.js"></script>
   
    <link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
    <title>ASHED MEMORIES - Inicio</title>
    
</head>



<body>


<header>
<?php
    require_once './generic/header.php';
?>

<section aria-label="Cabecera" id="cabecera">
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

    <?php if(!isset($_COOKIE["cookie"])) { ?>

    <div class="modal fade in" id="myModal" role="dialog" aria-labelledby="titulo-modal">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center align-items-center">
            <p class="modal-title" id="titulo-modal">POLITICA DE COOKIES</p>
            </div>
            
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <p class="pt-3 pr-2 ">Utilizamos cookies para mejorar la experiencia en la web.</p>
                    <br aria-hidden="true"> <br aria-hidden="true"> <br aria-hidden="true"> <br aria-hidden="true">
                    <a role="button" class="btn btn-purple " aria-label="Leer mas sobre cookies" href="./cookies.php">Leer mas </a>
                    &nbsp
                    &nbsp
                    <a role="button" class="btn btn-purple" data-dismiss="modal" aria-label="Vale, gracias" href="" onclick='activarCookie();'>Ok, gracias</a>
                    <br aria-hidden="true"> <br aria-hidden="true"> <br aria-hidden="true"> <br aria-hidden="true">
                </div>
            </div>

        </div>
        </div>
    </div>

    <?php } ?>

 

<section aria-label="Introducción">
    <div class="container-fluid">
    <br aria-hidden="true">
        <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true){
        ?>
        <h1 class="text-center" id='1' >¡TE DAMOS LA BIENVENIDA DE NUEVO, <?php echo $_SESSION['username'] ?>!</h1>
        <br aria-hidden="true"> 
        <?php
            }else{  ?>
                <h1 class="text-center" id='1'>¡TE DAMOS LA BIENVENIDA A ASHED MEMORIES!</h1>
                <br aria-hidden="true"> 
        <?php    }
        ?>
        <p class="text-center">
            Un videojuego donde tendrás que agudizar el oido y el tacto para escapar de tu propia casa derruida
             y conocer lo que pasó allí tiempo atrás.</p>
        <br aria-hidden="true">
        <p class="text-center">Desarrollado en Unity <img id="unity" alt="" src="./imagenes/unity.png"> para la plataforma Android  <img src="./imagenes/android.png" alt="">.</p>

        <br aria-hidden="true">
        <div class="col text-center" id='4'>
            <a role="button"  class="btn btn-danger btn-lg" id="descarga" aria-label="Descarga Ashed Memories"
             download="AshedMemories.apk" href="./apk/AshedMemories_1.0.apk" >¡Descarga ya!<img src="./imagenes/download.png" alt=""></a>
        </div>
        <br aria-hidden="true">

        <div class="text-center " id="agradecimientos"><h2>¡Muchas gracias por confiar en nostros!</h2></div>

        <br aria-hidden="true">

        <div class="row">
        <div class="col-lg-2 col-md-0"></div>
        <div class=" col-lg-4 col-md-6">    
            <div class="minijuegosOut ">
                    <div class="card cartas-prop">
                        <a href="./accesibilidad.php" ><img src="./imagenes/accesibility.png"  class="card-img-top" alt="Pantalla de ordenador con un  simbolo de tick" aria-label="Leer mas sobre accesibilidad"></a>
                        <div class="card-body">
                            <h2 class="card-text">ACCESIBILIDAD</h2>
                            <p class="card-text">El juego es accesible de forma nativa ya que imita los movimientos de un lector de pantalla.No hace falta fotfware extra de ningún tipo.</p>
                            <a href="./accesibilidad.php" class="leer-mas" aria-label="Leer mas sobre accesibilidad">Leer mas</a>
                        </div>
                    </div>
            </div>
        </div>
     
        <div class="col-lg-4 col-md-6">   
            <div class="minijuegosOut">
                    <div class="card cartas-prop">
                        <a href="./nube.php" > <img src="./imagenes/nube.png"   class="card-img-top" alt="Movil y ordenador conectados mediante un acable a una nube" aria-label="Leer mas sobre la nube"> </a>
                        <div class="card-body">
                            <h2 class="card-text">NUBE</h2>
                            <p class="card-text">El juego tiene implementado dos sistemas de guardado de tus datos y partidas. Local y en la nube.</p>
                                <a href="./nube.php" class="leer-mas" aria-label="Leer mas sobre la nube">Leer mas</a>
                        </div>
                    </div>
            </div>
        </div>
        </div>
        <div class="col-lg-2 col-md-0">
        </div>
    </div>
</section>


<section aria-label="Minijuegos" id="minijuegos">
    <div class="container-fluid">
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
        <h1 class=" text-center fade-in" id="minijuegos-title">¡Conoce los minijuegos!</h1>
        <p class="text-center"><img src="./imagenes/jigsaw.png" alt=""></p>
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
        <div class="row">
            <div class="col-sm-4">
                <div class="minijuegosOut">
                    <div class="card cartas-minijuegos">
                        <a href="./ganzua.php" ><img class="card-img-top"  src="./imagenes/safe_box.png" alt="Caja fuerte" aria-label="Leer mas sobre el minijuego ganzua"></a>
                        <div class="card-body">
                            <h2 class="card-text">GANZUA</h2>
                            <p class="card-text">Hacer círculos con el dedo sobre la pantalla hasta oír el desbloqueo de la caja fuerte.</p>
                            <br aria-hidden="true">
                            <a href="./ganzua.php" class="leer-mas" aria-label="Leer mas sobre el minijuego ganzua">Leer mas</a>
                            <div  class="puntuacion">
                            &nbsp Puntuación
                                <div class="rating">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-sm-4">   
                <div class="minijuegosOut">
                    <div class="card cartas-minijuegos">
                        <a href="./voces.php"><img class="card-img-top"  src="./imagenes/earphone.png" alt="auriculares emitiendo audio" aria-label="Leer mas sobre el minijuego voces a lo lejos"></a>
                        <div class="card-body">
                            <h2 class="card-text">VOCES A LO LEJOS</h2>
                            <p class="card-text">Mover el dedo por la pantalla siguiendo unas voces que podrás oír en alguna dirección.</p>
                            <br aria-hidden="true">
                            <a href="./voces.php" class="leer-mas" aria-label="Leer mas sobre el minijuego voces a lo lejos">Leer mas</a>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-sm-4">    
                <div class="minijuegosOut">
                    <div class="card cartas-minijuegos">
                        <a href="./formas.php" ><img class="card-img-top"  src="./imagenes/geometry.png" alt="Froma de un cubo, un cono y una esfera" aria-label="Leer mas sobre el minijuego formas"></a>
                        <div class="card-body">
                            <h2 class="card-text">FORMAS</h2>
                            <p class="card-text">Usando el dedo deberas detectar vibraciones para adivinar la forma del objeto escondido.</p>
                            <br aria-hidden="true">
                            <a href="./formas.php" class="leer-mas" aria-label="Leer mas sobre el minijuego formas">Leer mas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
             
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="ojo" role="presentation">
                    <div class="shut">
                        <span></span>
                    </div>
                    <div class="ball">
                        <div class='eye'>
                            <div class='luz'></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
            <br aria-hidden="true">
            <br aria-hidden="true">
            <br aria-hidden="true">
            <br aria-hidden="true">
        </div>
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">

        <div class="row">
            <div class="col-lg-2 col-md-1 col-sm-2"></div>
            <div class="col-lg-4 col-md-5 col-sm-4">    
                <div class="minijuegosOut">
                    <div class="card cartas-minijuegos">
                        <a href="./puntos.php" ><img class="card-img-top"  src="./imagenes/diana.png" alt="Diana con una flecha clavada en el centro" aria-label="Leer mas sobre el minijuego puntos calientes"></a>
                        <div class="card-body">
                            <h2 class="card-text">PUNTOS CALIENTES</h2>
                            <p class="card-text">Pasar el dedo por la pantalla y detectar zonas de vibración más intensa para encontrar el punto exacto.</p>
                            <a href="./puntos.php" class="leer-mas" aria-label="Leer mas sobre el minijuego puntos calientes">Leer mas</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 col-sm-4">    
                <div class="minijuegosOut">
                    <div class="card cartas-minijuegos">
                        <a href="./simon.php" ><img class="card-img-top" src="./imagenes/simondice.png" alt="Circunferencia con cuatro divisiones que representas los colores rojo, azul amarillo y verde" aria-label="Leer mas sobre el minijuego formas"></a>
                        <div class="card-body">
                            <h2 class="card-text">SIMON SAYS</h2>
                            <p class="card-text">Pasar el dedo por la pantalla y jugar al "Simon says" de toda la vida que hemos jugado todos de pequeños.</p>
                            <a href="./simon.php" class="leer-mas" aria-label="Leer mas sobre el minijuego formas">Leer mas</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md- col-sm-2"></div>
        </div>
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
        <br aria-hidden="true">
    </div>
</section>
</main>


<?php
    require_once './generic/footer.html';
?>

<a href="#"  aria-label="Volver al principio de la página" class="back-to-top"><img id="top-icon" src="./imagenes/top.png" alt=""></a>



<script>



function activarCookie() {
    setCookie("cookie", 1, 1);
}



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
    }, 1000, 'linear');
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
</body>

</html>
<?php
    require_once __DIR__ . '/DB_data.php';
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

    <script src="./cookies.js"></script>


<head>
    <link rel="icon" type="image/x-icon" href="./web/imagenes/favicon.ico" />
    <title>ASHED MEMORIES - Inicio</title>
    <meta charset="UTF-8"/>
</head>

<body>


    <nav title="Menu horizontal">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#1">Introduccion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#3">Minijuegos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#4">Descarga</a>
            </li>
<?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true){
?>
                <li class="nav-item">
                    <a class="nav-link" href="./web/MiPerfil.php">Mi perfil</a>
                </li>
                <li>
                    <a class="nav-link" href="./Logout.php">Cerrar Sesion</a>
                </li>
<?php
            } else {
?>
                <li class="nav-item">
                    <a class="nav-link" href="./web/Login.php">Acceder</a>
                </li>
<?php
            }
?>             
                <li class="nav-item">
                    <a class="nav-link"  onclick="modoAltoContraste()">Modo Alto Contraste</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"  onclick="modoNormal()">Modo Normal</a>
                </li>
                <li class="nav-item">
                     <label class="switch" for="mode">
                        <input type="checkbox" id="mode" checked> 
                            <span class="slider round"></span>
                    </label>               
                </li>
        </ul>
    </nav>


    <div class="img-container">
        <div class="row logo">
            <div class="col-sm-4">
                <div class="Name">
                <p class="text-center">ASHED</p>
                </div>
            </div>
            <div class="col-sm-4">
                <img src="./web/imagenes/eyebeat.gif" id="Logo" alt="Imagen del logo del juego">
            </div>
            <div class="col-sm-4">
                <div class="Name">
                <p class="text-center">MEMORIES</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <p>&nbsp</p>
        <div class="col text-center" id='4'>
            <button class="btn btn-danger btn-lg"><a download="AshenMemories" href="./web/apk/EscapeRoom_0.64.apk" alt="">Descarga ya! <img src="./web/imagenes/download.png" alt=""></a></button>
        </div>
        <p>&nbsp</p>
        <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true){
        ?>
        <h1 class="Title-1" id='1'>¡Te damos la bienvenida a ASHED MEMORIES, <?php echo $_SESSION['username'] ?>!</h1>
        <p>&nbsp</p>  
        <?php
            }else{  ?>
                <h1 class="Title-1" id='1'>¡Te damos la bienvenida a ASHED MEMORIES!</h1>
                <p>&nbsp</p>  
        <?php    }
        ?>
        <p class="text-center">Un videojuego donde tendrás que agudizar el oido y el tacto para escapar de tu propia casa derruida y conocer lo que pasó allí tiempo atrás. </p>
        <p>&nbsp</p>
        <p>&nbsp</p>

        <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">    
            <div class="minijuegosOut">
                    <div class="card">
                        <img src="./web/imagenes/accesibility.png"  class="card-img-top "alt="">
                        <div class="card-body">
                            <p class="card-text">ACCESIBILIDAD</p>
                            <p class="card-text">Pasar el dedo por la pantalla y detectar vibraciones para adivinar la forma del objeto escondido.</p>
                            <a src="" aria-label="Leer mas sobre el minijuego formas">Leer mas</a>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-sm-3">    
            <div class="minijuegosOut">
                    <div class="card">
                        <img src="./web/imagenes/nube.png"  class="card-img-top" alt="">
                        <div class="card-body">
                            <p class="card-text">NUBE</p>
                            <p class="card-text">Pasar el dedo por la pantalla y detectar vibraciones para adivinar la forma del objeto escondido.</p>
                            <a src="" aria-label="Leer mas sobre el minijuego formas">Leer mas</a>
                        </div>
                    </div>
            </div>
        </div>
        </div>
        <div class="col-sm-3"></div>
    </div>


    <div class="container-fluid">
        <p>&nbsp</p>
        <p>&nbsp</p>
        <h1 class="Title-1" id="3">¡Conoce los minijuegos!</h1>
        <p class="text-center"><img src="./web/imagenes/jigsaw.png" alt=""></p>
        <p>&nbsp</p>
        <p>&nbsp</p>
            <div class="row">
                <div class="col-sm-4">
                    <div class="minijuegosOut">
                            <div class="card">
                                <img class="card-img-top" src="./web/imagenes/safe_box.png" alt="">
                                <div class="card-body">
                                  <p class="card-text">GANZUA</p>
                                  <p class="card-text">Hacer circulos con el dedo sobre la pantalla hasta oir el desbloqueo de la caja fuerte.</p>
                                  <a src="" aria-label="Leer mas sobre el minijuego ganzua">Leer mas</a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-sm-4">   
                    <div class="minijuegosOut">
                        <div class="card">
                            <img class="card-img-top" src="./web/imagenes/earphone.png" alt="">
                            <div class="card-body">
                            <p class="card-text">VOCES A LO LEJOS</p>
                            <p class="card-text">Mover el dedo por la pantalla en la siguiendo unas voces que podrás oir en alguna dirección.</p>
                              <a src="" aria-label="Leer mas sobre el minijuego voces a lo lejos">Leer mas</a>
                            </div>
                        </div>
                </div>
                </div>
                <div class="col-sm-4">    
                    <div class="minijuegosOut">
                            <div class="card">
                                <img class="card-img-top" src="./web/imagenes/geometry.png" alt="">
                                <div class="card-body">
                                <p class="card-text">FORMAS</p>
                                <p class="card-text">Pasar el dedo por la pantalla y detectar vibraciones para adivinar la forma del objeto escondido.</p>
                                <a src="" aria-label="Leer mas sobre el minijuego formas">Leer mas</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <p>&nbsp</p>
            <p>&nbsp</p>
            <p>&nbsp</p>
            <div class="row">
            <div class="col-sm-2"></div>
                <div class="col-sm-4">    
                    <div class="minijuegosOut">
                            <div class="card">
                                <img class="card-img-top" src="./web/imagenes/diana.png" alt="">
                                <div class="card-body">
                                <p class="card-text">PUNTOS CALIENTES</p>
                                <p class="card-text">Pasar el dedo por la pantalla y detectar zonas de vibración más intensa para encontrar el punto exacto.</p>
                                <a src="" aria-label="Leer mas sobre el minijuego puntos calientes">Leer mas</a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-sm-4">    
                    <div class="minijuegosOut">
                            <div class="card">
                                <img class="card-img-top" src="./web/imagenes/simondice.png" alt="">
                                <div class="card-body">
                                <p class="card-text">SIMON SAYS</p>
                                <p class="card-text">Pasar el dedo por la pantalla y jugar al simon dice de toda la vida que hemos jugado todos de pequeños.</p>
                                <a src="" aria-label="Leer mas sobre el minijuego formas">Leer mas</a>
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
<?php
    require_once __DIR__ . '/web/footer.html';
?>
</body>
<script>

        $( document ).ready(function() {
            if (detectCookie("accesibility")){
            modoAltoContraste();
        }
        else{
            modoNormal();
        }
        });


        function modoAltoContraste(){

            //Poner el menu a contraste alto
            $(".nav").css({"background-color": "black"});
            $("a").css({"color": "yellow"});
        

            //Poner ela pagina a alto contraste 
            $(".container-fluid").css({"background-color": "black","color":"yellow"});

            //Poner el footer a alto contraste 
            $(".page-footer").css({"background-color": "black","color":"yellow"});
            $(".list-group-item").css({"background-color": "black","color":"yellow"});

            setCookie("accesibility", 1, 1);
  
        }

        function modoNormal(){
            //Volver a modo normal 
            $(".nav").css({"background-color": "#591D77"});
            $("a").css({"color": "#F2F1EF"});

            $(".container-fluid").css({"background-color": "#9932CC","color":"#fefefe"});

            $(".page-footer").css({"background-color": "#591D77","color":"#fefefe"});
            $(".list-group-item").css({"background-color": "#9932CC","color":"#fefefe"});

            removeCookie("accesibility");
        }

        $('#mode').change(function() {
            if(this.checked) { 
                console.log("change");
                modoNormal();
            }
            else{
                modoAltoContraste();
            }
        });



</script>
</html>
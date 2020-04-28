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
 
    

    <script src="./js/cookies.js"></script>


<head>
    <link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
    <title>ASHED MEMORIES - Inicio</title>
    <meta charset="UTF-8"/>
</head>

<body>


<?php
    require_once './generic/header.php';
?>


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
        <p>&nbsp</p>
        <div class="col text-center" id='4'>
            <button class="btn btn-danger btn-lg" id="donwload-button"><a id="descarga" download="AshenMemories" href="./apk/EscapeRoom_0.64.apk" alt="">Descarga ya! <img src="./imagenes/download.png" alt=""></a></button>
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
                        <a href="./accesibilidad.php"> <img src="./imagenes/accesibility.png"  class="card-img-top "alt=""> </a>
                        <div class="card-body">
                            <p class="card-text">ACCESIBILIDAD</p>
                            <p class="card-text">Pasar el dedo por la pantalla y detectar vibraciones para adivinar la forma del objeto escondido.</p>
                            <a href="./accesibilidad.php" class="leer-mas" aria-label="Leer mas sobre accesibilidad">Leer mas</a>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-sm-3">    
            <div class="minijuegosOut">
                    <div class="card">
                        <a href="./nube.php"> <img src="./imagenes/nube.png"  class="card-img-top "alt=""> </a>
                        <div class="card-body">
                            <p class="card-text">NUBE</p>
                            <p class="card-text">Pasar el dedo por la pantalla y detectar vibraciones para adivinar la forma del objeto escondido.</p>
                            <a href="./nube.php" class="leer-mas" aria-label="Leer mas sobre la nube">Leer mas</a>
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
        <p class="text-center"><img src="./imagenes/jigsaw.png" alt=""></p>
        <p>&nbsp</p>
        <p>&nbsp</p>
            <div class="row">
                <div class="col-sm-4">
                    <div class="minijuegosOut">
                            <div class="card">
                                <a href="./ganzua.php"><img class="card-img-top" src="./imagenes/safe_box.png" alt=""></a>
                                <div class="card-body">
                                  <p class="card-text">GANZUA</p>
                                  <p class="card-text">Hacer circulos con el dedo sobre la pantalla hasta oir el desbloqueo de la caja fuerte.</p>
                                  <a href="./ganzua.php" class="leer-mas" aria-label="Leer mas sobre el minijuego ganzua">Leer mas</a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-sm-4">   
                    <div class="minijuegosOut">
                        <div class="card">
                            <a href="./voces.php"><img class="card-img-top" src="./imagenes/earphone.png" alt=""></a>
                            <div class="card-body">
                            <p class="card-text">VOCES A LO LEJOS</p>
                            <p class="card-text">Mover el dedo por la pantalla en la siguiendo unas voces que podrás oir en alguna dirección.</p>
                              <a href="./voces.php" class="leer-mas" aria-label="Leer mas sobre el minijuego voces a lo lejos">Leer mas</a>
                            </div>
                        </div>
                </div>
                </div>
                <div class="col-sm-4">    
                    <div class="minijuegosOut">
                            <div class="card">
                                <a href="./formas.php"><img class="card-img-top" src="./imagenes/geometry.png" alt=""></a>
                                <div class="card-body">
                                <p class="card-text">FORMAS</p>
                                <p class="card-text">Pasar el dedo por la pantalla y detectar vibraciones para adivinar la forma del objeto escondido.</p>
                                <a href="./formas.php" class="leer-mas" aria-label="Leer mas sobre el minijuego formas">Leer mas</a>
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
                                <a href="./puntos.php"><img class="card-img-top" src="./imagenes/diana.png" alt=""></a>
                                <div class="card-body">
                                <p class="card-text">PUNTOS CALIENTES</p>
                                <p class="card-text">Pasar el dedo por la pantalla y detectar zonas de vibración más intensa para encontrar el punto exacto.</p>
                                <a href="./puntos.php" class="leer-mas" aria-label="Leer mas sobre el minijuego puntos calientes">Leer mas</a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-sm-4">    
                    <div class="minijuegosOut">
                            <div class="card">
                                <a href="./simon.php"><img class="card-img-top" src="./imagenes/simondice.png" alt=""></a>
                                <div class="card-body">
                                <p class="card-text">SIMON SAYS</p>
                                <p class="card-text">Pasar el dedo por la pantalla y jugar al simon dice de toda la vida que hemos jugado todos de pequeños.</p>
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
<?php
    require_once './generic/footer.html';
?>
</body>
<?php
    require_once './js/scripts.js';
?>
</html>
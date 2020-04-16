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

<head>
    <title>Videojuego Narrativo - Inicio</title>
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
                
        </ul>
    </nav>


    <div class="img-container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <img src="logo.png" id="Logo" alt="Imagen del logo del juego">
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

   

    <div class="container-fluid">
        <p>&nbsp</p>



        <div class="col text-center" id='4'>
            <button class="btn btn-danger btn-lg"><a download="app" href="logo.png" alt="">Descarga ya!</a></button>
        </div>



        <p>&nbsp</p>
        <p>&nbsp</p>

            <h1 class="Title-1" id='1'>Introducción</h1>
            <p>&nbsp</p>

            <p class="text-center">¡Te damos la bienvenida a [NOMBRE]!</p>
            <p>&nbsp</p>
            <p class="text-center">Un videojuego donde tendrás que agudizar el oido y el tacto para escapar de tu propia casa derruida y conocer lo que pasó allí tiempo atrás. </p>
			<p>&nbsp</p>


            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                    <img src="logo.png" class="rounded" alt="Hola hola Probando">
                </div>
                <div class="col-sm-3">
                    <img src="logo.png" class="rounded" alt="Hola hola Probando">
                </div>
                <div class="col-sm-3"></div>
            </div>
    </div>



    <div class="container-fluid">
        
        <p>&nbsp</p>
        <p>&nbsp</p>
        
        <h1 class="Title-1" id="3">¡Conoce los minijuegos!</h1>
        
        <p>&nbsp</p>
        <p>&nbsp</p>


            <div class="row">

                <div class="col-sm-4">     
                    
                    <div class="minijuegosOut">
                            <div class="card">
                                <img class="card-img-top" src="logo.png" alt="Card image cap">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a src="" aria-label="Leer mas sobre el minijuego numero3">Leer mas</a>
                                </div>
                            </div>
                    </div>

                </div>
                <div class="col-sm-4">   
                   
                    <div class="minijuegosOut">
                        <div class="card">
                            <img class="card-img-top" src="logo.png" alt="Card image cap">
                            <div class="card-body">
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <a src="" aria-label="Leer mas sobre el minijuego numero3">Leer mas</a>

                            </div>
                        </div>

                </div>
                </div>
                <div class="col-sm-4">    

                    <div class="minijuegosOut">
                            <div class="card">
                                <img class="card-img-top" src="logo.png" alt="Card image cap">
                                <div class="card-body">
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a src="" aria-label="Leer mas sobre el minijuego numero3">Leer mas</a>
                                </div>
                            </div>
                    </div>

                </div>

            </div>
        <p>&nbsp</p>
        <p>&nbsp</p>
        &nbsp
    </div>



<?php
    require_once __DIR__ . '/web/footer.html';
?>
 


</body>
<script>

        function modoAltoContraste(){


            //Poner el menu a contraste alto
            $(".nav").css({"background-color": "black"});
            $("a").css({"color": "yellow"});
        

            //Poner ela pagina a alto contraste 
            $(".container-fluid").css({"background-color": "black","color":"yellow"});

            //Poner el footer a alto contraste 
            $(".page-footer").css({"background-color": "black","color":"yellow"});
            $(".list-group-item").css({"background-color": "black","color":"yellow"});
            

        }

        function modoNormal(){
            //Volver a modo normal 
            $(".nav").css({"background-color": "#591D77"});
            $("a").css({"color": "#F2F1EF"});

            $(".container-fluid").css({"background-color": "#9932CC","color":"#fefefe"});

            $(".page-footer").css({"background-color": "#591D77","color":"#fefefe"});
            $(".list-group-item").css({"background-color": "#9932CC","color":"#fefefe"});
        }

</script>
</html>
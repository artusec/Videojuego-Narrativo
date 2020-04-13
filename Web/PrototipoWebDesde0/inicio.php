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
            <p class="text-center">Una aventura narrativa donde trendrás que agudizar el oído y el tacto.</p>
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




 
    <footer class="page-footer">

        <div class="row">
            <div class="col-sm-3">
                <div class="footers">
                    <h4><strong>Sobre nosotros</strong></h4>
                    <p>&nbsp</p>
                    Somos un equipo formado para realizar este TFG. El equipo consta de 3 estudiantes del grado en ingeniería informática  y 3 estudiantes del grado en desarrollo de videojuegos, además de contar 
                    con la ayuda de los profesores Joaquin Recas Piorno y Maria Guijarro  Mata-García.
                    <p>&nbsp</p>
                    <p><strong>Github:</strong></p>
                    <p>https://github.com/artuyero/Videojuego-Narrativo</p>

                    
                </div>

            </div>

            <div class="col-sm-3">
                <div class="footers">
                    <h4><strong>Equipo:</strong></h4>
                    <p>&nbsp</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Arturo Aguirre Calvo</li>
                            <li class="list-group-item">Eduardo Andrés Morais</li>
                            <li class="list-group-item">Fernando Cortés Sacho</li>
                            <li class="list-group-item">Alberto Casaso Trapote</li>
                            <li class="list-group-item">Héctor Marcos Rabadán</li>
                            <li class="list-group-item">Diego Martínez Simarro</li>
                            <li class="list-group-item">María Guijarro Mata-García</li>
                            <li class="list-group-item">Joaquin Recas Piorno</li>
                        </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="footers">
                    <h4><strong>Contacto</strong></h4>
                    <p>&nbsp</p>
                    <p>Para cualquier consulta no dudes en escribirnos a nuestro correo.</p>
                    <p><strong>Email:</strong></p>
                    <p>videojuego.narrativo@gmail.com</p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="footers">
                    <h4><strong>Dirección</strong></h4>
                    <p>&nbsp</p>                            
                    <p>Facultad de informática</p>
                    <p>Ciudad Universitaria</p>
                    <p>Madrid</p>
                    <p>España</p>
                </div>
            </div>
        </div>


        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://www.ucm.es/">Universidad Complutense de Madrid</a>
        </div>
   


    </footer>

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
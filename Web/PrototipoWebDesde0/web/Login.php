<?php
	require_once '../DB_data.php';
	require_once 'FormularioLogin.php';
?>

<!DOCTYPE HTML>
<html lang="ES">


  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="loginstyle.css">


<head>
	<title>Login</title
		<meta charset="utf-8" />
</head>

<body>
		

	<nav title="Menu horizontal">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="../inicio.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../inicio.php#3">Minijuegos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../inicio.php#4">Descarga</a>
            </li>
<?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true){
?>
                <li class="nav-item">
                    <a class="nav-link" href="../web/MiPerfil.php">Mi perfil</a>
                </li>
                <li>
                    <a class="nav-link" href="../Logout.php">Cerrar Sesion</a>
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
	


	
	<div class="container-fluid">
	<p>&nbsp</p>
	<p>&nbsp</p>
		<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
				<h1>Login</h1>
				<p>Identifícate o <a href='Register.php' id = 'reg'>regístrate</a></p>
				<?php	
				$form = new FormLogin();
				$form->gestiona();
				?>
		</div>
		<div class="col-sm-4"></div>
			<p>&nbsp</p>
		</div>
		<br>
		<br>
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
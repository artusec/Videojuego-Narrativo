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

<link rel="stylesheet" type="text/css" href="minigames.css">

<script src="../cookies.js"></script>


<head>
	<title>Formas</title
		<meta charset="utf-8" />
</head>

<body>
		

	<nav title="Menu horizontal">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="./inicio.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./inicio.php#3">Minijuegos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./inicio.php#4">Descarga</a>
            </li>
<?php
            if (isset($_SESSION['login']) && $_SESSION['login'] === true){
?>
                <li class="nav-item">
                    <a class="nav-link" href="./MiPerfil.php">Mi perfil</a>
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
	
    <div class="img-container">
        <div class="row logo">
            <div class="col-lg-4 col-md-12">
                <div class="Name">
                <p class="text-center">ASHED</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <img src="./imagenes/eyebeat.gif" id="Logo" alt="Imagen del logo del juego">
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="Name">
                <p class="text-center">MEMORIES</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <p>&nbsp</p>
                <h1><p class="text-center">FORMAS</p></h1>
                <p>&nbsp</p>
                <h3>Concepto</h3>
                <p>Este minijuego fue el primero de todos en ser diseñado, por representar un concepto bastante sencillo de por sí. El objetivo era diseñar un sistema de reconocimiento de objetos por medio del tacto, similar a cuando intentamos coger algo en una habitación oscura o rebuscamos en un cajón, que no nos queda más remedio que ir palpando los objetos hasta reconocer el objeto que queremos. Con este objetivo implementamos un minijuego en el que se presenta una forma en la pantalla solamente reconocible por medio de la vibración, que el usuario debe identificar o reconocer para poder continuar. El minijuego engloba el reconocimiento en serie de tres formas distintas.</p>
                <p>&nbsp</p>
                <h3>¿Como se juega?</h3>
                <p>Inicialmente se presenta el jugador directamente en la primera forma a reconocer. El jugador deberá ir moviendo el dedo por la pantalla del dispositivo móvil para encontrar las zonas en las que se activa la vibración y las zonas en las que esto no ocurre. Con estos trazados se espera que el jugador se vaya haciendo una idea de la forma estimada que se le ha presentado. Una vez se tenga una idea más o menos clara de qué forma podría ser, el usuario tendrá que hacer doble clic sobre cualquier lado de la pantalla para pasar de la fase de reconocimiento a la fase de selección. En esta nueva fase se desactivan por completo las vibraciones del móvil y se le ofrecen al jugador varias opciones de selección para la forma presentada (una de ellas para volver atrás y seguir en la fase de reconocimiento por vibración, de las cuales sólo una de ellas es correcta. Por medio de deslizamientos, el jugador irá moviéndose por las opciones, para finalmente elegir la opción que crea que coincide con la forma que ha reconocido previamente. En el caso de acertar, se avanza al siguiente nivel con una nueva forma a reconocer.</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
	



<?php
    require_once __DIR__ . '../footer.html';
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
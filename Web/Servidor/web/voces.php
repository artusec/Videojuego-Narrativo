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

<script src="../cookies.js"></script>


<head>
	<title>Voces a lo lejos</title
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
	<h1>VOCES A LO LEJOS</h1>
    <h3>Concepto</h3>
    <p>Desde que se empezó a plantear el diseño de los minijuegos se quiso utilizar las propiedades del sonido 3D para darle más opciones de jugabilidad a dichos minijuegos. Esto se tradujo principalmente en utilizar el paneado del sonido (lo cual requiere de auriculares, aunque ya se contaba con ello) de tal modo que el jugador pudiera percibir el sonido de una manera más direccional e inmersiva, pudiendo reconocer con más o menos exactitud la procedencia espacial de los sonidos que escuche durante el transcurso del minijuego (y se habla de más o menos exactitud si se trata de variaciones pequeñas de posicionamiento del sonido 3D, en el caso de haya únicamente dos sonidos a izquierda y derecha del jugador éste podrá reconocer la procedencia con suma facilidad).
    <p>Con esta idea en mente se tuvo la idea de realizar una especie de laberinto 3D, en el cual el jugador se va moviendo de manera automática hacia delante hasta llegar a una bifurcación del camino, momento en el cual se le ofrecería al jugador un sonido procedente del camino correcto, paneado con el fin de que el jugador lo reconozca fácilmente. De ese modo el jugador iría avanzando por el camino, llegando eventualmente a la meta.</p>
    <p>&nbsp</p>
    <h3>¿Como se juega?</h3>
    <p>Los controles del minijuego son realmente sencillos y directos, con el fin de simplificar la carga de trabajo del jugador al introducir el input y poder centrarse más en la inmersión del momento, ya que este minijuego está pensado para ser algo más frenético con respecto al resto del juego en general (es el único momento en el cual al jugador se le pide introducir un input concreto dentro de un tiempo determinado). De esta manera los únicos movimientos que puede realizar el jugador son deslizamientos hacia la izquierda o hacia la derecha en la pantalla. Cuando el jugador llegue a una bifurcación del camino y se reproduzca el sonido correspondiente, el jugador deberá reconocer si el sonido proviene de su izquierda o de su derecha, y realizar el deslizamiento acorde en la pantalla antes de que el sonido cese de reproducirse. En caso de que el jugador gire hacia el lado erróneo, o tarde demasiado en introducir el input, se le restará una vida u oportunidad. En el momento en el que el jugador pierde un total de 2 vidas, perderá, y deberá comenzar de nuevo el minijuego desde el principio.</p>
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
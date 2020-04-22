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
	<title>Puntos calientes</title
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
            <h1><p class="text-center">PUNTOS CALIENTES</p></h1>
            <p>&nbsp</p>
            <h3>Concepto</h3>
                <p>La siguiente herramienta que queríamos explotar en el desarrollo de los minijuegos era la función de vibración de los dispositivos móviles Android. Con esto en mente nos pusimos a investigar en posibles diseños de juegos que usaran esta función de manera intrínseca. Teníamos un poco de referencia un juego que nos enseñaron durante nuestra visita a la ONCE, el cual consistía en una pompa circular que se iba desplazando por la pantalla, y el usuario tenía que explotarla haciendo clic sobre ella. Para encontrar la burbuja en la pantalla, se usaba la vibración del teléfono móvil, el cual vibraba con mayor o menor intensidad en función de la distancia de la pompa al punto sobre el que el usuario esté presionando (poner referencia si encontramos el juego en cuestión ¿?). No obstante, este “minijuego” se nos hacía algo pequeño y bastante simple, así que seguimos investigando para diseñar algo más complejo y que presentara un mayor un poco mayor al usuario.</p>
                <p>Pensamos en las clásicas escenas donde se apoya la oreja a un suelo o pared para escuchar con mayor precisión o distancia algo que se encuentre a través del suelo o del muro, así como también añadimos a la tormenta de ideas el funcionamiento del sónar de los barcos y submarinos.</p>
                <p>Con todos estos elementos acabamos diseñando un minijuego en el cual hay varios focos de vibración por la pantalla, de los cuales sólo uno es la solución del minijuego. Las vibraciones guiarán al jugador hasta los focos, hasta que el jugador acabe llegando al foco solución y se pase el minijuego.</p>
                <p>&nbsp</p>
                <h3>¿Como se juega?</h3>
                <p>El usuario cuenta con tres gestos distintos para desenvolverse en este minijuego: el propio movimiento del dedo sobre la superficie del móvil, y el clic y doble clic sobre los focos de vibración. </p>
                <p>El usuario debe ir recorriendo con el dedo la superficie del dispositivo. Cuando se acerque a uno de los focos, el móvil comenzará a vibrar con una cierta frecuencia. La frecuencia de estas vibraciones irá aumentando por escalas según el jugador se acerque al centro del foco de vibración, momento en el cual la vibración estará activada continuamente. En ese momento, el usuario deberá intentar reconocer si el foco al que ha llegado es la solución del minijuego haciendo un solo clic sobre el punto de máxima vibración. Esto provocará que suene un sonido auxiliar de guía que le ofrecerá al jugador una pista sobre si dicho foco es o no la solución. Para seleccionar el foco e intentar resolver el minijuego, el usuario deberá hacer doble clic sobre el mismo punto. En caso de fallar, salta un sonido indicando el fallo en el intento y se procede a eliminar el foco de vibración, facilitando al minijuego al quedar menos focos activos con cada fallo. Por el contrario, si se acierta, se consigue completar exitosamente el minijuego, desbloqueando el ítem oculto y prosiguiendo con el juego principal.</p>
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
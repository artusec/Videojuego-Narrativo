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

<script src="./js/cookies.js"></script>


<head>
<link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
	<title>Voces a lo lejos</title>
		<meta charset="utf-8" />
</head>

<body>
		

		
<?php
    require_once './generic/header.php';
?>
	
	

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
                <h1><p class="text-center">VOCES A LO LEJOS</p></h1>
                <p>&nbsp</p>
                <h3>Concepto</h3>
                <p> La idea principal para el desarrollo de este juego fue la utilización de las propiedades del sonido 3D. Esto se basaba en utilizar le sonido de manera que le jugador pudiera percibir el sonido de una manera más direccional e inmersiva. Para ello es necesaria la utilización de auriculares. </p>
                <p>Con esta idea en mente se tuvo la idea de realizar una especie de laberinto 3D, en el cual el jugador se va moviendo de manera automática hacia delante hasta llegar a una bifurcación del camino, momento en el cual se le ofrecería al jugador un sonido procedente del camino correcto. De ese modo el jugador iría avanzando por el camino hasta llegar a la meta.</p>
                <p>&nbsp</p>
                <h3>¿Como se juega?</h3>
                <p>Los controles del minijuego son realmente sencillos y directos. Los únicos movimientos que puede realizar el jugador son deslizamientos hacia la izquierda o hacia la derecha en la pantalla. Cuando el jugador llegue a una bifurcación del camino y se reproduzca el sonido correspondiente, el jugador deberá reconocer si el sonido proviene de su izquierda o de su derecha, y realizar el deslizamiento acorde en la pantalla antes de que el sonido cese de reproducirse. En caso de que el jugador gire hacia el lado erróneo, o tarde demasiado en tomar la decisión, se le restará una vida u oportunidad. En el momento en el que el jugador pierde un total de 2 vidas, perderá, y deberá comenzar de nuevo el minijuego desde el principio.</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
	



<?php
    require_once  './generic/footer.html';
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


<?php
    require_once './js/scripts.js';
?>

</html>
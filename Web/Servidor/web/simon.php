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
	<title>Simon dice</title>
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
            <h1><p class="text-center">SIMON DICE</p></h1>
            <p>&nbsp</p>
            <h3>Concepto</h3>
            <p>Siguiendo con la investigación de posibles diseños de puzles o minijuegos basados en el sonido, se pensó en realizar una adaptación del juego clásico de mesa Simon, creado por los investores Ralph H. Baer y Howard J. Morrison, que a su vez se basa en el juego tradicional Simon Dice. El juego de mesa consiste en un dispositivo con forma de disco, dividido en cuatro cuadrantes de diferentes colores, que se van iluminando de manera aleatoria y emitiendo a la vez un sonido propio, distinto al de los demás. Tras terminar una serie de estas activaciones, se espera que el usuario que esté jugando repita la misma secuencia en el orden correcto, presionando en serie los botones de manera acorde a la luz y el sonido emitido. Si el jugador acierta correctamente la secuencia, se comienza de nuevo pero añadiendo una activación adicional al final de la secuencia previa, aumentando gradualmente la dificultad del juego con cada secuencia acertada. </p>
            <p>Con esta funcionalidad descrita la adaptación que se planteó pasaba por sustituir los elementos visuales del juego (botones de colores e iluminación de cada uno de ellos), por sonido 3D inmersivo del cual el usuario pudiera adivinar la procedencia espacial. De este modo, en el minijuego creado se tiene una versión un poco más simplificada del juego original, con tres posibles sonidos en lugar de cuatro, que se ubican a la derecha, a la izquierda y al frente del jugador. Cada uno de estos puntos reproduce un sonido distinto a los demás con el fin de facilitar la tarea de recordar la secuencia.</p>
            <p>&nbsp</p>
            <h3>¿Como se juega?</h3>
            <p>El procedimiento a seguir es el mismo que en el juego original, comenzando con una única activación de sonido procedente de una de las fuentes y esperando posteriormente a que el usuario la repita correctamente, y aumentando el tamaño de la secuencia dado el caso.</p>
            <p>Los controles para seleccionar las posibles opciones son deslizamientos en la dirección de la que se cree que proviene el sonido, minimizando la carga de trabajo al usuario y haciendo que focalice la atención en recordar la secuencia más que en el cómo introducirla a posteriori.</p>
            <p>&nbsp</p>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>




<?php
    require_once './generic/footer.html';
    ?>
 

</body>
<?php
    require_once './js/scripts.js';
?>
</html>
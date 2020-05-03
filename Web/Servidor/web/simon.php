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

 <!--- FUENTES DEL TITULO-->
 <link href='https://fonts.googleapis.com/css?family=Julee' rel='stylesheet'>   

<link rel="stylesheet" type="text/css" href="minigames.css">

<script src="./js/cookies.js"></script>


<head>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
	<title>Simon dice</title>
		<meta charset="utf-8" />
</head>

<body>
		

		
<header>
<?php
    require_once './generic/header.php';
?>

<section id="cabecera">
        <div class="row logo">
            <div class="col-lg-4 col-md-12">
                    <div class="Name">
                    <p class="text-center Name-font">ASHED</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12" id="cabecera-logo">
                    <img src="./imagenes/eyebeat.gif" id="Logo" class="hidden" alt="Imagen del logo del juego">
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="Name">
                    <p class="text-center Name-font">MEMORIES</p>
                    </div>
                </div>
        </div>
    </section>
</header>

	
<main>
    <section aria-label="Minijuego de simón dice">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                <p>&nbsp</p>
                <h1><p class="text-center">SIMON SAYS</p></h1>
                <p>&nbsp</p>
                <h2>Concepto</h2>
                    <p>El desarrollo de este videojuego se basó en el juego tradicional Simon says. El juego de mesa consiste en un dispositivo con forma de disco, dividido en cuatro cuadrantes de diferentes colores, que se van iluminando de manera aleatoria y emitiendo a la vez un sonido propio, distinto al de los demás. Tras terminar una serie de estas activaciones, se espera que el usuario repita la misma secuencia en el orden correcto. Si el jugador acierta correctamente la secuencia, se comienza de nuevo pero añadiendo una activación adicional al final de la secuencia previa. </p>
                    <p>Basándose en eso, se sustituyeron los elementos visuales del juego por sonido 3D inmersivo del cual el usuario pudiera adivinar la procedencia espacial. El minijuego tiene tres posibles sonidos que se ubican a la derecha, a la izquierda y al frente del jugador. Cada uno de estos puntos reproduce un sonido distinto a los demás con el fin de facilitar la tarea de recordar la secuencia.</p>
                    <p>&nbsp</p>
                <h2>¿Como se juega?</h2>
                <p>El juego comienza  con una única activación de sonido procedente de una de las fuentes y esperando posteriormente a que el usuario la repita correctamente, y aumentando el tamaño de la secuencia dado el caso.</p>
                <p>Los controles para seleccionar las posibles opciones son deslizamientos en la dirección de la que se cree que proviene el sonido, minimizando la carga de trabajo al usuario y haciendo que focalice la atención en recordar la secuencia más que en el cómo introducirla a posteriori.</p>
                <p>&nbsp</p>
                </div>
                <div class="col-md-2">
                </div>
            </div>

            <div class="row logo">
                <div class="col-lg-4 col-md-3">
                </div>
                <div class="col-lg-4 col-md-6">
                    <img src="./imagenes/simon.gif" alt=""/>
                </div>
                <div class="col-lg-4 col-md-3">
                </div>
                <p>&nbsp</p>
            </div>
    

        </div>
    </section>
</main>


<?php
    require_once './generic/footer.html';
    ?>
 

</body>
<script>

<?php
    require_once './js/scripts.js';
    require_once './js/contrasteInicio.js';
?>
</script>
</html>
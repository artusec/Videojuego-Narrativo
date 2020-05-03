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
	<title>Formas</title>
	<meta charset="utf-8" />
</head>

<body>
		
<header>		
<?php
    require_once './generic/header.php';
?>
</header>

<main>	
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
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <p>&nbsp</p>
                <h1><p class="text-center">FORMAS</p></h1>
                <p>&nbsp</p>
                <h2>Concepto</h2>
                <p>El objetivo de este minijuego es distinguir objetos por medio del tacto, similar a cuando intentamos coger algo en una habitación oscura o rebuscamos en un cajón. No nos queda más remedio que ir palpando los objetos hasta reconocer el que queremos. Con este objetivo se implementó el minijuego, en el cual se presenta una forma en la pantalla solamente reconocible por medio de la vibración. El usuario debe reconocer tres formas distintas para poder continuar. .</p>
                <p>&nbsp</p>
                <h2>¿Como se juega?</h2>
                <p>El jugador deberá ir moviendo el dedo por la pantalla del dispositivo móvil para encontrar las zonas en las que se activa la vibración y las zonas en las que esto no ocurre. Con estos trazados se espera que el jugador se vaya haciendo una idea de la forma estimada que se le ha presentado. Una vez se tenga una idea más o menos clara de qué forma podría ser, el usuario tendrá que hacer doble clic sobre cualquier lado de la pantalla para pasar de la fase de reconocimiento a la fase de selección.</p>
                <p>En esta nueva fase se desactivan por completo las vibraciones del móvil y se le ofrecen al jugador varias opciones de selección para la forma presentada de las cuales sólo una de ellas es correcta. Además, en la fase de selección también se da la opción de volver a la fase de reconocimiento. Por medio de deslizamientos, el jugador irá moviéndose por las opciones, para finalmente elegir la opción que crea que coincide con la forma que ha reconocido previamente. En el caso de acertar, se avanza al siguiente nivel con una nueva forma a reconocer.</p>
                <p>&nbsp</p>
                <p>&nbsp</p>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row logo">
            <div class="col-lg-4 col-md-3">
            </div>
            <div class="col-lg-4 col-md-6">
                <img src="./imagenes/formas.gif" alt=""/>
            </div>
            <div class="col-lg-4 col-md-3">
            </div>
            <p>&nbsp</p>
        </div>
    </div>
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
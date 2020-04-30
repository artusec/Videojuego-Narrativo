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
<link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
	<title>Servidor en la nube</title>
		<meta charset="utf-8" />
</head>

<body>
		

		
<?php
    require_once './generic/header.php';
?>
	
	
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
                <h1><p class="text-center">DESARROLLO EN LA NUBE</p></h1>
                <p>&nbsp</p>
                <p>El juego tiene implementado dos sistemas de guardado de tus datos y partidas:</p>

                <p><strong>- Guardado en local.</strong> Esta opción te permite guardar los datos localmente, de forma que siempre tendrás que jugar en el mismo dispositivo. No tendrás que registrarte y podrás jugar sin conexón a internet.</p>

                <p><strong>- Guardado en la nube.</strong> Esta opción requiere una conexión a internet y estar registrado en la aplicación. Te permite cambiar de dispositivo y continuar exactamente en el punto donde lo dejaste.</p>

                <p>&nbsp</p>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
                <img src="./imagenes/guardado_nube.png"  alt=""/>
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
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
	<title>Puntos calientes</title>
		<meta charset="utf-8" />
</head>

<body>
		

		
<header>
<?php
    require_once './generic/header.php';
?>
</header>

	
	

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
            <h1><p class="text-center">PUNTOS CALIENTES</p></h1>
            <p>&nbsp</p>
            <h2>Concepto</h2>
                <p>La idea principal para este minijuego fue la utilización de la vibración en los dipositivos móviles Andriod. Tras manejar varias ideas en las que se podía emplear dicha técnica, se acabo diseñando un  minijuego en el cual hay varios focos de vibración por la pantalla, de los cuales sólo uno es la solución del minijuego. Las vibraciones guiarán al jugador hasta los focos, hasta que el jugador acabe llegando al foco solución y se pase el minijuego.</p>
                <p>&nbsp</p>
            <h2>¿Como se juega?</h2>
                <p>El usuario cuenta con tres gestos distintos para desenvolverse en este minijuego: el propio movimiento del dedo sobre la superficie del móvil, y el clic y doble clic sobre los focos de vibración. </p>
                <p>El usuario debe ir recorriendo con el dedo la superficie del dispositivo. Cuando se acerque a uno de los focos, el móvil comenzará a vibrar con una cierta frecuencia. La frecuencia de estas vibraciones irá aumentando según el jugador se acerque al centro del foco de vibración. En ese momento, el usuario deberá intentar reconocer si el foco al que ha llegado es la solución del minijuego haciendo un solo clic sobre el punto de máxima vibración. Esto provocará que suene un sonido que le ofrecerá al jugador una pista sobre si dicho foco es o no la solución. Para seleccionar el foco el usuario deberá hacer doble clic sobre el mismo punto. En caso de fallar, salta un sonido indicando el fallo en el intento y se procede a eliminar el foco de vibración, facilitando al minijuego al quedar menos focos activos con cada fallo. Por el contrario, si se acierta, se consigue completar exitosamente el minijuego</p>
            <p>&nbsp</p>
            </div>
            <div class="col-md-2">
            </div>
        </div>

        <div class="row logo">
            <div class="col-lg-4 col-md-3">
            </div>
            <div class="col-lg-4 col-md-6">
                <img src="./imagenes/vib.gif" alt=""/>
            </div>
            <div class="col-lg-4 col-md-3">
            </div>
            <p>&nbsp</p>
        </div>
        
    </div>




<?php
    require_once './generic/footer.html';
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
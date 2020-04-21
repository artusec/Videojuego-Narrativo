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
	<title>Accesibilidad</title
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
	<h1>ACCESIBLIDAD</h1>
    <p>Actualmente lo más habitual al desarrollar aplicaciones con accesibilidad para personas invidentes son los lectores de pantalla. Estos sistemas se ejecutan a nivel de dispositivo y capturan el input del usuario, traduciéndolo en acciones que envía al sistema en cuestión. De esta forma facilitan la navegación por los elementos en pantalla en base a unos gestos simples. Existen muchos programas de este tipo, tanto en dispositivos de sobremesa como en móvil. Algunos ejemplos son JAWS para sobremesas, VoiceOver en dispositivos iOS y TalkBack en dispositivos Android. </p>

    <p>En el caso que nos atañe, las aplicaciones móviles, estos gestos suelen ser deslizamientos rápidos y pulsaciones dobles en la pantalla. Con los deslizamientos laterales se avanza o retrocede en la lista de elementos mostrados (esta lista no suele ser cíclica, para que principio y final estén bien marcados), la doble pulsación suele equivaler a pulsar sobre el elemento seleccionado actualmente. Los distintos programas tienen también otros gestos más específicos, formados a veces por combinaciones de gestos, por ejemplo, en TalkBack deslizar hacia arriba y luego a la izquierda rápidamente lleva al primer elemento de la lista.</p>

    <p>Cuando se optó por hacer el desarrollo en Unity los directores del TFG nos indicaron la importancia de estos programas, y que se debía investigar si este motor proporcionaba compatibilidad con alguno de estos.</p>

    <p>Efectivamente, después de investigar, se descubrió que Unity no proporcionaba soporte para ninguna de estas herramientas de forma oficial, pese a que miembros de su equipo de desarrollo habían mostrado en ocasiones interés por implementar funciones en este campo (Hammilton, 2019) (Llu, 2019). Se observó que las únicas herramientas que daban soporte eran desarrolladas por terceros, que las publicaban en la Asset Store de Unity (tienda en la que se permite publicar para su venta elementos creados para su uso en Unity) a variados precios.</p>

    <p>La cosa no acababa ahí, sino que, al no dar soporte al lector de pantalla, ejecutar la aplicación con uno activo causaría comportamientos no esperados que dificultasen o imposibilitarían su uso normal. Esto requiere que al lanzar la aplicación se indique al usuario que apague su lector de pantalla.</p>

    <p>El juego había sido diseñado desde un principio para ser usado con un lector de pantalla o alguna herramienta similar. Básicamente se trataba de una variación en el género de las aventuras gráficas, con elementos sacados de juegos de puzles basados en avanzar de sala en sala y añadiendo minijuegos adaptados para personas invidentes.</p>

    <p>Las secciones de minijuegos tendrían controles propios, que se explicarían en cada uno, mientras que las secciones en habitaciones estaban pensadas para usarse con un lector: Consistían en inspeccionar elementos en un escenario e interactuar con ellos.</p>

    <p>Mientras se pensaba que elección tomar frente a este problema se buscaron antecedentes de desarrolladores que se habían visto en situaciones similares, encontramos el caso de FREEQ, desarrollado por PsychicBunny (caso de estudio en Estado del Arte). (Hughes, 2013) </p>

    <p>Tras conocer este caso y los buenos resultados obtenidos con el enfoque de imitar un lector de pantalla, se llegó a la conclusión de que encajaría en nuestra aplicación. Finalmente, se optó por seguir su ejemplo e implementar dentro de Unity los sistemas y funcionalidades necesarias para imitar un lector de pantalla, de modo que en las secciones que lo necesitan un usuario acostumbrado a su uso pudiera navegarlos de forma intuitiva y fácil.</p>
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
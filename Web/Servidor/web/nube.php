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
	<title>Servidor en la nube</title
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
                <h1><p class="text-center">DESARROLLO EN LA NUBE</p></h1>
                <p>&nbsp</p>
                <p>Hoy en día en cualquier aplicación o juego necesitamos de conexión a internet para disfrutarlas, o por lo menos para sacarle el máximo partido, ya sea para compartirlos resultados, para enviar mensajes, guardar la partida, etc. En este videojuego, la principal idea era que fuese cien por cien online, es decir, que para poder jugar se necesitase conexión a internet e identificarse en el servidor con una cuenta previamente creada. Se sopesó lo que esta decisión conllevaría, y si iba ser más un perjuicio que una ventaja y al final se decidió por un sistema híbrido, es decir, con las dos opciones disponibles. Nada más entrar a la aplicación, te preguntará si quieres jugar sin conexión o con conexión. La primera opción guarda tus datos y tu progreso en local, en el dispositivo donde estás jugando. Por otro lado, si eliges la opción de jugar con conexión, te llevará a identificarte en el servidor, donde se guardarán todos los datos, de manera que si cambias de dispositivo puedes retomar la partida en el mismo punto donde lo dejaste, sin perder nada. </p>

                <p>Para empezar, se decidió dedicar un ordenador solo para este propósito para asegurar el máximo rendimiento posible y que no hubiera conflictos con otras aplicaciones o servicios similares. Además, se eligió la distribución LUBUNTU de GNU/Linux como sistema operativo, ya que tiene todo lo que necesitamos y viene con el escritorio LXQT en lugar de GNOME, ya que este último consume muchos más recursos y al fin y al cabo la interfaz solo se utilizaría para las primeras configuraciones, y después directamente se gestionaría mediante SSH. </p>

                <p>Antes de continuar, se tuvo que tomar una decisión importante: instalar un servidor de bases de datos que respondiera a consultas SQL directamente desde el puerto 3306, con lo cual había que prepararlas en el cliente; o crear un servidor apache escuchando en el puerto 80, que tomase parámetros por peticiones GET y POST sencillos, y se procesase todo en el servidor con PHP. Al tener más conocimientos de PHP que de C# y además con la idea de hacer una página web posteriormente, se decidió la segunda opción. </p>

                <p>Una vez hecho esto, lo que se necesitaba era darle visualización al servidor en internet. Para ello, se decidió usar un dominio que se tenía de proyectos anteriores. Pero dicho dominio apunta al enrutador de la casa, por lo tanto, es necesario hacer una redirección de puertos.</p>

                <p>Al conectar el ordenador por cable a la red interna de la casa, el protocolo DHCP se encarga de asignarle una dirección IP. Para evitar posibles conflictos se configuró para que siempre se le asignase la misma, en nuestro caso fue la 192.168.1.57. A continuación, se elige un puerto del enrutador, por ejemplo, el 4398, fuera del rango de los Well-known ports y sin otro servicio escuchando en ese momento, para que todas las conexiones que se hagan ahí sean redirigidas al puerto 80 (http), predeterminado de apache junto con el 443 (https), del servidor. Esto se puede hacer con iptables por la línea de comandos o con alguna interfaz, modificando la tabla NAT.</p>

                <p>Una vez que el servidor es visible en internet, el siguiente paso fue diseñar la base de datos con SQL, la cual ha ido depurándose a lo largo de varias versiones hasta la actual, cuyo diagrama entidad-relación se puede ver en el anexo. Seguidamente, se utiliza phpmyadmin para importar la base de datos y configurar los usuarios de esta, los cuales van a estar en el código de la aplicación PHP para poder autenticarse y hacer las consultas.</p>

                <p>El siguiente paso es implementar los archivos PHP que van a recibir las peticiones GET y POST y las clases de los objetos. Para ello, decidimos hacer un archivo PHP por cada posible petición que nos fueran a hacer desde el cliente, y luego cada una iría llamando a los métodos necesarios de las demás clases. Por poner un ejemplo, cuando el cliente va a guardar partida, se conecta al servidor y ejecuta guardar_partida.php, el cual recoge los datos de la petición POST. En este caso sería el nombre de usuario que va a guardar partida, y los datos. Hace un primer procesado y comprobación, y se los manda como parámetro a un método de la clase Game.php, la cual tiene todos los métodos relacionados con las partidas, llamado guardar_partida.php en el cual a su vez se llama a hacer la conexión a la base de datos, y seguidamente las consultas necesarias de SQL.</p>

                <p>En este punto ya se tiene la parte del servidor terminada, ahora hay que hacer la parte del cliente. Como elegimos Unity, el lenguaje de programación es C#. Para realizar las peticiones, se hizo una clase con todas ellas, y un método común con el envío de la información. Para ello se utilizó la librería HttpWebRequest, en la cual indicas la url del servidor donde se tiene que conectar, creas mediante clave-valor los parámetros de la petición, la envía y captura la respuesta; la cual es procesada y se envía a las demás clases que continúan con la ejecución del juego.</p>

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
<?php
require_once '../../Minijuego.php';

if (isset($_GET['minijuego']) && isset($_GET['puntuacion']))
{

    if(Minijuego::actualizar_puntuacion($_GET['minijuego'],$_GET['puntuacion'])){
        echo $_GET["minijuego"];
    }
    /*else{
        echo "error";
    }*/
}
else{
    echo "error";
}

?>
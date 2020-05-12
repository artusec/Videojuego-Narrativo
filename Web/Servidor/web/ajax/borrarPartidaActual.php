<?php
require_once './../../User.php';

if (isset($_GET['id']))
{
    if(User::borrar_partida_actual($_GET["id"])){
        echo $_GET["id"];
    }
    else{
        echo "error";
    }
}
else{
    echo "error";
}

?>
<?php

# -----------------------------------------------------------------------------
#								minijuego.php 								  |
# -----------------------------------------------------------------------------
#																			  |
#                                                   						  |
#																			  |
# -----------------------------------------------------------------------------

require_once __DIR__ . '/Aplication.php';
require_once __DIR__ . '/DB_data.php';


class User
{
    private $minijuego;
    private $times;
    private $score;

    # Funcion constructora
    private function __construct($array)
    {
        $this->minijuego= $array[0];
        $this->times = $array[1];
        $this->score= $array[2];
    }

    // sin terminar
    public function actualizar_puntuacion($minijuego, $puntuacion){
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT times, score FROM puntuaciones WHERE minijuego = '%s'",
            $minijuego
        );

        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            $result = array();
            while ($fila = $rs->fetch_assoc()) {
                $result[] = $fila;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $times = $result[0];
        $score = $result[1];

        $times = $times + 1;


        return $result;
    }


    /* Getters and Setters -------------------------------------------------------------------*/

    public function getMinijuego()
    {
        return $this->minijuego;
    }


    public function getTimes()
    {
        return $this->times;
    }


    public function getScore()
    {
        return $this->score;
    }
}
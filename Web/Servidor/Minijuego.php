<?php

# -----------------------------------------------------------------------------
#								Minijuego.php 								  |
# -----------------------------------------------------------------------------
#																			  |
#                                                   						  |
#																			  |
# -----------------------------------------------------------------------------

require_once __DIR__ . '/Aplication.php';
require_once __DIR__ . '/DB_data.php';


class Minijuego
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

        $query = sprintf("SELECT times,score FROM puntuaciones WHERE minijuego = '%s'",
            $minijuego
        );

        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            $result = array();
            while ($fila = $rs->fetch_assoc()) {
                $times = $fila['times'];
                $score = $fila['score'];
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        

        $scoreA = $score * $times;
        $scoreN = $scoreA + $puntuacion;
        $times = $times + 1;
        $score = $scoreN/$times;

        $query = sprintf("UPDATE puntuaciones P SET P.times = ('%d'), P.score = ('%d') WHERE (P.minijuego = '%s') ",
            $times,
            round($score),
            $conn->real_escape_string($minijuego)
            );
        if ( !$conn->query($query) ) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
            return false;
        }

        /*MIRAR SI YA HA VOTADO Y HACER UPDATE O INSERT EN FUNCION DE ESO*/

        $query = sprintf("INSERT INTO user_pun (user, minijuego, score) VALUES ('%d','%s','%d')",
            $_SESSION['id'], 
            $conn->real_escape_string($minijuego),
            $puntuacion
            );
        if ( !$conn->query($query) ) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
            return false;
        }


        return true;
    }

    ///GET PUNTUACION///////////
    public function get_puntuacion($minijuego){
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();

        $query = sprintf("SELECT score FROM puntuaciones WHERE minijuego = '%s'",
            $minijuego
        );

        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            $result = array();
            while ($fila = $rs->fetch_assoc()) {
                $score = $fila['score'];
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        

        return $score;
    }

    public function get_puntUM($usuario, $minijuego) {
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();

        $query = sprintf("SELECT score FROM user_pun WHERE minijuego = '%s' and user = %d",
            $minijuego,
            $usuario
        );

        $rs = $conn->query($query);
        
        if ($rs) {
            if ($rs->num_rows == 0) {
                return 0;
            }
            $fila = $rs->fetch_assoc();
            $score = $fila['score'];
            $rs->free();
            return $score;
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
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
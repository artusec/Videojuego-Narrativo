<?php
require_once __DIR__ . '/Aplication.php';


class Game
{   
    private $id;
    private $user1;
    private $user2;
    private $room;

    private function __construct($array)
    {
        $this->user1= $array['user1'];
        $this->user2 = $array['user2'];
        $this->room = $array['room'];
    }


    // Funciona
    public function inicia_nuevo_juego_individual($user1)
    {
        $room = 0;
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();

        # Recuperamos el id de la partida individual que tiene user1 activa si la tiene
        $query = sprintf("SELECT id FROM Games G WHERE user1 = '%d' and user2=1", $conn->real_escape_string($user1));
        $id_game = $conn->query($query);

        # Si tenia una partida, borramos de la tabla de estado de la misma
        if($id_game){
            if($id_game->num_rows != 0){
                $id_game = $id_game->fetch_row();
                $query = sprintf("DELETE FROM State_Game WHERE id_game = '%d'",
                    $conn->real_escape_string($id_game[0])
                );
                $rs = $conn->query($query);
                if ( ! $rs) {
                    echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
                    return false;
                }

                # Y ademas borramos la partida propiamente de la tabla Games
                $query = sprintf("DELETE FROM Games WHERE user1 = '%d' and user2=1",
                $conn->real_escape_string($user1)
                );
                $rs = $conn->query($query);
                if ( ! $rs ) {
                    echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
                    return false;
                } 
            }
        }

        # Insertamos una nueva partida individual
        $query = sprintf("INSERT INTO Games (user1, user2, room) VALUES ('%d', '%d', '%d')",
            $conn->real_escape_string($user1),
            1,
            $conn->real_escape_string($room)
            );
        if ( $conn->query($query) ) {
            $id_new_game = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            return false;
        }

        # Inicializamos el estado de la partida cogiendo todos los objetos de la sala 0
        # y poniendolos en el estado inicial
       $query = sprintf("SELECT id FROM Objects O WHERE O.room = '%d'", $conn->real_escape_string($room));
        $rs = $conn->query($query);
        if ($rs) {
            $result = array();
            while ($fila = $rs->fetch_assoc()) {
                $result[] = $fila["id"];
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            return false;
        }


        for ($i = 0; $i < sizeof($result); $i++) {
            $query = sprintf("INSERT INTO State_Game (id_game, id_user, id_object, state_object) VALUES ('%d', '%d', '%d', '%d')",
                    $conn->real_escape_string($id_new_game),
                    $conn->real_escape_string($user1),
                    $conn->real_escape_string($result[$i]),
                    1
                );
            $rs = $conn->query($query);
        }
        return true;
    }


    // No probada
    public function cargar_partida_individual($user1) {

        # Recuperamos el id de la partida individual
        $query = sprintf("SELECT id_object, state_object FROM Games G join State_Game S on G.user1 = S.id_user where S.id_user = '%d'", $conn->real_escape_string($user1));
        $rs = $conn->query($query);
        // Esto nos devuelve todos los objetos del usuario en su partida individual y su estado
        if ($rs) {
            $result = array();
            while ($fila = $rs->fetch_assoc()) {
                $result[$fila["id_object"]] = $fila["state_object"];
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            return false;
        }
        return $result;

    }


    public function guardar_partida_individual($datos) {
        
    }


    /* Getters and Setters -------------------------------------------------------------------*/

    public function getId()
    {
        return $this->id;
    }


    public function getUser1()
    {
        return $this->user1;
    }


    public function getUser2()
    {
        return $this->user2;
    }

    public function getRoom()
    {
        return $this->room;
    }
}
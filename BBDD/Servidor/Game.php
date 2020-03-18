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


    public iniciaJuego($user1, $user2, $room){
        #$room = 0;
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("INSERT INTO Games (user1, user2, room) VALUES ('%d', '%d', '%d')",
            $conn->real_escape_string($user1),
            $conn->real_escape_string($user2),
            $conn->real_escape_string($room)
            );
        if ( $conn->query($query) ) {
            $user->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

       $query = sprintf("SELECT id FROM Objects O WHERE O.room = '%d'", $conn->real_escape_string($room));
        $rs = $conn->query($query);
        if ($rs) {
            while ($fila = $rs->fetch_assoc()) {

                $query = sprintf("INSERT INTO State_Game (id_game, id_user, id_object, state_object) VALUES ('%d', '%d', '%d', '%d')",
                    $conn->real_escape_string($this->id),
                    $conn->real_escape_string($_SESSION['username']),
                    $conn->real_escape_string($fila['id']),
                    1
                    );
                $conn->query($query);
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        # En
        return true;
    }

    public cargarJuego($user1) {

        

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
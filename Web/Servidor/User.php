<?php

# -----------------------------------------------------------------------------
#								User.php 									  |
# -----------------------------------------------------------------------------
#																			  |
# Clase con toda la lógica y las operaciones relacionadas con usuarios.		  |
# Contiene las sentencias SQL para la base de datos.						  |
#																			  |
# -----------------------------------------------------------------------------

require_once __DIR__ . '/Aplication.php';
require_once __DIR__ . '/DB_data.php';


class User
{
    private $id;
    private $username;
    private $pass;

    # Funcion constructora
    private function __construct($array)
    {
        $this->username= $array[0];
        $this->pass = $array[1];
    }

    # Funcion para login. Recibe nombre de usuario y contraseña y comprueba si
    # existe en la base de datos y si el hash de la contraseña coincide con el
    # hash almacenado en la base de datos.
    # Devuelve el usuario si existe y false si no.
    public static function login($username, $password)
    {
        $user = self::find_user_by_username($username);

        if ($user && $user->compruebaPassword($password)) {
            return $user;
        }
        return false;
    }

    # Funcion para buscar un usuario en la base de datos por su username.
    # Devuelve el usuario si existe y false si no.
    public static function find_user_by_username($username)
    {
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM Users U WHERE U.username = '%s'", $conn->real_escape_string($username));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $datos = array($fila['username'],$fila['password']);
                $user = new User($datos);
                $user->id = $fila['id'];
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
        }
        return $result;
    }

    # Funcion para insertar un usuario en la base de datos.
    # Devuelve el usuario si todo ha ido bien y false si no.
    public static function insert_user($username, $email, $pass)
    {
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("INSERT INTO Users (username, email, password) VALUES ('%s', '%s', '%s')",
            $conn->real_escape_string($username),
            $conn->real_escape_string($email),
            self::hashPassword($pass)
            );
        if ( $conn->query($query) ) {
            $fila = array($username, $pass);
            $user = new User($fila);
            $user->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            return false;
            exit();
        }
        return $user;
    }
    
    # Funcion para borrar un usuario de la base de datos y todos los datos
    # asociados a el.
    # Devuelve true si todo ha ido bien y false si no.
    public function borrar_usuario($username){

        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();

        $query = sprintf("SELECT id FROM Users U WHERE U.username = '%s'", $conn->real_escape_string($username));
        $rs = $conn->query($query);
        if ($rs->num_rows == 0) {
            return false;
        }
        $fila = $rs->fetch_assoc();
        $id_user = $fila["id"];

        $query = sprintf("DELETE FROM Statistics WHERE id_user = '%d'",
            $id_user
        );
        if (! $conn->query($query) ) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            return false;
        }

        $query = sprintf("DELETE FROM State_Game WHERE id_user = '%d'",
            $id_user
            );
        if (! $conn->query($query) ) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            return false;
        }

        $query = sprintf("DELETE FROM Games WHERE (user = '%d')",
            $id_user
        );
        if (! $conn->query($query) ) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            return false;
        }


        $query = sprintf("DELETE FROM Users WHERE id = '%d'",
            $id_user
        );
        if (! $conn->query($query) ) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            return false;
        }

        return true;
    }

    # Funcion que guarda las estadísticas de un usuario en la tabla
    # de estadisticas.
    # Devuelve true si ha ido bien y false si no.
    public function guardar_estadisticas($username){
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();

        # Se coge el id del ususario
		$query = sprintf("SELECT id FROM Users U WHERE U.username = '%s'", $conn->real_escape_string($username));
        $rs = $conn->query($query);
        if ($rs->num_rows == 0) {
            return false;
        }
        $fila = $rs->fetch_assoc();
        $id_user = $fila["id"];

        # Se cogen los datos de la partida actual que tenga.
		$query = sprintf("SELECT id, date_start, time_played FROM Games G WHERE user = '%d'", $id_user);
        $rs = $conn->query($query);

        if ($rs->num_rows == 0) {
            return false;
        }

        $fila = $rs->fetch_assoc();
        $id_game = $fila["id"];
        $date_start = $fila["date_start"];
        $time_played = $fila["time_played"];

        # Se insertan los datos en la tabla estadísticas.
        $query = sprintf("INSERT INTO Statistics (id_user, id_game, timed, date_start) VALUES ('%d', '%d', '%f', '%s')",
            $id_user,
            $id_game,
            $time_played,
            $date_start
            );

        if (! $conn->query($query) ) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            return false;
        }
        return true;
    }

    # Funcion que devuelve las estadisticas de un usuario.
    # Devuelve los datos si todo ha ido bien y false si no.
    public function cargar_estadisticas($username){
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();

        $query = sprintf("SELECT id FROM Users U WHERE U.username = '%s'", $conn->real_escape_string($username));
        $rs = $conn->query($query);
        $fila = $rs->fetch_assoc();
        $id_user = $fila["id"];

        $query = sprintf("SELECT * FROM Statistics S WHERE (S.id_user = '%d')", $id_user);

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
        return $result;
    }


    # Funcion que devuelve los objetos de un usuario.
    public function cargar_objetos($id_user){
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();

        $query = sprintf("SELECT O.real_name, O.description FROM State_game S join Objects O on (S.object = O.name) WHERE (S.id_user = '%d')", $id_user);

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
        return $result;
    }


    public function borrar_estadistica($id_game){
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("DELETE FROM Statistics WHERE id_game = '%d'",
        $id_game
        );
        if (! $conn->query($query) ) {
            echo "Error al borrar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
        }
        else{
            return true;
        }
    }


    /* Utils ---------------------------------------------------------------------------------*/

    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }


    public function compruebaPassword($password)
    {
        return password_verify($password, $this->pass);
    }


    /* Getters and Setters -------------------------------------------------------------------*/

    public function getId()
    {
        return $this->id;
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function getPass()
    {
        return $this->pass;
    }
}
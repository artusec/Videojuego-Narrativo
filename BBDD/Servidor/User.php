<?php
require_once __DIR__ . '/Aplication.php';


class User
{
    private $id;
    private $username;
    private $pass;
    private $email;


    private function __construct($array)
    {
        $this->username= $array['username'];
        $this->pass = $array['pass'];
        $this->email = $array['email'];
    }


    public static function login($username, $password)
    {
        $user = self::find_user_by_username($username);

        if ($user && $user->compruebaPassword($password)) {
            return $user;
        }
        return false;
    }


    public static function find_by_username($username)
    {
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM users U WHERE U.username = '%s'", $conn->real_escape_string($username));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $user = new User($fila);
                $user->id = $fila['id'];
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
        }
        return $result;
    }


    public static function find_by_id($id)
    {
        $app = Aplication::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM Users U WHERE U.id = '%d'", $conn->real_escape_string($id));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $user = new User($fila);
                $user->id = $fila['id'];
                $result = $user;  
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }


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
            $user->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $user;
    }
    

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

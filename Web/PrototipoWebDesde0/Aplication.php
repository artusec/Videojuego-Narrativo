<?php

    class Aplication {

        private $conexion;
        private $datosBD;
        private $inicializada = false;
        private static $instancia;

        public static function getSingleton() {
            if (!self::$instancia instanceof self) {
                self::$instancia = new self;
            }
            return self::$instancia;
        }

        public function init($datosBD) {
            if(!$this->inicializada) {
                $this->datosBD = $datosBD;
                $this->inicializada = true;
            }
        }

        public function conexionBD() {
            if(!$this->inicializada)
                exit();
            if(!$this->conexion) {
                $host = $this->datosBD['host'];
                $user = $this->datosBD['user'];
                $pass = $this->datosBD['pass'];
                $bd = $this->datosBD['bd'];

                $this->conexion=mysqli_connect($host, $user, $pass);
                mysqli_select_db($this->conexion, $bd);
                

                if ($this->conexion->connect_errno) {
                    echo "Error de conexión a la BD: (" . $this->conexion->connect_errno . ") " . utf8_encode($this->conn->connect_error);
                    exit();
                }
                if (!$this->conexion->set_charset("utf8mb4")) {
                    echo "Error al configurar la codificación de la BD: (" . $this->conexion->errno . ") " . utf8_encode($this->conn->error);
                    exit();
                }
            }
            return $this->conexion;
        }

    }

?>
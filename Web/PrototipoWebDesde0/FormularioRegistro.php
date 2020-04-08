<?php
require_once __DIR__.'/User.php';
require_once __DIR__.'/Form.php';

class FormRegistro extends Form {
    
    public function __construct() {
        parent::__construct('registroUsuario', array('action' => 'Register.php'));
    }

    protected function generaCamposFormulario($datosIniciales) {

        $html = '<div class="row gtr-50 gtr-uniform">
                    <div class="col-12">
                        <input type="text" name="nombre" id="name" value="" placeholder="Nombre" />
                    </div>
                    <div class="col-12">
                        <input type="text" name="apellidos" id="name" value="" placeholder="Apellidos" />
                    </div>
                    <div class="col-12">
                        <input type="email" name="email" id="email" value="" placeholder="Email" />
                    </div>
                    <div class="col-12">
                        <input type="password" name="pass" id="pass" value="" placeholder="Contraseña" />
                    </div>
                    <div class="col-12">
                        <input type="password" name="pass2" id="pass2" value="" placeholder="Repite la contraseña" />
                    </div>
                    <div>
                        <input type="checkbox" name="profesor" id="profesor"/>
                        <label> ¿Eres profesor? </label>
                    </div>
                    <div class="col-12">
                        <ul class="actions special">
                            <li><input type="submit" value="Aceptar" /></li>
                        </ul>
                    </div>
                </div>';
        return $html;
    }
    

    protected function procesaFormulario($datos) {

        $erroresFormulario = array();
                
        $email = isset($datos['email']) ? $datos['email'] : null;
        if ( empty($email) || strlen($email) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erroresFormulario[] = "El email debe tener un formato válido.";
        }
        
        $pass = isset($datos['pass']) ? $datos['pass'] : null;
        if ( empty($pass) || strlen($pass) < 5 ) {
            $erroresFormulario[] = "La contraseña tiene que tener una longitud de al menos 5 carácteres.";
        }

        $pass2 = isset($datos['pass2']) ? $datos['pass2'] : null;
        if ( empty($pass2) || strcmp($pass, $pass2) !== 0 ) {
            $erroresFormulario[] = "Las contraseñas deben coincidir";
        }

        $nombre = isset($datos['nombre']) ? $datos['nombre'] : null;
        if ( empty($nombre) || strlen($nombre) < 1 ) {
            $erroresFormulario[] = "El nombre tiene que tener al menos un carácter.";
        }

        $apellidos = isset($datos['apellidos']) ? $datos['apellidos'] : null;
        if ( empty($apellidos) || strlen($apellidos) < 1 ) {
            $erroresFormulario[] = "El apellido tiene que tener al menos un carácter.";
        }

        $profesor = $datos['profesor'];

        if (count($erroresFormulario) === 0) {
           
            if (User::buscaUsuario($email))
                $erroresFormulario[] = "El usuario ya existe";
            else {
                $user = array("email" => $email,
                                "pass" => $pass,
                                "nombre" => $nombre,
                                "apellidos" => $apellidos,
                                "profesor" => $profesor,
                                "administrador" => 0
                        );
                if ($user = User::crea($user)) {
                    $_SESSION['login'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $user->getId();
                    $_SESSION['nombre'] = $user->getNombre();
                    $_SESSION['profesor'] = $user->getEsProfesor();

                    return 'index.php';
                }
            }
        }
        return $erroresFormulario;
    }
}
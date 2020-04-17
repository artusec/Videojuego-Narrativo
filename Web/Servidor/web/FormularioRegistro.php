<?php
require_once '../User.php';
require_once 'Form.php';

class FormRegistro extends Form {
    
    public function __construct() {
        parent::__construct('registroUsuario', array('action' => 'Register.php'));
    }

    protected function generaCamposFormulario($datosIniciales) {

        $html = '<form class="form-inline">
                    <div class="form-group">
                        Usuario<input type="text" name="username" class="form-control" id="username" value=""  placeholder="Username">
                    </div>
                    <div class="form-group">
                        Email<input type="email" name="email" class="form-control" id="email" value=""  placeholder="Email">
                    </div>
                    <div class="form-group">
                    Contraseña<input type="password" name="pass" class="form-control" id="pass" value=""  placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                    Repite la contraseña<input type="password" name="pass2" class="form-control" id="pass2" value=""  placeholder="Repite la contraseña">
                    </div>
                    <div class="col text-center">
                        <button class="btn btn-danger btn-lg" type="submit" value="Aceptar">Aceptar</button>
                    </div>  
                </form>';
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

        $username = isset($datos['username']) ? $datos['username'] : null;
        if ( empty($username) || strlen($username) < 1 ) {
            $erroresFormulario[] = "El username tiene que tener al menos un carácter.";
        }

        if (count($erroresFormulario) === 0) {
           
            if ($user = User::find_user_by_username($username))
                $erroresFormulario[] = "El usuario ya existe";
            else {
                if ($user = User::insert_user($username, $email, $pass)) {
                    $_SESSION['login'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $user->getUsername();
                    $_SESSION['id'] = $user->getId();
                    return '../inicio.php';
                }
            }
        }
        return $erroresFormulario;
    }
}
<?php
require_once '../User.php';
require_once 'Form.php';

class FormLogin extends Form {
    public function __construct() {
        parent::__construct('Login', array('action' => 'Login.php'));
    }

    protected function generaCamposFormulario($datos) {
        $html = '<form class="form-inline">
                    <fieldset>
                        <legend><h1 >Login</h1></legend>
				        <p>Identifícate o <a href="Register.php" id ="reg" aria-label="Página de registro" >REGÍSTRATE</a></p>
                        <div class="form-group">
                            <label for="username" >Usuario</label>
                            <input type="text" aria-label="Campo para introducir el usuario" name="username" class="form-control" id="username" value=""  placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="pass" >Contraseña</label>
                            <input type="password" aria-label="Campo para introducir la contraseña" name="pass" class="form-control" id="pass" value=""  placeholder="Contraseña">
                        </div>
                ';
        return $html;
    }

    protected function procesaFormulario($datos) {   

       
        $erroresFormulario = array();
        

        $username = isset($datos['username']) ? $datos['username'] : null;

        if ( empty($username) ) {
            $erroresFormulario[] = "El username no puede estar vacío";
        }

        $password = isset($datos['pass']) ? $datos['pass'] : null;
        if ( empty($password) ) {
            $erroresFormulario[] = "El password no puede estar vacío.";
        }

        if (count($erroresFormulario) == 0) {
            if ($usuario = User::login($username, $password)) {
                    $_SESSION['login'] = true;
                    $_SESSION['id'] = $usuario->getId();
                    $_SESSION['username'] = $usuario->getUsername();
                    
                    return "./Miperfil.php";
            } else
                $erroresFormulario[] = "No existe usuario con ese nombre o la contraseña es incorrecta";
        }
        
        return $erroresFormulario;
    }
}   
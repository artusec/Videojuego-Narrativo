<?php
require_once __DIR__.'/User.php';
require_once __DIR__.'/Form.php';

class FormLogin extends Form {
    public function __construct() {
        parent::__construct('Login', array('action' => 'Login.php'));
    }

    protected function generaCamposFormulario($datosIniciales) {
        $html = '<section>
                    <div>
                        <h2>Entrar</h2>
                        <form method="post" action="#">
                            <div>
                                <div>
                                    <input type="text" name="email" id="email" value="" placeholder="Email" />
                                </div>
                                <div>
                                    <input type="password" name="pass" id="pass" value="" placeholder="Contraseña" />
                                </div>
                                 <div>
                                    <ul class="actions special">
                                        <li><input type="submit" value="Aceptar" /></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>';
        return $html;
    }

    protected function procesaFormulario($datos) {   

        $erroresFormulario = array();

        $email = isset($datos['email']) ? $datos['email'] : null;

        if ( empty($email) ) {
            $erroresFormulario[] = "El email no puede estar vacío";
        }

        $password = isset($datos['pass']) ? $datos['pass'] : null;
        if ( empty($password) ) {
            $erroresFormulario[] = "El password no puede estar vacío.";
        }

        if (count($erroresFormulario) === 0) {
            if ($usuario = User::login($email, $password)) {
                    $_SESSION['login'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $usuario->getId();
                    $_SESSION['nombre'] = $usuario->getNombre();
                    $_SESSION['admin'] = $usuario->getEsAdministrador();
                    $_SESSION['profesor'] = $usuario->getEsProfesor();
                    return "index.php";
            } else
                $erroresFormulario[] = "El usuario o el password no coinciden";
        }
        return $erroresFormulario;
    }
}   
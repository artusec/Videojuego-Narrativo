<nav title="Menu horizontal" class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar" role="navigation">
        <a class="navbar-brand" href="./inicio.php" aria-label="Ir al la página principal"><span class="Name-font1">ASHED MEMORIES</span></a>
        <div class="display-movil">
            <ul class="nav justify-content-center">
                <li class="nav-item ">
                    <a  aria-label="Cambiar el contraste de la página" onclick="cambioContraste()" id="link-icono-cambiante"><img id="icono-cambiante" src="./imagenes/hcontrast.png " alt=""></a>
                </li>
                    &nbsp
                    &nbsp
                    &nbsp
                    &nbsp
                    &nbsp
            </ul>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" role="button" href="./inicio.php#descarga" aria-label="Ir al la parte de descargar">Descarga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" role="button" href="./inicio.php#minijuegos" aria-label="Ir al la parte de minijuegos">Minijuegos</a>
                </li>
<?php
        if (isset($_SESSION['login']) && $_SESSION['login'] === true){
?>
                <li class="nav-item">
                    <a class="nav-link" role="button" aria-label="Ver tus datos del juego" href="./MiPerfil.php">Mi perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" role="button" aria-label="Cerrar sesión y volver a la página principal" href="./Logout.php">Cerrar Sesion</a>
                </li>
<?php
        } else {
?>
                <li class="nav-item">
                    <a class="nav-link" role="button" aria-label="Ir a la página para identificarte y acceder a mi perfil" href="./Login.php">Acceder</a>
                </li>
<?php
        }
?>             
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li class="no-display-movil">
                    <a  aria-label="Poner la página con colores en alto contraste" onclick="modoAltoContraste()"><img src="./imagenes/hcontrast.png" alt=""></a>        
                    <label class="switch" for="mode" id="switch-label">
                        <input type="checkbox" id="mode" aria-checked="true"  aria-label="Cambiar el contraste de la página" checked role="checkbox" aria-labelledby="switch-label"> 
                            <span class="slider round"></span>
                    </label>      
                    <a  aria-label="Poner la página con colones sin alto contraste" onclick="modoNormal()"><img src="./imagenes/ncontrast.png" alt=""></a>
                </li>
                &nbsp
                &nbsp
                &nbsp
                &nbsp
                &nbsp
                &nbsp
                &nbsp
                &nbsp
            </ul>
    </div>
</nav>
<nav title="Menu horizontal" class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar" role="navigation">
        <a class="navbar-brand" href="./inicio.php"><span class="Name-font1">ASHED MEMORIES</span></a>
        <div class="display-movil">
            <ul class="nav justify-content-center">
                <li class="nav-item ">
                    <a  aria-label="Cambiar el contraste de la página" onclick="cambioContraste()"><img id="icono-cambiante" src="./imagenes/hcontrast.png " alt=""></a>
                </li>
                    &nbsp
                    &nbsp
                    &nbsp
                    &nbsp
                    &nbsp
                <li class="nav-item">
                    <button type="button" aria-label="Desminuir el tamaño de las letras de la página" class="btn btn-secondary" onclick="decreaseSize()"><img src="./imagenes/Tminus.png " alt=""></button>             
                </li>
                <li class="nav-item">
                    <button type="button" aria-label="Aumentar el tamaño de las letras de la página" class="btn btn-secondary" onclick="increaseSize()"><img src="./imagenes/Tplus.png " alt=""></button>                
                </li>
            </ul>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./inicio.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./inicio.php#minijuegos">Minijuegos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./inicio.php#descarga">Descarga</a>
                </li>
<?php
        if (isset($_SESSION['login']) && $_SESSION['login'] === true){
?>
                <li class="nav-item">
                    <a class="nav-link" aria-label="Ver tus datos del juego" href="./MiPerfil.php">Mi perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-label="Cerrar sesión y volver a la página principal" href="./Logout.php">Cerrar Sesion</a>
                </li>
<?php
        } else {
?>
                <li class="nav-item">
                    <a class="nav-link" aria-label="Ir a la página para identificarte y acceder a mi perfil" href="./Login.php">Acceder</a>
                </li>
<?php
        }
?>             
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li class="no-display-movil">
                <a  aria-label="Poner la página con colores en alto contraste" onclick="modoAltoContraste()"><img src="./imagenes/hcontrast.png" alt=""></a>
                    <label class="switch" for="mode">
                        <input type="checkbox" id="mode" checked> 
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
                <li class="no-display-movil">
                    <button type="button" aria-label="Desminuir el tamaño de las letras de la página" class="btn btn-secondary" onclick="decreaseSize()"><img src="./imagenes/Tminus.png " alt=""></button>             
                
                </li>
                &nbsp
                <li class="no-display-movil" >
                    <button type="button" aria-label="Aumentar el tamaño de las letras de la página" class="btn btn-secondary" onclick="increaseSize()"><img src="./imagenes/Tplus.png " alt=""></button>                
                </li>
                &nbsp
                &nbsp
                &nbsp
                &nbsp
                &nbsp
                &nbsp
            </ul>
    </div>
</nav>
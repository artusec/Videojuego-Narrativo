<nav title="Menu horizontal" role="navigation">
    <ul class="nav justify-content-center">
        <li class="nav-item" id="">
            <a class="nav-link" href="./inicio.php">Introduccion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./inicio.php#3">Minijuegos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./inicio.php#4">Descarga</a>
        </li>
<?php
        if (isset($_SESSION['login']) && $_SESSION['login'] === true){
?>
            <li class="nav-item">
                <a class="nav-link" aria-label="Ver tus datos del juego" href="./MiPerfil.php">Mi perfil</a>
            </li>
            <li>
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
            <li class="nav-item" id="left-pad2">
                <a class="nav-link"  aria-label="Poner la página con colores en alto contraste" onclick="modoAltoContraste()">Modo Alto Contraste</a>
            </li>
            <li class="nav-item">
                 <label class="switch" for="mode">
                    <input type="checkbox" id="mode" checked> 
                        <span class="slider round"></span>
                </label>               
            </li>
            <li class="nav-item">
                <a class="nav-link"  aria-label="Poner la página con colones sin alto contraste" onclick="modoNormal()">Modo Normal</a>
            </li>
            <li class="nav-item" id="minus-button">
                <button type="button" aria-label="Desminuir el tamaño de las letras de la página" class="btn btn-secondary" onclick="decreaseSize()">-</button>             
            </li>
            <li class="nav-item" id="plus-button">
                <button type="button" aria-label="Aumentar el tamaño de las letras de la página" class="btn btn-secondary" onclick="increaseSize()">+</button>                
            </li>
    </ul>
</nav>
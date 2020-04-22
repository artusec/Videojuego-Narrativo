<nav title="Menu horizontal">
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
                <a class="nav-link" href="./MiPerfil.php">Mi perfil</a>
            </li>
            <li>
                <a class="nav-link" href="./Logout.php">Cerrar Sesion</a>
            </li>
<?php
        } else {
?>
            <li class="nav-item">
                <a class="nav-link" href="./Login.php">Acceder</a>
            </li>
<?php
        }
?>             
            <li class="nav-item" id="left-pad2">
                <a class="nav-link"  onclick="modoAltoContraste()">Modo Alto Contraste</a>
            </li>
            <li class="nav-item">
                 <label class="switch" for="mode">
                    <input type="checkbox" id="mode" checked> 
                        <span class="slider round"></span>
                </label>               
            </li>
            <li class="nav-item">
                <a class="nav-link"  onclick="modoNormal()">Modo Normal</a>
            </li>
    </ul>
</nav>
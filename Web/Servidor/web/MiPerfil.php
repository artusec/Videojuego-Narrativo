<?php 
	require_once '../User.php';
	require_once '../DB_data.php';
?>

<!DOCTYPE html>
<html>
	

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="miperfilstyle.css">


<head>
	<title>Registrar</title>
	<meta charset="utf-8" /></title>
</head>

		<body>
			
		<nav title="Menu horizontal">
				<ul class="nav justify-content-center">
					<li class="nav-item">
						<a class="nav-link" href="../inicio.php">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../inicio.php#3">Minijuegos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../inicio.php#4">Descarga</a>
					</li>
		<?php
					if (isset($_SESSION['login']) && $_SESSION['login'] === true){
		?>
						<li class="nav-item">
							<a class="nav-link" href="../web/MiPerfil.php">Mi perfil</a>
						</li>
						<li>
							<a class="nav-link" href="../Logout.php">Cerrar Sesion</a>
						</li>
		<?php
					}
		?>
						<li class="nav-item">
							<a class="nav-link"  onclick="modoAltoContraste()">Modo Alto Contraste</a>
						</li>

						<li class="nav-item">
							<a class="nav-link"  onclick="modoNormal()">Modo Normal</a>
						</li>
						
				</ul>
			</nav>

	<div class="container-fluid">
	
	<p>&nbsp</p>
	<p>&nbsp</p>
		<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<h1>ESTADISTICAS</h1>
					<table>
						<thead>
							<tr>
								<th>Juego</th>
								<th>Fecha</th>
								<th>Tiempo</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$html = "";
								$juegos = User::cargar_estadisticas($_SESSION['username']);
								$numjuegos = sizeof($juegos);
								if($numjuegos > 0) {
									for ($i=0; $i < $numjuegos; $i++) {
										$html .= '<tr>';
										$html .= '<td>' . $juegos[$i]['id_game'] . '</td>';
										$html .= '<td>' . $juegos[$i]['date_start'] . '</td>';
										$html .= '<td>' . $juegos[$i]['timed'] . '</td>';
										$html .= '</tr>';                          
									}
								}
								else{
									$html .= '<tr>';
									$html .= '<td>Nada que mostrar</td>';
									$html .= '<td>Nada que mostrar</td>';
									$html .= '<td>Nada que mostrar</td>';
									$html .= '</tr>'; 

								}
								echo $html;
							?>
						</tbody>
					</table>
				</div>
				<div class="col-sm-4"></div>
			
		</div>
		<p>&nbsp</p>
			<p>&nbsp</p>
			<p>&nbsp</p>
			<p>&nbsp</p>

			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<h1>Objetos de la partida actual</h1>
					<table>
						<thead>
							<tr>
								<th>Nombre del objeto</th>
								<th>Descripción</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$html = "";
								$objetos = User::cargar_objetos($_SESSION['id']);
								$numobjetos = sizeof($objetos);
								if($numobjetos > 0) {
									for ($i=0; $i < $numobjetos; $i++) {
										$html .= '<tr>';
										$html .= '<td>' . $objetos[$i]['real_name'] . '</td>';
										$html .= '<td>' . $objetos[$i]['description'] . '</td>';
										$html .= '</tr>';                          
									}
								}
								else{
									$html .= '<tr>';
									$html .= '<td>Nada que mostrar</td>';
									$html .= '<td>Nada que mostrar</td>';
									$html .= '</tr>'; 

								}
								echo $html;
							?>
						</tbody>
					</table>
				</div>
				<div class="col-sm-4"></div>
			
		</div>



	

<?php
    require_once __DIR__ . '../footer.html';
?>
 
</body>
</html>
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

<script src="./js/cookies.js"></script>


<head>
<link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
	<title>Mi perfil</title>
	<meta charset="utf-8" /></title>
</head>

		<body>
			
<?php
    require_once './generic/header.php';
?>

	<div class="container-fluid">
	
	<p>&nbsp</p>
	<p>&nbsp</p>
		<div class="row">
		<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<h1><p class="text-center"><img class="animation" id="animation1"src="./imagenes/animation.gif">Estadisticas</p></h1>
					<p>&nbsp</p>
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th><img src="./imagenes/save.png" alt="">&nbsp Partida</th>
								<th>Ultima vez jugado</th>
								<th><img src="./imagenes/clock.png" alt="">&nbsp Tiempo</th>
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
				<div class="col-sm-3"></div>
			
		</div>
		<p>&nbsp</p>
			<p>&nbsp</p>
			<p>&nbsp</p>
			<p>&nbsp</p>

			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<h1><p class="text-center">Objetos de la partida actual<img class="animation2" id="animation2" src="./imagenes/animation-obj.gif"></p></h1>
					<p>&nbsp</p>
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th></th>
								<th>Objeto</th>
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
										switch ($objetos[$i]['real_name']) {
											case "Carpeta chamuscada":
												$html .= '<td><img src="./imagenes/directory.png" alt=""></td>';
												break;
											case "Llave oxidada":
												$html .= '<td><img src="./imagenes/oldkey.png" alt=""></td>';
												break;	
											case "Llave pequeña":
												$html .= '<td><img src="./imagenes/key.png" alt=""></td>';
												break;	
											case "Juego Simón":
												$html .= '<td><img src="./imagenes/game.png" alt=""></td>';
												break;	
											case "Ganzúa":
												$html .= '<td><img src="./imagenes/lockpick.png" alt=""></td>';
												break;
											case "Osito de peluche":
												$html .= '<td><img src="./imagenes/doll.png" alt=""></td>';
												break;
											case "Pomo":
												$html .= '<td><img src="./imagenes/door-handle.png" alt=""></td>';
												break;
											default:
											$html .= '<td><img src="./imagenes/info.png" alt=""></td>';;
										} 
										$html .= '<td>' . $objetos[$i]['real_name'] . '</td>';
										$html .= '<td>' . $objetos[$i]['description'] . '<p>&nbsp</p></td>';
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
					<p>&nbsp</p>
			<p>&nbsp</p>
			<p>&nbsp</p>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>



	

<?php
    require_once __DIR__ . './generic/footer.html';
?>
 
</body>
<?php
    require_once './js/scripts.js';
?>

</html>
<?php 
	require_once '../User.php';
	require_once '../DB_data.php';
?>

<!DOCTYPE html>
<html>
	

<meta charset="UTF-8">
<meta name="description" content="ASHED MEMORIES - JUEGO ACCESIBLE - MI PERFIL" >
<meta name="keywords" content="ACCESIBILIDAD, JUEGO, ASHED, MEMORIES,PERFIL, ESTADISTICAS">
<meta  name="viewport" content="width=device-width, initial-scale=1.0">  

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

 <!--- FUENTES DEL TITULO-->
 <link href='https://fonts.googleapis.com/css?family=Julee' rel='stylesheet'>   
 
<link rel="stylesheet" type="text/css" href="loginstyle.css">

<script type="text/javascript" src="./js/cookies.js"></script>
<script type="text/javascript" src = "./js/borrarPartida.js"></script>


<head>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
	<title>Mi perfil</title>
	<meta charset="utf-8" /></title>
</head>
<body>
			
<header>
<?php
    require_once './generic/header.php';
?>
</header>


<main>
	<div class="container-fluid">
	


	<section aria-label="Estadisticas de tus partidas">
	<br aria-hidden="true">
	<br aria-hidden="true">
	<br aria-hidden="true">
	<ol class="breadcrumb" aria-label="breadcrumb">
        <li><a class="bread-link" href="./inicio.php" aira-label="Ir al la página principal">Inicio</a></li>
        <li class="active" aria-current="page">Mi perfil</li>        
    </ol>
	<br aria-hidden="true">
			<div class="row">
				<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h1 class="text-center"><img class="animation" id="animation1" src="./imagenes/animation.gif"  alt="">PARTIDAS FINALIZADAS</h1>
						<br aria-hidden="true">
						<table class="table">
							<thead class="thead">
								<tr>
									<th scope="col"><img src="./imagenes/save.png" alt="">&nbsp Partida</th>
									<th scope="col"><img src="./imagenes/sand.png" alt="">&nbsp Día de inicio</th>
									<th scope="col"><img src="./imagenes/clock.png" alt="">&nbsp Tiempo</th>
									<th scope="col"><img src="./imagenes/rubbbish.png" alt="">&nbsp Borrar Partida</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$html = "";
									$juegos = User::cargar_estadisticas($_SESSION['username']);
									$numjuegos = sizeof($juegos);
									if($numjuegos > 0) {
										for ($i=0; $i < $numjuegos; $i++) {
											$html .= '<tr id='.$juegos[$i]["id_game"] . '>';
											$html .= '<td>' . $juegos[$i]['id_game'] . '</td>';
											$html .= '<td>' . $juegos[$i]['date_start'] . '</td>';
											$html .= '<td>' . $juegos[$i]['timed'] . '</td>';
											$html .= '<td>
											<button  type="button" class="btn-delete" name="borrar" aria-label="Borrar partida" id="'.$juegos[$i]['id_game'].'" value="">
												<img  src="./imagenes/delete.png"  alt="">
											</button>
											</td>';
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
			<br aria-hidden="true">
			<br aria-hidden="true">
			<br aria-hidden="true">
			<br aria-hidden="true">
		</section>
		<section aria-label="Objetos de tu partida">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h1 class="text-center">OBJETOS DE LA PARTIDA</h1>
						<br aria-hidden="true">
						<table class="table">
							<thead class="thead">
								<tr>
									<th scope="col">Imagen</th>
									<th scope="col">Objeto</th>
									<th scope="col">Descripción</th>
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
						<br aria-hidden="true">
						<br aria-hidden="true">
						<br aria-hidden="true">
					</div>
					<div class="col-sm-3"></div>
				</div>
			</section>
		</div>		
</main>

<?php
    require_once __DIR__ . './generic/footer.html';
?>
 
<script>
<?php
    require_once './js/scripts.js';
    require_once './js/contrasteResto.js';
    ob_end_flush();
?> 
</script>
</body>

</html>
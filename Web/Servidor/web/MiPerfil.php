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
	<title>Registrar</title>
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
		<div class="col-sm-3"><img class="animation" id="animation1"src="./imagenes/animation.gif"></div>
				<div class="col-sm-6">
					<h1><p class="text-center">Estadisticas</p></h1>
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
					<h1><p class="text-center">Objetos de la partida actual</p></h1>
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
				<div class="col-sm-3"><img class="animation2" id="animation2" src="./imagenes/animation-obj.gif"></div>
			</div>
		</div>



	

<?php
    require_once __DIR__ . './generic/footer.html';
?>
 
</body>
<script>

	$( document ).ready(function() {
            if (detectCookie("accesibility")){
            modoAltoContraste();
        }
        else{
            modoNormal();
        }
        });


    function modoAltoContraste(){
        //Poner el menu a contraste alto
        $(".nav").css({"background-color": "black"});
        $("a").css({"color": "yellow"});


        //Poner ela pagina a alto contraste 
        $(".container-fluid").css({"background-color": "black","color":"yellow"});
		$("#animation1").attr("src", "./imagenes/animation2.gif");
		$("#animation2").attr("src", "./imagenes/animation-obj-2.gif");

        //Poner el footer a alto contraste 
        $(".page-footer").css({"background-color": "black","color":"yellow"});
        $(".list-group-item").css({"background-color": "black","color":"yellow"});

		$('.table .thead-dark th').css({"color": "yellow"});
		$('.table').css({"color": "yellow"});

		$('#mode').prop('checked', false);
		
		$('.nav-link').css({"background-color": "black"})

		setCookie("accesibility", 1, 1);
		
		$('.nav-link').hover(function(){
					$(this).css({"background-color": "dimgray"});
				}, function(){
					$(this).css({"background-color": "black"});
	});
    }

    function modoNormal(){
    //Volver a modo normal 
        $(".nav").css({"background-color": "#591D77"});
        $("a").css({"color": "#F2F1EF"});

        $(".container-fluid").css({"background-color": "#9932CC","color":"#fefefe"});
		$("#animation1").attr("src", "./imagenes/animation.gif");
		$("#animation2").attr("src", "./imagenes/animation-obj.gif");

        $(".page-footer").css({"background-color": "#591D77","color":"#fefefe"});
        $(".list-group-item").css({"background-color": "#9932CC","color":"#fefefe"});

		$('.nav-link').css({"background-color": "#591D77"})

		$('.table').css({"color": "#F2F1EF"})
		$('.table .thead-dark th').css({"color": "#F2F1EF"});

		removeCookie("accesibility");
		
		$('#mode').prop('checked', true);

		$('.nav-link').hover(function(){
                $(this).css({"background-color": "#9932CC"});
            }, function(){
                $(this).css({"background-color": "#591D77"});
            });

            $('#mode').prop('checked', true);
    }

	$('#mode').change(function() {
            if(this.checked) { 
                console.log("change");
                modoNormal();
            }
            else{
                modoAltoContraste();
            }
        });

</script>

</html>
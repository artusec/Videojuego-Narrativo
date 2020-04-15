<?php 
	require_once '../User.php';
	require_once '../DB_data.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>ESTADISTICAS</h2>
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
	<h2>Objetos de tu inventario</h2>
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
				$objetos = User::cargar_objetos_inventario($_SESSION['username']);
				$numobjetos = sizeof($objetos);
				if($numobjetos > 0) {
					for ($i=0; $i < $numobjetos; $i++) {
                        $html .= '<tr>';
                        $html .= '<td>' . $objetos[$i]['id_game'] . '</td>';
                        $html .= '<td>' . $objetos[$i]['date_start'] . '</td>';
						$html .= '<td>' . $objetos[$i]['timed'] . '</td>';
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
</body>
</html>
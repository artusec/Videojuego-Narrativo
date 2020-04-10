<?php 
	require_once '../User.php';
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
				<th>Juegos</th>
				<th>Tiempo</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$juegos = User::cargar_estadisticas($_SESSION['username']);
				$numjuegos = sizeof($juegos);
				if($numjuegos > 0) {
					for ($i=0; $i < $numjuegos; $i++) {
                        $html .= '<tr>';
                        $html .= '<td>' . $juegos[$i]['id'] . '</td>';
                        $html .= '<td>' . $clases[$i]['time'] . '</td>';
                        $html .= '</tr>';                          
					}
					echo $html;
				}
			?>
		</tbody>
	</table>
</body>
</html>
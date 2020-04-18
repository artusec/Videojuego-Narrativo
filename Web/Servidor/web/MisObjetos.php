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
	<h2>MIS OBJETOS</h2>
	<?php
		$objects = User::ver_objetos($_SESSION['username']);
		$i = 0;
		$html = '<table>';
		for($i; $i < sizeof($objects); $i++) {
			$html .= '<tr>';
			$html .= '<td> <img src="../img/'.$objects[$i].'.jpg"> </td>';
			$html .= '</tr>';
			$html .= '<tr>';
			$html .= '<td>'.$objects[$i].'</td>';
			$html .= '</tr>';
		}
		$html .= '</table>';
		echo $html;
	?>
</body>
</html>
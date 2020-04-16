<?php
	require_once '../DB_data.php';
	require_once 'FormularioRegistro.php';
?>

<!DOCTYPE HTML>
<html lang="ES">
	<head>
		<title>Registrar</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<div>
			<div>
				<h2>Registrar</h2>
				<?php	
					$form = new FormRegistro();
					$form->gestiona();
				?>		
				<label><a href="Login.php"/> ¿Ya tienes cuenta? Accede haciendo clic aquí</label>	
							
			</div>
		</div>
	</body>
</html>
<?php
	require_once '../DB_data.php';
	require_once 'FormularioLogin.php';
?>

<!DOCTYPE HTML>
<html lang="ES">
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<div>
			<div>
				<h2>Login</h2>
				<p>Identifícate o <a href='register.php' id = 'reg'>regístrate</a></p>
				<?php	
					$form = new FormLogin();
					$form->gestiona();
				?>	
			</div>
		</div>
	</body>
</html>
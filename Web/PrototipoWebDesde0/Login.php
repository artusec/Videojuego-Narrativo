<?php
	require_once '/DB_data.php';
	require_once '/FormularioLogin.php';
?>

<!DOCTYPE HTML>
<html lang="ES">
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<div>
			<?php
				$form = new FormLogin();
				$form->gestiona();
			?>
		</div>
	</body>
</html>
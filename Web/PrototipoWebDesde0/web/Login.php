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
			<section>
				<div>
					<div>
						<section>
							<h2>Login</h2>
							<form method="post" action="#">
			<?php	
				$form = new FormLogin();
				$form->gestiona();
			?>			
							</form>
						</section>
					</div>
				</div>
			</section>
		</div>
	</body>
</html>
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
			<section>
				<div>
					<div>
						<section>
							<h2>Registrar</h2>
							<form method="post" action="#">
			<?php	
				$form = new FormRegistro();
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
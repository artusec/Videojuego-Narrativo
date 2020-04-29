<?php
	require_once '../DB_data.php';
	require_once 'FormularioLogin.php';
?>

<!DOCTYPE HTML>
<html lang="ES">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="loginstyle.css">

    <script src="./js/cookies.js"></script>


<head>
<link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
	<title>Login</title>
		<meta charset="utf-8" />
</head>

<body>
		

<?php
    require_once './generic/header.php';
?>
	


	
	<div class="container-fluid">
    <p>&nbsp</p>
		<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">    
				<?php	
				$form = new FormLogin();
				$form->gestiona();
                ?>
                <p>&nbsp</p>
                <p>&nbsp</p>
		</div>
		<div class="col-sm-4"></div>
        </div>
        
	</div>



<?php
    require_once __DIR__ . './generic/footer.html';
?>
 

</body>
<?php
    require_once './js/scripts.js';
?>
</html>
<?php
	require_once '../DB_data.php';
	require_once 'FormularioRegistro.php';
	ob_start();
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
	
	 <!--- FUENTES DEL TITULO-->
	 <link href='https://fonts.googleapis.com/css?family=Julee' rel='stylesheet'>   

    <link rel="stylesheet" type="text/css" href="registerstyle.css">

    <script src="./js/cookies.js"></script>

<head>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link rel="icon" type="image/x-icon" href="./imagenes/favicon.ico" />
	<title>Registrar</title>
	<meta charset="utf-8" />
</head>
<body>

		
<header>
<?php
    require_once './generic/header.php';
?>
</header>

	
<main id="main">
	<div class="container-fluid">
	<p>&nbsp</p>
	<p>&nbsp</p>
		<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
<?php	
		$form = new FormRegistro();
		$form->gestiona();
?>
				</div>
				<div class="col-sm-4"></div>
				<p>&nbsp</p>
				<p>&nbsp</p>
		</div>
	
	</div>
</main>
	
<?php
    require_once  './generic/footer.html';
?>

</body>
<script>
<?php
	require_once './js/scripts.js';
	ob_end_flush();
?>


var scroll_start = 0;
        var startchange = $('main');
        var offset = startchange.offset();
        if (startchange.length){
        $(document).scroll(function() { 

            scroll_start = $(this).scrollTop();
            if(scroll_start > offset.top) {

                if (detectCookie("accesibility")){
                    $('.navbar').css('background-color', 'black');
                }
                else{
                $(".navbar").css('background-color', '#591D77');
                }
            } else {


                if (detectCookie("accesibility")){
                    $('.navbar').css('background-color', 'black');
                }
                else{
                $('.navbar').css('background-color', 'transparent');
                }
                
            }
        });
            }
</script>
</html>
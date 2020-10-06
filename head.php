<?php 
require("login/modelo/conexion.php");

$informacionPagina = mysql_fetch_array(mysql_query("SELECT * FROM informacion WHERE info_id=1",$conexion));
$configuracionPagina = mysql_fetch_array(mysql_query("SELECT * FROM configuracion WHERE conf_id=1",$conexion));

$home = mysql_fetch_array(mysql_query("SELECT * FROM paginas WHERE pag_id=1 AND pag_activa=1",$conexion));
?>

<!DOCTYPE html>

<html lang="en">

<head>

	<!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />    
    <meta name="description" content="" />
    
    <!-- FAVICONS ICON -->
    <link rel="icon" href="login/files/logo/logo.jpeg" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="login/files/logo/logo.jpeg" />
    
    
    
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- [if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
	<![endif] -->
    
    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/fontawesome/css/font-awesome.min.css" />
    <!-- FLATICON STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/flaticon.min.css">
    <!-- ANIMATE STYLE SHEET --> 
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <!-- BOOTSTRAP SELECT BOX STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
    <!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.min.css">
    <!-- LOADER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/loader.min.css">    
    <!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- THEME COLOR CHANGE STYLE SHEET -->
    <link rel="stylesheet" class="skin" type="text/css" href="css/skin/skin-8.css">
    <!-- CUSTOM  STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- SIDE SWITCHER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="css/switcher.css"> 


    <a href="https://api.whatsapp.com/send?phone=<?= $informacionPagina['info_whatsapp']; ?>&text=Hola, estoy en su sitio web, tengo una consulta..." class="float" target="_blank">
		<i class="fa fa-whatsapp my-float"></i>
	</a>
	
<style type="text/css">
/*whatsapp*/	
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:60px;
	right:10px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  	font-size:30px;
	box-shadow: 2px 2px 3px #999;
  	z-index:100;
}

.my-float{
	margin-top:16px;
}
</style>
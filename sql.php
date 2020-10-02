<?php
include("login/modelo/conexion.php");
//MENSAJE CONTACTENOS
if($_POST["idSQL"]==1){
	
	mysql_query("INSERT INTO contactenos(cont_nombre, cont_email, cont_telefono, cont_asunto, cont_mensaje)
	VALUES('".$_POST["nombre"]."','".$_POST["email"]."','".$_POST["tel"]."','".$_POST["asunto"]."', '".$_POST["mensaje"]."')",$conexion);
	if(mysql_errno()!=0){echo mysql_error(); exit();}

	echo '<script type="text/javascript">window.location.href="contacto.php?msg=1";</script>';
	exit();
}

//SUSCRITOS AL CORREO
if($_POST["idSQL"]==2){
	mysql_query("INSERT INTO boletin(bol_email)VALUES('".$_POST["email"]."')",$conexion);
	if(mysql_errno()!=0){echo mysql_error(); exit();}

	echo '<script type="text/javascript">window.location.href="'.$_SERVER["HTTP_REFERER"].'";</script>';
	exit();
}
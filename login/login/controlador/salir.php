<?php 
session_start();
include("../modelo/conexion.php");
//mysql_query("UPDATE usuarios SET usu_sesion_activa=0 WHERE usu_id='".$_GET["id"]."'",$conexion);
//if(mysql_errno()!=0){echo mysql_error(); exit();}
session_destroy();
header("Location:../login/");
?>
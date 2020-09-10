<?php
session_start();
if($_SESSION["id"]==""){
	$usuarioActivo = $_SERVER['REMOTE_ADDR'];
}else{
	$usuarioActivo = $_SESSION["id"];
}

require("modelo/conexion.php");

$informacionPagina = mysql_fetch_array(mysql_query("SELECT * FROM informacion WHERE info_id=1",$conexion));
$configuracionPagina = mysql_fetch_array(mysql_query("SELECT * FROM configuracion WHERE conf_id=1",$conexion));
?>
<?php
$consultaVisita = mysql_query("SELECT * FROM visitas WHERE vis_usuario='".$usuarioActivo."'",$conexion);
$numVisita = mysql_num_rows($consultaVisita);
$datoVisita = mysql_fetch_array($consultaVisita);
if($numVisita>0){
	$suma = $datoVisita[4]+1;
	mysql_query("UPDATE visitas SET vis_cantidad='".$suma."' WHERE vis_usuario='".$usuarioActivo."' AND date(vis_fecha)='".date("Y-m-d")."'",$conexion);
}else{
	mysql_query("INSERT INTO visitas(vis_fecha, vis_usuario, vis_referencia, vis_cantidad, vis_url_pagina)VALUES(now(),'".$usuarioActivo."', '".$_SERVER['HTTP_REFERER']."',1,'".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']."')",$conexion);
}
?>
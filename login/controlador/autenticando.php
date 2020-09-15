<?php 
//session_start();
//$_SESSION["bd"] = date("Y");
include("../modelo/conexion.php");
$pos = strstr($_POST["jUsUaRiO"], '#');
if($pos){
	header("Location:http://www.eumed.net/rev/cccss/04/rbar2.pdf");
	exit();
}
$rst_usrE = mysql_query("SELECT usr_login FROM usuarios WHERE usr_login='".$_POST["jUsUaRiO"]."'",$conexion);
$numE = mysql_num_rows($rst_usrE);
if($numE==0){
	header("Location:".$_SERVER['HTTP_REFERER']);
	exit();
}
$rst_usr = mysql_query("SELECT * FROM usuarios WHERE usr_login='".$_POST["jUsUaRiO"]."' AND usr_clave='".$_POST["jClAvE"]."'",$conexion);
$num = mysql_num_rows($rst_usr);
$fila = mysql_fetch_array($rst_usr);
if($num>0)
{
	session_start();
	$_SESSION["id"] = $fila["usr_id"];
	switch($fila["usr_tipo"]){
		case 1:
		  $url = '../login/admin/';
		break;
		
		case 2:
		  $url = '../area-clientes.php';
		break;
	}
	/*mysql_query("UPDATE gen_usuarios SET usu_sesion_activa=1 WHERE usu_id='".$fila[0]."'",$conexion);*/
	if(mysql_errno()!=0){echo mysql_error();exit();}
	header("Location:".$url);
	exit();
}else{
	header("Location:../j/?error=2");
	exit();
}
?>
<?php include("session.php");?>
<?php include("../../modelo/conexion.php");?>
<?php
mysql_query("DELETE FROM anuncios",$conexion);
mysql_query("DELETE FROM blog",$conexion);
mysql_query("DELETE FROM blog_comentarios",$conexion);
mysql_query("DELETE FROM boletin",$conexion);
mysql_query("DELETE FROM clientes",$conexion);
mysql_query("DELETE FROM clientes_materiales",$conexion);
mysql_query("DELETE FROM contactenos",$conexion);
mysql_query("DELETE FROM eventos",$conexion);
mysql_query("DELETE FROM eventos_inscripcion",$conexion);
mysql_query("DELETE FROM pedidos",$conexion);
mysql_query("DELETE FROM pedidos_items WHERE ppi_estado=1",$conexion);//LOS UNICOS QUE NO SE BORRAN SON LOS QUE ESTAN PIDIENDO EN EL MOMENTO
mysql_query("DELETE FROM portafolio",$conexion);
mysql_query("DELETE FROM productos",$conexion);
mysql_query("DELETE FROM sitios_recomendados",$conexion);
mysql_query("DELETE FROM slider",$conexion);
mysql_query("DELETE FROM sub_categorias",$conexion);
mysql_query("DELETE FROM subpaginas",$conexion);
mysql_query("DELETE FROM testimonios",$conexion);
mysql_query("DELETE FROM tienda_items",$conexion);
mysql_query("DELETE FROM tienda_paquetes",$conexion);
mysql_query("DELETE FROM usuarios WHERE usr_tipo!=1",$conexion);
mysql_query("DELETE FROM videos",$conexion);
mysql_query("DELETE FROM visitas",$conexion);

echo '<script type="text/javascript">window.location.href="index.php"</script>';
exit();
?>
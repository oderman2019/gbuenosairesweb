<?php
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Eventos_Inscritos_".date("d/m/Y").".xls");

include("../../modelo/conexion.php");
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<div align="center">  
		<table  border="1" rules="all">
			<thead>
				<tr>
					<th>Fecha</th>
                    <th>Evento</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
					<th>Estado</th>
					<th>Observaciones</th>
				</tr>
			</thead>
			<tbody>
		<?php
		$filtro = '';

		$filtro = '';
		if(is_numeric($_GET["evento"])){ $filtro .= " AND epi_id_evento='".$_GET["evento"]."'"; }
							
		$consulta = mysql_query("SELECT * FROM eventos_inscripcion 
		INNER JOIN eventos ON epi_id_evento=eve_id
		WHERE epi_id=epi_id $filtro
		",$conexion);
		
		while($resultado = mysql_fetch_array($consulta)){
			
			switch($resultado["epi_estado"]){
				case 1;
					$estado = '<span style="color:gray;">En espera</span>';
				break;
					
				case 2;
					$estado = '<span style="color:green;">Aprobado</span>';
				break;
					
				case 3;
					$estado = '<span style="color:red;">No Aprobado</span>';
				break;
			}

		?>    
					<tr>	
						<td><?=$resultado["epi_fecha"];?></td>
                        <td><?=$resultado["eve_nombre"];?></td>
						<td><?=$resultado["epi_cedula"];?></td>
                        <td><?=$resultado["epi_nombre"];?></td>
                        <td><?=$resultado["epi_email"];?></td>
                        <td><?=$resultado["epi_telefono"];?></td>
						<td><?=$estado?></td>
						<td><?=$resultado["epi_observacion"];?></td>
					</tr>   
		<?php
		}
		?>        
			</tbody>
		</table>
	</body>
</html>		
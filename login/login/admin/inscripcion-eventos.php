<?php include("../../modelo/conexion.php");?>
<?php include("header.php");?>
    
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="../assets/plugins/select2/select2_metro.css" />
	<link rel="stylesheet" href="../assets/plugins/data-tables/DT_bootstrap.css" />
	<!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">

	<?php include("encabezado.php");?>
    
	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">
    
		<?php include("menu.php");?>
        
        
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->        
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						
                        <?php include("panel-color.php");?> 
                        
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Inscritos a eventos <small>...</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.php">Inicio</a> 
								<i class="icon-angle-right"></i>
							</li>
							
							<li>
								<a href="eventos.php">Eventos</a>
								<span class="icon-angle-right"></span>
							</li>
                            
							<li><a href="#">Inscritos a eventos</a></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box purple">
							<div class="portlet-title">
								<div class="caption"><i class="icon-group"></i>Inscritos a eventos</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">
									<div class="btn-group">
										
									</div>
									<div class="btn-group pull-right">
										<button class="btn dropdown-toggle" data-toggle="dropdown">Herramientas <i class="icon-angle-down"></i>
										</button>
										<ul class="dropdown-menu pull-right">
											<li><a href="ev_inscritos_exportar.php?evento=<?=$_GET["evento"];?>">Exportar a Excel</a></li>
										</ul>
									</div>
								</div>
								<?php
								//pedidos estado en espera(1),entregado(2) 
								$filtro = '';
								if(is_numeric($_GET["evento"])){ $filtro .= " AND epi_id_evento='".$_GET["evento"]."'"; }
								
								$consulta = mysql_query("SELECT * FROM eventos_inscripcion 
								INNER JOIN eventos ON epi_id_evento=eve_id
								WHERE epi_id=epi_id $filtro
								",$conexion);
								?>
                                <table class="table table-striped table-bordered table-hover" id="sample_2">
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
                                            <th>Acciones</th>
										</tr>
									</thead>
									<tbody>
                                    	<?php
										while($resultado = mysql_fetch_array($consulta)){
											switch($resultado["epi_estado"]){
													case 1;
														$estado = '<span class="label label-grey">En espera</span>';
													break;
													case 2;
														$estado = '<span class="label label-success">Aprobado</span>';
													break;
													case 3;
														$estado = '<span class="label label-warning">No Aprobado</span>';
													break;
												}
										?>
										<tr class="odd gradeX">
											<td><?=$resultado["epi_fecha"];?></td>
                                            <td><?=$resultado["eve_nombre"];?></td>
                                            <td><?=$resultado["epi_cedula"];?></td>
                                            <td><?=$resultado["epi_nombre"];?></td>
                                            <td><?=$resultado["epi_email"];?></td>
                                            <td><?=$resultado["epi_telefono"];?></td>
											<td><?=$estado?></td>
											<td><?=$resultado["epi_observacion"];?></td>
                                            <td>
                                                <a href="sql.php?idR=<?=$resultado["epi_id"];?>&get=18"><img src="../../files/iconos/aceppt.png"></a>
                                                <a href="sql.php?idR=<?=$resultado["epi_id"];?>&get=19"><img src="../../files/iconos/deletleuser.png"></a>
                                                <a href="sql.php?idR=<?=$resultado["epi_id"];?>&get=27" onClick="if(!confirm('Desea eliminar este registro?')){return false;}"><img src="../../files/iconos/deletle.png"></a>
                                            </td>
										</tr>
                                        <?php }?>
										
									</tbody>
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	
	<?php include("pie.php");?>
    
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="../assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="../assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="assets/plugins/excanvas.min.js"></script>
	<script src="assets/plugins/respond.min.js"></script>  
	<![endif]-->   
    
	<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="../assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
    
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="../assets/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../assets/plugins/data-tables/DT_bootstrap.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
    
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="../assets/scripts/app.js"></script>
	<script src="../assets/scripts/table-managed.js"></script>     
	<script>
		jQuery(document).ready(function() {       
		   App.init();
		   TableManaged.init();
		});
	</script>
</body>
<!-- END BODY -->
</html>
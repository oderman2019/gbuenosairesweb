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
							Categorias <small>...</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.php">Inicio</a> 
								<i class="icon-angle-right"></i>
							</li>
                            
							<li><a href="#">Categorias</a></li>
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
								<div class="caption"><i class="icon-group"></i>Categorias</div>
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
										<!--<a href="categorias-info.php?a=1" class="btn green">Agregar <i class="icon-plus"></i></a>-->
									</div>
									<div class="btn-group pull-right">
										<button class="btn dropdown-toggle" data-toggle="dropdown">Herramientas <i class="icon-angle-down"></i>
										</button>
										<ul class="dropdown-menu pull-right">
											<li><a href="#">Imprimir</a></li>
											<li><a href="#">Guardar como PDF</a></li>
											<li><a href="#">Exportar a Excel</a></li>
										</ul>
									</div>
								</div>
								<?php
								$consulta = mysql_query("SELECT cat_id, cat_nombre, cat_descripcion,cat_activa FROM categorias;",$conexion);
								?>
                                <table class="table table-striped table-bordered table-hover" id="sample_2">
									<thead>
										<tr>
											<th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descripci&oacute;n</th>
                                             <th>Activa</th>
                                            <th>Acciones</th>
										</tr>
									</thead>
									<tbody>
                                    	<?php
										while($resultado = mysql_fetch_array($consulta)){
										switch($resultado["cat_activa"]){
												case 1;
													$activo = '<span class="label label-success">SI</span>';
												break;
												case 2;
													$activo = '<span class="label label-grey">NO</span>';
												break;
											}
										?>
										<tr class="odd gradeX">
											<td><?=$resultado["cat_id"];?></td>
                                            <td><?=$resultado["cat_nombre"];?></td>
                                            <td><?=$resultado["cat_descripcion"];?></td>
                                            <td><?=$activo;?></td>
                                            <td>
                                                <a href="categorias-info.php?a=2&id=<?=$resultado["cat_id"];?>"><img src="../../files/iconos/edit.png"></a>
                                           
										   <?php if($resultado["cat_activa"]==1){?>  
                                            <a href="sql.php?idC=<?=$resultado["cat_id"];?>&get=2" onClick="if(!confirm('Desea desactivar este registro?')){return false;}"><img src="../../files/iconos/deletle.png"></a>
                                         <?php }else{?>
                                          <a href="sql.php?idC=<?=$resultado["cat_id"];?>&get=11" onClick="if(!confirm('Desea activar este registro?')){return false;}"><img src="../../files/iconos/aceppt.png"></a>
                                         <?php }?>
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
	<!--VENTANAS MODALES-->
    <div id="responsive" class="modal hide fade" tabindex="-1" data-width="760">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										<h3>Confirmación</h3>
									</div>
									<div class="modal-body">
										<div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
											<div class="row-fluid">
												<div class="span6">
													<h4>Antes de borrar elija que categoria reemplazara en subcategorias a esta</h4>
													<p><select class="large m-wrap" name="categoria" tabindex="1">
															<option value="">--Selecciones categoria--</option>
															<?php $cCategoria=mysql_query("SELECT cat_id, cat_nombre, cat_descripcion FROM categorias WHERE cat_id NOT IN (1);",$conexion);
															while($rCategoria=mysql_fetch_array($cCategoria)){
															?>
                                                            <option value="<?=$rCategoria["cat_id"]?>" <?php if($resultado["scat_opcion"]==$rCategoria["cat_id"]){echo"selected";}?>><?=$rCategoria["cat_nombre"]?></option>
                                                            <?php }?>
														</select></p>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn">Cancelar</button>
										<button type="button" class="btn blue">Borrar</button>
									</div>
								</div>
    <!--FIN VENTANAS MODALES-->
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
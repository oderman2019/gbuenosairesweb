<?php
$ayuda_modal = mysql_query("SELECT * FROM ayuda",$conexion);
if($numAyuda = mysql_num_rows($ayuda_modal)>0){
	while($am = mysql_fetch_array($ayuda_modal)){
?>
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config<?=$am[0];?>" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3><?=$am[1];?></h3>
				</div>
				<div class="modal-body">
					<p><?=$am[2];?></p>
                    <?php if($am[3]!=""){?><img src="../../files/ayuda/<?=$am[3];?>"><?php } ?>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<?php
	}
}
?>
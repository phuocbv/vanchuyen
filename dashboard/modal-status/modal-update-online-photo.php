<?php 
		    $cid = $_GET['cid'];
			$consulta_mysql="SELECT cid,cons_no
			FROM courier_online 
			WHERE  cid=cid";
			$resultado_consulta_mysql=mysql_query($consulta_mysql);	
			while($row=mysql_fetch_array($resultado_consulta_mysql)){											
			?>	
		  <div id="con-close-modal-online-photo<?php echo $row[cid]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">				
					<div class="modal-content">
					<form action="update_photo.php" enctype="multipart/form-data" method="post" name="frmShipment" id="frmShipment">
						<div class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
							<h3 class="modal-title"><?php echo $L_UPLOADIMAGE; ?></h3> 
						</div>
						<div class="modal-body">
							
							<div class="row" >  
								<div class="col-md-2"> 
									<div class="form-group" style="display:none">
									<label for="field-5" class="control-label">id</label> 									
										<input type="text" class="form-control" id="field-5" name="cid" value="<?php echo $row['cid']; ?>" readonly> 
									</div> 
								</div> 
								<div class="col-md-4"> 
									<div class="form-group" style="display:none"> 
										<label for="field-6" class="control-label">Tracking</label> 
										<input type="text" class="form-control" id="field-6"  name="tracking" value="<?php echo $row['cons_no']; ?>" readonly> 
									</div> 
								</div>
								<div class="col-md-6" style="display:none"> 
									<div class="form-group"> 
										<label for="field-6" class="control-label">Empleado</label> 
										<input type="text" class="form-control" id="field-6" name="deliveruser" value="<?php echo $_SESSION['user_name'] ;?>" readonly> 
									</div> 
								</div> 								
							</div> 
							
							<div class="row"> 
								<div class="col-md-12"> 
									<div class="form-group"> 
										  <label for="imagen">Imagen:</label> 
										  <input class="form-control" id="imagen" name="imagen" size="30" type="file" required />
										  </br>
										  <input class="btn btn-success" type="submit" value="Upload Image" />
									</div> 
								</div> 
							</div>  
						</div>
						
						<div class="col-md-6">
							<img src="img/upload_photo.png" border="0" height="120" width="122"></a>
						</div>							
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $cerrar; ?></button> 
						</div>
						
					</form>	
					</div>				
				</div>
			</div><!-- /.modal -->
			<?php } ?>
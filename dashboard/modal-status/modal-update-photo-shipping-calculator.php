<?php 
		    $cid = $_GET['cid'];
			$consulta_mysql="SELECT cid,name_courier,rate1,services,shipping_day,Weight,WeightType
			FROM scheduledpickup 
			WHERE  cid=cid";
			$resultado_consulta_mysql=mysql_query($consulta_mysql);	
			while($row=mysql_fetch_array($resultado_consulta_mysql)){											
			?>	
		  <div id="con-close-modal-photo<?php echo $row[cid]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">				
					<div class="modal-content">
					<form action="update_photo-ship-calculator.php" enctype="multipart/form-data" method="post" name="frmShipment" id="frmShipment">
						<div class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
							<h3 class="modal-title"><?php echo $L_UPLOADIMAGE; ?></h3> 
						</div>
						<div class="modal-body">
							
							<div class="row" >  
								<div class="col-md-2"> 
									<div class="form-group">
									<label for="field-5" class="control-label">id</label> 									
										<input type="text" class="form-control" id="field-5" name="cid" value="<?php echo $row['cid']; ?>" > 
									</div> 
								</div> 
								<div class="col-md-5"> 
									<div class="form-group"> 
										<label for="field-6" class="control-label">Company name</label> 
										<input type="text" class="form-control" id="field-6"  name="name_courier" value="<?php echo $row['name_courier']; ?>" > 
									</div> 
								</div>
								<div class="col-md-5"> 
									<div class="form-group"> 
										<label for="field-6" class="control-label">Services</label> 
										<input type="text" class="form-control" id="field-6"  name="services" value="<?php echo $row['services']; ?>" > 
									</div> 
								</div>

							</div>
							
							<div class="row">  
								<div class="col-md-3"> 
									<div class="form-group"> 
										<label for="field-6" class="control-label">Shipping day</label> 
										<input type="text" class="form-control" id="field-6"  name="shipping_day" value="<?php echo $row['shipping_day']; ?>" > 
									</div> 
								</div>
								<div class="col-md-3"> 
									<div class="form-group">
									<label for="field-5" class="control-label">Rate</label> 									
										<input type="text" class="form-control" id="field-5" name="rate1" value="<?php echo $row['rate1']; ?>" > 
									</div> 
								</div> 
								<div class="col-md-3"> 
									<div class="form-group"> 
										<label for="field-6" class="control-label">Weight</label> 
										<input type="text" class="form-control" id="field-6"  name="Weight" value="<?php echo $row['Weight']; ?>" > 
									</div> 
								</div>
								<div class="col-md-3"> 
									<div class="form-group"> 
										<label for="field-6" class="control-label">Weight Type</label> 
										<input type="text" class="form-control" id="field-6"  name="WeightType" value="<?php echo $row['WeightType']; ?>" > 
									</div> 
								</div>
								
							</div>
							
							<div class="row"> 
								<div class="col-md-12"> 
									<div class="form-group"> 
										  <label for="imagen">Imagen:</label> 
										  <input class="form-control" id="imagen" name="imagen" size="30" type="file" />
										  </br>
										  <input class="btn btn-success" type="submit" value="Upload Image" />
									</div> 
								</div> 
							</div>  
						</div>						
						<div class="modal-footer">
							<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $cerrar; ?></button> 
						</div>
						
					</form>	
					</div>				
				</div>
			</div><!-- /.modal -->
			<?php } ?>
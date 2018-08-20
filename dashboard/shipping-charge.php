<?php
// *************************************************************************
// *                                                                       *
// * DEPRIXA -  Integrated Web system                                      *
// * Copyright (c) JAOMWEB. All Rights Reserved                            *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: osorio2380@yahoo.es                                            *
// * Website: http://www.jaom.info                                         *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************
 
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	session_start();
	require_once('database.php');
	require_once('database-settings.php');
	require 'requirelanguage.php';
	require_once('library.php');
	$con = conexion();

	if($_SESSION['user_type']=='Administrator' or $_SESSION['user_type']=='Employee'){
			
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			} else {
			   echo "<script type=\"text/javascript\">
						alert(\"This page is for registered users only.\");
						window.location = \"../signup\"
					</script>";	
			exit;
			}
			
			$now = time();
			if($now > $_SESSION['expire']) {
			session_destroy();
			
			 echo "<script type=\"text/javascript\">
						alert(\"Your session has ended.\");
						window.location = \"../login\"
					</script>";	
			exit;
		}
		
	}else{
		header('Location: ../404');
	}

	date_default_timezone_set($_SESSION['ge_timezone']);
	$resultado = $con->query("SELECT cid,name_courier,rate1,services,shipping_day,Weight,WeightType,date,ruta_imagen FROM scheduledpickup ORDER BY cid DESC");

	$nombrefoto1=$_FILES['foto1']['name'];
	$ruta1=$_FILES['foto1']['tmp_name'];
	if(is_uploaded_file($ruta1))
	{ 
		if($_FILES['foto1']['type'] == 'image/png' OR $_FILES['foto1']['type'] == 'image/gif' OR $_FILES['foto1']['type'] == 'image/jpeg')
		{
		
			$name = $nombrefoto1;
			$destino1 =  "img/imagescalculator/".$name;
			copy($ruta1,$destino1);

		}
	}
	
	
	$name_courier=$_POST['name_courier'];
	$services=$_POST['services'];
	$rate1=$_POST['rate1'];
	$courier=$_POST['courier'];
	$shipping_day=$_POST['shipping_day'];
	$Weight=$_POST['Weight'];
	$WeightType=$_POST['WeightType']; 
	
	if($_POST['guardar']){
		$act = "INSERT INTO scheduledpickup (name_courier,services, rate1, shipping_day, Weight, WeightType, date,ruta_imagen) values ('$name_courier','$services', '$rate1', '$shipping_day', '$Weight', '$WeightType', curdate(),'".$destino1."')";
		if(@mysql_query($act)){
			echo "<script type=\"text/javascript\">
					alert(\"$thank\");
					window.location = \"shipping-charge.php\"
				  </script>";
		}
	}
												 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $_SESSION['ge_cname']; ?> | <?php echo $chargetype; ?></title>
  <meta name="description" content="<?php echo $_SESSION['ge_description']; ?>"/>
  <meta name="keywords" content="<?php echo $_SESSION['ge_keywords']; ?>" />
  <meta name="author" content="Jaomweb">	
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  
  <link rel="shortcut icon" type="image/png" href="logo-image/image_logo.php?id=2"/>

  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../bower_components/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
  <script type="text/javascript">
		 $(document).ready(function () {
				$('#grid').DataTable();
			});
	</script>
  
  	<style type="text/css">
	.parsley-error {
	  border-color: #ff5d48 !important; }

	.parsley-errors-list {
	  display: none;
	  margin: 0;
	  padding: 0; }

	.parsley-errors-list.filled {
	  display: block; }
	  
	.parsley-errors-list > li {
	  font-size: 12px;
	  list-style: none;
	  color: #ff5d48;
	  margin-top: 5px; }
	</style>
  
</head>
<body>
<?php
include("header.php");
?>
  
 <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
      

<div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="
    app.settings.asideFolded = false; 
    app.settings.asideDock = false;
  ">
  <!-- main -->
  <div class="col">
    <!-- main header -->
    <div class="bg-light lter b-b wrapper-md">
    </div>
    <!-- / main header -->
    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">

	  <!-- service -->
	  <div class="panel hbox hbox-auto-xs no-border">
		<div class="col wrapper">
		  <i class="fa fa-circle-o text-info m-r-sm pull-right"></i>
		  <h4 class="font-thin m-t-none m-b-none text-primary-lt"><?php echo $nowhere; ?></h4>
		  <span class="m-b block text-sm text-muted"></span>				 	         
			  <tr>
			  <td class="TrackTitle" valign="top"><div  align=""><h3 class="classic-title1"><span><strong></strong></span></h3>
			</tr>
			<div class="row">
					<div class="col-xs-12" align="center">
					<h2><?php echo $addcharge; ?></h2>
					<br>
					</div>
			</div>
				<p class="margin-bottom-15"><?php echo $tarife; ?></p>								  
            <div class="col-md-12">				
						<form  method="post" enctype="multipart/form-data" action="" data-parsley-validate novalidate class="form-horizontal" >
							
								<div class="row">
									<div class="col-md-2" >
										<label class="control-label" ><strong><?php echo $namecompany; ?></strong></label>
										<input type="text" class="form-control" parsley-trigger="change" required name="name_courier" placeholder="<?php echo $namecompanyss; ?>"><br>					
									 </div>                 
							 
									<div class="col-md-2">
										<label class="control-label" ><strong><?php echo $typeser; ?></strong></label>
										<input type="text" class="form-control" parsley-trigger="change" required name="services" placeholder="<?php echo $typeser; ?>" > 					
									</div>
									<div class="col-md-1">
										<label class="control-label" ><strong><?php echo $chargetase1; ?></strong></label>
										<input type="number" class="form-control" parsley-trigger="change" required name="rate1" placeholder="<?php echo $_SESSION['ge_curr']; ?>" > 					
									</div>
									  
									<div class="col-md-2">
										<label class="control-label" ><strong>Shipping Day</strong></label>
										<input type="text" class="form-control" parsley-trigger="change" required name="shipping_day" placeholder="2 to 3 days" > 				
									</div>								
									<div class="col-md-1">
										<label class="control-label" ><strong><?php echo $weith; ?></strong></label>
										<input type="number" class="form-control" parsley-trigger="change" required name="Weight" placeholder="1 kg/lb" > 														
									</div>
									<div class="col-md-1">
										<label class="control-label" ><strong><?php echo $L_['units']; ?></strong></label>
										<select type="text" class="form-control" id="WeightType" name="WeightType" placeholder="Lb/Kg" >
										<option value="Lb">Lb</option>
										<option value="Kg">Kg</option>								
										</select>					
									</div>
									<div class="col-md-3">
										<label class="control-label" ><i class="fa fa-upload icon text-default-lter"></i>&nbsp;<strong><?php echo $companyimage; ?></strong></label>
										<input  class="form-control" name="foto1" type="file" id="foto1"  />  
										
									</div>
								</div>				
								<br>
							  <div class="row templatemo-form-buttons">			  
								<div class="col-md-12">
								  <input type="submit"  name="guardar" class="btn btn-primary" value="<?php echo $UPDATE; ?>">
								</div>
							  </div>				
							
						</form>
						<div class="table-responsive">
							<table ui-jq="dataTable"  class="table table-striped b-t b-b">
								<thead>
								  <tr>
									  <th data-toggle="true">
										  <?php echo $namecompanys; ?>
									  </th>
									  <th>
										  <?php echo $typeser; ?>
									  </th>
									  <th data-hide="phone,tablet">
										  <?php echo $chargetase1; ?>
									  </th>								  
									  <th data-hide="phone">
										  Shiping Day
									  </th>
									  <th data-hide="phone">
										  <?php echo $weith; ?>
									  </th>
									  <th data-hide="phone">
										  <?php echo $weithtype; ?>
									  </th>
									  <th data-hide="phone">
										 <?php echo $companyimage; ?>
									  </th>
									  <th data-hide="borrar">
										Update
									  </th>
									  <th data-hide="borrar">
										<?php echo $delete; ?>
									  </th>
								  </tr>
								</thead>									
								<tbody>
								<?php while($row = $resultado->fetch_assoc()){ ?> 
								  <tr>  										  
									<td><?php echo  $row['name_courier']; ?></td>
									<td><?php echo  $row['services']; ?></td>
									<td><?php echo  $row['rate1']; ?></td>								  
									<td><?php echo  $row['shipping_day']; ?></td>
									<td><?php echo  $row['Weight']; ?></td>
									<td><?php echo  $row['WeightType']; ?></td>
									<td><span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm"> 
										<img src="<?php echo $row['ruta_imagen']; ?>" class="img-full" height="18" width="18">
									</span>
									</td>
									<td>
										<a data-target="#con-close-modal-photo<?php echo $row['cid']; ?>" data-toggle="modal">
										<img src="img/update.png"  height="23" width="23"></a>
									</td>
									<td><a href="#" onclick="del_list_charse(<?php echo $row['cid']; ?>);">
									<img src="img/delete.png"  height="20" width="18"></a></td>
								  </tr> 
								  <?php } ?>
								</tbody>
							</table>
						</div>
					  </div>
					</div>       
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
  </div>
  <!-- / content -->

<?php
include("footer.php");
?>

	<!-- Modal Update photo Shipping Calculator -->

	<?php include("modal-status/modal-update-photo-shipping-calculator.php"); ?>

</div>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="js/ui-load.js"></script>
<script src="js/ui-jp.config.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>
<script src="js/delivery.js"></script>
	
<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="js/parsley.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('form').parsley();
	});
</script>	

<script type="text/javascript">
	function del_list_charse(cid) {
		if (window.confirm("<?php echo $L_['delete-image']; ?>")) {
			window.location = "deletes/delete_list_charse.php?action=del&cid="+cid; 
		}
	}
</script>

</body>
</html>



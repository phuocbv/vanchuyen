<?php 
// *************************************************************************
// *                                                                       *
// * DEPRIXA -  Integrated Web system		                               *
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
require_once('database-settings.php');
require_once('database.php');
require_once('library.php');
require_once('funciones.php');
require 'requirelanguage.php';
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
$fechai=date('Y-m-d');

$cid=$_GET['cid'];	
$cid = decodificar($cid);
$resultado = $con->query("SELECT cid,name_parson,name,email,phone,office,estado,role,date,imagen,tipo_imagen FROM manager_user WHERE cid='$cid' ");
												 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $_SESSION['ge_cname']; ?> | <?php echo $editperfiluser; ?></title>
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

</head>
<body>
 <?php include("header.php"); ?> 
  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
     
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3"><?php echo $perfil; ?></h1>
</div>
<div class="wrapper-md">
	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="panel">
					<div>           
						</div>
							<div class="wrapper-lg">           
								<div>
									<table border="0" align="center" width="100%">
										<tbody>
										<tr>				
											<h3 class="classic-title"><span><strong><i class="fa fa-users icon text-default-lter"></i>&nbsp;&nbsp;<?php echo $PERFIL; ?></strong></h3>
										
												<!-- START Checkout form -->
												<?php while($row = $resultado->fetch_assoc()){ ?> 
												<form action="settings/adduser/update.php"  name="modificar_usuario" method="POST" enctype="multipart/form-data" > 
													<div class="row">
													
														<!-- START Presonal information -->
														<fieldset class="col-md-6">								
														
															<legend><?php echo $userinformation; ?>:</legend>
															
															<!-- Country and state -->								
															<div class="row">
																<div class="col-sm-6 form-group">
																 <input type="hidden" name="cid" value="<?php echo $cid; ?>">
																	<label for="zipcode" class="control-label"><?php echo $NOMBRE; ?></label>
																	<input type="text" class="form-control" value="<?php echo $row['name_parson']; ?>"  name="name_parson">
																</div>
																<div class="col-sm-6 form-group">
																	<label for="zipcode" class="control-label"><i class="fa fa-user icon text-default-lter"></i>&nbsp;<?php echo $NAMEUSER; ?></label>
																	<input type="text" class="form-control" value="<?php echo $row['name'] ;?>"  name="name">
																</div>								
															</div>
															<!-- Qnty -->
															<div class="row">
																<div class="col-sm-6 form-group">
																	<label for="zipcode" class="control-label"><i class="fa fa-at icon text-default-lter"></i>&nbsp;<?php echo $email1; ?></label> 
																	<input type="email" class="form-control" value="<?php echo $row['email']; ?>"  name="email" >
																</div>
																
															<!-- Origin Office -->
															   <div class="col-sm-6 form-group">
																 <label for="zipcode" class="control-label"><i class="fa fa-info-circle icon text-default-lter"></i>&nbsp;<?php echo $usertype;?><span class="required-field">*</span></label>
																  <input type="email" class="form-control" value="<?php echo $row['role']; ?>"  name="role" readonly>											
																</div>	
															</div>												
															 <!-- Payment Mode -->
															 <div class="row">
																
															</div>
															<div class="row">
																<!-- Text area -->
																<div class="col-sm-6 form-group">
																	<label for="inputTextarea" class="control-label"><i class="fa fa-map-marker icon text-default-lter"></i>&nbsp;<?php echo $ubicationoffice; ?></label>
																	<textarea class="form-control" name="office" required > <?php echo $row['office']; ?></textarea>
																</div>																										
																<!-- Destination Office -->	
																<div class="col-sm-3 form-group">
																	<label for="zipcode" class="control-label"><i class="fa fa-phone icon text-default-lter"></i>&nbsp;<?php echo $telefono; ?></label> 
																	<input type="text" class="form-control" value="<?php echo $row['phone']; ?>"  name="phone">
																</div>
																<div class="col-sm-3 form-group">
																	<label for="inputTextarea" class="control-label"><i class="fa fa-calendar icon text-default-lter"></i>&nbsp;<?php echo $registrydate; ?></label>
																	<input type="text" class="form-control" name="date" value="<?php echo $row['date']; ?>" placeholder="mm/dd/yyyy" id="datepicker-autoclose" readonly>
																</div>												
															</div>	
															<!-- logo dimenssion  -->
															<fieldset class="col-md-6">
																<legend><?php echo $logodimenssion; ?></legend>
																
																	<input type="file" name="imagen" id="imagen" class="form-control" />
																	<br><br>																			
															</fieldset>
															<div class="col-sm-6 form-group">
																<label for="lan"><i class="fa fa-chain-broken" aria-hidden="true"></i>&nbsp;<?php echo $L_['disabled_accoung']; ?></label>
																<select class="form-control" name="estado" >
																	<option value="1" <?php if($row['estado']=='1'){ echo 'selected'; } ?> ><?php echo $L_['enable_accoung']; ?></option>
																	<option value="0" <?php if($row['estado']=='0'){ echo 'selected'; } ?> ><?php echo $L_['disable_accoung']; ?></option>																
																</select>
															</div>	
															<div class="col-md-6 text-center">
																	<label for="currentPassword"><?php echo $logopresent; ?></label></br>
																	<span class="thumb-lg w-auto-folded avatar m-t-sm">
																	   <img src="logo-image/imagen-user.php?cid=<?php echo $row['cid']; ?>" class="img-full" alt="...">
																	</span>	 														
															</div>
															<div class="col-md-6 text-left">
																<button name="Guardar" type="submit" class="btn btn-large btn-success"><?php echo $UPDATE; ?></button>												
																<a href="add-new-users-admin.php"  class="btn btn-large btn-warning"><?php echo $RETORNAR; ?></a>
															</div>															
														</fieldset>
													</form>
													<?php } ?>
													
													<?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Employee') { ?>
													<!-- CHANGE PASSWORD  -->
													<fieldset class="col-md-6">
													<legend><?php echo $legendcustomer; ?></legend>
															
													<?php 
														session_start(); 
														require_once('database.php'); // incluímos los datos de conexión a la BD 
															if(isset($_SESSION['user_name'])) { // comprobamos que la sesión esté iniciada 
																if(isset($_POST['enviar'])) {
																	if($_POST['pwd'] != $_POST['usuario_clave_conf']) {																		
																		echo "".$L_['noretry'].". <a href='javascript:history.back();'><button class='btn btn-large btn-success'>".$L_['retry']."</button></a>"; 
																	}else { 
																		$name = $_SESSION['user_name'];	
																		$pwd = mysql_real_escape_string($_POST["pwd"]); 
																		$pwd = md5(PASS_SALT.$pwd); // encriptamos la nueva contraseña con md5 
																		$sql = mysql_query("UPDATE manager_user SET pwd='".$pwd."' WHERE name='".$name."'"); 
																		
																		if($sql) {																					
																			echo "".$L_['passok']."."; 
																		}else { 
																			echo "".$L_['passnook'].". <a href='javascript:history.back();'>".$L_['retry']."</a>"; 
																		} 
																	}
																																																	
															}else { 
														?> 
															<form action="<?php echo $_SERVER["SELF"]?>" method="post"> 
																<div class="row">
																	<div class="col-sm-6 form-group">
																		<label for="inputTextarea" class="control-label"><i class="fa fa-key icon text-default-lter"></i>&nbsp;<?php echo $L_['newpassword']; ?></label> 
																			<input class="form-control" type="password" name="pwd" value="123456789" maxlength="15" />
																	</div>
																	<div class="col-sm-6 form-group">
																		<label for="inputTextarea" class="control-label"><i class="fa fa-key icon text-default-lter"></i>&nbsp;<?php echo $L_['repassword']; ?></label> 
																			<input class="form-control" type="password" name="usuario_clave_conf" maxlength="15" />
																	</div>
																</div>	
																<button name="enviar" type="submit" class="btn btn-large btn-success"><?php echo $UPDATE; ?></button>
															</form> 
														<?php 
																} 
															}else { 
																echo "".$L_['passdenegade']."."; 
															} 
														?>
												</fieldset>
												<?php } ?>
										</div>																	
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
  <!-- / content -->	


<?php
include("footer.php");
?>

</div>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="js/ui-load.js"></script>
<script src="js/ui-jp.config.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>


</body>

</html>
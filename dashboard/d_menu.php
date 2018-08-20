<?php
// *************************************************************************
// *                                                                       *
// *  DEPRIXA -  Integrated Web system                                     *
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
													 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $_SESSION['ge_cname']; ?> | Menu Website</title>
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
  <div id="popup" class="popup">
    <a onclick="closeDialog('popup');" class="close"></a>
    <div>
        <!-- YOUR CONTENT -->
    </div>
</div>
 <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">     
		<div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="
			app.settings.asideFolded = false; 
			app.settings.asideDock = false;
		  ">

		  <!-- main -->
		  <div class="col">
			
			<!-- / main header -->
			<div class="wrapper-md" ng-controller="FlotChartDemoCtrl">	
				<div class="row">		
					<div class="col-sm-12">
					  <div class="panel panel-default">
						  <div class="table-responsive">
							<div class="panel-heading font-bold"><?php echo $addnewser; ?></div>
							</br>
							<div class="col-xs-12">
													 
							</div>
							</br>						
							<div class="panel-body">
								<table ui-jq="dataTable" ui-options="" class="table table-striped b-t b-b">
										<tr>
											<td>
												<div class="row-fluid">
													<div class="col-sm-12 form-group">
														 
														<table class="table table-bordered table table-hover">
														  <tr class="well">
															<td><strong><center>ID</center></strong></td>
															<td><strong>HOME</strong></td>
															<td><strong><center>SIGN UP</center></strong></td>
															<td><strong>TRACK MY PARCEL</strong></td>
															<td><strong><center>COMPANY</center></strong></td>
															<td><strong>FAQ</strong></td>
															<td><strong><center>CONTACT</center></strong></td>
															<td><strong><center>LOGIN</center></strong></td>
															<td><strong>TERMS</strong></td>
															<td><strong><center>PRIVACY</center></strong></td>
															<td><strong><center>BACK TO TOP</center></strong></td>
														  </tr>
															<?php //get rows query
															$query = $con->query("SELECT * FROM w_menu ORDER BY id DESC");
															if($query->num_rows > 0){ 
																while($row = $query->fetch_assoc()){ 
															?>
														  <form action="settings/update_language_website/update_menu.php"  method="post" > 
														  <tr>
															<td><center><?php echo $row['id']; ?></center></td>
															<td><input type="text" class="form-control" name="home" value="<?php echo $row['home']; ?>" ></td>
															<td><input type="text" class="form-control" name="signup" value="<?php echo $row['signup']; ?>" ></td>
															<td><input type="text" class="form-control" name="track_my_parcel" value="<?php echo $row['track_my_parcel']; ?>" ></td>
															<td><input type="text" class="form-control" name="company" value="<?php echo $row['company']; ?>" ></td>
															<td><input type="text" class="form-control" name="faq" value="<?php echo $row['faq']; ?>" ></td>
															<td><input type="text" class="form-control" name="contacs" value="<?php echo $row['contacs']; ?>" ></td>
															<td><input type="text" class="form-control" name="login" value="<?php echo $row['login']; ?>" ></td>
															<td><input type="text" class="form-control" name="terms" value="<?php echo $row['terms']; ?>" ></td>
															<td><input type="text" class="form-control" name="privacy" value="<?php echo $row['privacy']; ?>" ></td>
															<td><input type="text" class="form-control" name="backtotop" value="<?php echo $row['backtotop']; ?>" ></td>
														  </tr>
														</table>
														 <div class="col-md-6 text-left">
															</br></br>														
															<button name="Guardar" type="submit" class="btn btn-primary"><strong>UPDATE</strong></button>
														 </div>
														 </form>
													</div>
													<?php }} ?>
												</div>
											</td>
										</tr>
									</table>
								
								<!--fin de tabla-->	
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

</div>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="js/ui-load.js"></script>
<script src="js/ui-jp.config.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>
<script src="js/delivery.js"></script>
<script src="js/jscolor.min.js"></script>

<!-- Validation js (Parsleyjs) -->
<script type="text/javascript" src="js/parsley.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('form').parsley();
	});
</script>	

</body>
</html>
<html>

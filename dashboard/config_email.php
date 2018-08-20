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
require_once('database.php');
require_once('library.php');
require 'requirelanguage.php';

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $_SESSION['ge_cname']; ?> | Email Configuration</title>
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
	  <h1 class="m-n font-thin h3"><?php echo $L_['settingapi']; ?></h1>
	</div>
		<div class="wrapper-md">
			<div class="row">
				<div class="col-sm-12">
					<div class="blog-post">                   
						<div class="panel">
							<div class="wrapper-lg">           
								<div>
									<table border="0" align="center" width="100%">
										<tbody>


									<h3 class="classic-title"><span><strong><i class="fa fa-cog icon text-danger-lter"></i>&nbsp;&nbsp;EMAIL CONFIGURATION</strong></h3>
						
									<!-- API NEXMO -->
													
											<?php		
												$result = mysql_query("SELECT bemail FROM company WHERE  id='1' ");
												while($rr = mysql_fetch_array($result)) {								
												?>	

													<form action="settings/config_email/update_emailnotification.php"  method="post"  class="form-horizontal" > 
														<!-- API KEY NEXMO -->
														<fieldset class="col-md-6">								
														
															<legend>Notification of post Script and Web contact</legend>
															
															<!-- API KEY -->								
															<div class="row">
																<div class="col-sm-6 form-group">
																	<label for="zipcode" class="control-label"><i class="fa fa-at icon text-default-lter"></i>&nbsp;<?php echo $EMAILNOTI; ?></label>
																	<input type="text" class="form-control"  name="bemail" value="<?php echo $rr['bemail']; ?>">
																</div>																								
															</div>
																										
															<div class="col-md-6 text-left">
																<br><br><br><br>
																<button name="Submit" type="submit" class="btn btn-large btn-info">UPDATE EMAIL NOTIFICATION</button>	
																<br><br><br><br>
															</div>
													</fieldset>
													</form>
													<?php } ?>	
												
												
													<?php		
													$result = mysql_query("SELECT * FROM emailserver WHERE  id='1' ");
													while($rr = mysql_fetch_array($result)) {								
													?>	

													<form action="settings/config_email/update_emailweb.php"  method="post"  class="form-horizontal" > 
														<!-- API KEY NEXMO -->
														<fieldset class="col-md-6" style="display:none">								
														
															<legend> Email Notification Web</legend>
															
															<!-- API KEY -->								
															<div class="row">
																<div class="col-sm-6 form-group">
																	<label for="zipcode" class="control-label">Mail server</label>
																	<input type="text" class="form-control" name="mailserver" value="<?php echo $rr['mailserver']; ?>">
																</div>
																<!-- API SECRET -->
																
																<div class="col-sm-6 form-group">
																	<label for="zipcode" class="control-label"><i class="fa fa-hashtag icon text-default-lter"></i>&nbsp;Outgoing email example: tucorreo@gmail.com</label>
																	<input type="text" class="form-control" name="mailoutgoing" value="<?php echo $rr['mailoutgoing']; ?>">
																</div>																								
															</div>
															
															<!-- API KEY -->								
															<div class="row">
																<div class="col-sm-6 form-group">
																	<label for="zipcode" class="control-label">Your gmail password</label>
																	<input type="password" class="form-control"  name="gpassword" value="<?php echo $rr['gpassword']; ?>">
																</div>
																<!-- API SECRET -->
																
																<div class="col-sm-6 form-group">
																	<label for="zipcode" class="control-label"><i class="fa fa-hashtag icon text-default-lter"></i>&nbsp;Enable encryption, 'ssl' is accepted</label>
																	<input type="text" class="form-control" name="encryption" value="<?php echo $rr['encryption']; ?>">
																</div>																								
															</div>
															
															<!-- API KEY -->								
															<div class="row">
																<div class="col-sm-6 form-group">
																	<label for="zipcode" class="control-label">TCP port to connect</label>
																	<input type="text" class="form-control"  name="tcpconnect" value="<?php echo $rr['tcpconnect']; ?>">
																</div>
																<!-- API SECRET -->																							
															</div>
																										
															<div class="col-md-6 text-left">
																<br><br><br><br>
																<button name="Submit" type="submit" class="btn btn-large btn-success">UPDATE CONFIG EMAIL</button>	
																<br><br><br><br>
															</div>
													</fieldset>
													</form>
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
 <!-- / content -->	


<?php
include("footer.php");
?>

</div>
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
	<script src="js/ui-load.js"></script>
	<script src="js/ui-jp.config.js"></script>
	<script src="js/ui-jp.js"></script>
	<script src="js/ui-nav.js"></script>
	<script src="js/ui-toggle.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

</body>

</html>
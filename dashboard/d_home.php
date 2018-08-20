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
ob_start();  
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
ob_end_flush();													 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $_SESSION['ge_cname']; ?> | All Website</title>
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
							</br>
							<div class="panel-body">
							
							<div class="row">
								<div class="col-md-3"> 
									<a href="#home" role="button" data-toggle="modal"><img src="img/images-all-website/image-home.jpg"/></a>
									</br>
									<p>Actualizar HOME</p>
								</div>
						
								<div class="col-md-3"> 
									<a href="#track-my-parcel" role="button" data-toggle="modal"><img src="img/images-all-website/image-track-my-parcel.jpg"/></a>
									</br>
									<p>Actualizar TRACK MY PARCEL</p>
								</div>
								
								<div class="col-md-3"> 
									<a href="#about_us" role="button" data-toggle="modal"><img src="img/images-all-website/image-about.jpg"/></a>
									</br>
									<p>Actualizar ABOUT US</p>
								</div>
								
								<div class="col-md-3"> 
									<a href="#faqs_frequently" role="button" data-toggle="modal"><img src="img/images-all-website/image-faqs-frequently.jpg"/></a>
									</br>
									<p>Actualizar FAQS FREQUENTLY ASKED</p>
								</div>
							</div>
							</br></br>
							<div class="row">
								<div class="col-md-3"> 
									<a href="#contact" role="button" data-toggle="modal"><img src="img/images-all-website/image-contact.jpg"/></a>
									</br>
									<p>Actualizar GET IN TOUCH</p>
								</div>
								
								<div class="col-md-3"> 
									<a href="#privacy" role="button" data-toggle="modal"><img src="img/images-all-website/image-privacy.jpg"/></a>
									</br>
									<p>Actualizar PRIVACY POLICIES</p>
								</div>
								
								<div class="col-md-3"> 
									<a href="#terms" role="button" data-toggle="modal"><img src="img/images-all-website/image-terms.jpg"/></a>
									</br>
									<p>Actualizar TERMS & CONDITIONS</p>
								</div>

							</div>
							</br></br></br></br>
							</br></br></br></br>
							<div class="row">
								<div class="col-md-3"> 
									<a href="#shipping" role="button" data-toggle="modal"><img src="img/images-all-website/image-shipping-calculator.jpg"/></a>
									</br>
									<p>Actualizar SHIPPING CALCULATOR FORM</p>
								</div>
								
								<div class="col-md-3"> 
									<a href="#search-result" role="button" data-toggle="modal"><img src="img/images-all-website/image-search-result.jpg"/></a>
									</br>
									<p>Actualizar RESULT SEARCH FORM</p>
								</div>
								
								<div class="col-md-3"> 
									<a href="#booking" role="button" data-toggle="modal"><img src="img/images-all-website/image-booking.jpg"/></a>
									</br>
									<p>Actualizar BOOKING FORM</p>
								</div>
								
								<div class="col-md-3"> 
									<a href="#bookingtwo" role="button" data-toggle="modal"><img src="img/images-all-website/image-bookingtwo.jpg"/></a>
									</br>
									<p>Actualizar BOOKING FORM # 2</p>
								</div>
							</div>
							
							</br></br></br></br>
							</br></br></br></br>
							<div class="row">
								<div class="col-md-3"> 
									<a href="#sgsignup" role="button" data-toggle="modal"><img src="img/images-all-website/image-signup.jpg"/></a>
									</br>
									<p>Actualizar SIGNUP FORM</p>
								</div>
								
								<div class="col-md-3"> 
									<a href="#lgnlogin" role="button" data-toggle="modal"><img src="img/images-all-website/image-login.jpg"/></a>
									</br>
									<p>Actualizar LOGIN FORM</p>
								</div>
								
								<div class="col-md-3"> 
									<a href="#ftrecoverpass" role="button" data-toggle="modal"><img src="img/images-all-website/image-password.jpg"/></a>
									</br>
									<p>Actualizar RECOVER PASSWORD FORM</p>
								</div>
								
								<div class="col-md-3"> 
									<a href="#resultrack" role="button" data-toggle="modal"><img src="img/images-all-website/image-trackingr.jpg"/></a>
									</br>
									<p>Actualizar TRACKING RESULT FORM</p>
								</div>
							</div>
						
								<!-- UPDATE HOME -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_home ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="home" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">				
										<div class="modal-content">
										<form name="contado" action="settings/update_language_website/update_home.php" method="post">
											<div class="modal-header"> 
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
												<h3 class="modal-title">Actualizar HOME principal</h3> 
											</div> 
											<div class="modal-body">
											<div class="row">
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Title</label> 
														<input  class="form-control" name="title" value="<?php echo $row['title']; ?>" >													
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-1" class="text-primary">Welcome</label> 																	
														<input  class="form-control" name="welcome" value="<?php echo $row['welcome']; ?>" >
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">24/7 Logistics</label> 
														<input class="form-control" name="logistics" value="<?php echo $row['logistics']; ?>">													
													</div> 
												</div> 
											</div> 
											<div class="row"> 										
												<div class="col-md-3">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Track number</label> 
														<input  class="form-control" name="trackn" value="<?php echo $row['trackn']; ?>">													
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Boton Track</label> 
														<input  class="form-control" name="btrack" value="<?php echo $row['btrack']; ?>">													
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Shipping Cost</label> 
														<input  class="form-control" name="shippingc" value="<?php echo $row['shippingc']; ?>">													
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Calculator</label> 
														<input  class="form-control" name="calculator" value="<?php echo $row['calculator']; ?>">													
													</div>
												</div>															
											</div>
											<div class="row">	
												<div class="col-md-3" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Just Pop Your</label> 
														<textarea class="form-control" name="justpop"><?php echo $row['justpop']; ?></textarea> 																	
													</div> 
												</div> 
												<div class="col-md-3"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Section title</label> 
														<input class="form-control" name="why" value="<?php echo $row['why']; ?>" > 
													</div> 
												</div>
												<div class="col-md-3"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Title</label> 
														<input class="form-control" name="whys" value="<?php echo $row['whys']; ?>" > 
													</div> 
												</div>															
												<div class="col-md-3">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Section description</label> 
														<input class="form-control" name="whydetail" value="<?php echo $row['whydetail']; ?>"  >													
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Service box 1</label> 
														<input  class="form-control" name="box1" value="<?php echo $row['box1']; ?>">													
													</div> 
												</div> 
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Service box 2</label> 
														<input class="form-control" name="box2" value="<?php echo $row['box2']; ?>"  >													
													</div>
												</div>															
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Service box 3</label> 
														<input  class="form-control" name="box3" value="<?php echo $row['box3']; ?>">													
													</div> 
												</div> 
											</div>	
											<div class="row" >
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Service box details</label> 
														<textarea class="form-control" name="boxd1" ><?php echo $row['boxd1']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Service box details</label> 
														<textarea class="form-control" name="boxd2" ><?php echo $row['boxd2']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Service box details</label> 
														<textarea class="form-control" name="boxd3" ><?php echo $row['boxd3']; ?></textarea> 
													</div> 
												</div> 
											</div>
											<div class="row">
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Section Blog</label> 
														<input  class="form-control" name="section1" value="<?php echo $row['section1']; ?>">													
													</div> 
												</div> 
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Section Blog</label> 
														<input class="form-control" name="section2" value="<?php echo $row['section2']; ?>"  >													
													</div>
												</div>															
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Section detail</label> 
														<textarea class="form-control" name="section3"  ><?php echo $row['section3']; ?></textarea> 
													</div> 
												</div>
											</div>	

											<div class="row">
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Post title 1</label> 
														<input  class="form-control" name="post1" value="<?php echo $row['post1']; ?>">													
													</div> 
												</div> 
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Post title 2</label> 
														<input class="form-control" name="post2" value="<?php echo $row['post2']; ?>"  >													
													</div>
												</div>															
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Post title 3</label> 
														<input  class="form-control" name="post3" value="<?php echo $row['post3']; ?>">													
													</div> 
												</div> 
											</div>	
											<div class="row" >
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Post details</label> 
														<textarea class="form-control" name="post4" ><?php echo $row['post4']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Post details</label> 
														<textarea class="form-control" name="post5" ><?php echo $row['post5']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Post details</label> 
														<textarea class="form-control" name="post6" ><?php echo $row['post6']; ?></textarea> 
													</div> 
												</div> 
											</div>
											<div class="row">
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Post title 4</label> 
														<input  class="form-control" name="post7" value="<?php echo $row['post7']; ?>">													
													</div> 
												</div> 
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Post title 5</label> 
														<input class="form-control" name="post8" value="<?php echo $row['post8']; ?>"  >													
													</div>
												</div>															
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Post title 6</label> 
														<input  class="form-control" name="post9" value="<?php echo $row['post9']; ?>">													
													</div> 
												</div> 
											</div>	
											<div class="row" >
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Post details</label> 
														<textarea class="form-control" name="post10" ><?php echo $row['post10']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Post details</label> 
														<textarea class="form-control" name="post11" ><?php echo $row['post11']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Post details</label> 
														<textarea class="form-control" name="post12" ><?php echo $row['post12']; ?></textarea> 
													</div> 
												</div> 
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Go read more</label> 
														<input class="form-control" name="more" value="<?php echo $row['more']; ?>"  >													
													</div>
												</div>																														 
											</div>	
											
											</div>  
										 
											<div class="modal-footer" id="contenido"> 
												<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
												<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
											</div>
										</div>
										</form>	
									</div>				
								</div>
							</div><!-- /.modal -->
							<!-- /.UPDATE HOME -->
							<?php }} ?>	


							<!-- UPDATE TRACK MY PARCEL -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_track_parcel ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="track-my-parcel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">				
										<div class="modal-content">
										<form name="contado" action="settings/update_language_website/update_track-my-parcel.php" method="post">
											<div class="modal-header"> 
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
												<h3 class="modal-title">Actualizar TRACK MY PARCEL</h3> 
											</div> 
											<div class="modal-body">
											<div class="row">
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Title</label> 
														<input  class="form-control" name="t_title" value="<?php echo $row['t_title']; ?>" >													
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-1" class="text-primary">Track pro </label> 																	
														<input  class="form-control" name="t_welcome" value="<?php echo $row['t_welcome']; ?>" >
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Automatically detect</label> 
														<input class="form-control" name="t_detect" value="<?php echo $row['t_detect']; ?>">													
													</div> 
												</div> 
											</div> 
											<div class="row"> 										
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Track number</label> 
														<input  class="form-control" name="t_trackn" value="<?php echo $row['t_trackn']; ?>">													
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Boton Track</label> 
														<input  class="form-control" name="t_btrack" value="<?php echo $row['t_btrack']; ?>">													
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Section 1</label> 
														<input  class="form-control" name="t_section1" value="<?php echo $row['t_section1']; ?>">													
													</div>
												</div>															
											</div>
											<div class="row">	
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Section 2</label> 
														<input class="form-control" name="t_section2" value="<?php echo $row['t_section2']; ?>" > 																	
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Section 3</label> 
														<input class="form-control" name="t_section3" value="<?php echo $row['t_section3']; ?>" > 
													</div> 
												</div>
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Section 4</label> 
														<textarea class="form-control" name="t_section4"><?php echo $row['t_section4']; ?></textarea> 																	
													</div> 
												</div> 
											</div>
											<div class="row">
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Service box 1</label> 
														<input  class="form-control" name="t_box1" value="<?php echo $row['t_box1']; ?>">													
													</div> 
												</div> 
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Service box 2</label> 
														<input class="form-control" name="t_box2" value="<?php echo $row['t_box2']; ?>"  >													
													</div>
												</div>															
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Service box 3</label> 
														<input  class="form-control" name="t_box3" value="<?php echo $row['t_box3']; ?>">													
													</div> 
												</div> 
											</div>	
											<div class="row" >
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Service box details</label> 
														<textarea class="form-control" name="t_boxd1" ><?php echo $row['t_boxd1']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Service box details</label> 
														<textarea class="form-control" name="t_boxd2" ><?php echo $row['t_boxd2']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Service box details</label> 
														<textarea class="form-control" name="t_boxd3" ><?php echo $row['t_boxd3']; ?></textarea> 
													</div> 
												</div> 
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Go read more</label> 
														<input class="form-control" name="t_more" value="<?php echo $row['t_more']; ?>"  >													
													</div>
												</div>																														 
											</div>	
											
											</div>  
										 
											<div class="modal-footer" id="contenido"> 
												<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
												<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
											</div>
										</div>
										</form>	
									</div>				
								</div>
							</div><!-- /.modal -->
							<!-- /.UPDATE TRACK MY PARCEL -->
							<?php }} ?>	


							<!-- UPDATE ABOUTS -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_about ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="about_us" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">				
										<div class="modal-content">
										<form name="contado" action="settings/update_language_website/update_about.php" method="post">
											<div class="modal-header"> 
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
												<h3 class="modal-title">Actualizar ABOUTS</h3> 
											</div> 
											<div class="modal-body">
											<div class="row">
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Title</label> 
														<input  class="form-control" name="c_title" value="<?php echo $row['c_title']; ?>" >													
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-1" class="text-primary">About </label> 																	
														<input  class="form-control" name="c_about" value="<?php echo $row['c_about']; ?>" >
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Who we</label> 
														<input class="form-control" name="c_section1" value="<?php echo $row['c_section1']; ?>">													
													</div> 
												</div> 
											</div> 
											<div class="row">	
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">are?</label> 
														<input class="form-control" name="c_section2" value="<?php echo $row['c_section2']; ?>" > 																	
													</div> 
												</div> 
												<div class="col-md-4"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Section 3</label> 
														<input class="form-control" name="c_section3" value="<?php echo $row['c_section3']; ?>" > 
													</div> 
												</div>
												<div class="col-md-4" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Read more</label> 
														<textarea class="form-control" name="c_section4"><?php echo $row['c_section4']; ?></textarea> 																	
													</div> 
												</div> 
											</div>
											<div class="row">
												<div class="col-md-6" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Company box 1</label> 
														<input  class="form-control" name="c_box1" value="<?php echo $row['c_box1']; ?>">													
													</div> 
												</div> 
												<div class="col-md-6">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Company box 2</label> 
														<input class="form-control" name="c_box2" value="<?php echo $row['c_box2']; ?>"  >													
													</div>
												</div>															
											</div>	
											<div class="row" >
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Company box details</label> 
														<textarea class="form-control" name="c_boxd1" ><?php echo $row['c_boxd1']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Company box details</label> 
														<textarea class="form-control" name="c_boxd2" ><?php echo $row['c_boxd2']; ?></textarea> 
													</div> 
												</div> 
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Team title 1</label> 
														<input class="form-control" name="c_info_title1" value="<?php echo $row['c_info_title1']; ?>"  >													
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Team title 2</label> 
														<input class="form-control" name="c_info_title2" value="<?php echo $row['c_info_title2']; ?>"  >													
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Team detail</label> 
														<textarea class="form-control" name="c_info_detail" ><?php echo $row['c_info_detail']; ?></textarea> 
													</div>
												</div>
											</div>	
											
											</div>  
										 
											<div class="modal-footer" id="contenido"> 
												<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
												<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
											</div>
										</div>
										</form>	
									</div>				
								</div>
							</div><!-- /.modal -->
							<!-- /.UPDATE ABOUTS -->
							<?php }} ?>	

							
							<!-- UPDATE FREQUENTLY ASKED QUESTIONS -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_faqs ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="faqs_frequently" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">				
										<div class="modal-content">
										<form name="contado" action="settings/update_language_website/update_faqs-frequently.php" method="post">
											<div class="modal-header"> 
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
												<h3 class="modal-title">Actualizar FREQUENTLY ASKED QUESTIONS</h3> 
											</div> 
											<div class="modal-body">
											<div class="row">
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Title</label> 
														<input  class="form-control" name="f_title" value="<?php echo $row['f_title']; ?>" >													
													</div> 
												</div> 
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-1" class="text-primary">Faqs Frequently</label> 																	
														<input  class="form-control" name="f_faqs" value="<?php echo $row['f_faqs']; ?>" >
													</div> 
												</div> 
											</div> 
											<div class="row">	
												<div class="col-md-6" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Faqs title</label> 
														<input class="form-control" name="f_faqs1" value="<?php echo $row['f_faqs1']; ?>" > 																	
													</div> 
												</div> 
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs title</label> 
														<input type="text" class="form-control" name="f_faqs2" value="<?php echo $row['f_faqs2']; ?>" > 
													</div> 
												</div>
											</div>
											<div class="row" >
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs detail</label> 
														<textarea  class="form-control" name="f_faqs3" ><?php echo $row['f_faqs3']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs detail</label> 
														<textarea class="form-control" name="f_faqs4" ><?php echo $row['f_faqs4']; ?></textarea> 
													</div> 
												</div> 
											</div>
											<div class="row">	
												<div class="col-md-6" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Faqs title</label> 
														<input class="form-control" name="f_faqs5" value="<?php echo $row['f_faqs5']; ?>" > 																	
													</div> 
												</div> 
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs title</label> 
														<input class="form-control" name="f_faqs6" value="<?php echo $row['f_faqs6']; ?>" > 
													</div> 
												</div>
											</div>
											<div class="row" >
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs detail</label> 
														<textarea class="form-control" name="f_faqs7" ><?php echo $row['f_faqs7']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs detail</label> 
														<textarea class="form-control" name="f_faqs8" ><?php echo $row['f_faqs8']; ?></textarea> 
													</div> 
												</div> 
											</div>
											<div class="row">	
												<div class="col-md-6" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Faqs title</label> 
														<input class="form-control" name="f_faqs9" value="<?php echo $row['f_faqs9']; ?>" > 																	
													</div> 
												</div> 
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs title</label> 
														<input class="form-control" name="f_faqs10" value="<?php echo $row['f_faqs10']; ?>" > 
													</div> 
												</div>
											</div>
											<div class="row" >
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs detail</label> 
														<textarea class="form-control" name="f_faqs11" ><?php echo $row['f_faqs11']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs detail</label> 
														<textarea class="form-control" name="f_faqs12" ><?php echo $row['f_faqs12']; ?></textarea> 
													</div> 
												</div> 
											</div>
											<div class="row">	
												<div class="col-md-6" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Faqs title</label> 
														<input class="form-control" name="f_faqs13" value="<?php echo $row['f_faqs13']; ?>" > 																	
													</div> 
												</div> 
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs title</label> 
														<input class="form-control" name="f_faqs14" value="<?php echo $row['f_faqs14']; ?>" > 
													</div> 
												</div>
											</div>
											<div class="row" >
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs detail</label> 
														<textarea class="form-control" name="f_faqs15" ><?php echo $row['f_faqs15']; ?></textarea> 
													</div> 
												</div> 
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs detail</label> 
														<textarea class="form-control" name="f_faqs16" ><?php echo $row['f_faqs16']; ?></textarea> 
													</div> 
												</div> 
											</div>
											
											<div class="row">	
												<div class="col-md-6" > 
													<div class="form-group"> 
														<label for="field-2" class="text-primary">Faqs title</label> 
														<input class="form-control" name="f_faqs17" value="<?php echo $row['f_faqs17']; ?>" > 																	
													</div> 
												</div> 															
											</div>
											<div class="row" >
												<div class="col-md-6"> 
													<div class="form-group"> 
														<label for="field-3" class="text-primary">Faqs detail</label> 
														<textarea class="form-control" name="f_faqs18" ><?php echo $row['f_faqs18']; ?></textarea> 
													</div> 
												</div> 	
											</div>
											
											</div>  
										 
											<div class="modal-footer" id="contenido"> 
												<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
												<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
											</div>
										</div>
										</form>	
									</div>				
								</div>
							</div><!-- /.modal -->
							<!-- /.UPDATE FREQUENTLY ASKED QUESTIONS -->
							<?php }} ?>
							
							
							<!-- UPDATE CONTACT US -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_contact ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="contact" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">				
										<div class="modal-content">
										<form name="contado" action="settings/update_language_website/update_contact.php" method="post">
											<div class="modal-header"> 
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
												<h3 class="modal-title">Actualizar CONTACT US</h3> 
											</div> 
											<div class="modal-body">
												<div class="row">
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Title</label> 
															<input  class="form-control" name="g_title" value="<?php echo $row['g_title']; ?>" >													
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-1" class="text-primary">Get in touch</label> 																	
															<input  class="form-control" name="g_get" value="<?php echo $row['g_get']; ?>" >
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">GET IN TOUCH WITH US</label> 
															<input class="form-control" name="g_get1" value="<?php echo $row['g_get1']; ?>">													
														</div> 
													</div> 
												</div> 
												<div class="row">	
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Your name</label> 
															<input class="form-control" name="g_name" value="<?php echo $row['g_name']; ?>" > 																	
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">Your email</label> 
															<input class="form-control" name="g_email" value="<?php echo $row['g_email']; ?>" > 
														</div> 
													</div>
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Subject</label> 
															<input class="form-control" name="g_subject" value="<?php echo $row['g_subject']; ?>" > 																	
														</div> 
													</div> 
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Your message</label> 
															<input  class="form-control" name="g_message" value="<?php echo $row['g_message']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Send</label> 
															<input class="form-control" name="g_send" value="<?php echo $row['g_send']; ?>"  >													
														</div>
													</div>
												</div>	
												<div class="row" >
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">PHONE</label> 
															<input class="form-control" name="g_phone" value="<?php echo $row['g_phone']; ?>"  > 
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">ADDRESS</label> 
															<input class="form-control" name="g_address" value="<?php echo $row['g_address']; ?>"  >
														</div> 
													</div>
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">EMAIL</label> 
															<input class="form-control" name="g_emails" value="<?php echo $row['g_emails']; ?>"  >
														</div> 
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">INFO PHONE</label> 
															<input class="form-control" name="g_info_phone" value="<?php echo $row['g_info_phone']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">INFO ADDRESS</label> 
															<input class="form-control" name="g_info_address" value="<?php echo $row['g_info_address']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">INFO EMAIL</label> 
															<input class="form-control" name="g_info_emails" value="<?php echo $row['g_info_emails']; ?>" > 
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Latitude</label> 
															<input  class="form-control" name="g_lat" value="<?php echo $row['g_lat']; ?>">													
														</div> 
													</div> 
													<div class="col-md-6">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Longitude</label> 
															<input class="form-control" name="g_lng" value="<?php echo $row['g_lng']; ?>"  >													
														</div>
													</div>
												</div>	
											
											</div>  
										 
											<div class="modal-footer" id="contenido"> 
												<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
												<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
											</div>
										</div>
										</form>	
									</div>				
								</div>
							</div><!-- /.modal -->
							<!-- /.UPDATE CONTACT US -->
							<?php }} ?>	
							
							
							<!-- UPDATE PRIVACY -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_privacy ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="privacy" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">				
										<div class="modal-content">
										<form name="contado" action="settings/update_language_website/update_privacy.php" method="post">
											<div class="modal-header"> 
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
												<h3 class="modal-title">Actualizar PRIVACY POLICIES</h3> 
											</div> 
											<div class="modal-body">
												<div class="row">
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Title</label> 
															<input  class="form-control" name="p_title" value="<?php echo $row['p_title']; ?>" >													
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-1" class="text-primary">Main privacy</label> 																	
															<input  class="form-control" name="p_mainprivacy" value="<?php echo $row['p_mainprivacy']; ?>" >
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Privacy</label> 
															<input class="form-control" name="p_privacy" value="<?php echo $row['p_privacy']; ?>">													
														</div> 
													</div> 
												</div> 
												<div class="row">	
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Content</label> 
															<textarea class="form-control" name="p_content1" ><?php echo $row['p_content1']; ?></textarea>  																	
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">Detail Content</label> 
															<textarea class="form-control" name="p_licontent1" ><?php echo $row['p_licontent1']; ?></textarea> 
														</div> 
													</div>
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Detail Content</label> 
															<textarea class="form-control" name="p_licontent2" ><?php echo $row['p_licontent2']; ?></textarea>  																	
														</div> 
													</div> 
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Detail Content</label> 
															<textarea  class="form-control" name="p_licontent3" ><?php echo $row['p_licontent3']; ?></textarea> 													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Content</label> 
															<textarea class="form-control" name="p_content2" ><?php echo $row['p_content2']; ?></textarea> 													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Content</label> 
															<textarea class="form-control" name="p_content3" ><?php echo $row['p_content3']; ?></textarea> 													
														</div>
													</div>
												</div>	
												
												
												<div class="row">
													<div class="col-md-6" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Content</label> 
															<textarea  class="form-control" name="p_content4" ><?php echo $row['p_content4']; ?></textarea> 													
														</div> 
													</div> 
												</div>	
											
											</div>  
										 
											<div class="modal-footer" id="contenido"> 
												<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
												<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
											</div>
										</div>
										</form>	
									</div>				
								</div>
							
							<!-- /.UPDATE PRIVACY -->
							<?php }} ?>	
							
							
							<!-- UPDATE TERMS AND CONDITIONS -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_terms ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="terms" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">				
										<div class="modal-content">
										<form name="contado" action="settings/update_language_website/update_terms.php" method="post">
											<div class="modal-header"> 
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
												<h3 class="modal-title">Actualizar TERMS AND CONDITIONS</h3> 
											</div> 
											<div class="modal-body">
												<div class="row">
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Title</label> 
															<input  class="form-control" name="t_title" value="<?php echo $row['t_title']; ?>" >													
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-1" class="text-primary">Main Terms</label> 																	
															<input  class="form-control" name="t_mainprivacy" value="<?php echo $row['t_mainprivacy']; ?>" >
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Terms & Conditions</label> 
															<input class="form-control" name="t_privacy" value="<?php echo $row['t_privacy']; ?>">													
														</div> 
													</div> 
												</div> 
												<div class="row">	
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Content</label> 
															<textarea class="form-control" name="t_content1" ><?php echo $row['t_content1']; ?></textarea>  																	
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">Detail Content</label> 
															<textarea class="form-control" name="t_licontent1" ><?php echo $row['t_licontent1']; ?></textarea> 
														</div> 
													</div>
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Detail Content</label> 
															<textarea class="form-control" name="t_licontent2" ><?php echo $row['t_licontent2']; ?></textarea>  																	
														</div> 
													</div> 
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Detail Content</label> 
															<textarea  class="form-control" name="t_licontent3" ><?php echo $row['t_licontent3']; ?></textarea> 													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Content</label> 
															<textarea class="form-control" name="t_content2" ><?php echo $row['t_content2']; ?></textarea> 													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Content</label> 
															<textarea class="form-control" name="t_content3" ><?php echo $row['t_content3']; ?></textarea> 													
														</div>
													</div>
												</div>	
												<div class="row">
													<div class="col-md-6" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Content</label> 
															<textarea  class="form-control" name="t_content4" ><?php echo $row['t_content4']; ?></textarea> 													
														</div> 
													</div> 
												</div>	
											
											</div>  
										 
											<div class="modal-footer" id="contenido"> 
												<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
												<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
											</div>
										</div>
										</form>	
									</div>				
								</div>
							</div><!-- /.modal -->
							<!-- /.UPDATE PRIVACY -->
							<?php }} ?>	
							
							
							<!-- UPDATE SHIPPING CALCULATOR -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_ship_calculator ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="shipping" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">
										<form name="contado" action="settings/update_language_website/update_shipping-calculator.php" method="post">
											<div class="modal-content">										
												<div class="modal-header"> 
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
													<h3 class="modal-title">Actualizar SHIPPING CALCULATOR</h3> 
												</div> 
												<div class="modal-body">
													<div class="row">
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Select Country</label> 
																<input  class="form-control" name="h_title_country" value="<?php echo $row['h_title_country']; ?>" >													
															</div> 
														</div> 
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-1" class="text-primary">Select State</label> 																	
																<input  class="form-control" name="h_title_state" value="<?php echo $row['h_title_state']; ?>" >
															</div> 
														</div> 
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-1" class="text-primary">Select City</label> 																	
																<input  class="form-control" name="h_title_city" value="<?php echo $row['h_title_city']; ?>" >
															</div> 
														</div>
													</div> 
													<div class="row">	
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Width</label> 
																<input class="form-control" name="h_width" value="<?php echo $row['h_width']; ?>" > 																	
															</div> 
														</div> 
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-3" class="text-primary">Heigth</label> 
																<input class="form-control" name="h_heigth" value="<?php echo $row['h_heigth']; ?>" > 
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Weigth</label> 
																<input class="form-control" name="h_weigth" value="<?php echo $row['h_weigth']; ?>" > 																	
															</div> 
														</div> 
													</div>
													<div class="row">
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Length</label> 
																<input class="form-control" name="h_length" value="<?php echo $row['h_length']; ?>">													
															</div> 
														</div> 
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Get quotes</label> 
																<input  class="form-control" name="h_submit" value="<?php echo $row['h_submit']; ?>">													
															</div> 
														</div> 
													</div>													
												</div>  
											 
												<div class="modal-footer" id="contenido"> 
													<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
													<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
												</div>
											</div>
										</form>	
									</div>				
								</div>
							
							<!-- /.UPDATE SHIPPING CALCULATOR -->
							<?php }} ?>	
							
							
							<!-- UPDATE SEARCH RESULT -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_search_result ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="search-result" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">
										<form name="contado" action="settings/update_language_website/update_search-result.php" method="post">
											<div class="modal-content">										
												<div class="modal-header"> 
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
													<h3 class="modal-title">Actualizar SEARCH RESULT</h3> 
												</div> 
												<div class="modal-body">
													<div class="row">
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Title</label> 
																<input  class="form-control" name="sr_title" value="<?php echo $row['sr_title']; ?>" >													
															</div> 
														</div> 
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-1" class="text-primary">Home Title</label> 																	
																<input  class="form-control" name="sr_home_title" value="<?php echo $row['sr_home_title']; ?>" >
															</div> 
														</div> 
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Main Title</label> 
																<input class="form-control" name="sr_main_title" value="<?php echo $row['sr_main_title']; ?>">													
															</div> 
														</div> 
													</div> 
													<div class="row">	
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Courier</label> 
																<input class="form-control" name="sr_courier" value="<?php echo $row['sr_courier']; ?>" > 																	
															</div> 
														</div> 
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-3" class="text-primary">Services</label> 
																<input class="form-control" name="sr_services" value="<?php echo $row['sr_services']; ?>" > 
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Shipping days</label> 
																<input class="form-control" name="sr_time" value="<?php echo $row['sr_time']; ?>" > 																	
															</div> 
														</div> 
													</div>
													<div class="row">
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Weight</label> 
																<input  class="form-control" name="sr_weight" value="<?php echo $row['sr_weight']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Rates</label> 
																<input  class="form-control" name="sr_rates" value="<?php echo $row['sr_rates']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Book Now!</label> 
																<input  class="form-control" name="sr_book" value="<?php echo $row['sr_book']; ?>">													
															</div> 
														</div>
													</div>
													<div class="row">
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Book Now</label> 
																<input  class="form-control" name="sr_bookn" value="<?php echo $row['sr_bookn']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">From</label> 
																<input  class="form-control" name="sr_from" value="<?php echo $row['sr_from']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">To</label> 
																<input  class="form-control" name="sr_to" value="<?php echo $row['sr_to']; ?>">													
															</div> 
														</div>
													</div>
													<div class="row">
														<div class="col-md-3" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Width</label> 
																<input  class="form-control" name="sr_width" value="<?php echo $row['sr_width']; ?>">													
															</div> 
														</div>
														<div class="col-md-3" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Length</label> 
																<input  class="form-control" name="sr_length" value="<?php echo $row['sr_length']; ?>">													
															</div> 
														</div>
														<div class="col-md-3" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Heigth</label> 
																<input  class="form-control" name="sr_height" value="<?php echo $row['sr_height']; ?>">													
															</div> 
														</div>
													</div>
													<div class="row">
														<div class="col-md-6" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Volumetric Weight</label> 
																<input  class="form-control" name="sr_volumetric" value="<?php echo $row['sr_volumetric']; ?>">													
															</div> 
														</div>														
													</div>	
												</div>  
											 
												<div class="modal-footer" id="contenido"> 
													<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
													<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
												</div>
											</div>
										</form>	
									</div>				
								</div>
							
							<!-- /.UPDATE SEARCH RESULT -->
							<?php }} ?>



							<!-- UPDATE BOOKING FORM -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_booking ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="booking" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">
										<form name="contado" action="settings/update_language_website/update_booking.php" method="post">
											<div class="modal-content">										
												<div class="modal-header"> 
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
													<h3 class="modal-title">Actualizar BOOKING FORM # 1</h3> 
												</div> 
												<div class="modal-body">
													<div class="row">
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Title</label> 
																<input  class="form-control" name="bf_title" value="<?php echo $row['bf_title']; ?>" >													
															</div> 
														</div> 
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-1" class="text-primary">Main Title 1</label> 																	
																<textarea  class="form-control" name="bf_main_title1" ><?php echo $row['bf_main_title1']; ?></textarea>
															</div> 
														</div> 
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Main Title 2</label> 
																<textarea class="form-control" name="bf_main_title2" ><?php echo $row['bf_main_title2']; ?></textarea>													
															</div> 
														</div> 
													</div> 
													<div class="row">	
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Email</label> 
																<input class="form-control" name="bf_email" value="<?php echo $row['bf_email']; ?>" > 																	
															</div> 
														</div> 
														<div class="col-md-4"> 
															<div class="form-group"> 
																<label for="field-3" class="text-primary">Name email</label> 
																<input class="form-control" name="bf_emailn" value="<?php echo $row['bf_emailn']; ?>" > 
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Password</label> 
																<input class="form-control" name="bf_password" value="<?php echo $row['bf_password']; ?>" > 																	
															</div> 
														</div> 
													</div>
													<div class="row">
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Name</label> 
																<input  class="form-control" name="bf_name" value="<?php echo $row['bf_name']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Firt name</label> 
																<input  class="form-control" name="bf_firtname" value="<?php echo $row['bf_firtname']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Phone</label> 
																<input  class="form-control" name="bf_phone" value="<?php echo $row['bf_phone']; ?>">													
															</div> 
														</div>
													</div>
													<div class="row">
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Company name</label> 
																<input  class="form-control" name="bf_cname" value="<?php echo $row['bf_cname']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Name business</label> 
																<input  class="form-control" name="bf_nbusiness" value="<?php echo $row['bf_nbusiness']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Address</label> 
																<input  class="form-control" name="bf_address" value="<?php echo $row['bf_address']; ?>">													
															</div> 
														</div>
													</div>
													<div class="row">
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Registered Country</label> 
																<input  class="form-control" name="bf_rcountry" value="<?php echo $row['bf_rcountry']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Zipcode</label> 
																<input  class="form-control" name="bf_zcode" value="<?php echo $row['bf_zcode']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Collection Date</label> 
																<input  class="form-control" name="bf_cdate" value="<?php echo $row['bf_cdate']; ?>">													
															</div> 
														</div>
													</div>
													<div class="row">
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Delivery Address</label> 
																<input  class="form-control" name="bf_daddress" value="<?php echo $row['bf_daddress']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Name Customer</label> 
																<input  class="form-control" name="bf_ncustomer" value="<?php echo $row['bf_ncustomer']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Firts name Customer</label> 
																<input  class="form-control" name="bf_fncustomer" value="<?php echo $row['bf_fncustomer']; ?>">													
															</div> 
														</div>
													</div>
													<div class="row">
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Email Customer</label> 
																<input  class="form-control" name="bf_ecustomer" value="<?php echo $row['bf_ecustomer']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Company Email</label> 
																<input  class="form-control" name="bf_cemail" value="<?php echo $row['bf_cemail']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Company Phone</label> 
																<input  class="form-control" name="bf_cphone" value="<?php echo $row['bf_cphone']; ?>">													
															</div> 
														</div>
													</div>
													<div class="row">
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Company Name</label> 
																<input  class="form-control" name="bf_coname" value="<?php echo $row['bf_coname']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Company name</label> 
																<input  class="form-control" name="bf_comname" value="<?php echo $row['bf_comname']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Company Address</label> 
																<input  class="form-control" name="bf_comaddress" value="<?php echo $row['bf_comaddress']; ?>">													
															</div> 
														</div>
													</div>
													<div class="row">
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Delivery Note</label> 
																<input  class="form-control" name="bf_dnote" value="<?php echo $row['bf_dnote']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Character limit</label> 
																<input  class="form-control" name="bf_climit" value="<?php echo $row['bf_climit']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Parcel Details</label> 
																<input  class="form-control" name="bf_pdetail" value="<?php echo $row['bf_pdetail']; ?>">													
															</div> 
														</div>
													</div>
													<div class="row">
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Please Select Type</label> 
																<input  class="form-control" name="bf_hbig" value="<?php echo $row['bf_hbig']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">How heavy?</label> 
																<input  class="form-control" name="bf_hheavy" value="<?php echo $row['bf_hheavy']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Country Origin</label> 
																<input  class="form-control" name="bf_corigin" value="<?php echo $row['bf_corigin']; ?>">													
															</div> 
														</div>
													</div>
													<div class="row">
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Country Destination</label> 
																<input  class="form-control" name="bf_cdesti" value="<?php echo $row['bf_cdesti']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Services</label> 
																<input  class="form-control" name="bf_services" value="<?php echo $row['bf_services']; ?>">													
															</div> 
														</div>
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Parcel Value</label> 
																<input  class="form-control" name="bf_pvalue" value="<?php echo $row['bf_pvalue']; ?>">													
															</div> 
														</div>
													</div>
													<div class="row">
														<div class="col-md-4" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Terms and Conditions 1</label> 
																<textarea  class="form-control" name="bf_tcondi1" ><?php echo $row['bf_tcondi1']; ?></textarea>													
															</div> 
														</div>
														<div class="col-md-3" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Terms and Conditions 1</label> 
																<textarea  class="form-control" name="bf_tcondi2" ><?php echo $row['bf_tcondi2']; ?></textarea>													
															</div> 
														</div>
														<div class="col-md-2" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Coin</label> 
																<input  class="form-control" name="bf_symbol" value="<?php echo $row['bf_symbol']; ?>">													
															</div> 
														</div>
														<div class="col-md-3" > 
															<div class="form-group"> 
																<label for="field-2" class="text-primary">Register Now</label> 
																<input  class="form-control" name="bf_register" value="<?php echo $row['bf_register']; ?>">													
															</div> 
														</div>									
													</div>
												</div>  
											 
												<div class="modal-footer" id="contenido"> 
													<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
													<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
												</div>
											</div>
										</form>	
									</div>				
								</div>
							
							<!-- /.UPDATE BOOKING FORM -->
							<?php }} ?>	
							
							
							
							<!-- UPDATE BOOKING FORM #2 -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_bookingtwo ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="bookingtwo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">				
										<div class="modal-content">
										<form name="contado" action="settings/update_language_website/update_bookingtwo.php" method="post">
											<div class="modal-header"> 
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
												<h3 class="modal-title">Actualizar BOOKING FORM # 2</h3> 
											</div> 
											<div class="modal-body">
												<div class="row">
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Servicee</label> 
															<input  class="form-control" name="sl_service" value="<?php echo $row['sl_service']; ?>" >													
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-1" class="text-primary">Parcel Weight</label> 																	
															<input  class="form-control" name="sl_pweight" value="<?php echo $row['sl_pweight']; ?>" >
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Service Info</label> 
															<input class="form-control" name="sl_sinfo" value="<?php echo $row['sl_sinfo']; ?>">													
														</div> 
													</div> 
												</div> 
												<div class="row">	
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Service 1</label> 
															<textarea class="form-control" name="sl_service1" ><?php echo $row['sl_service1']; ?></textarea>  																	
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">Service 2</label> 
															<textarea class="form-control" name="sl_service2" ><?php echo $row['sl_service2']; ?></textarea> 
														</div> 
													</div>
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Service 3</label> 
															<textarea class="form-control" name="sl_service3" ><?php echo $row['sl_service3']; ?></textarea>  																	
														</div> 
													</div> 
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Service 4</label> 
															<textarea  class="form-control" name="sl_service4" ><?php echo $row['sl_service4']; ?></textarea> 													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Service 5</label> 
															<textarea class="form-control" name="sl_service5" ><?php echo $row['sl_service5']; ?></textarea> 													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Service 6</label> 
															<textarea class="form-control" name="sl_service6" ><?php echo $row['sl_service6']; ?></textarea> 													
														</div>
													</div>
												</div>	
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Rate</label> 
															<textarea  class="form-control" name="sl_rate" ><?php echo $row['sl_rate']; ?></textarea> 													
														</div> 
													</div>
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Currency</label> 
															<textarea  class="form-control" name="sl_currency" ><?php echo $row['sl_currency']; ?></textarea> 													
														</div> 
													</div>
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Total</label> 
															<textarea  class="form-control" name="sl_total" ><?php echo $row['sl_total']; ?></textarea> 													
														</div> 
													</div>													
												</div>	
											
											</div>  
										 
											<div class="modal-footer" id="contenido"> 
												<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
												<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
											</div>
										</div>
										</form>	
									</div>				
								</div>
							<!-- /.UPDATE BOOKING FORM #2 -->
							<?php }} ?>	
							
							
							
							<!-- UPDATE SIGNUP FORM -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_signup ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="sgsignup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">				
										<div class="modal-content">
										<form name="contado" action="settings/update_language_website/update_signup.php" method="post">
											<div class="modal-header"> 
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
												<h3 class="modal-title">Actualizar SIGNUP FORM</h3> 
											</div> 
											<div class="modal-body">
												<div class="row">
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Title</label> 
															<input  class="form-control" name="sg_title" value="<?php echo $row['sg_title']; ?>" >													
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-1" class="text-primary">Signup</label> 																	
															<input  class="form-control" name="sg_signup" value="<?php echo $row['sg_signup']; ?>" >
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Name</label> 
															<input class="form-control" name="sg_name" value="<?php echo $row['sg_name']; ?>">													
														</div> 
													</div> 
												</div> 
												<div class="row">	
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Last Name</label> 
															<input class="form-control" name="sg_lastname" value="<?php echo $row['sg_lastname']; ?>" > 																	
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">ID</label> 
															<input class="form-control" name="sg_id" value="<?php echo $row['sg_id']; ?>" > 
														</div> 
													</div>
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Email</label> 
															<input class="form-control" name="sg_email" value="<?php echo $row['sg_email']; ?>" > 																	
														</div> 
													</div> 
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Name Business</label> 
															<input  class="form-control" name="sg_business" value="<?php echo $row['sg_business']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Phone 1</label> 
															<input class="form-control" name="sg_phone1" value="<?php echo $row['sg_phone1']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Phone 2</label> 
															<input class="form-control" name="sg_phone2" value="<?php echo $row['sg_phone2']; ?>"  >													
														</div>
													</div>
												</div>	
												<div class="row" >
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">Address</label> 
															<input class="form-control" name="sg_address" value="<?php echo $row['sg_address']; ?>"  > 
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">Code Postal</label> 
															<input class="form-control" name="sg_postal" value="<?php echo $row['sg_postal']; ?>"  >
														</div> 
													</div>
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">Password</label> 
															<input class="form-control" name="sg_password" value="<?php echo $row['sg_password']; ?>"  >
														</div> 
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Confirm Password</label> 
															<input class="form-control" name="sg_cpass" value="<?php echo $row['sg_cpass']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">I Agree</label> 
															<input class="form-control" name="sg_agree" value="<?php echo $row['sg_agree']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Term 1</label> 
															<input class="form-control" name="sg_term1" value="<?php echo $row['sg_term1']; ?>" > 
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Term 2</label> 
															<input  class="form-control" name="sg_term2" value="<?php echo $row['sg_term2']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Term 3</label> 
															<input class="form-control" name="sg_term3" value="<?php echo $row['sg_term3']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Already registered?</label> 
															<input class="form-control" name="sg_already" value="<?php echo $row['sg_already']; ?>"  >													
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Login</label> 
															<input  class="form-control" name="sg_login" value="<?php echo $row['sg_login']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Register</label> 
															<input class="form-control" name="sg_register" value="<?php echo $row['sg_register']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Oh something step!</label> 
															<input class="form-control" name="sg_ohstep" value="<?php echo $row['sg_ohstep']; ?>"  >													
														</div>
													</div>
												</div>
											
											</div>  
										 
											<div class="modal-footer" id="contenido"> 
												<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
												<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
											</div>
										</div>
										</form>	
									</div>				
								</div>
							<!-- /.UPDATE SIGNUP FORM -->
							<?php }} ?>	
							
							
							<!-- UPDATE LOGIN FORM -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_login ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="lgnlogin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">				
										<div class="modal-content">
										<form name="contado" action="settings/update_language_website/update_login.php" method="post">
											<div class="modal-header"> 
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
												<h3 class="modal-title">Actualizar LOGIN FORM</h3> 
											</div> 
											<div class="modal-body">
												<div class="row">
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Title</label> 
															<input  class="form-control" name="lgn_title" value="<?php echo $row['lgn_title']; ?>" >													
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-1" class="text-primary">Signup</label> 																	
															<input  class="form-control" name="lgn_signup" value="<?php echo $row['lgn_signup']; ?>" >
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Your Username</label> 
															<input class="form-control" name="lgn_username" value="<?php echo $row['lgn_username']; ?>">													
														</div> 
													</div> 
												</div> 
												<div class="row">	
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Enter Password</label> 
															<input class="form-control" name="lgn_password" value="<?php echo $row['lgn_password']; ?>" > 																	
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">Remember Me</label> 
															<input class="form-control" name="lgn_remember" value="<?php echo $row['lgn_remember']; ?>" > 
														</div> 
													</div>
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Not registered?</label> 
															<input class="form-control" name="lgn_nregister" value="<?php echo $row['lgn_nregister']; ?>" > 																	
														</div> 
													</div> 
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Sign Up</label> 
															<input  class="form-control" name="lgn_sup" value="<?php echo $row['lgn_sup']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Forgot Password?</label> 
															<input class="form-control" name="lgn_forgot" value="<?php echo $row['lgn_forgot']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Sign In</label> 
															<input class="form-control" name="lgn_sup2" value="<?php echo $row['lgn_sup2']; ?>"  >													
														</div>
													</div>
												</div>	
											
											</div>  
										 
											<div class="modal-footer" id="contenido"> 
												<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
												<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
											</div>
										</div>
										</form>	
									</div>				
								</div>
							<!-- /.UPDATE LOGIN FORM -->
							<?php }} ?>	
							
							
							<!-- UPDATE RECOVER PASSWORD FORM -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_recoverpass ORDER BY id DESC");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="ftrecoverpass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">				
										<div class="modal-content">
										<form name="contado" action="settings/update_language_website/update_forgot.php" method="post">
											<div class="modal-header"> 
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
												<h3 class="modal-title">Actualizar RECOVER PASSWORD FORM</h3> 
											</div> 
											<div class="modal-body">
												<div class="row">
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Title</label> 
															<input  class="form-control" name="ft_title" value="<?php echo $row['ft_title']; ?>" >													
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-1" class="text-primary">Enter your email</label> 																	
															<input  class="form-control" name="ft_fmail" value="<?php echo $row['ft_fmail']; ?>" >
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Your email address</label> 
															<input class="form-control" name="ft_youremail" value="<?php echo $row['ft_youremail']; ?>">													
														</div> 
													</div> 
												</div> 
												<div class="row">	
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Sign In</label> 
															<input class="form-control" name="ft_sin" value="<?php echo $row['ft_sin']; ?>" > 																	
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">or</label> 
															<input class="form-control" name="ft_or" value="<?php echo $row['ft_or']; ?>" > 
														</div> 
													</div>
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Sign Up</label> 
															<input class="form-control" name="ft_siup" value="<?php echo $row['ft_siup']; ?>" > 																	
														</div> 
													</div> 
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Recover password</label> 
															<input  class="form-control" name="ft_rpass" value="<?php echo $row['ft_rpass']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Oh, something went wrong!</label> 
															<input class="form-control" name="ft_ohw" value="<?php echo $row['ft_ohw']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">E-mail address not registered</label> 
															<input class="form-control" name="ft_ohnot" value="<?php echo $row['ft_ohnot']; ?>"  >													
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Congratulations!</label> 
															<input  class="form-control" name="ft_congra" value="<?php echo $row['ft_congra']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">The process turned out</label> 
															<input class="form-control" name="ft_sucess" value="<?php echo $row['ft_sucess']; ?>"  >													
														</div>
													</div>
												</div>												
											
											</div>  
										 
											<div class="modal-footer" id="contenido"> 
												<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
												<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
											</div>
										</div>
										</form>	
									</div>				
								</div>
							<!-- /.UPDATE RECOVER PASSWORD FORM -->
							<?php }} ?>	
							
							
							<!-- UPDATE TRACKING RESULT FORM -->
								
								<?php //get rows query
								$query = $con->query("SELECT * FROM w_trackresult WHERE id='1'");
								if($query->num_rows > 0){ 
									while($row = $query->fetch_assoc()){ 
								?>
								<div id="resultrack" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog">				
										<div class="modal-content">
										<form name="contado" action="settings/update_language_website/trackresult.php" method="post" >
											<div class="modal-header"> 
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
												<h3 class="modal-title">Actualizar TRACKING RESULT FORM</h3> 
											</div> 
											<div class="modal-body">
												<div class="row">
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Title</label> 
															<input  class="form-control" name="tra_parcel0" value="<?php echo $row['tra_parcel0']; ?>" >													
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-1" class="text-primary">Parcel Tracking 1</label> 																	
															<input  class="form-control" name="tra_parcel1" value="<?php echo $row['tra_parcel1']; ?>" >
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Parcel Tracking 2</label> 
															<input class="form-control" name="tra_parcel2" value="<?php echo $row['tra_parcel2']; ?>">													
														</div> 
													</div> 
												</div> 
												<div class="row">	
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Collection date</label> 
															<input class="form-control" name="tra_parcel3" value="<?php echo $row['tra_parcel3']; ?>" > 																	
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">Delivery schedule</label> 
															<input class="form-control" name="tra_parcel4" value="<?php echo $row['tra_parcel4']; ?>" > 
														</div> 
													</div>
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">End of the day</label> 
															<input class="form-control" name="tra_parcel5" value="<?php echo $row['tra_parcel5']; ?>" > 																	
														</div> 
													</div> 
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Last location</label> 
															<input  class="form-control" name="tra_parcel6" value="<?php echo $row['tra_parcel6']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Additional information</label> 
															<input class="form-control" name="tra_parcel7" value="<?php echo $row['tra_parcel7']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Origin</label> 
															<input class="form-control" name="tra_parcel8" value="<?php echo $row['tra_parcel8']; ?>"  >													
														</div>
													</div>
												</div>	
												<div class="row" >
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">Destination</label> 
															<input class="form-control" name="tra_parcel9" value="<?php echo $row['tra_parcel9']; ?>"  > 
														</div> 
													</div> 
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">Service mode</label> 
															<input class="form-control" name="tra_parcel10" value="<?php echo $row['tra_parcel10']; ?>"  >
														</div> 
													</div>
													<div class="col-md-4"> 
														<div class="form-group"> 
															<label for="field-3" class="text-primary">Type service</label> 
															<input class="form-control" name="tra_parcel11" value="<?php echo $row['tra_parcel11']; ?>"  >
														</div> 
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Shipping description</label> 
															<input class="form-control" name="tra_parcel12" value="<?php echo $row['tra_parcel12']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Details of</label> 
															<input class="form-control" name="tra_parcel13" value="<?php echo $row['tra_parcel13']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Name Sender</label> 
															<input class="form-control" name="tra_parcel14" value="<?php echo $row['tra_parcel14']; ?>" > 
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Phone Sender</label> 
															<input  class="form-control" name="tra_parcel15" value="<?php echo $row['tra_parcel15']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Address Sender</label> 
															<input class="form-control" name="tra_parcel16" value="<?php echo $row['tra_parcel16']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Information from</label> 
															<input class="form-control" name="tra_parcel17" value="<?php echo $row['tra_parcel17']; ?>"  >													
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Name Recipient</label> 
															<input  class="form-control" name="tra_parcel18" value="<?php echo $row['tra_parcel18']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Phone Recipient</label> 
															<input class="form-control" name="tra_parcel19" value="<?php echo $row['tra_parcel19']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Address Recipient</label> 
															<input class="form-control" name="tra_parcel20" value="<?php echo $row['tra_parcel20']; ?>"  >													
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Shipping history</label> 
															<input  class="form-control" name="tra_parcel21" value="<?php echo $row['tra_parcel21']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Tracking No</label> 
															<input class="form-control" name="tra_parcel22" value="<?php echo $row['tra_parcel22']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">New Location</label> 
															<input class="form-control" name="tra_parcel23" value="<?php echo $row['tra_parcel23']; ?>"  >													
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">State shipping</label> 
															<input  class="form-control" name="tra_parcel24" value="<?php echo $row['tra_parcel24']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Date and time</label> 
															<input class="form-control" name="tra_parcel25" value="<?php echo $row['tra_parcel25']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Remarks</label> 
															<input class="form-control" name="tra_parcel26" value="<?php echo $row['tra_parcel26']; ?>"  >													
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Current state</label> 
															<input  class="form-control" name="tra_parcel27" value="<?php echo $row['tra_parcel27']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Weight Kg</label> 
															<input class="form-control" name="tra_parcel28" value="<?php echo $row['tra_parcel28']; ?>"  >													
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Tracking number not</label> 
															<input class="form-control" name="tra_parcel29" value="<?php echo $row['tra_parcel29']; ?>"  >													
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-4" > 
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Check the number or</label> 
															<input  class="form-control" name="tra_parcel30" value="<?php echo $row['tra_parcel30']; ?>">													
														</div> 
													</div> 
													<div class="col-md-4">
														<div class="form-group"> 
															<label for="field-2" class="text-primary">Back To Home</label> 
															<input class="form-control" name="tra_parcel31" value="<?php echo $row['tra_parcel31']; ?>"  >													
														</div>
													</div>
												</div>
											
											</div>  
										 
											<div class="modal-footer" id="contenido"> 
												<button type="button" class="btn btn-white" data-dismiss="modal"><?php echo $CCERRAR; ?></button> 
												<input name="submit" type="submit" class="btn btn-success" value="<?php echo $UPDATE; ?>"></a>
											</div>
										</div>
										</form>	
									</div>				
								</div>
							<!-- /.UPDATE TRACKING RESULT FORM -->
							<?php }} ?>	
							
							
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

<!-- Modal-Effect -->
<script src="assets/modal-effect/js/classie.js"></script>
<script src="assets/modal-effect/js/modalEffects.js"></script>
<script src="assets/notifications/notify.min.js"></script>
<script src="assets/notifications/notify-metro.js"></script>
<script src="assets/notifications/notifications.js"></script>

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

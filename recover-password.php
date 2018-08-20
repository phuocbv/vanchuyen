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
require_once('dashboard/database.php');
require_once('dashboard/database-settings.php');
require_once('dashboard/language_website/language_website.php');
require_once('dashboard/library.php');
require 'dashboard/css/GUMP/gump.class.php';

$db = conexion();
$qryCompany = $db->query("SELECT cname, description, keywords, footer_website, bemail FROM company");
$company = $qryCompany->fetch_array();

//This code runs if the form has been submitted
if (isset($_POST['submit'])) {
	$showAlert = true;

	## Validos los valores que llegan del formulario
	$validator = new GUMP();

	// sanitizo la variable POST
	$_POST = $validator->sanitize($_POST);

	// defino reglas y filtros
	$validator->filter_rules( array(
		'Email'       	=> 'trim|sanitize_email'));

	$validator->validation_rules( array(
		'Email'       	=> 'required|valid_email'));

	// se realiza las validaciones
	$validated_data = $validator->run($_POST);

	# si hubo errores lo informamos
	if($validated_data === false) {
		$cssClass = "alert-danger";
		$pro_title = "".$L_['ft_ohw']."";
		$proc_message = $validator->get_readable_errors(true);
	} else {
		$email = $_POST['Email'];
		// checks if the username is in use
		$get_user_data = $con->query("SELECT email, name FROM tbl_clients WHERE email = '$email'")or die('Error inesperado en BBDD.');
		$get_count = $get_user_data->num_rows;

		//if the name exists it gives an error
		if ($get_count == 0) {
			$pro_title = "".$L_['ft_ohw']."";
			$cssClass = "alert-danger";
			$proc_message = "".$L_['ft_ohnot']."";
		} else {
			$query = $con->query("SELECT email FROM tbl_clients WHERE email = '$email' ")or die ('Error inesperado en BBDD.');
			$r = $get_user_data->fetch_object();
			$correo  = $company["bemail"];

			//create a new random password
			$password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 8 );
			$pass = md5(PASS_SALT.$password); //encrypted version for database entry

			//send email
			$to = "$email";
			$from = "$correo";
			$subject = "$company[cname] - Password recovery";
			$body = "Hello $r->name, as you requested, we have generated a new key for your account $email, your new key of access is <strong>$password</strong>.<br/>You can enter the system and replace it with an easier to remember.";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			
			// Additional headers
			$headers .= 'From: '.$from."\r\n";	
			$headers .= "Reply-To: $correo";
			mail($to, $subject, $body, $headers);

			//update database
			$sql = $con->query("UPDATE tbl_clients SET password='$pass' WHERE email = '$email'")or die ('Error inesperado en BBDD.');
			
			$pro_title = "".$L_['ft_congra']."";
			$cssClass = "alert-success";
			$proc_message = "".$L_['ft_sucess']."";
		}
	}// close if form sent
} else{
	$showAlert = false;
}

?>
<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $company['cname']; ?> | <?php echo $L_['ft_title']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $company['description']; ?>"/>
	<meta name="keywords" content="<?php echo $company['keywords']; ?>" />
	<meta name="author" content="Jaomweb">	

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="dashboard/logo-image/image_logo.php?id=2">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="dashboard/css/login/css/bootstrap.min.css">
	<link rel="stylesheet" href="dashboard/css/login/css/animate.css">
	<link rel="stylesheet" href="dashboard/css/login/css/style.css">

	<!-- Modernizr JS -->
	<script src="dashboard/css/login/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

		<div class="container">

			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					
					<?php if($showAlert) { ?>
						<div class="row alertaCaja" style="display: none;">
							<div class="col-xs-12 col-sm-12 col-md-12" style="float: none; margin: 0 auto;">
								<div class="alert <?php echo $cssClass; ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert">x</button>

									<strong><?php echo $pro_title; ?></strong>
									<?php echo "<p>$proc_message</p>"; ?>
								</div>
							</div>
						</div>
						<?php } ?>	
					<!-- Start Sign In Form -->
					<form action="" method="post" class="fh5co-form animate-box" data-animate-effect="fadeIn">
						<div class="row">
							<div class="col-md-12 text-center">
								<ul class="menu">
									<img src="dashboard/logo-image/image_logo.php?id=1" />
								</ul>
							</div>
						</div>
						</br></br>
						<h2><?php echo $L_['ft_fmail']; ?></h2>
						<div class="form-group">
						
						</div>
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<input type="email" class="form-control" id="user-email" name="Email" size="50" maxlength="255" placeholder="<?php echo $L_['ft_youremail']; ?>" required>
						</div>
						<div class="form-group">
							<p><a href="login"><?php echo $L_['ft_sin']; ?></a> <?php echo $L_['ft_or']; ?> <a href="signup"><?php echo $L_['ft_siup']; ?></a></p>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="<?php echo $L_['ft_rpass']; ?>" class="btn btn-danger">
						</div>
					</form>
					<!-- END Sign In Form -->


				</div>
			</div>
			<div class="row" style="padding-top: 60px; clear: both;">
				<div class="col-md-12 text-center"><p><small><?php echo $company['footer_website']; ?></small></p></div>
			</div>
		</div>
	
	<!-- jQuery -->
	<script src="dashboard/css/login/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="dashboard/css/login/js/bootstrap.min.js"></script>
	<!-- Placeholder -->
	<script src="dashboard/css/login/js/jquery.placeholder.min.js"></script>
	<!-- Waypoints -->
	<script src="dashboard/css/login/js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="dashboard/css/login/js/main.js"></script>

	
	<script>
	$(function alertaBox()
	{
		$("div.alertaCaja").slideDown("fast");
		setTimeout(function(){
			window.history.replaceState( {} , '', document.URL.split('?')[0] );
			$("div.alertaCaja").slideUp("fast");
		}, 6000);
	});
	</script>

	</body>
</html>
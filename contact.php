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
require_once('dashboard/database-settings.php');
require_once('dashboard/language_website/language_website.php');

$db = conexion();
# data of the company
$qryCompany = $db->query("SELECT cname, description, keywords, footer_website FROM company");
$company = $qryCompany->fetch_array();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="dashboard/logo-image/image_logo.php?id=2"/>
	<title><?php echo $company['cname']; ?> | <?php echo $L_['g_title']; ?></title>
	<meta name="description" content="<?php echo $company['description']; ?>"/>
	<meta name="keywords" content="<?php echo $company['keywords']; ?>" />
	<meta name="author" content="Jaomweb">

	<!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />
</head>
<body class="contact-page">
	<div id="wrapper">

		<header id="header" class="site-header">
			<div class="container clearfix">
				<div class="site-brand">
					<a class="logo" href="index"><img src="dashboard/logo-image/image_logo.php?id=1" alt=""></a>
				</div><!-- .site-brand -->

				<a class="button primary-button login-button" href="login"><?php echo $L_['login']; ?></a>
			
				<nav class="main-menu">
					<span class="mobile-btn"><i class="ti ti-menu"></i></span>
					<ul>
						<li><a href="index"><?php echo $L_['home']; ?></a></li>
						<li><a href="signup"><?php echo $L_['signup']; ?></a></li>
						<li><a href="track_my_parcel"><?php echo $L_['track_my_parcel']; ?></a></li>
						<li><a href="about"><?php echo $L_['company']; ?></a></li>
						<li><a href="faq"><?php echo $L_['faq']; ?></a></li>
						<li class="current-menu-item"><a href="contact"><?php echo $L_['contacs']; ?></a></li>
					</ul>
				</nav><!-- .main-menu -->
			</div><!-- .container -->
		</header><!-- .site-header -->

		<main id="main" class="site-main">
			<section class="page-title" style="background-image: url(assets/images/placeholder/contact.jpg);">
				<div class="container">
					<h1><?php echo $L_['g_get']; ?></h1>
				</div><!-- .container -->
			</section><!-- .page-title -->

			<div class="container">
				<div class="row">
					<div class="col-md-8 main-content">
						<h2 class="contact-title"><?php echo $L_['g_get1']; ?></h2>
						<form id="form1" action="email/send_email.php" method="post" name="form1">
							<div class="field input-field">
								<input type="text" placeholder="<?php echo $L_['g_name']; ?>*" id="Name" name="Name">
							</div>

							<div class="field input-field">
								<input type="email" placeholder="<?php echo $L_['g_email']; ?>*" id="Email" name="Email">
							</div>

							<div class="field input-field">
								<input type="text" placeholder="<?php echo $L_['g_subject']; ?>" id="Subjects" name="Subjects">
							</div>

							<div class="field input-field">
								<textarea rows="3" cols="30" id="Message" name="Message" placeholder="<?php echo $L_['g_message']; ?>*"></textarea>
							</div>

							<div class="field input-submit">
								<input type="submit" id="submit" name="send" value="<?php echo $L_['g_send']; ?>" class="button primary-button">
							</div>
						</form>
					</div><!-- .main-content -->

					<div class="col-md-4 sidebar">
						<aside class="widget contact-widget">
							<ul class="contact-list">
								<li>
									<div class="icons"><i class="ti ti-headphone-alt"></i></div>
									<h4><?php echo $L_['g_phone']; ?></h4>
									<p><a href="#"><?php echo $L_['g_info_phone']; ?></a></p>
								</li>
								<li>
									<div class="icons"><i class="ti ti-map-alt"></i></div>
									<h4><?php echo $L_['g_address']; ?></h4>
									<p><?php echo $L_['g_info_address']; ?></p>
								</li>
								<li>
									<div class="icons"><i class="ti ti-email"></i></div>
									<h4><?php echo $L_['g_emails']; ?></h4>
									<p><a href="mailto:<?php echo $L_['g_info_emails']; ?>"><?php echo $L_['g_info_emails']; ?></a></p>
								</li>
							</ul>
						</aside>
					</div>
				</div>
			</div><!-- .container -->

			<div id="map"></div>
		</main><!-- .site-main -->
		
		<!-- Google Map -->
		
		<script>
		function initMap() {
				var map = new google.maps.Map(document.getElementById('map'), {
					center: { lat:  <?php echo $L_['g_lat']; ?>, lng: <?php echo $L_['g_lng']; ?> },
					scrollwheel: false,
					zoom: 10,
					scrollwheel: false,
					navigationControl: false,
					mapTypeControl: false,
					scaleControl: false,
					styles: [
					{
						featureType: "all",
						stylers: [
							{ saturation: -100 }
						]
					},{
						featureType: "road.arterial",
						elementType: "geometry",
						stylers: [
							{ hue: "#005EFF" },
							{ saturation: -100 }
						]
					},{
						featureType: "poi.business",
						elementType: "labels",
						stylers: [
							{ visibility: "off" }
						]
					}
					]
				});
			} // close function here
    </script>
    <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDieZ7uAY4DPdT3Z4fp4KtykHl6dWryYdw&callback=initMap">
        </script>

		<!-- Footer -->
		<?php include_once "footer.php"; ?>
		<!-- /Footer -->

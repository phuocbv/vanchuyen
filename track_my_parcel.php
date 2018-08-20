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
	<title><?php echo $company['cname']; ?> | <?php echo $L_['t_title']; ?></title>
	<meta name="description" content="<?php echo $company['description']; ?>"/>
	<meta name="keywords" content="<?php echo $company['keywords']; ?>" />
	<meta name="author" content="Jaomweb">

	<!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />
	
	<style type="text/css">
		.userform{width: 400px;}
		.userform p {
			width: 100%;
		}
		.userform label {
			width: 120px;
			color: #333;
			float: center;
		}
		input.error {
			border: 1px dotted #FF4D4D;

		}
		label.error{
			width: 100%;
			color: #FF4D4D;
			font-style: italic;
			margin-center: 120px;
			margin-bottom: 15px;
		}
		.userform input.submit {
			margin-center: 120px;
		}
	</style>
</head>
<body class="home3 home">
	<div id="wrapper">

		<header id="header" class="site-header">
			<div class="container clearfix">
				<div class="site-brand">
					<a class="logo" href="index"><img src="dashboard/logo-image/image_logo.php?id=1" alt="iHelper"></a>
				</div><!-- .site-brand -->

				<a class="button primary-button login-button" href="login"><?php echo $L_['login']; ?></a>
			
				<nav class="main-menu">
					<span class="mobile-btn"><i class="ti ti-menu"></i></span>
					<ul>
						<li><a href="index"><?php echo $L_['home']; ?></a></li>
						<li><a href="signup"><?php echo $L_['signup']; ?></a></li>
						<li class="current-menu-item"><a href="track_my_parcel"><?php echo $L_['track_my_parcel']; ?></a></li>
						<li><a href="about"><?php echo $L_['company']; ?></a></li>
						<li><a href="faq"><?php echo $L_['faq']; ?></a></li>
						<li><a href="contact"><?php echo $L_['contacs']; ?></a></li>
					</ul>
				</nav><!-- .main-menu -->
			</div><!-- .container -->
		</header><!-- .site-header -->

		<main id="main" class="site-main">
			<section class="page-title" style="background-image: url(assets/images/placeholder/blog-banner.jpg);">
				<div class="container">
					<h1><?php echo $L_['t_welcome']; ?></h1>
					<p><?php echo $L_['t_detect']; ?></p>
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<form action="tracking-result" method="post" id="userForm" class="page-title-search">
								<input name="shipping" id="shipping" type="search" placeholder="<?php echo $L_['t_trackn']; ?>">
								<input type="submit" value="<?php echo $L_['t_btrack']; ?>">
							</form>
						</div>
					</div>				
				</div><!-- .container -->
			</section><!-- .page-title -->

			<section class="can-we-help-you section">
				<div class="container">
				</br></br>
					<h2 class="section-title"><?php echo $L_['t_section1']; ?> <span><?php echo $L_['t_section2']; ?></span> <?php echo $L_['t_section3']; ?></h2>
					<p class="section-desc"><?php echo $L_['t_section4']; ?></p>

					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="service-box service-center">
								<div class="icon"><img src="assets/images/assets/icons/icon5.png" alt=""></div>
								<h3 class="service-title"><a href="#"><?php echo $L_['box1']; ?></a></h3>
								<div class="service-desc"><?php echo $L_['boxd1']; ?></div>
								<a class="read-more" href="pages/premiun_support"><?php echo $L_['more']; ?></a>
							</div><!-- .service-box service-center -->
						</div>

						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="service-box service-center">
								<div class="icon"><img src="assets/images/assets/icons/icon6.png" alt=""></div>
								<h3 class="service-title"><a href="#"><?php echo $L_['box2']; ?></a></h3>
								<div class="service-desc"><?php echo $L_['boxd2']; ?></div>
								<a class="read-more" href="pages/courier_express"><?php echo $L_['more']; ?></a>
							</div><!-- .service-box service-center -->
						</div>

						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="service-box service-center">
								<div class="icon"><img src="assets/images/assets/icons/icon7.png" alt=""></div>
								<h3 class="service-title"><a href="#"><?php echo $L_['box3']; ?></a></h3>
								<div class="service-desc"><?php echo $L_['boxd3']; ?></div>
								<a class="read-more" href="pages/courier_normal"><?php echo $L_['more']; ?></a>
							</div><!-- .service-box service-center -->
						</div>
						
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- .can-we-help-you -->
			
		</main><!-- .site-main -->

		<!-- Footer -->
		<?php include_once "footer.php"; ?>
		<!-- /Footer -->
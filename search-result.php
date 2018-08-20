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
 
error_reporting(E_ERROR | E_PARSE);
session_start();
require_once('pagination-search-result.php');
require_once('dashboard/library.php');
require_once('dashboard/funciones.php');
require_once('dashboard/language_website/language_website.php');

$db = conexion();

# data of the company
$qryCompany = $db->query("SELECT cname, description, keywords, footer_website FROM company");
$company = $qryCompany->fetch_array();

//Get values
$scountry 	= $_POST['scountry'];
$sstate		= $_POST['sstate'];
$dcountry 	= $_POST['dcountry'];
$dstate 	= $_POST['dstate'];
$height 	= $_POST['height'];
$length 	= $_POST['length'];
$width 		= $_POST['width'];
$Consignment = $_POST['Consignment'];
$volumetric = $_POST['volumetric'];

//Send back in JSON Formate

$output='';

echo $output;													 
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="dashboard/logo-image/image_logo.php?id=2"/>
	<title><?php echo $company['cname']; ?> | <?php echo $L_['sr_title']; ?></title>
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
						<li class="current-menu-item"><a href="track_my_parcel"><?php echo $L_['track_my_parcel']; ?></a></li>
						<li><a href="about"><?php echo $L_['company']; ?></a></li>
						<li><a href="faq"><?php echo $L_['faq']; ?></a></li>
						<li><a href="contact"><?php echo $L_['contacs']; ?></a></li>
					</ul>
				</nav><!-- .main-menu -->
			</div><!-- .container -->
		</header><!-- .site-header -->

		<main id="main" class="site-main">
			<section class="page-title" style="background-image: url(assets/images/placeholder/search-result.jpg);">
				<div class="container">
					<h1><?php echo $L_['sr_home_title']; ?></h1>
				</div><!-- .container -->
			</section><!-- .page-title -->

			<div class="container">
				<div class="row">
									
					<div class="col-md-8 main-content">
							
						<div class="row">									   
							 <section class="title">
								<header>
									<h1><img src="assets/images/search-result/pickup.png" />&nbsp;&nbsp;&nbsp;<?php echo $L_['sr_main_title']; ?></h1>					                   
								</header>
							</section>
						</div>
						<hr />
						<div id="bbpress-forums">
							<ul class="bbp-topics">
								<li class="bbp-body">
									<ul>
										<li class="col-md-2"><h3><?php echo $L_['sr_courier']; ?></h3></li>
										<li class="col-md-2"><h3><?php echo $L_['sr_services']; ?></h3></li>
										<li class="col-md-3"><h3><?php echo $L_['sr_time']; ?></h3></li>
										<li class="col-md-2"><h3><?php echo $L_['sr_weight']; ?></h3></li>
										<li class="col-md-1"><h3><?php echo $L_['sr_rates']; ?></h3></li>
										<li class="col-md-2"><h3><?php echo $L_['sr_book']; ?></h3></li>
									</ul>
									<?php
										$records = getPageData();							
										foreach($records as $record){
										extract($record);	// extract array
									?>
									<ul>
										<li class="col-md-2"><p><img src="dashboard/<?php echo $ruta_imagen; ?>"></p></li>										
										<li class="col-md-2"><span><?php echo $services; ?></span></li>
										<li class="col-md-3"><span><?php echo $shipping_day; ?></span></li>
										<li class="col-md-2"><span>Kg&nbsp;<?php echo $Weight; ?></span></li>
										<li class="col-md-1">$&nbsp;<?php echo $rate1; ?></li>
										<li class="col-md-2"><a href="booking.php?cid=<?php echo codificar($cid); ?>"><span><input  type="button" class="btn btn-danger" value="Book Now"  tabindex="-1" /></span></a></li>
									</ul>
								</li>								
								
								<?php }  ?>

							</ul>

						</div><!-- #bbpress-forums -->
								
					</div><!-- .main-content -->
			
					<div class="col-md-4 sidebar">
						<aside class="widget contact-widget">
							<ul class="contact-list">
								<li>
									<p align="left"><?php echo $L_['sr_from']; ?> &nbsp;<strong><?php echo department($sstate); ?>&nbsp;-&nbsp;<?php echo countries($scountry); ?></strong></p>
									<p align="left"><?php echo $L_['sr_to']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo department($dstate); ?>&nbsp;-&nbsp;<?php echo countries($dcountry); ?></strong></p>
								</li>
								<li>
									<div class="icons"><img src="assets/images/search-result/volumetric.png" /></div>
									<p><?php echo $L_['sr_width']; ?> <strong><?php echo $width; ?></strong> |  <?php echo $L_['sr_length']; ?> <strong><?php echo $length; ?></strong>  |  <?php echo $L_['sr_height']; ?> <strong><?php echo $height; ?></strong></p>
								</li>
								<li>
									<div class="icons"><i class="ti ti-layers-alt"></i></div>
									<h4><?php echo $L_['sr_volumetric']; ?></h4>
									<p><?php echo $volumetric; ?></p>
								</li>
								<li>
									<div class="icons"><i class="ti ti-package"></i></div>
									<h4><?php echo $L_['sr_weight']; ?></h4>
									<p><?php echo $Consignment; ?></p>
								</li>
							</ul>
						</aside>
					</div>					
				</div>
			</div><!-- .container -->
			
		</main><!-- .site-main -->

		<!-- Footer -->
		<?php include_once "footer.php"; ?>
		<!-- /Footer -->
	
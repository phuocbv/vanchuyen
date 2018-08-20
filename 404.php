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
	<title>404 Error</title>
	<meta name="description" content="<?php echo $company['description']; ?>"/>
	<meta name="keywords" content="<?php echo $company['keywords']; ?>" />
	<meta name="author" content="Jaomweb">

	<!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />
</head>
<body class="page-404">
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
						<li class="current-menu-item"><a href="index"><?php echo $L_['home']; ?></a></li>
						<li><a href="signup"><?php echo $L_['signup']; ?></a></li>
						<li><a href="track_my_parcel"><?php echo $L_['track_my_parcel']; ?></a></li>
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
					<h1>404 Error</h1>
				</div><!-- .container -->
			</section><!-- .page-title -->

			<div class="container">
				<h2 class="error-heading">404</h2>
				<div class="error-content">
					<h3>ohh! looks like something went wrong,</h3>
					<div class="error-desc">Please contact us to help you <a href="index">Back To Home.</a></div>
				</div>
				<form action="#" method="post" class="error-search-form">
					<input type="search" placeholder="Search again...">
					<button type="submit"><i class="ti ti-search"></i></button>
				</form>
			</div><!-- .container -->
		</main><!-- .site-main -->

		<!-- Footer -->
		<?php include_once "footer.php"; ?>
		<!-- /Footer -->
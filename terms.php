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
</head>
<body class="single-forum">
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
						<li class="current-menu-item"><a href="about"><?php echo $L_['company']; ?></a></li>
						<li><a href="faq"><?php echo $L_['faq']; ?></a></li>
						<li><a href="contact"><?php echo $L_['contacs']; ?></a></li>
					</ul>
				</nav><!-- .main-menu -->
			</div><!-- .container -->
		</header><!-- .site-header -->

		<main id="main" class="site-main">
			<section class="page-title" style="background-image: url(assets/images/placeholder/terms.jpg);">
				<div class="container">
					<h1><?php echo $L_['t_mainprivacy']; ?></h1>
				</div><!-- .container -->
			</section><!-- .page-title -->

			<div class="container">
				<div class="row">
					<div class="col-md-8 main-content">
						<h3 class="forum-title"> <?php echo $L_['t_privacy']; ?></h3>
						<div id="bbpress-forums">
							<ul class="bbp-topics">
								<li class="bbp-body">
									<div class="bbp-post">
										<div class="bbp-topic-content">											
											<p> <?php echo $L_['t_content1']; ?></p>
											<ul>
												<li><?php echo $L_['t_licontent1']; ?></li>
												<li><?php echo $L_['t_licontent2']; ?></li>
												<li><?php echo $L_['t_licontent3']; ?></li>
											</ul>
											<p><?php echo $L_['t_content2']; ?></p>
										</div><!-- .bbp-topic-content -->									
									</div><!-- .bbp-post -->
								</li>
							</ul>

							<ul class="bbp-topics bbp-replies">
								<li class="bbp-body">
									<div class="bbp-post">
										<div class="bbp-topic-content">											
											<p><?php echo $L_['t_content3']; ?></p>
										</div><!-- .bbp-topic-content -->	
										</br>
										<div class="bbp-topic-content">											
											<p><?php echo $L_['t_content4']; ?></p>
										</div><!-- .bbp-topic-content -->	
									</div><!-- .bbp-post -->
								</li>
							</ul>
						</div><!-- #bbpress-forums -->
					</div>

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
		</main><!-- .site-main -->

		<!-- Footer -->
		<?php include_once "footer.php"; ?>
		<!-- /Footer -->
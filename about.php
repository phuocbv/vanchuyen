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
	<title><?php echo $company['cname']; ?> | <?php echo $L_['c_title']; ?></title>
	<meta name="description" content="<?php echo $company['description']; ?>"/>
	<meta name="keywords" content="<?php echo $company['keywords']; ?>" />
	<meta name="author" content="Jaomweb">

	<!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />
</head>
<body class="about-page">
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
			<section class="page-title" style="background-image: url(assets/images/placeholder/about.jpg);">
				<div class="container">
					<h1> <?php echo $L_['c_about']; ?></h1>					
				</div><!-- .container -->
			</section><!-- .page-title -->

			<section class="who-we-are section">
				<div class="container">
					<h2 class="section-title"> <?php echo $L_['c_section1']; ?> <span> <?php echo $L_['c_section2']; ?></span></h2>
					<p class="section-desc"> <?php echo $L_['c_section3']; ?></p>

					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="intro-box">
								<h3 class="intro-title"><a href="#"> <?php echo $L_['c_box1']; ?></a></h3>
								<div class="intro-desc"> <?php echo $L_['c_boxd1']; ?> </div>
								<a class="read-more" href="#"> <?php echo $L_['c_section4']; ?></a>
							</div><!-- .intro-box -->
						</div>

						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="intro-box">
								<h3 class="intro-title"><a href="#"> <?php echo $L_['c_box2']; ?></a></h3>
								<div class="intro-desc"> <?php echo $L_['c_boxd2']; ?> </div>
								<a class="read-more" href="#"> <?php echo $L_['c_section4']; ?></a>
							</div><!-- .intro-box -->
						</div>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- .who-we-are -->

			<section class="meet-our-team section light-bg">
				<div class="container">
					<h2 class="section-title"> <?php echo $L_['c_info_title1']; ?> <span><?php echo $L_['c_info_title2']; ?></span></h2>
					<p class="section-desc"><?php echo $L_['c_info_detail']; ?></p>

					<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="team">
								<div class="avatar"><img src="assets/images/placeholder/team1.png" alt=""></div>
								<div class="team-info">
									<h3 class="team-name">Marie J. Smith</h3>
									<span class="team-job">Web Developer</span>
									<ul class="socials">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div><!-- .team -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="team">
								<div class="avatar"><img src="assets/images/placeholder/team2.png" alt=""></div>
								<div class="team-info">
									<h3 class="team-name">Billy S. Tietjen</h3>
									<span class="team-job">Web Designer</span>
									<ul class="socials">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div><!-- .team -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="team">
								<div class="avatar"><img src="assets/images/placeholder/team3.png" alt=""></div>
								<div class="team-info">
									<h3 class="team-name">Edward S. Agosto</h3>
									<span class="team-job">Digital Marketer</span>
									<ul class="socials">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div><!-- .team -->
						</div>

						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="team">
								<div class="avatar"><img src="assets/images/placeholder/team4.png" alt=""></div>
								<div class="team-info">
									<h3 class="team-name">Clara C. Vinson</h3>
									<span class="team-job">Account Manager</span>
									<ul class="socials">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div><!-- .team -->
						</div>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- .meet-our-team -->
		</main><!-- .site-main -->

		<!-- Footer -->
		<?php include_once "footer.php"; ?>
		<!-- /Footer -->
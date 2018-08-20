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

# data from the countries table
$querys = $db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");
$rowsCount = $querys->num_rows;

$query = $db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");
$rowCount = $query->num_rows;
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="dashboard/logo-image/image_logo.php?id=2"/>
	<title><?php echo $company['cname']; ?> | <?php echo $L_['title']; ?></title>
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
<body class="home1 home">
	<div id="wrapper">
	
		<header id="header" class="site-header light-header">
			<div class="container clearfix">
				<div class="site-brand">
					<a class="logo" href="index"><img src="dashboard/logo-image/image_logo.php?id=1" alt=""></a>
					<a class="logo light-logo" href="index"><img src="dashboard/logo-image/image_logo.php?id=1" alt=""></a>
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
			<section class="page-title" style="background-image: url(assets/images/placeholder/home-banner.jpg);">
				<div class="container">
					<h1><?php echo $L_['welcome']; ?></h1>
					<p><?php echo $L_['logistics']; ?></p>
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<form action="tracking-result" method="post" id="userForm" class="page-title-search">
								<input name="shipping" id="shipping" type="search" placeholder="<?php echo $L_['trackn']; ?>">
								<input type="submit" value="<?php echo $L_['btrack']; ?>">
							</form>
						</div>
					</div>
				</div><!-- .container -->
			</section><!-- .page-title -->

			<section class="can-we-help-you section ">
				<div class="container" >
				</br></br>
					<h2 class="section-title"><?php echo $L_['shippingc']; ?> <span><?php echo $L_['calculator']; ?></span></h2>
					<p class="section-desc"><?php echo $L_['justpop']; ?></p>

					<div class="row">
						<div class="col-md-2">
							<img src="assets/images/calculator/bg.jpg " alt="Shipping Calculator">
						</div>
					<form action="search-result" method="post" id="podForm" class="comment-form">
						<div class="col-md-5">							
							
							<div class="col-md-7">										
								<p class="comment-form-email">
									<select type="text" class="form-control"  name="scountry" id="country1" required>
									<option value=""><?php echo $L_['h_title_country']; ?></option>
										<?php
										
											if($rowsCount > 0){
												while($row = $querys->fetch_assoc()){ 
													echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
												}
											}else{
												echo '<option value="">Country not available</option>';
											}
										?>														
									</select>
								</p>
								<p class="comment-form-website">
									<select type="text" name ="dcountry" id="country2" class="form-control" required>
										<option value=""><?php echo $L_['h_title_country']; ?></option>
										<?php
										
											if($rowCount > 0){
												while($row = $query->fetch_assoc()){ 
													echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
												}
											}else{
												echo '<option value="">Country not available</option>';
											}
										?>														
									</select>
								</p>
							</div>
							<div class="row">										
								<p class="comment-form-email">
									<select type="text" name="sstate" id="state1" class="form-control" required>
										<option value=""><?php echo $L_['h_title_state']; ?></option>
									</select>
								</p>
								<p class="comment-form-email" style="display:none">
								<select type="text" class="form-control">
									<option value="">City</option>
								</select>
								</p>
								<p class="comment-form-website">
									<select type="text" name ="dstate" id="state2" class="form-control" required>
										<option value=""><?php echo $L_['h_title_state']; ?></option>
									</select>
								</p>
								<p class="comment-form-email" style="display:none">
								<select type="text" class="form-control">
									<option value="">City</option>
								</select>
								</p>
							</div>
							
						</div> <!-- #respond -->
				
						<div class="col-md-5">
							
							<div class="row">
								<p class="comment-form-author">
									<input class="form-control" type="number" onblur="if(this.value == ''){this.value='0'}" onKeyUp="volumetrico();" id="volume3" name="length" placeholder="<?php echo $L_['h_length']; ?>"   min="0" required />
								</p>
								<p class="comment-form-email">
									<input class="col-md-2 form-control" type="number"  onblur="if(this.value == ''){this.value='0'}"  onKeyUp="svolumetrico();" id="volume2" name="width" placeholder="<?php echo $L_['h_width']; ?>" min="0" required />
								</p>
								<p class="comment-form-website">
									<input class="col-md-2 form-control" type="number"  onblur="if(this.value == ''){this.value='0'}"  onKeyUp="volumetrico();" id="volume1" name="height" placeholder="<?php echo $L_['h_heigth']; ?>" min="0" required />
								</p>									
								<p class="comment-form-author">
									<input class="form-control cf text-box single-line" id="totalpeso" name="volumetric" tabindex="8" type="text" style="display:none;"  />
									<input class="form-control cf text-box single-line" name="Consignment" placeholder="<?php echo $L_['h_weigth']; ?>" tabindex="8" type="text" required  />
								</p>																			
								<p class="form-submit">
									<input type="submit" value="<?php echo $L_['h_submit']; ?>" class="button primary-button" name="Submit" type="submit"  id="submitPod" data-gacat="BookingPodCustom" data-gaact="Submit" data-galab="Generic">
								</p>
							</div>
							
						</div> <!-- #respond -->
					</form>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- .can-we-help-you -->

			<section class="can-we-help-you section light-bg">
				<div class="container">
					<h2 class="section-title"><?php echo $L_['why']; ?> <span><?php echo $L_['whys']; ?></span></h2>
					<p class="section-desc"><?php echo $L_['whydetail']; ?></p>

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

			<section class="blog-slider-section section">
				<div class="container">
					<h2 class="section-title"><?php echo $L_['section1']; ?> <span><?php echo $L_['section2']; ?></span></h2>
					<p class="section-desc"><?php echo $L_['section3']; ?></p>

					<div class="blog-slider blog-grid owl-carousel">
						<article class="post">
							<a href="pages/courier_extension" class="post-thumb hover-cycle">
								<img alt="" src="assets/images/placeholder/shipping1.jpg">
							</a>
							<div class="post-info">
								<h3 class="post-title"><a href="pages/courier_extension"><?php echo $L_['post1']; ?></a></h3>
								<p class="post-desc"><?php echo $L_['post4']; ?></p>
							</div>
						</article>

						<article class="post">
							<a href="pages/courier_term&condition" class="post-thumb hover-cycle">
								<img alt="" src="assets/images/placeholder/shipping2.jpg">
							</a>
							<div class="post-info">
								<h3 class="post-title"><a href="pages/courier_term&condition"><?php echo $L_['post2']; ?></a></h3>
								<p class="post-desc"><?php echo $L_['post5']; ?></p>
							</div>
						</article>

						<article class="post">
							<a href="pages/courier_protected" class="post-thumb hover-cycle">
								<img alt="" src="assets/images/placeholder/shipping3.jpg">
							</a>
							<div class="post-info">
								<h3 class="post-title"><a href="pages/courier_protected"><?php echo $L_['post3']; ?></a></h3>
								<p class="post-desc"><?php echo $L_['post6']; ?></p>
							</div>
						</article>

						<article class="post">
							<a href="pages/courier_delivery" class="post-thumb hover-cycle">
								<img alt="" src="assets/images/placeholder/shipping4.jpg">
							</a>
							<div class="post-info">
								<h3 class="post-title"><a href="pages/courier_delivery"><?php echo $L_['post7']; ?></a></h3>
								<p class="post-desc"><?php echo $L_['post10']; ?></p>
							</div>
						</article>

						<article class="post">
							<a href="pages/courier_cargo" class="post-thumb hover-cycle">
								<img alt="" src="assets/images/placeholder/shipping5.jpg">
							</a>
							<div class="post-info">
								<h3 class="post-title"><a href="pages/courier_cargo"><?php echo $L_['post8']; ?></a></h3>
								<p class="post-desc"><?php echo $L_['post11']; ?></p>
							</div>
						</article>
						
						<article class="post">
							<a href="pages/courier_service" class="post-thumb hover-cycle">
								<img alt="" src="assets/images/placeholder/shipping6.jpg">
							</a>
							<div class="post-info">
								<h3 class="post-title"><a href="pages/courier_service"><?php echo $L_['post9']; ?></a></h3>
								<p class="post-desc"><?php echo $L_['post12']; ?></p>
							</div>
						</article>

					</div><!-- .blog-slider -->
				</div><!-- .container -->
			</section><!-- .blog-slider-section -->
		</main><!-- .site-main -->

		<!-- Footer -->
		<?php include_once "footer.php"; ?>
		<!-- /Footer -->
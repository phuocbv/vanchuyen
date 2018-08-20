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
require_once('../dashboard/database-settings.php');
require_once('../dashboard/config.php');
require_once('../dashboard/language_website/language_website.php');

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
	<link rel="shortcut icon" type="image/png" href="../dashboard/logo-image/image_logo.php?id=2"/>
	<title><?php echo $company['cname']; ?> | Terms and Conditions </title>
	<meta name="description" content="<?php echo $company['description']; ?>"/>
	<meta name="keywords" content="<?php echo $company['keywords']; ?>" />
	<meta name="author" content="Jaomweb">

	<!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css" />
</head>
<body class="single">
	<div id="wrapper">
		<header id="header" class="site-header">
			<div class="container clearfix">
				<div class="site-brand">
					<a class="logo" href="../index"><img src="../dashboard/logo-image/image_logo.php?id=1" alt=""></a>
				</div><!-- .site-brand -->

				<a class="button primary-button login-button" href="../login"><?php echo $L_['login']; ?></a>
			
				<nav class="main-menu">
					<span class="mobile-btn"><i class="ti ti-menu"></i></span>
					<ul>
						<li><a href="../index"><?php echo $L_['home']; ?></a></li>
						<li><a href="../signup"><?php echo $L_['signup']; ?></a></li>
						<li><a href="../track_my_parcel"><?php echo $L_['track_my_parcel']; ?></a></li>
						<li class="current-menu-item"><a href="../about"><?php echo $L_['company']; ?></a></li>
						<li><a href="../faq"><?php echo $L_['faq']; ?></a></li>
						<li><a href="../contact"><?php echo $L_['contacs']; ?></a></li>
					</ul>
				</nav><!-- .main-menu -->
			</div><!-- .container -->
		</header><!-- .site-header -->

		<main id="main" class="site-main">
			
			<div class="container">
			</br></br>
			<h1>Terms and Conditions</h1>
			</br>
			</div><!-- .container -->

			<div class="container">
				<div class="row">
					<div class="col-md-8 main-content">
						<article class="post">
							<div class="entry-content">
								<img src="../assets/images/placeholder/courier_termcondition.jpg" alt="">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nos vero, inquit ille; Quo tandem modo? Sint modo partes vitae beatae. Sed quae tandem ista ratio est? Nihil enim hoc differt. Duo Reges: constructio interrete. Ut pulsi recurrant?</p>
								<p>Cur iustitia laudatur? Restatis igitur vos; Quae cum essent dicta, discessimus. Respondeat totidem verbis. Quis istum dolorem timet? Memini vero, inquam:</p>
								<ul>
									<li>Ut placet, inquit, etsi enim illud erat aptius, aequum cuique concedere.</li>
									<li>Ut in geometria, prima si dederis, danda sunt omnia.</li>
									<li>Quid in isto egregio tuo officio et tanta fide-sic enim existimo-ad corpus refers?</li>
								</ul>
								<p>Quid ad utilitatem tantae pecuniae? Quae sequuntur igitur? Tria genera bonorum; Quis hoc dicit? Quonam, inquit, modo? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
								<p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p
								>
								<blockquote>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</blockquote>
								<p>Idem adhuc; Audeo dicere, inquit. Quaerimus enim finem bonorum. Cur id non ita fit? Si quae forte-possumus. Illi enim inter se dissentiunt. Equidem e Cn. Nunc agendum est subtilius.</p>
							</div>							
						</article>
					</div><!-- .main-content -->

					<div class="col-md-4 sidebar">
						<aside class="widget categories-widget">
							<h3 class="widget-title">Why you choose us?</h3>
							<ul>
								<li><a href="../pages/premiun_support">PREMIUM SUPPORT</a></li>
								<li><a href="../pages/courier_express">COURIER EXPRESS</a></li>
								<li><a href="../pages/courier_normal">COURIER NORMAL</a></li>
							</ul>
						</aside>

						<aside class="widget recent-posts-widget">
							<h3 class="widget-title">Most popular helpful articles</h3>
							<ul>
								<li><a href="../pages/courier_extension">How Do I Install an Extension</a></li>
								<li><a href="../pages/courier_term&condition">Terms and Conditions</a></li>
								<li><a href="../pages/courier_protected">Are Download Files Protected</a></li>
								<li><a href="../pages/courier_delivery">Etiam ornare justo at magna</a></li>
								<li><a href="../pages/courier_cargo">Nunc at ligula egestasdui</a></li>
								<li><a href="../pages/courier_service">Nunc at ligula egestassad</a></li>
							</ul>
						</aside>

					</div>
				</div>
			</div><!-- .container -->
		</main><!-- .site-main -->

		<!-- .footer -->
		
		<footer id="footer" class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-9">
						<div class="copyright"><?php echo $company['footer_website']; ?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../privacy"><?php echo $L_['privacy']; ?></a>
						&nbsp;&nbsp;|&nbsp;&nbsp;<a href="../terms"><?php echo $L_['terms']; ?></a></div>
							
							
					</div>
					
					<div class="col-md-4 col-sm-3">
						<a class="back-to-top" href="#"><?php echo $L_['backtotop']; ?></a>
					</div>
				</div>
			</div><!-- .container -->
		</footer><!-- site-footer -->
	</div><!-- #wrapper -->

	<!-- jQuery -->    
	<script type="text/javascript" src="../assets/js/jquery-3.1.1.js"></script>  
    <script type="text/javascript" src="../assets/css/libs/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/css/libs/sticky/jquery.sticky.js"></script>
    <script type="text/javascript" src="../assets/css/libs/owl.carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../assets/css/libs/waypoints/waypoints.min.js"></script>
    <script type="text/javascript" src="../assets/css/libs/counterup/jquery.counterup.min.js"></script>
	
    <!-- orther script -->
    <script  type="text/javascript" src="../assets/js/main.js"></script>

</body>

</html>
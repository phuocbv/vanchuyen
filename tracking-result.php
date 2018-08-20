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
require_once('dashboard/library.php');
require_once('dashboard/funciones.php');
require_once('dashboard/database-settings.php');
require_once('dashboard/language_website/language_website.php');

$con = conexion();

# datos de la compañia
$qryCompany = $con->query("SELECT cname, description, keywords, footer_website FROM company");
$company = $qryCompany->fetch_array();

$tracking= $_POST['shipping'];

$sql_1 = "SELECT * FROM courier_track WHERE tracking = '$tracking'"; 
$sql_1 = mysql_query($sql_1);

$sql = "SELECT c.cid, c.tracking, c.letra, c.book_mode, c.schedule, c.pick_time, c.invice_no, c.mode, c.type, c.weight, c.comments, c.ship_name, c.phone, 
c.s_add, c.rev_name, c.r_phone, c.r_add, c.pick_date, c.user, s.color, c.status FROM courier_customer c, service_mode s WHERE s.servicemode = c.status AND c.tracking = '$tracking'";
																														
$result = dbQuery($sql);
$no = dbNumRows($result);
if($no == 1){	
				
while($data = dbFetchAssoc($result)) {
extract($data);

?>
<!doctype html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="dashboard/logo-image/image_logo.php?id=2"/>
	<title><?php echo $company['cname']; ?> | <?php echo $L_['tra_parcel0']; ?></title>
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

				<a class="button primary-button login-button" href="#"><?php echo $L_['login']; ?></a>
			
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
			<section class="page-title" style="background-image: url(assets/images/placeholder/parcel-tracking.jpg);">
				<div class="container">
					<h1><?php echo $L_['tra_parcel1']; ?></h1>
				</div><!-- .container -->
			</section><!-- .page-title -->

			<div class="container">
				<div class="row">
					<div class="col-md-8 main-content">
							
								<div class="row">									   
									 <section class="title">
										<header>
											<h1><img src="dashboard/img/tracking-search.png" /><?php echo $L_['tra_parcel2']; ?></h1>					                   
										</header>
									</section>
								</div>
								<hr />
								<div class="row">
									<div class="col-md-4"> <font size=3 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel3']; ?></strong></font><br />
									<?php echo $pick_date; ?>
									</div>
									<div class="col-md-4"> <font size=3 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel4']; ?></strong></font><br />
									<?php echo $schedule; ?> <?php echo $L_['tra_parcel5']; ?>
									</div>

									<div class="col-md-4"> <font size=3 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel6']; ?></strong></font><br />
										<div> 
										
										<?php 
											  while($rs=mysql_fetch_array($sql_1)) 
											  { 
												echo "" 
													   ."".$rs['pick_time']."" 
													   .""; 
											  } 
										?> 
										
										</div>
									</div>
								</div>
								<hr />
								<div class="row">
									<h2><?php echo $L_['tra_parcel7']; ?></h2>
								  
								  <br/>
									<div class="col-md-4"> <font size=2 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel8']; ?></strong></font> <?php echo $invice_no; ?><br />
										<font size=2 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel9']; ?></strong></font> <?php echo $pick_time; ?><br />
										<font size=2 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel10']; ?></strong></font> <?php echo $mode; ?><br />
										<font size=2 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel11']; ?></strong></font> <?php echo $type; ?><br />   
										<font size=2 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel12']; ?></strong></font> <?php echo $comments; ?>
									</div>
									<div class="col-md-4"> <font size=3 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel13']; ?></strong></font><br />
										<font size=2 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel14']; ?></strong></font> <?php echo $ship_name; ?><br />
										<font size=2 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel15']; ?></strong></font> <?php echo $phone; ?><br />
										<font size=2 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel16']; ?></strong></font>  <?php echo $s_add; ?> 
									</div>
									<div class="col-md-4"> <font size=3 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel17']; ?></strong></font><br />
										<font size=2 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel18']; ?></strong></font> <?php echo $rev_name; ?><br />
										<font size=2 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel19']; ?></strong></font> <?php echo $r_phone; ?><br />
										<font size=2 color="Black" face="Poppins, sans-serif"><strong><?php echo $L_['tra_parcel20']; ?></strong></font>  <?php echo $r_add; ?>
									</div>				
								</div>
								<hr />
								<div class="row">									
									<h2>Shipping history</h2>
									<br/>
									<?php
										require_once('dashboard/database.php');

										//EJECUTAMOS LA CONSULTA DE BUSQUEDA
										$result = mysql_query("SELECT * FROM courier_track WHERE tracking = '$tracking' ORDER BY bk_time");
										//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
										echo ' <table class="table table-bordered table-striped table-hover" >
													<tr class="car_bold col_dark_bold" align="center">
														<td><font color="Black" face="Poppins, sans-serif"><strong>'.$L_['tra_parcel21'].'</strong></font></td>
														<td><font color="Black" face="Poppins, sans-serif"><strong>'.$L_['tra_parcel22'].'</strong></font></td>
														<td><font color="Black" face="Poppins, sans-serif"><strong>'.$L_['tra_parcel24'].'</strong></font></td>
														<td><font color="Black" face="Poppins, sans-serif"><strong>'.$L_['tra_parcel25'].'</strong></font></td>
														<td><font color="Black" face="Poppins, sans-serif"><strong>'.$L_['tra_parcel26'].'</strong></font></td>																							
													</tr>';
										if(mysql_num_rows($result)>0){
											while($row = mysql_fetch_array($result)){
												echo '<tr align="center">
														<td>'.$row['tracking'].'</td>
														<td>'.$row['pick_time'].'</td>
														<td>'.$row['status'].'</td>
														<td>'.$row['bk_time'].'</td>				
														<td>'.$row['comments'].'</td>
														</tr>';
											}
										}else{
											echo '<tr>
														<td colspan="5" >There are no results</td>
													</tr>';
										}
										echo '</table>';
									?>
									
								</div> 									
						 <!-- End Deprixa Section -->
					</div><!-- .main-content -->

					<div class="col-md-4 sidebar">
						<aside class="widget contact-widget">
							<ul class="contact-list">
								<li>
									<div class="icons"><img src="assets/images/search-result/barcode.png" /></div>
									<p><font color="#000"><strong><?php echo $tracking; ?></strong></font></p>
								</li>
								<li>
									<div class="icons"><i class="ti ti-map-alt"></i></div>
									<h4><?php echo $L_['tra_parcel27']; ?></h4>
									<p><span style="background: #<?php echo $color; ?>;"  class="label label-large" ><font size=2 color="White" face="Poppins, sans-serif"><?php echo $status; ?></font></span></p>
								</li>
								<li>
									<div class="icons"><i class="ti ti-package"></i></div>
									<h4><?php echo $L_['tra_parcel28']; ?></h4>
									<p></strong></font> <?php echo $weight; ?></p>
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
		
	<?php }
		} 
		else {	
			echo '' ; 
	?>

<!doctype html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="dashboard/logo-image/image_logo.php?id=2"/>
	<title><?php echo $company['cname']; ?> | <?php echo $L_['tra_parcel0']; ?></title>

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
			<section class="page-title" style="background-image: url(assets/images/placeholder/parcel-tracking.jpg);">
				<div class="container">
					<h1><?php echo $L_['tra_parcel21']; ?></h1>
				</div><!-- .container -->
			</section><!-- .page-title -->

			<div class="container">
				<div class="row">
					<div class="col-md-8 main-content">
						
						<div class="row">									   
							 <section class="title">
								<header>
									<h1><img src="dashboard/img/tracking-search.png" /><?php echo $L_['tra_parcel2']; ?></h1>					                   
								</header>
							</section>
						</div>
						<hr />
						<div class="row">									
							<div class="text-center">
								<h1><img src="dashboard/img/no_courier.png" /></h1>
								<h3><?php echo $L_['tra_parcel29']; ?></h3>
								<p><font color="#FF0000"><?php echo $tracking; ?></font> <?php echo $L_['tra_parcel30']; ?></p>
								<div class="text-center"><a href="index" class="btn-system btn-small"><?php echo $L_['tra_parcel31']; ?></a></div>
							</div>	
						</div> 									
					 <!-- End Deprixa Section -->
					</div><!-- .main-content -->

					<div class="col-md-4 sidebar">
						<aside class="widget contact-widget">
							<ul class="contact-list">
								<li>
									<div class="icons"><img src="assets/images/search-result/barcode.png" /></div>
									<p><font color="#000"><strong></strong></font></p>
								</li>
								<li>
									<div class="icons"><i class="ti ti-map-alt"></i></div>
									<h4><?php echo $L_['tra_parcel27']; ?></h4>
									<p></p>
								</li>
								<li>
									<div class="icons"><i class="ti ti-package"></i></div>
									<h4><?php echo $L_['tra_parcel28']; ?></h4>
									<p></strong></font> </p>
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
		<?php 
		}//else
		?>
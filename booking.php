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
require_once('dashboard/funciones.php');
require_once('dashboard/language_website/language_website.php');

$db = conexion();
# data of the company
$qryCompany = $db->query("SELECT cname, description, keywords, footer_website FROM company");
$company = $qryCompany->fetch_array();

$cid=$_GET['cid'];
$cid = decodificar($cid);
$resultado = $db->query("SELECT * FROM scheduledpickup WHERE cid='$cid' ");

# data table countries
$querys = $db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");
$rowsCount = $querys->num_rows;

# data table countries
$query = $db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");
$rowCount = $query->num_rows;

# data table countries
$queryss = $db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");
$rowssCount = $queryss->num_rows;
?> 
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="dashboard/logo-image/image_logo.php?id=2"/>
	<title><?php echo $company['cname']; ?> | <?php echo $L_['bf_title']; ?></title>
	<meta name="description" content="<?php echo $company['description']; ?>"/>
	<meta name="keywords" content="<?php echo $company['keywords']; ?>" />
	<meta name="author" content="Jaomweb">

	<!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />
	<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.mobile.min.css" />
	
	<style type="text/css">
		.color{
			background-color: #FFBFBF; 
			border: 1px solid #0291DD;
			font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
			font-size: 12px;
		}
	</style>

</head>
<body>
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
			<section class="page-title" style="background-image: url(assets/images/placeholder/search-booking.jpg);">
			</section><!-- .page-title -->

			<div class="container">
				<div class="row">
					<div class="col-md-8 main-content">
						<div id="bbpress-forums">
							<ul class="bbp-topics">
								<li class="bbp-header">
									<ul class="forum-titles">
										<li>
											<h2><?php echo $L_['bf_main_title1']; ?></h2>
											</br>
											<p><?php echo $L_['bf_main_title2']; ?></p>
										</li>
									</ul>
								</li>
							</ul>

							<div class="section-container">
							
							<form class="form-horizontal templatemo-signin-form" role="form" name="reg-form" id="reg-form" action="dashboard/settings/panel_customer/booking_customer.php" autocomplete="off" method="post">
								<div id="UserDetailsSection">
									<div class="form-horizontal section-form">
										<div class="form-group required">
											<p class="col-md-3 col-sm-3"><?php echo $L_['bf_email']; ?></p>
											<div class="col-md-4 col-sm-4 mobclear">
												<input class="form-control text-box single-line"  name="email" id="email" required  type="email" placeholder="<?php echo $L_['bf_emailn']; ?>" />
											</div>
											<div class="col-md-4 col-sm-4 mobclear">
												<input class="form-control text-box single-line" type="password"  name="pwd" id="password" required  placeholder="<?php echo $L_['bf_password']; ?>" />
											</div>
										</div>
										<div class="person-details-main">
											<div class="form-group">
												<hr /> 
												
											</div>
											<div class="form-group required">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_name']; ?></p>
												<div class="col-md-4 col-sm-4 mobclear">
													<input class="form-control person-details-name-input text-box single-line" type="text" name="fname" required  placeholder="<?php echo $L_['bf_firtname']; ?>" />
												</div>
												<div class="col-md-4 col-sm-4 mobclear">
													<input class="form-control landline-num text-box single-line" type="text" maxlength="15" name="phone"   placeholder="<?php echo $L_['bf_phone']; ?>" />
												</div>								
											</div>
											
											<div class="form-group required">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_cname']; ?></p>
												<div class="col-md-4 col-sm-4 padRight2">
													<input class="form-control landline-num text-box single-line" type="text"  maxlength="15" name="company" required  placeholder="<?php echo $L_['bf_nbusiness']; ?>" />
												</div>
												<div class="col-md-4 col-sm-4 padLeft2">
													<input class="form-control mobile-num text-box single-line"  id="address" maxlength="15" name="address" required  type="address"  rows="2" placeholder="<?php echo $L_['bf_address']; ?>"/>
												</div>
											</div>
											<div class="form-group required">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_rcountry']; ?></p>
												<div class="col-md-4 col-sm-4 padRight2">
													<select class="fa-glass booking_form_dropdown form-control" id="country3" name="country" required />
														<option value=""><?php echo $L_['h_title_country']; ?></option>
														<?php
															if($rowssCount > 0){
																while($row = $queryss->fetch_assoc()){ 
																	echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
																}
															}else{
																echo '<option value="">País no disponible</option>';
															}
														?>														
													</select>
												</div>
												<div class="col-md-4 col-sm-4 padLeft2">									
													<select class="fa-glass booking_form_dropdown form-control" id="state3" name="state" required  >
														<option value=""><?php echo $L_['h_title_state']; ?></option>
													</select>
												</div>
												<div class="col-md-4 col-sm-4 padLeft2" style="display:none">									
													<select class="fa-glass booking_form_dropdown form-control">
														<option value="">Select City</option>
													</select>
												</div>	
											</div>
											<div class="form-group required">
											<p class="col-md-3 col-sm-3"><?php echo $L_['zcode']; ?></p>
												<div class="col-md-4 col-sm-4 padRight2">
													<input class="form-control required-business-input" name="zipcode"  placeholder="0-9"/>																			
												</div>								
											</div>
											</br>
											<div class="form-group required">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_cdate']; ?></p> 
												<div class="col-md-8 col-sm-8">
													<div class="demo-section k-content">
														<input type="text" class="form-control" name="datedelivery" id="datetimepicker" title="datetimepicker" style="width: 100%;" >
													</div><!-- input-group -->
												</div>	
											</div>											
										</div>
									</div>
								</div>
							</div><!-- your details -->
							</br></br>
							
							<div class="section-container address-book-selection-container">
								<h2><?php echo $L_['bf_daddress']; ?></h2>
								</br>
								<hr />
								<div id="RecipientDetailsSection">
									<div class="form-horizontal section-form">
										<div class="person-details-main">

											<div class="form-group required">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_ncustomer']; ?></p>
												<div class="col-md-8 col-sm-8">
													<input class="form-control person-details-name-input text-box single-line" name="name_delivery" placeholder="<?php echo $L_['bf_fncustomer']; ?>" type="text" value="" />
												</div>
											</div>

											<div class="form-group">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_ecustomer']; ?></p>
												<div class="col-md-4 col-sm-4">
													<input class="form-control text-box single-line" type="email"  name="email_delivery"  placeholder="<?php echo $L_['bf_cemail']; ?>"/>
												</div>
												<div class="col-md-4 col-sm-4 ">
													<input class="form-control landline-num text-box single-line"  type="tel" maxlength="15" name="phone_delivery" placeholder="<?php echo $L_['bf_cphone']; ?>" />
												</div>
											</div>
											<div class="form-group required">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_coname']; ?></p>
												<div class="col-md-4 col-sm-4">
													<input class="form-control required-business-input text-box single-line" type="text" name="company_delivery"  placeholder="<?php echo $L_['bf_comname']; ?>" />
												</div>
												<div class="col-md-4 col-sm-4">
													<input class="form-control text-box single-line" type="text"  name="address_delivery" placeholder="<?php echo $L_['bf_comaddress']; ?>" />
												</div>
											</div>								
										</div>
									</div>
								</div>
								
							   <div id="DeliveryAddressSection" data-addressType="delivery">
									<div class="form-horizontal section-form">
										<hr />
										<div class="form-group">
											<p class="col-md-3 col-sm-3"><?php echo $L_['bf_dnote']; ?></p>
											<div class="col-md-8 col-sm-8">
												<input class="form-control text-box single-line"  maxlength="20" name="note" placeholder="<?php echo $L_['bf_climit']; ?>" type="text" value="" />
												<div class="collection-delivery-comment"></div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- delivery details -->
							</br>
							
							<?php while($book = $resultado->fetch_assoc()){ ?>
							<div class="section-container">
							<div id="ParcelDetailsSection">
								<h2><?php echo $L_['bf_pdetail']; ?></h2> 
								</br>
								<hr />
								<div class="section-extension">
									<div class="section-extension-content content-medium">
										<div class="form-horizontal section-form">
											<div class="form-group required">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_corigin']; ?></p>
												<div class="col-md-4 col-sm-4 padRight2">
													<select class="fa-glass booking_form_dropdown form-control"  id="country1" name ="scountry" required >	
													<option value=""><?php echo $L_['h_title_country']; ?></option>
														<?php
														
															if($rowsCount > 0){
																while($row = $querys->fetch_assoc()){ 
																	echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
																}
															}else{
																echo '<option value="">País no disponible</option>';
															}
														?>														
													</select>
												</div>
												<div class="col-md-4 col-sm-4 padLeft2">											
													<select  class="fa-glass booking_form_dropdown form-control" id="state1" name ="sstate"  required  >
														<option value=""><?php echo $L_['h_title_state']; ?></option>
													</select>
												</div>
												<div class="col-md-4 col-sm-4 padLeft2" style="display:none">											
													<select  class="fa-glass booking_form_dropdown form-control" >
														<option value="">Select City</option>
													</select>
												</div>												
											</div>
											<div class="form-group required">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_cdesti']; ?></p>
												<div class="col-md-4 col-sm-4 padRight2">
													<select class="fa-glass booking_form_dropdown form-control" id="country2" name ="dcountry" required >
														<option value=""><?php echo $L_['h_title_country']; ?></option>
														<?php
														
															if($rowCount > 0){
																while($row = $query->fetch_assoc()){ 
																	echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
																}
															}else{
																echo '<option value="">País no disponible</option>';
															}
														?>														
													</select>
												</div>
												<div class="col-md-4 col-sm-4 padLeft2">									
													<select  class="fa-glass booking_form_dropdown form-control" id="state2" name ="dstate" required >
														<option value=""><?php echo $L_['h_title_state']; ?></option>
													</select>
												</div>
												<div class="col-md-4 col-sm-4 padLeft2" style="display:none">									
													<select  class="fa-glass booking_form_dropdown form-control" >
														<option value="">Select City</option>
													</select>
												</div>												
											</div>
											<div class="form-group required" style="display:none">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_hbig']; ?></p>
												<div class="col-md-2 col-sm-3">
													<input class="form-control dimension-input text-box single-line color" type="text" name="length" placeholder="Length" value="0" />
												</div>
												<div class="col-md-2 col-sm-3 ">
													<input class="form-control dimension-input text-box single-line color" type="text" name="width" placeholder="Width" value="0" />
												</div>
												<div class="col-md-2 col-sm-3 ">
													<input class="form-control dimension-input text-box single-line color" type="text" name="height" placeholder="Height" value="0" />
												</div>
												<div class="col-md-2 col-sm-2 parcel-details-dims">
													<select class="form-control" id="ParcelDetails_ParcelDimensions_DimensionType" name="ParcelDetails.ParcelDimensions.DimensionType" tabindex="-1">
														<option selected="selected">cm</option>
														<option>in</option>
													</select>
												</div>
											</div>
											<div class="form-group required">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_hheavy']; ?></p>
												<div class="col-md-2 col-sm-2 parcel-details-dims dimfirst">
													<input class="form-control dimension-input text-box single-line color" type="text" name="weight" placeholder="kg"  value="<?php echo $book['Weight']; ?>" />
												</div>
												<div class="col-md-2 col-sm-2 parcel-details-dims">
													<select class="form-control" id="ParcelDetails_ParcelDimensions_WeightType" name="ParcelDetails.ParcelDimensions.WeightType" tabindex="-1">
														<option selected="selected">kg</option>
														<option>lbs</option>
													</select>
												</div>
												<div class="col-md-4 col-sm-4 parcel-details-dims">
													<input class="form-control dimension-input text-box single-line color" type="text" name="courier_name" placeholder="kg"  value="<?php echo $book['name_courier']; ?>" />
												</div>
											</div>

											<div class="form-group required">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_services']; ?></p>
												<div class="col-md-4 col-sm-4 padRight2">
													<input class="fa-glass booking_form_dropdown form-control color" name="service" value="<?php echo $book['services']; ?>">													
												</div>
												<div class="col-md-4 col-sm-4 padLeft2">
													<select class="fa-glass booking_form_dropdown form-control" name="type" required >
													<option value="" selected="selected"><?php echo $L_['bf_hbig']; ?></option>
													<?php
														$sql="SELECT name FROM mode_bookings  GROUP BY name"; 
															$query=$db->query($sql); 
															if($query->num_rows>0){ 
																while($row=$query->fetch_array()){ 
																echo '<option data-value="'.$row['name'].'">'.utf8_encode($row['name']).'</option>';
															}
														}
													?>
												  </select>
												</div>	
											</div>
											<div class="form-group required">
												<p class="col-md-3 col-sm-3"><?php echo $L_['bf_pvalue']; ?></p>
												<div class="col-md-8 col-sm-8">
													<div class="col-md-6 col-sm-6 no-padding input-group">
														<span class="input-group-addon"><span><?php echo $L_['bf_symbol']; ?></span></span>
														<input class="form-control decimal-field text-box single-line color" type="number" name="freight"  value="<?php echo $book['rate1']; ?>" />
													</div>
													</br></br>
													<div class="col-md-12 col-sm-12 no-padding input-group">														
														<div class="radio">
														  <label class="i-checks">
															<input type="radio" name="a" value="option1">
															<i></i>
															<?php echo $L_['bf_tcondi1']; ?> <a href="#"><strong class="text-success"><?php echo $L_['bf_tcondi2']; ?></strong></a>
														  </label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- parcel details -->
						</br></br>
						
						<div class="col-md-3 col-sm-3 padRight2">
						<div class="control-label next-label">Nearly done...</div>												
						</div>
						<div class="col-md-3 col-sm-3 padLeft2">
							<input type="submit"  class="btn btn-success" value="<?php echo $L_['bf_register']; ?>" />
						</div>	
						</br></br>

						</div>
					</div>

					<div class="col-md-4 sidebar">

						<aside class="widget knowledge-widget popular-knowledge-widget">
							<img src="dashboard/<?php echo $book['ruta_imagen']; ?>">

							<div class="courier-name-summary"><strong><?php echo $book['name_courier']; ?></strong></div>
							</br></br>			
							<ul class="knowledge-list">
								<div class="cf">
									<label for="ServiceDetails_ServicePrice"><?php echo $L_['sl_service']; ?></label>
									<span class="price-summary-service" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;<?php echo $book['services']; ?></span>
								</div>

								<div class="cf">
									<label for="ServiceDetails_ResidentialSurchargePrice"><?php echo $L_['sl_pweight']; ?></label>
									<span class="price-summary-resicharge-value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $book['Weight']; ?></span>
								</div>
							</ul>
							</br></br>
							<h4><?php echo $L_['sl_sinfo']; ?></h4>
								<ul>
									<li><?php echo $L_['sl_service1']; ?></li>
									<li><?php echo $L_['sl_service2']; ?></li>
									<li><?php echo $L_['sl_service3']; ?></li>
									<li><?php echo $L_['sl_service4']; ?></li>
									<li><?php echo $L_['sl_service5']; ?></li>
									<li><?php echo $L_['sl_service6']; ?></li>
								</ul>
								
							</br>
							<div class="cf">
								<label for="ServiceDetails_VatAmount"><?php echo $L_['sl_rate']; ?></label>
								<span class="price-summary-vat">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;<?php echo $L_['sl_currency']; ?>&nbsp;<?php echo $book['rate1']; ?></span>
							</div>
							 <div class="cf delivery-total">
								<label for="ServiceDetails_TotalPrice"><strong><?php echo $L_['sl_total']; ?></strong></label>
								<span class="price-summary-total"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;<?php echo $L_['sl_currency']; ?>&nbsp;<?php echo $book['rate1']; ?></strong></span>
							</div>	
						</aside>
					</div>
					</form>
				</div>
			</div><!-- .container -->
		</main><!-- .site-main -->
		<?php } ?>
		<!-- Footer -->
		<?php include_once "footer.php"; ?>
		<!-- /Footer -->
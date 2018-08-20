<?php
// *************************************************************************
// *                                                                       *
// * DEPRIXA -  logistics Worldwide Software                               *
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
	require_once('../../database-settings.php');
	$con = conexion();
	
	$id					= $_POST['id'];	
	$sr_title 			= $_POST['sr_title'];
	$sr_home_title 		= $_POST['sr_home_title'];
	$sr_main_title		= $_POST['sr_main_title'];
	$sr_courier			= $_POST['sr_courier'];	
	$sr_services 		= $_POST['sr_services'];
	$sr_time 			= $_POST['sr_time'];
	$sr_weight 			= $_POST['sr_weight'];	
	$sr_rates 			= $_POST['sr_rates'];
	$sr_book 			= $_POST['sr_book'];
	$sr_bookn			= $_POST['sr_bookn'];
	$sr_from			= $_POST['sr_from'];	
	$sr_to 				= $_POST['sr_to'];
	$sr_width 			= $_POST['sr_width'];
	$sr_length 			= $_POST['sr_length'];	
	$sr_height 			= $_POST['sr_height'];
	$sr_volumetric 		= $_POST['sr_volumetric'];
	

	$resultado = $con->query("UPDATE w_search_result SET sr_title='$sr_title', sr_home_title='$sr_home_title', sr_main_title='$sr_main_title', sr_courier='$sr_courier', sr_services='$sr_services', 
														   sr_time='$sr_time', sr_weight='$sr_weight', sr_rates='$sr_rates', sr_book='$sr_book', sr_bookn='$sr_bookn', sr_from='$sr_from', sr_to='$sr_to',
														   sr_width='$sr_width', sr_length='$sr_length', sr_height='$sr_height', sr_volumetric='$sr_volumetric' WHERE id = '1'");
												  

	echo "<script type=\"text/javascript\">
						alert(\"Many thank you for your update.\");
						window.location = \"../../d_home.php\"
					</script>"; 
 
	
    
    
?>
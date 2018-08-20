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
	$h_title_country 	= $_POST['h_title_country'];
	$h_title_state 		= $_POST['h_title_state'];
	$h_title_city 		= $_POST['h_title_city'];
	$h_length			= $_POST['h_length'];
	$h_width			= $_POST['h_width'];	
	$h_heigth 			= $_POST['h_heigth'];
	$h_weigth 			= $_POST['h_weigth'];
	$h_submit 			= $_POST['h_submit'];
	

	$resultado = $con->query("UPDATE w_ship_calculator SET h_title_country='$h_title_country', h_title_state='$h_title_state', h_title_city='$h_title_city', h_length='$h_length', h_width='$h_width', h_heigth='$h_heigth', 
														   h_weigth='$h_weigth', h_submit='$h_submit' WHERE id = '1'");
												  

	echo "<script type=\"text/javascript\">
						alert(\"Many thank you for your update.\");
						window.location = \"../../d_home.php\"
					</script>"; 
 
	
    
    
?>
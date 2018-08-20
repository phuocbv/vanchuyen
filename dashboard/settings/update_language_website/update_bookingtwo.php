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
	$sl_service 		= $_POST['sl_service'];
	$sl_pweight			= $_POST['sl_pweight'];
	$sl_sinfo			= $_POST['sl_sinfo'];
	$sl_service1		= $_POST['sl_service1'];	
	$sl_service2 		= $_POST['sl_service2'];
	$sl_service3 		= $_POST['sl_service3'];
	$sl_service4 		= $_POST['sl_service4'];	
	$sl_service5 		= $_POST['sl_service5'];
	$sl_service6 		= $_POST['sl_service6'];
	$sl_rate			= $_POST['sl_rate'];
	$sl_currency		= $_POST['sl_currency'];
	$sl_total			= $_POST['sl_total'];	
	

	$resultado = $con->query("UPDATE w_bookingtwo SET 

									sl_service			= '$sl_service',
									sl_pweight			= '$sl_pweight',
									sl_sinfo			= '$sl_sinfo',
									sl_service1			= '$sl_service1',	
									sl_service2 		= '$sl_service2',
									sl_service3 		= '$sl_service3',
									sl_service4 		= '$sl_service4',										
									sl_service5 		= '$sl_service5',
									sl_service6 		= '$sl_service6',
									sl_rate				= '$sl_rate',
									sl_currency			= '$sl_currency',
									sl_total 			= '$sl_total'	
										
									WHERE id = '1'");
												  

	echo "<script type=\"text/javascript\">
			alert(\"Many thank you for your update.\");
			window.location = \"../../d_home.php\"
		</script>"; 
 
	
    
    
?>
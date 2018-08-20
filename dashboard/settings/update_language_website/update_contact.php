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
	$g_title 			= $_POST['g_title'];
	$g_get 				= $_POST['g_get'];
	$g_get1 			= $_POST['g_get1'];
	$g_name		 		= $_POST['g_name'];
	$g_email	 		= $_POST['g_email'];
	$g_subject 			= $_POST['g_subject'];
	$g_message 			= $_POST['g_message'];
	$g_send 			= $_POST['g_send'];
	$g_phone 			= $_POST['g_phone'];
	$g_address 			= $_POST['g_address'];
	$g_emails 			= $_POST['g_emails'];
	$g_info_phone 		= $_POST['g_info_phone'];
	$g_info_address 	= $_POST['g_info_address'];
	$g_info_emails 		= $_POST['g_info_emails'];
	$g_lat 				= $_POST['g_lat'];
	$g_lng		 		= $_POST['g_lng'];
	

	$resultado = $con->query("UPDATE w_contact SET g_title='$g_title', g_get='$g_get', g_get1='$g_get1',g_name='$g_name', g_email='$g_email', g_subject='$g_subject', g_message='$g_message', 
												   g_send='$g_send', g_phone='$g_phone', g_address='$g_address', g_emails='$g_emails', g_info_phone='$g_info_phone', g_info_address='$g_info_address',
												   g_info_emails='$g_info_emails', g_lat='$g_lat', g_lng='$g_lng' WHERE id = '1'");


	
	echo "<script type=\"text/javascript\">
						alert(\"Many thank you for your update.\");
						window.location = \"../../d_home.php\"
					</script>"; 
 
	
    
    
?>
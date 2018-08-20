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
	$p_title 			= $_POST['p_title'];
	$p_mainprivacy 		= $_POST['p_mainprivacy'];
	$p_privacy 			= $_POST['p_privacy'];
	$p_content1		 	= $_POST['p_content1'];
	$p_licontent1	 	= $_POST['p_licontent1'];
	$p_licontent2 		= $_POST['p_licontent2'];
	$p_licontent3 		= $_POST['p_licontent3'];
	$p_content2 		= $_POST['p_content2'];
	$p_content3 		= $_POST['p_content3'];
	$p_content4 		= $_POST['p_content4'];

	

	$resultado = $con->query("UPDATE w_privacy SET p_title='$p_title', p_mainprivacy='$p_mainprivacy', p_privacy='$p_privacy', p_content1='$p_content1', p_licontent1='$p_licontent1',
												   p_licontent2='$p_licontent2', p_licontent3='$p_licontent3', p_content2='$p_content2', p_content3='$p_content3', p_content4='$p_content4'
												   WHERE id = '1'");


	
	echo "<script type=\"text/javascript\">
						alert(\"Many thank you for your update.\");
						window.location = \"../../d_home.php\"
					</script>"; 
 
	
    
    
?>
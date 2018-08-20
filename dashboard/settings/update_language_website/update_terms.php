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
	$t_title 			= $_POST['t_title'];
	$t_mainprivacy 		= $_POST['t_mainprivacy'];
	$t_privacy 			= $_POST['t_privacy'];
	$t_content1		 	= $_POST['t_content1'];
	$t_licontent1	 	= $_POST['t_licontent1'];
	$t_licontent2 		= $_POST['t_licontent2'];
	$t_licontent3 		= $_POST['t_licontent3'];
	$t_content2 		= $_POST['t_content2'];
	$t_content3 		= $_POST['t_content3'];
	$t_content4 		= $_POST['t_content4'];

	

	$resultado = $con->query("UPDATE w_terms SET t_title='$t_title', t_mainprivacy='$t_mainprivacy', t_privacy='$t_privacy', t_content1='$t_content1', t_licontent1='$t_licontent1',
												   t_licontent2='$t_licontent2', t_licontent3='$t_licontent3', t_content2='$t_content2', t_content3='$t_content3', t_content4='$t_content4'
												   WHERE id = '1'");


	
	echo "<script type=\"text/javascript\">
						alert(\"Many thank you for your update.\");
						window.location = \"../../d_home.php\"
					</script>"; 
 
	
    
    
?>
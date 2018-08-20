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
	$lgn_title 			= $_POST['lgn_title'];
	$lgn_signup			= $_POST['lgn_signup'];
	$lgn_username		= $_POST['lgn_username'];
	$lgn_password		= $_POST['lgn_password'];	
	$lgn_remember 		= $_POST['lgn_remember'];
	$lgn_nregister 		= $_POST['lgn_nregister'];
	$lgn_sup 			= $_POST['lgn_sup'];	
	$lgn_forgot 		= $_POST['lgn_forgot'];
	$lgn_sup2 			= $_POST['lgn_sup2'];

	

	$resultado = $con->query("UPDATE w_login SET 

									lgn_title			= '$lgn_title',
									lgn_signup			= '$lgn_signup',
									lgn_username		= '$lgn_username',
									lgn_password		= '$lgn_password',	
									lgn_remember 		= '$lgn_remember',
									lgn_nregister 		= '$lgn_nregister',
									lgn_sup 			= '$lgn_sup',										
									lgn_forgot 			= '$lgn_forgot',
									lgn_sup2 			= '$lgn_sup2'
									
										
									WHERE id = '1'");
												  

	echo "<script type=\"text/javascript\">
			alert(\"Many thank you for your update.\");
			window.location = \"../../d_home.php\"
		</script>"; 
 
	
    
    
?>
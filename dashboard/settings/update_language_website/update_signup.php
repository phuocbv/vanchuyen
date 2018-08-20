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
	$sg_title 			= $_POST['sg_title'];
	$sg_signup			= $_POST['sg_signup'];
	$sg_name			= $_POST['sg_name'];
	$sg_lastname		= $_POST['sg_lastname'];	
	$sg_id 				= $_POST['sg_id'];
	$sg_email 			= $_POST['sg_email'];
	$sg_business 		= $_POST['sg_business'];	
	$sg_phone1 			= $_POST['sg_phone1'];
	$sg_phone2 			= $_POST['sg_phone2'];
	$sg_address			= $_POST['sg_address'];
	$sg_postal			= $_POST['sg_postal'];
	$sg_password		= $_POST['sg_password'];	
	$sg_cpass 			= $_POST['sg_cpass'];
	$sg_agree 			= $_POST['sg_agree'];
	$sg_term1 			= $_POST['sg_term1'];	
	$sg_term2 			= $_POST['sg_term2'];
	$sg_term3 			= $_POST['sg_term3'];
	$sg_already			= $_POST['sg_already'];
	$sg_login			= $_POST['sg_login'];
	$sg_register		= $_POST['sg_register'];
	$sg_ohstep			= $_POST['sg_ohstep'];	
	

	$resultado = $con->query("UPDATE w_signup SET 

									sg_title			= '$sg_title',
									sg_signup			= '$sg_signup',
									sg_name				= '$sg_name',
									sg_lastname			= '$sg_lastname',	
									sg_id 				= '$sg_id',
									sg_email 			= '$sg_email',
									sg_business 		= '$sg_business',										
									sg_phone1 			= '$sg_phone1',
									sg_phone2 			= '$sg_phone2',
									sg_address			= '$sg_address',
									sg_postal			= '$sg_postal',
									sg_password 		= '$sg_password',
									sg_cpass 			= '$sg_cpass',
									sg_agree 			= '$sg_agree',
									sg_term1 			= '$sg_term1',										
									sg_term2 			= '$sg_term2',
									sg_term3 			= '$sg_term3',
									sg_already			= '$sg_already',
									sg_login			= '$sg_login',
									sg_register 		= '$sg_register',
									sg_ohstep	 		= '$sg_ohstep'									
										
									WHERE id = '1'");
												  

	echo "<script type=\"text/javascript\">
			alert(\"Many thank you for your update.\");
			window.location = \"../../d_home.php\"
		</script>"; 
 
	
    
    
?>
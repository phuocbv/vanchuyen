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
	$bf_title 			= $_POST['bf_title'];
	$bf_main_title1		= $_POST['bf_main_title1'];
	$bf_main_title2		= $_POST['bf_main_title2'];
	$bf_email			= $_POST['bf_email'];	
	$bf_emailn 			= $_POST['bf_emailn'];
	$bf_password 		= $_POST['bf_password'];
	$bf_name 			= $_POST['bf_name'];	
	$bf_firtname 		= $_POST['bf_firtname'];
	$bf_phone 			= $_POST['bf_phone'];
	$bf_cname			= $_POST['bf_cname'];
	$bf_nbusiness		= $_POST['bf_nbusiness'];	
	$bf_address 		= $_POST['bf_address'];
	$bf_rcountry 		= $_POST['bf_rcountry'];
	$bf_zcode 			= $_POST['bf_zcode'];	
	$bf_cdate 			= $_POST['bf_cdate'];
	$bf_daddress 		= $_POST['bf_daddress'];	
	$bf_ncustomer 		= $_POST['bf_ncustomer'];
	$bf_fncustomer		= $_POST['bf_fncustomer'];
	$bf_ecustomer		= $_POST['bf_ecustomer'];
	$bf_cemail			= $_POST['bf_cemail'];	
	$bf_cphone 			= $_POST['bf_cphone'];
	$bf_coname 			= $_POST['bf_coname'];
	$bf_comname 		= $_POST['bf_comname'];	
	$bf_comaddress 		= $_POST['bf_comaddress'];
	$bf_dnote 			= $_POST['bf_dnote'];
	$bf_climit			= $_POST['bf_climit'];
	$bf_pdetail			= $_POST['bf_pdetail'];	
	$bf_hbig 			= $_POST['bf_hbig'];
	$bf_hheavy 			= $_POST['bf_hheavy'];
	$bf_corigin 		= $_POST['bf_corigin'];	
	$bf_cdesti 			= $_POST['bf_cdesti'];
	$bf_services 		= $_POST['bf_services'];	
	$bf_pvalue 			= $_POST['bf_pvalue'];
	$bf_tcondi1 		= $_POST['bf_tcondi1'];	
	$bf_tcondi2 		= $_POST['bf_tcondi2'];
	$bf_symbol 			= $_POST['bf_symbol'];
	$bf_register 		= $_POST['bf_register'];
	

	$resultado = $con->query("UPDATE w_booking SET 

									bf_title 			= '$bf_title',
									bf_main_title1		= '$bf_main_title1',
									bf_main_title2		= '$bf_main_title2',
									bf_email			= '$bf_email',	
									bf_emailn 			= '$bf_emailn',
									bf_password 		= '$bf_password',
									bf_name 			= '$bf_name',										
									bf_firtname 		= '$bf_firtname',
									bf_phone 			= '$bf_phone',
									bf_cname			= '$bf_cname',
									bf_nbusiness		= '$bf_nbusiness',	
									bf_address 			= '$bf_address',
									bf_rcountry 		= '$bf_rcountry',
									bf_zcode 			= '$bf_zcode',	
									bf_cdate 			= '$bf_cdate',
									bf_daddress 		= '$bf_daddress',	
									bf_ncustomer 		= '$bf_ncustomer',
									bf_fncustomer		= '$bf_fncustomer',
									bf_ecustomer		= '$bf_ecustomer',
									bf_cemail			= '$bf_cemail',	
									bf_cphone 			= '$bf_cphone',
									bf_coname 			= '$bf_coname',
									bf_comname 			= '$bf_comname',	
									bf_comaddress 		= '$bf_comaddress',
									bf_dnote 			= '$bf_dnote',
									bf_climit			= '$bf_climit',
									bf_pdetail			= '$bf_pdetail',	
									bf_hbig 			= '$bf_hbig',
									bf_hheavy 			= '$bf_hheavy',
									bf_corigin 			= '$bf_corigin',	
									bf_cdesti 			= '$bf_cdesti',
									bf_services 		= '$bf_services',	
									bf_pvalue 			= '$bf_pvalue',
									bf_tcondi1 			= '$bf_tcondi1',	
									bf_tcondi2 			= '$bf_tcondi2',
									bf_symbol 			= '$bf_symbol',
									bf_register 		= '$bf_register'	
										
									WHERE id = '1'");
												  

	echo "<script type=\"text/javascript\">
			alert(\"Many thank you for your update.\");
			window.location = \"../../d_home.php\"
		</script>"; 
 
	
    
    
?>
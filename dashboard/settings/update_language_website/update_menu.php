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
	
	$id					=$_POST['id'];	
	$home 				= $_POST['home'];
	$signup 			= $_POST['signup'];
	$track_my_parcel	= $_POST['track_my_parcel'];
	$company			=$_POST['company'];	
	$faq 				= $_POST['faq'];
	$contacs 			= $_POST['contacs'];
	$login				=$_POST['login'];	
	$terms 				= $_POST['terms'];
	$privacy 			= $_POST['privacy'];
	$backtotop 			= $_POST['backtotop'];
	

	$resultado = $con->query("UPDATE w_menu SET home='$home', signup='$signup', track_my_parcel='$track_my_parcel', company='$company', faq='$faq', contacs='$contacs', login='$login', 
												terms='$terms', privacy='$privacy', backtotop='$backtotop' WHERE id = '1'");


	
	echo "<script type=\"text/javascript\">
						alert(\"Many thank you for your update.\");
						window.location = \"../../d_menu.php\"
					</script>"; 
 
	
    
    
?>
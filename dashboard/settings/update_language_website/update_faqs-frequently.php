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
	$f_title 			= $_POST['f_title'];
	$f_faqs 			= $_POST['f_faqs'];
	$f_faqs1 			= $_POST['f_faqs1'];
	$f_faqs2 			= $_POST['f_faqs2'];
	$f_faqs3 			= $_POST['f_faqs3'];
	$f_faqs4 			= $_POST['f_faqs4'];
	$f_faqs5 			= $_POST['f_faqs5'];
	$f_faqs6 			= $_POST['f_faqs6'];
	$f_faqs7 			= $_POST['f_faqs7'];
	$f_faqs8 			= $_POST['f_faqs8'];
	$f_faqs9 			= $_POST['f_faqs9'];
	$f_faqs10 			= $_POST['f_faqs10'];
	$f_faqs11 			= $_POST['f_faqs11'];
	$f_faqs12 			= $_POST['f_faqs12'];
	$f_faqs13 			= $_POST['f_faqs13'];
	$f_faqs14 			= $_POST['f_faqs14'];
	$f_faqs15 			= $_POST['f_faqs15'];
	$f_faqs16 			= $_POST['f_faqs16'];
	$f_faqs17 			= $_POST['f_faqs17'];
	$f_faqs18 			= $_POST['f_faqs18'];
	
	
	
	$resultado = $con->query("UPDATE w_faqs SET f_title='$f_title', f_faqs='$f_faqs', f_faqs1='$f_faqs1', f_faqs2='$f_faqs2', f_faqs3='$f_faqs3', f_faqs4='$f_faqs4', f_faqs5='$f_faqs5', 
									 f_faqs6='$f_faqs6', f_faqs7='$f_faqs7', f_faqs8='$f_faqs8', f_faqs9='$f_faqs9', f_faqs10='$f_faqs10', f_faqs11='$f_faqs11', f_faqs12='$f_faqs12',
									 f_faqs13='$f_faqs13', f_faqs14='$f_faqs14', f_faqs15='$f_faqs15', f_faqs16='$f_faqs16', f_faqs17='$f_faqs17', f_faqs18='$f_faqs18' WHERE id = '1'");


	
	echo "<script type=\"text/javascript\">
						alert(\"Many thank you for your update.\");
						window.location = \"../../d_home.php\"
					</script>"; 
 
	
    
    
?>
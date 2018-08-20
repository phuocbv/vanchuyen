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
	$c_title 			= $_POST['c_title'];
	$c_about 			= $_POST['c_about'];
	$c_section1 		= $_POST['c_section1'];
	$c_section2 		= $_POST['c_section2'];
	$c_section3 		= $_POST['c_section3'];
	$c_section4 		= $_POST['c_section4'];
	$c_box1 			= $_POST['c_box1'];
	$c_box2 			= $_POST['c_box2'];
	$c_boxd1 			= $_POST['c_boxd1'];
	$c_boxd2 			= $_POST['c_boxd2'];
	$c_info_title1 		= $_POST['c_info_title1'];
	$c_info_title2 		= $_POST['c_info_title2'];
	$c_info_detail 		= $_POST['c_info_detail'];
	

	$resultado = $con->query("UPDATE w_about SET c_title='$c_title', c_about='$c_about', c_section1='$c_section1', c_section2='$c_section2',
												 c_section3='$c_section3', c_section4='$c_section4', c_box1='$c_box1', c_box2='$c_box2', c_boxd1='$c_boxd1', c_boxd2='$c_boxd2',
												 c_info_title1='$c_info_title1', c_info_title2='$c_info_title2', c_info_detail='$c_info_detail' WHERE id = '1'");


	
	echo "<script type=\"text/javascript\">
						alert(\"Many thank you for your update.\");
						window.location = \"../../d_home.php\"
					</script>"; 
 
	
    
    
?>
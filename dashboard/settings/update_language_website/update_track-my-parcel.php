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
	$t_welcome 			= $_POST['t_welcome'];
	$t_detect			= $_POST['t_detect'];
	$t_trackn			= $_POST['t_trackn'];	
	$t_btrack 			= $_POST['t_btrack'];
	$t_section1 		= $_POST['t_section1'];
	$t_section2 		= $_POST['t_section2'];
	$t_section3 		= $_POST['t_section3'];
	$t_section4 		= $_POST['t_section4'];
	$t_box1 			= $_POST['t_box1'];
	$t_box2 			= $_POST['t_box2'];
	$t_box3 			= $_POST['t_box3'];	
	$t_boxd1 			= $_POST['t_boxd1'];
	$t_boxd2 			= $_POST['t_boxd2'];
	$t_boxd3 			= $_POST['t_boxd3'];
	$t_more 			= $_POST['t_more'];
	

	$resultado = $con->query("UPDATE w_track_parcel SET t_title='$t_title', t_welcome='$t_welcome', t_detect='$t_detect', t_trackn='$t_trackn', t_btrack='$t_btrack', t_section1='$t_section1', t_section2='$t_section2',
												 t_section3='$t_section3', t_section4='$t_section4', t_box1='$t_box1', t_box2='$t_box2', t_box3='$t_box3', t_boxd1='$t_boxd1', t_boxd2='$t_boxd2', t_boxd3='$t_boxd3',
												 t_more='$t_more' WHERE id = '1'");


	
	echo "<script type=\"text/javascript\">
						alert(\"Many thank you for your update.\");
						window.location = \"../../d_home.php\"
					</script>"; 
 
	
    
    
?>
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
	$title 				= $_POST['title'];
	$welcome 			= $_POST['welcome'];
	$logistics			= $_POST['logistics'];
	$trackn				= $_POST['trackn'];	
	$btrack 			= $_POST['btrack'];
	$shippingc 			= $_POST['shippingc'];
	$calculator 		= $_POST['calculator'];
	$justpop			= $_POST['justpop'];	
	$why 				= $_POST['why'];
	$whys 				= $_POST['whys'];
	$whydetail 			= $_POST['whydetail'];
	$box1 				= $_POST['box1'];
	$box2 				= $_POST['box2'];
	$box3 				= $_POST['box3'];	
	$boxd1 				= $_POST['boxd1'];
	$boxd2 				= $_POST['boxd2'];
	$boxd3 				= $_POST['boxd3'];
	$section1 			= $_POST['section1'];
	$section2 			= $_POST['section2'];
	$section3 			= $_POST['section3'];	
	$post1				= $_POST['post1'];	
	$post2 				= $_POST['post2'];
	$post3 				= $_POST['post3'];
	$post4 				= $_POST['post4'];
	$post5 				= $_POST['post5'];
	$post6 				= $_POST['post6'];
	$post7 				= $_POST['post7'];	
	$post8 				= $_POST['post8'];
	$post9 				= $_POST['post9'];
	$post10 			= $_POST['post10'];
	$post11 			= $_POST['post11'];
	$post12 			= $_POST['post12'];
	$more 				= $_POST['more'];
	

	$resultado = $con->query("UPDATE w_home SET title='$title', welcome='$welcome', logistics='$logistics', trackn='$trackn', btrack='$btrack', shippingc='$shippingc', calculator='$calculator', justpop='$justpop', 
												why='$why', whys='$whys', whydetail='$whydetail', box1='$box1', box2='$box2', box3='$box3', boxd1='$boxd1', boxd2='$boxd2', boxd3='$boxd3' , section1='$section1',										
												section2='$section2', section3='$section3', post1='$post1', post2='$post2', post3='$post3', post4='$post4', post5='$post5', post6='$post6', post7='$post7', post8='$post8', 
												post9='$post9' , post10='$post10', post11='$post11', post12='$post12', more='$more' WHERE id = '1'");


	
	echo "<script type=\"text/javascript\">
						alert(\"Many thank you for your update.\");
						window.location = \"../../d_home.php\"
					</script>"; 
 
	
    
    
?>
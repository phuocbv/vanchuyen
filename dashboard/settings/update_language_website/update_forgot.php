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
	$ft_title 			= $_POST['ft_title'];
	$ft_fmail			= $_POST['ft_fmail'];
	$ft_youremail		= $_POST['ft_youremail'];
	$ft_sin				= $_POST['ft_sin'];	
	$ft_or 				= $_POST['ft_or'];
	$ft_siup 			= $_POST['ft_siup'];
	$ft_rpass 			= $_POST['ft_rpass'];	
	$ft_ohw 			= $_POST['ft_ohw'];
	$ft_ohnot 			= $_POST['ft_ohnot'];
	$ft_congra 			= $_POST['ft_congra'];
	$ft_sucess 			= $_POST['ft_sucess'];

	

	$resultado = $con->query("UPDATE w_recoverpass SET 

									ft_title			= '$ft_title',
									ft_fmail			= '$ft_fmail',
									ft_youremail		= '$ft_youremail',
									ft_sin				= '$ft_sin',	
									ft_or 				= '$ft_or',
									ft_siup 			= '$ft_siup',
									ft_rpass 			= '$ft_rpass',										
									ft_ohw 				= '$ft_ohw',
									ft_ohnot 			= '$ft_ohnot',
									ft_congra 			= '$ft_congra',
									ft_sucess 			= '$ft_sucess'
									
										
									WHERE id = '1'");
												  

	echo "<script type=\"text/javascript\">
			alert(\"Many thank you for your update.\");
			window.location = \"../../d_home.php\"
		</script>"; 
 
	
    
    
?>
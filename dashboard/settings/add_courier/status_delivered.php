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
	require_once('../../database.php');
	require_once('../../database-settings.php');
	
	$tracking = $_GET['tracking'];
	$sql = "UPDATE courier SET status = 'Delivered', status_delivered = 'Delivered' WHERE tracking= '$tracking'";
	dbQuery($sql);
	
	$sql_1 = "UPDATE courier_customer SET status = 'Delivered', status_delivered = 'Delivered' WHERE tracking= '$tracking'";
	dbQuery($sql_1);
	
	$sql_2 = "UPDATE accounting SET status = 'Delivered' WHERE tracking= '$tracking'";
	dbQuery($sql_2);
	
	require '../../requirelanguage.php';
	
	echo "<script type=\"text/javascript\">
		alert(\"$updateexit\");
		window.location = \"../../index.php\"
	</script>";
    
?>
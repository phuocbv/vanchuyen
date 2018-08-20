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
	
    $cid = (int)$_POST['cid'];
	$dboy = $_POST['deliveryboy'];
	$rby = $_POST['receivedby'];
	$drs = $_POST['drs'];
	$deliveruser = $_POST['deliveruser'];
	$tracking = $_POST['tracking'];
	$cons_no = $_POST['cons_no'];
	$status = $_POST['status'];
	
	$sql = "UPDATE courier_online T1, courier_customer T2
    SET T1.status = 'Delivered', T2.status = 'Delivered', T1.deliveryboy='$dboy', T1.receivedby='$rby', T1.drs='$drs', T1.deliveruser='$deliveruser'
	WHERE T1.cid = T2.cid AND T2.tracking = T1.cons_no";
	dbQuery($sql);

	
	require '../../requirelanguage.php';
	
	echo "<script type=\"text/javascript\">
		alert(\"$entregadoexit\");
		window.location = \"../../index.php\"
	</script>"; 
    
?>
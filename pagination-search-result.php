<?php
// *************************************************************************
// *                                                                       *
// * DEPRIXA -  Integrated Web system                                      *
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
require_once('dashboard/database.php');
function getPageData(){
	$cons= $_POST['Consignment'];
	$sql ="SELECT * FROM scheduledpickup WHERE Weight='$cons'";
	$result = mysql_query($sql);
	$records = array();
	while($row = mysql_fetch_array($result)){
		extract($row);
		$records[] = array("cid" => $cid,
			"Weight" => $Weight,
			"ruta_imagen" => $ruta_imagen,
			"services" => $services,
			"shipping_day" => $shipping_day,
			"Length" => $Length,
			"Width" => $Width,
			"Height" => $Height,
			"rate1" => $rate1);
	}//while
	return $records;
}
?>
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
$Shippername = $_POST['Shippername'];
$Shipperphone = $_POST['Shipperphone'];
$Shipperaddress = $_POST['Shipperaddress'];
$Shippercc = $_POST['Shippercc'];

$Receivername = $_POST['Receivername'];
$Receiverphone = $_POST['Receiverphone'];
$telefono1 = $_POST['telefono1'];
$Receiveraddress = $_POST['Receiveraddress'];
$Receivercc_r = $_POST['Receivercc_r'];
$Receiveremail = $_POST['Receiveremail'];

$Shiptype = $_POST['Shiptype'];
$Weight = $_POST['Weight'];
$kiloadicional = $_POST['kiloadicional'];
$variable = $_POST['variable'];
$shipping_subtotal = $_POST['shipping_subtotal'];
$Invoiceno = $_POST['Invoiceno'];
$Qnty = $_POST['Qnty'];

$altura = $_POST['altura'];
$ancho = $_POST['ancho'];
$longitud = $_POST['longitud'];
$totalpeso = $_POST['totalpeso'];
$pesoreal = $_POST['pesoreal'];

$Bookingmode = $_POST['Bookingmode'];
$Totalfreight = $_POST['Totalfreight'];
$Totaldeclarate = $_POST['Totaldeclarate'];
$Totaldeclarado = $_POST['Totaldeclarado'];
$Mode = $_POST['Mode'];

$Packupdate = $_POST['Packupdate'];
$Schedule = $_POST['Schedule'];
$Pickuptime = $_POST['Pickuptime'];
$iso = $_POST['iso'];
$state = $_POST['state'];
$ciudad = $_POST['ciudad'];

$paisdestino = $_POST['paisdestino'];
$iso1 = $_POST['iso1'];
$state1 = $_POST['state1'];
$city1 = $_POST['city1'];
$status = $_POST['status'];
$Comments = $_POST['Comments'];
$notes = $_POST['notes'];
$officename = $_POST['officename'];
$user = $_POST['user'];
$ruta_imagen = $_POST['ruta_imagen'];

//tracking number
$trackingNumbers = $_POST['tracking'];
$weights = $_POST['weight'];

//tracking m3
$trackingM3 = $_POST['m3'];
$trackingNumberM3 = $_POST['tracking_number_m3'];

//subtotal one
$listSum1 = $_POST['sum1'];
$listSum4 = $_POST['sum4'];
$listSum7 = $_POST['sum7'];

$listVolume1 = $_POST['volume1'];
$listVolume2 = $_POST['volume2'];
$listVolume3 = $_POST['volume3'];
$listVolume4 = $_POST['volume4'];
$listVolume5 = $_POST['volume5'];


$sqlGetCourier = "SELECT * FROM courier WHERE cid='$cid'";
$courierQuery = dbQuery($sqlGetCourier);
$courier = array();
while ($row = mysql_fetch_array($courierQuery)) {
    $courier = $row;
}

$tk =  $courier['tracking'];

$sql = "UPDATE courier
	 SET ship_name='$Shippername',phone='$Shipperphone',s_add='$Shipperaddress', cc='$Shippercc', rev_name='$Receivername',r_phone='$Receiverphone',telefono1='$telefono1',r_add='$Receiveraddress', 
	 cc_r='$Receivercc_r', email='$Receiveremail', type='$Shiptype', weight='$Weight', variable='$variable', kiloadicional='$kiloadicional', invice_no='$Invoiceno',
	 declarate='$Totaldeclarate', declarado='$Totaldeclarado', mode ='$Mode', pick_date='$Packupdate' , schedule='$Schedule',pick_time='$Pickuptime',iso='$iso',state='$state',
	 ciudad='$ciudad',paisdestino='$paisdestino',iso1='$iso1',state1='$state1',city1='$city1',book_mode='$Bookingmode',freight='$Totalfreight',qty='$Qnty', 
	 shipping_subtotal='$shipping_subtotal', altura='$altura', ancho='$ancho', longitud='$longitud', totalpeso='$totalpeso', status='$status', comments='$Comments', 
	  pesoreal='$pesoreal'
	 WHERE cid = '$cid'";
dbQuery($sql);

$sql_1 = "UPDATE courier_customer
	 SET ship_name='$Shippername',phone='$Shipperphone',s_add='$Shipperaddress', cc='$Shippercc', rev_name='$Receivername',r_phone='$Receiverphone', telefono1='$telefono1',r_add='$Receiveraddress', 
	 cc_r='$Receivercc_r', email='$Receiveremail', type='$Shiptype', weight='$Weight', variable='$variable', kiloadicional='$kiloadicional', invice_no='$Invoiceno',
	 declarate='$Totaldeclarate', declarado='$Totaldeclarado', mode ='$Mode', pick_date='$Packupdate' , schedule='$Schedule',pick_time='$Pickuptime',iso='$iso',state='$state',
	 ciudad='$ciudad',paisdestino='$paisdestino',iso1='$iso1',state1='$state1',city1='$city1',book_mode='$Bookingmode',freight='$Totalfreight',qty='$Qnty', 
	 shipping_subtotal='$shipping_subtotal', altura='$altura', ancho='$ancho', longitud='$longitud', totalpeso='$totalpeso', status='$status', comments='$Comments',
	 pesoreal='$pesoreal'
	 WHERE cid = '$cid'";
dbQuery($sql_1);

$sql_2 = "UPDATE accounting
    SET client_id='$Receivercc_r',
    ship_name='$Receivername',
    email='$Receiveremail',
    comments='$Comments',
    shipping_subtotal='$shipping_subtotal'
    WHERE tracking='$tk'";
dbQuery($sql_2);

dbQuery("DELETE FROM subtotal_one WHERE tracking='" . $courier['tracking'] . "' AND cons_no='" . $courier['cons_no'] . "'");
dbQuery("DELETE FROM subtotal_two WHERE tracking='" . $courier['tracking'] . "' AND cons_no='" . $courier['cons_no'] . "'");
dbQuery("DELETE FROM tracking_number WHERE cons_no='" . $courier['cons_no'] . "'");

$pre_cons_no = $courier['tracking'];
$cons_no = $courier['cons_no'];

//insert tracking number
$sqlInsertTrackingKg = "INSERT INTO tracking_number (tracking, cons_no, weight, type, update_date) VALUES ";

foreach ($trackingNumbers as $key => $trackingNumber) {
    $query_values[] = "('" . $trackingNumber . "', " . $cons_no . ", '" . str_replace(".", "", $weights[$key]) . "', 'kg', NOW())";
}

dbQuery($sqlInsertTrackingKg . implode(",", $query_values));


//insert tracking number m3
$sqlInsertTrackingM3 = "INSERT INTO tracking_number (tracking, cons_no, weight, type, update_date) VALUES ";

foreach ($trackingNumberM3 as $key => $item) {
    $query_values_m3[] = "('" . $item . "', " . $cons_no . ", '" . str_replace(".", "", $trackingM3[$key]) . "', 'm3',  NOW())";
}

dbQuery($sqlInsertTrackingM3 . implode(",", $query_values_m3));

//insert subtotal_one
$sqlInsertSubtotalOne = "INSERT INTO subtotal_one(tracking, cons_no, sum_1, sum_4, sum_7) VALUES ";
foreach ($listSum1 as $key => $item) {
    $value_subtotal_one[] = "('$pre_cons_no', '$cons_no', '" .
        str_replace(".", "", $item) . "', '" .
        str_replace(".", "", $listSum4[$key]) . "', '" .
        str_replace(".", "", $listSum7[$key]) . "')";
}
dbQuery($sqlInsertSubtotalOne . implode(",", $value_subtotal_one));

//insert subtotal two
$sqlInsertSubtotalTwo = "INSERT INTO subtotal_two(tracking, cons_no, volume_1, volume_2, volume_3, volume_4, volume_5) VALUES ";
foreach ($listVolume1 as $key => $item) {
    $value_subtotal_two[] = "('$pre_cons_no', '$cons_no', '" .
        str_replace(".", "", $item) . "', '" .
        str_replace(".", "", $listVolume2[$key]) . "', '" .
        str_replace(".", "", $listVolume3[$key]) . "', '" .
        str_replace(".", "", $listVolume4[$key]) . "', '" .
        str_replace(".", "", $listVolume5[$key]) . "')";
}
dbQuery($sqlInsertSubtotalTwo . implode(",", $value_subtotal_two));


require '../../requirelanguage.php';

echo "<script type=\"text/javascript\">
			alert(\"$updateexit\");
			window.location = \"../../index.php\"
		</script>";

//echo $Ship;

?>
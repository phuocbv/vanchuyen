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
ob_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
//Include database configuration file
require_once('database-settings.php');
require_once('database.php');
$db = conexion();

require_once('library.php');
require_once('funciones.php');
require 'requirelanguage.php';
include_once "filtro/class/class.php";
include_once "filtro/class_buscar.php";
require_once("filtro/class/class.inputfilter.php");
include_once('const/System.php');
$userName = $_SESSION['user_name'];
$userType = $_SESSION['user_type'];
$currentUser = array();
if ($userType == ADMIN) {
    $query = $db->query("SELECT *	FROM manager_admin WHERE name = '$userName' AND estado = '1'");
    $rowCount = $query->num_rows;
    if ($rowCount >= 1) {
        while ($index = $query->fetch_assoc()) {
            $currentUser = $index;
        }
    }
}
$companyInfor = array();
$query = $db->query("SELECT * FROM company WHERE  id='1' ");
while ($index = $query->fetch_assoc()) {
    $companyInfor = $index;
}

$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);

if ($_SESSION['user_type'] == 'Administrator' or $_SESSION['user_type'] == 'Employee') {

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
        echo "<script type=\"text/javascript\">
						alert(\"This page is for registered users only.\");
						window.location = \"../signup\"
					</script>";
        exit;
    }

    $now = time();
    if ($now > $_SESSION['expire']) {
        session_destroy();

        echo "<script type=\"text/javascript\">
						alert(\"Your session has ended.\");
						window.location = \"../login\"
					</script>";
        exit;
    }

} else {
    header('Location:../404');
}

$sql = "SELECT DISTINCT(off_name)
			FROM offices";
$result = dbQuery($sql);

$company = mysql_fetch_array(mysql_query("SELECT * FROM company"));
date_default_timezone_set($_SESSION['ge_timezone']);
$fechai = date('Y-m-d');
$fechaf = date('Y-m-d');

$v0 = false;
$v1 = false;
$v2 = false;
$v3 = false;
$v4 = false;
$v5 = false;
$v6 = false;
$v7 = false;
$v8 = false;
$v9 = false;
$v10 = false;
$v11 = false;
$v12 = false;
$v13 = false;
$v14 = false;
$v15 = false;
$v16 = false;
$v17 = false;
$v18 = false;
$v19 = false;
$v20 = false;
$v21 = false;
$v22 = false;
$v23 = false;

if (isset($_POST['Shippername'])) {
    //Comprobamos que el nombre no este en blanco
    if ($_POST['Shippername'] == '') $v0 = true;
    if ($_POST['Shipperaddress'] == '') $v1 = true;
    if ($_POST['Shipperphone'] == '') $v2 = true;
    if ($_POST['Shippercc'] == '') $v3 = true;
    if ($_POST['Shipperlocker'] == '') $v4 = true;
    if ($_POST['Pickuptime'] == '') $v5 = true;
    if ($_POST['state'] == '') $v6 = true;
    if ($_POST['ciudad'] == '') $v8 = true;
    if ($_POST['zipcode'] == '') $v9 = true;
    if ($_POST['Shipperemail'] == '') $v10 = true;
    if ($_POST['Qnty'] == '') $v11 = true;
    if ($_POST['Receivername'] == '') $v12 = true;
    if ($_POST['Receiveraddress'] == '') $v13 = true;
    if ($_POST['Comments'] == '') $v14 = true;
    if ($_POST['Receiverphone'] == '') $v15 = true;
    if ($_POST['telefono1'] == '') $v16 = true;
    if ($_POST['Receivercc_r'] == '') $v17 = true;
    if ($_POST['paisdestino'] == '') $v18 = true;
    if ($_POST['state1'] == '') $v19 = true;
    if ($_POST['iso1'] == '') $v20 = true;
    if ($_POST['city1'] == '') $v21 = true;
    if ($_POST['zipcode1'] == '') $v22 = true;
    if ($_POST['Receiveremail'] == '') $v23 = true;

    if ($v0 == false && $v1 == false && $v2 == false && $v3 == false && $v4 == false && $v5 == false && $v6 == false && $v8 == false && $v9 == false && $v10 == false && $v11 == false
        && $v12 == false && $v13 == false && $v14 == false && $v15 == false && $v16 == false && $v17 == false && $v18 == false && $v19 == false && $v20 == false && $v21 == false && $v22 == false
        && $v23 == false) {

        include("css/sms/src/NexmoMessage.php");


        $Shippername = $_POST['Shippername'];
        $Shipperphone = $_POST['Shipperphone'];
        $Shipperaddress = $_POST['Shipperaddress'];
        $Shippercc = $_POST['Shippercc'];
        $Shipperlocker = $_POST['Shipperlocker'];
        $Shipperemail = $_POST['Shipperemail'];
        $Receivername = $_POST['Receivername'];
        $Receiverphone = $_POST['Receiverphone'];
        $telefono1 = $_POST['telefono1'];
        $Receiveraddress = $_POST['Receiveraddress'];
        $Receivercc_r = $_POST['Receivercc_r'];
        $Receiveremail = $_POST['Receiveremail'];
        $tracking = $_POST['tracking'];
        $ConsignmentNo = $_POST['ConsignmentNo'];
        $letra = $_POST['letra'];
        $Shiptype = $_POST['Shiptype'];
        $Weight = str_replace(".", "", $_POST['Weight']);
        $kiloadicional = str_replace(".", "", $_POST['kiloadicional']);
        $variable = str_replace('.', '', $_POST['variable']);
        $shipping_subtotal = $_POST['shipping_subtotal'];
        $pesoreal = $_POST['pesoreal'];
        $Invoiceno = $_POST['Invoiceno'];
        $Qnty = $_POST['Qnty'];
        $altura = ($_POST['altura']);
        $ancho = ($_POST['ancho']);
        $longitud = ($_POST['longitud']);
        $totalpeso = $_POST['totalpeso'];
        $bookingmode = $_POST['bookingmode'];
        $Totalfreight = str_replace(".", "", $_POST['Totalfreight']);
        $Totaldeclarate = $_POST['Totaldeclarate'];
        $Totaldeclarado = str_replace(".", "", $_POST['Totaldeclarado']);
        $Mode = $_POST['Mode'];
        $Packupdate = $_POST['Packupdate'];
        $Schedule = $_POST['Schedule'];
        $Pickuptime = $_POST['Pickuptime'];
        $iso = '';
        $state = $_POST['state'];
        $ciudad = $_POST['ciudad'];
        $zipcode = $_POST['zipcode'];
        $paisdestino = $_POST['paisdestino'];
        $iso1 = $_POST['iso1'];
        $state1 = $_POST['state1'];
        $city1 = $_POST['city1'];
        $zipcode1 = $_POST['zipcode1'];
        $status = $_POST['status'];
        $Comments = $_POST['Comments'];
        $notes = $_POST['notes'];
        $officename = $_POST['officename'];
        $user = $_POST['user'];
        $ruta_imagen = $_POST['ruta_imagen'];
        $status_delivered = $_POST['status_delivered'];
        $payment = $_POST['payment'];
        $paymode = $_POST['paymode'];
        $trackingNumbers = $_POST['tracking_number'];
        $weights = $_POST['weight'];

        //subtotal one
        $listSum1 = $_POST['sum1'];
        $listSum4 = $_POST['sum4'];
        $listSum7 = $_POST['sum7'];

        $listVolume1 = $_POST['volume1'];
        $listVolume2 = $_POST['volume2'];
        $listVolume3 = $_POST['volume3'];
        $listVolume4 = $_POST['volume4'];
        $listVolume5 = $_POST['volume5'];


        ## Obtengo datos de la empresa
        $qryEmpresa = mysql_query("SELECT * FROM company");

        while ($row = mysql_fetch_array($qryEmpresa)) {

            $pre = $row["prefijo"];
            $cons = $row["cons_no"];
            $to = $row["bemail"];
            $address = $row["caddress"];
            $namecompanie = $row["cname"];
            $footer = $row["footer_website"];
            $web = $row["website"];
            $url = APP_URL . "/logo-image/image_logo.php?id=1'";
        }
        mysql_free_result($qryEmpresa);

        $pa = mysql_query("SELECT MAX(cons_no)as maximo FROM c_tracking");
        if ($row = mysql_fetch_array($pa)) {
            if ($row['maximo'] == NULL) {
                $cons_no = '' . $cons . '';
            } else {
                $cons_no = $row['maximo'] + 1;
            }
        }

        $sql = "INSERT INTO courier (tracking,cons_no, letra,ship_name, phone, s_add, cc, locker, correo, rev_name, r_phone, telefono1, r_add, cc_r, email, type, weight, variable,
		kiloadicional, shipping_subtotal, altura, ancho, longitud, totalpeso, invice_no, qty, book_mode, freight, declarate, declarado, mode, pick_date, schedule, pick_time, iso,
		state, ciudad, zipcode, paisdestino, iso1, state1, city1, zipcode1, status, comments, officename, payment,paymode, status_delivered, user, ruta_imagen, book_date, pesoreal)
		VALUES('$pre-$cons_no','$cons_no', '$pre', '$Shippername','$Shipperphone', '$Shipperaddress', '$Shippercc', '$Shipperlocker', '$Shipperemail', '$Receivername',
		'$Receiverphone', '$telefono1', '$Receiveraddress', '$Receivercc_r', '$Receiveremail', '$Shiptype',$Weight , '$variable', '$kiloadicional', '$shipping_subtotal',
		'$altura', '$ancho', '$longitud', '$totalpeso', '$Invoiceno', $Qnty, '$bookingmode', '$Totalfreight',  '$Totaldeclarate', '$Totaldeclarado', '$Mode', '$Packupdate',
		'$Schedule', '$Pickuptime', '$iso', '$state', '$ciudad', '$zipcode', '$paisdestino', '$iso1', '$state1', '$city1', '$zipcode1', '$status', '$Comments', '$officename','Pending',
		'none', '$status_delivered', '$user', 'img/uploadsphoto/nophoto.jpg', curdate(), '$pesoreal')";
        //echo $sql;
        dbQuery($sql);

        $sql_3 = "INSERT INTO courier_customer (tracking,cons_no, letra,ship_name, phone, s_add, cc, locker, correo, rev_name, r_phone, telefono1, r_add, cc_r, email, type, weight, variable,
		kiloadicional, shipping_subtotal, altura, ancho, longitud, totalpeso, invice_no, qty, book_mode, freight, declarate, declarado, mode, pick_date, schedule, pick_time, iso,
		state, ciudad, zipcode, paisdestino, iso1, state1, city1, zipcode1, status, payment, paymode, comments, notes,officename, status_delivered, user, ruta_imagen, book_date, pesoreal)

		VALUES('$pre-$cons_no','$cons_no', '$pre', '$Shippername','$Shipperphone', '$Shipperaddress', '$Shippercc', '$Shipperlocker', '$Shipperemail', '$Receivername',
		'$Receiverphone', '$telefono1', '$Receiveraddress', '$Receivercc_r', '$Receiveremail', '$Shiptype',$Weight , '$variable', '$kiloadicional', '$shipping_subtotal',
		'$altura', '$ancho', '$longitud', '$totalpeso', '$Invoiceno', $Qnty, '$bookingmode', '$Totalfreight',  '$Totaldeclarate', '$Totaldeclarado', '$Mode', '$Packupdate',
		'$Schedule', '$Pickuptime', '$iso', '$state', '$ciudad', '$zipcode', '$paisdestino', '$iso1', '$state1', '$city1', '$zipcode1', '$status', 'Pending', 'none',  '$Comments', 'none', '$officename',
		'$status_delivered', '$user', 'img/uploadsphoto/nophoto.jpg', curdate(), '$pesoreal')";
        //echo $sql;
        dbQuery($sql_3);

        $sql_1 = "INSERT INTO c_tracking (tracking,cons_no,officename,user, book_date)
				VALUES('$pre-$cons_no','$cons_no','$officename','$user',curdate() )";
        //echo $sql;
        dbQuery($sql_1);

        $sql_2 = "INSERT INTO accounting (tracking,client_id,ship_name,email,locker,book_mode,comments,shipping_subtotal,status,office,user, book_date)
				VALUES('$pre-$cons_no','$Receivercc_r','$Receivername','$Shipperemail','$Shipperlocker','$bookingmode','$Comments','$shipping_subtotal','$status','$officename','$user',curdate() )";
        //echo $sql;
        dbQuery($sql_2);

        //insert tracking number
        $sqlInsertTracking = "INSERT INTO tracking_number (tracking, cons_no, weight, update_date) VALUES ";

        foreach ($trackingNumbers as $key => $trackingNumber) {
            $query_values[] = "('" . $trackingNumber . "', " . $cons_no . ", " . str_replace(".", "", $weights[$key]) . ", NOW())";
        }

        dbQuery($sqlInsertTracking . implode(",", $query_values));

        //insert subtotal_one
        //INSERT INTO `vc`.`subtotal_one`(`tracking`, `cons_no`, `sum_1`, `sum_4`, `sum_7`) VALUES ('1', '1', '1', '1', '1')
        $sqlInsertSubtotalOne = "INSERT INTO subtotal_one(tracking, cons_no, sum_1, sum_4, sum_7) VALUES ";
        foreach ($listSum1 as $key => $item) {
            $value_subtotal_one[] = "('$pre-$cons_no', '$cons_no', '" .
                str_replace(".", "", $item) . "', '" .
                str_replace(".", "", $listSum4[$key]) . "', '" .
                str_replace(".", "", $listSum7[$key])    . "')";
        }
        dbQuery($sqlInsertSubtotalOne . implode(",", $value_subtotal_one));

        //insert subtotal two
        //INSERT INTO `vc`.`subtotal_two`(`tracking`, `cons_no`, `volume_1`, `volume_2`, `volume_3`, `volume_4`, `volume_5`) VALUES ('1', '1', '1', '1', '1', '1', '1')
        $sqlInsertSubtotalTwo = "INSERT INTO subtotal_two(tracking, cons_no, volume_1, volume_2, volume_3, volume_4, volume_5) VALUES ";
        foreach ($listVolume1 as $key => $item) {
            $value_subtotal_two[] = "('$pre-$cons_no', '$cons_no', '" .
                str_replace(".", "", $item) . "', '" .
                str_replace(".", "", $listVolume2[$key]) . "', '" .
                str_replace(".", "", $listVolume3[$key]) . "', '" .
                str_replace(".", "", $listVolume4[$key]) . "', '" .
                str_replace(".", "", $listVolume5[$key]) . "')";
        }
        dbQuery($sqlInsertSubtotalTwo . implode(",", $value_subtotal_two));

        $destinatario = "" . $Receiveremail . "";

        ## Obtengo datos de las facturas tracking
        $boxsms = mysql_query("SELECT tracking FROM c_tracking ");

        while ($row = mysql_fetch_array($boxsms)) {

            $sms = $row["tracking"];
        }
        mysql_free_result($boxsms);

        ## Obtengo datos de la API KEY
        $apiconfig = mysql_query("SELECT apikey,apisecret FROM api_sms WHERE id='1' ");

        while ($row = mysql_fetch_array($apiconfig)) {

            $api_key = $row["apikey"];
            $api_secret = $row["apisecret"];
        }
        mysql_free_result($apiconfig);

        ## Obtengo datos configuracion email
        $settingssms = mysql_query("SELECT detailsend,detailinvoice,detailprice FROM api_sms WHERE id='2'");

        while ($row = mysql_fetch_array($settingssms)) {

            $apia = $row["detailsend"];
            $apib = $row["detailinvoice"];
            $apic = $row["detailprice"];
        }
        mysql_free_result($settingssms);


        // Step 1: Declare new NexmoMessage.
        $nexmo_sms = new NexmoMessage('' . $api_key . '', '' . $api_secret . '');

        // Step 2: Use sendText( $to, $from, $message ) method to send a message.

        $info = $nexmo_sms->sendText($_POST['Shipperphone'], $_POST['Shippername'], '' . $Shippername . ', ' . $apia . ' ' . $Comments . '. ' . $apib . ' ' . $sms . '. ' . $apic . ' ' . $shipping_subtotal . '');
        // Step 3: Display an overview of the message

        $result131 = mysql_query("SELECT * FROM company");
        while ($row = mysql_fetch_array($result131)) {

            $to = $row["bemail"];
            $address = $row["caddress"];
            $namecompanie = $row["cname"];
            $footer = $row["footer_website"];
            $web = $row["website"];
            $url = APP_URL . "/logo-image/image_logo.php?id=1'";

            // subject

            $subject = '' . $envioasudestino . ' | ' . $row["cname"] . '';
            $from = $row["bemail"];
            // message

            // HTML email starts here

            $message = "<html><body>";
            $message .= "<div style='font-family:HelveticaNeue-Light,Arial,sans-serif;background-color:#eeeeee'>
								<table align='center' width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
								<tbody>
									<tr>
										<td>
											<table align='center' width='750px' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='width:750px!important'>
											<tbody>
												<tr>
													<td>
														<table width='690' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
														<tbody>
															<tr>
																<td colspan='3' height='80' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='padding:0;margin:0;font-size:0;line-height:0'>
																	<table width='690' align='center' border='0' cellspacing='0' cellpadding='0'>
																	<tbody>
																		<tr>
																			<td width='30'></td>
																			<td align='left' valign='middle' style='padding:0;margin:0;font-size:0;line-height:0'><a href='$web' target='_blank'><img src='$url' height='59' width='310'></a></td>
																			<td width='30'></td>
																		</tr>
																	</tbody>
																	</table>
																</td>
															</tr>
															<tr>
																<td colspan='3' align='center'>
																	<table width='630' align='center' border='0' cellspacing='0' cellpadding='0'>
																	<tbody>
																		<tr>
																			<td colspan='3' height='60'></td></tr><tr><td width='25'></td>
																			<td align='center'>
																				<h1 style='font-family:HelveticaNeue-Light,arial,sans-serif;font-size:40px;color:#404040;line-height:40px;font-weight:bold;margin:0;padding:0'>$welcometo $namecompanie</h1>
																			</td>
																			<td width='25'></td>
																		</tr>
																		<tr>
																			<td colspan='3' height='40'></td></tr><tr><td colspan='5' align='center'>
																				<p style='color:#404040;font-size:16px;line-height:24px;font-weight:lighter;padding:0;margin:0'>$hola  <strong>$Receivername</strong></p><br>
																				<p style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>
																				<strong><strong>$Shippername</strong>, $tehaenviado</p><br>
																			</td>
																		</tr>
																		<tr>
																	</tr>
																	<tr><td colspan='3' height='30'></td></tr>
																</tbody>
																</table>
															</td>
														</tr>

														<tr bgcolor='#ffffff'>
															<td width='30' bgcolor='#eeeeee'></td>
																<table width='570' align='center' border='0' cellspacing='0' cellpadding='0'>
															<td>
																<tbody>
																	<tr>
																		<td colspan='4' align='center'>&nbsp;</td>
																	</tr>
																	<tr>
																		<td colspan='4' align='center'><h2 style='font-size:24px'>$envioasudestino</h2></td>
																	</tr>
																	<tr>
																		<td colspan='4'>&nbsp;</td>
																	</tr>
																	<tr>
																		<td width='120' align='right' valign='top'><img src='http://deprixapro.jaom.info/icon-destination.png' alt='tool' width='150' height='138'></td>
																		<td width='30'></td>
																		<td align='left' valign='middle'>
																			<h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>$estadodelenvio</h3>
																			<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
																			<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$_Tracking:</strong> <strong>$pre-$cons_no</strong></div>
																			<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$estado:</strong> <strong>$status</strong></div>
																			<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$email1:</strong> <strong>$Receiveremail</strong></div>
																			<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$destinoe:</strong> <strong>$Pickuptime</strong></div>
																			<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$direccion:</strong> <strong>$Receiveraddress</strong></div>
																			<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$fechadelenvio:</strong> <strong>$Schedule</strong></div>
																			<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
																			<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$DetallesdelEnvio:</strong> <strong>$Comments</strong></div>
																		</td>
																		<td width='30'></td>
																	</tr>
																	<tr>
																		<td colspan='4'>&nbsp;</td>
																	</tr>
																</tbody>
																</table>
																<table width='570' align='center' border='0' cellspacing='0' cellpadding='0'>
																	<tbody>
																		<tr>
																			<td align='center'>
																				<div style='text-align:center;width:100%;padding:40px 0'>
																					<table align='center' cellpadding='0' cellspacing='0' style='margin:0 auto;padding:0'>
																					<tbody>
																						<tr>
																							<td align='center' style='margin:0;text-align:center'>
																							<a href='$web' style='font-size:18px;font-family:HelveticaNeue-Light,Arial,sans-serif;line-height:22px;text-decoration:none;color:#ffffff;font-weight:bold;border-radius:2px;background-color:#00a3df;padding:14px 40px;display:block' target='_blank'>See shipping</a></td>
																						</tr>
																					</tbody>
																					</table>
																				</div>
																			</td>
																	  </tr>
																	  <tr><td>&nbsp;</td>
																	  </tr>
																	  <tr>
																		<td>
																			<h2 style='color:#404040;font-size:22px;font-weight:bold;line-height:26px;padding:0;margin:0'>&nbsp;</h2>
																			<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>$hola $rev_name $estaes <br /><br /> <strong> $address $porfavor</div>
																		</td>
																	</tr>
																	<tr><td>&nbsp;</td>
																	</tbody>
																</table>
															</td>
															<td width='30' bgcolor='#eeeeee'></td>
														</tr>
														</tbody>
														</table>
														<table align='center' width='750px' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='width:750px!important'>
														<tbody>
															<tr>
																<td>
																	<table width='630' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
																	<tbody>
																		<tr><td colspan='2' height='30'></td></tr>
																		<tr>
																			<td width='360' valign='top'>
																				<div style='color:#a3a3a3;font-size:12px;line-height:12px;padding:0;margin:0'>$footer</div>
																				<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
																				<div style='color:#a3a3a3;font-size:12px;line-height:12px;padding:0;margin:0'>$namecompany</div>
																			</td>
																			<td align='right' valign='top'>
																				<span style='line-height:20px;font-size:10px'><a href='' target='_blank'><img src='http://i.imgbox.com/BggPYqAh.png' alt='fb'></a>&nbsp;</span>
																				<span style='line-height:20px;font-size:10px'><a href='' target='_blank'><img src='http://i.imgbox.com/j3NsGLak.png' alt='twit'></a>&nbsp;</span>
																				<span style='line-height:20px;font-size:10px'><a href='' target='_blank'><img src='http://i.imgbox.com/wFyxXQyf.png' alt='g'></a>&nbsp;</span>
																			</td>
																		</tr>
																		<tr><td colspan='2' height='5'></td></tr>

																	</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
														</table>
													</td>
												</tr>
											</tbody>
											</table>
										</td>
									</tr>
								</tbody>
								</table>
							</div>";
            $message .= "</body></html>";

            $para = '' . $destinatario . '';
            $titulo = '' . $subject . '';
            $mensaje = "" . $message . "";
            $cabeceras = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


            $tipocorreos = explode('@', $para);

            if ($tipocorreos['1'] == 'gmail.com') {

                // Cabeceras adicionales para gmail
                $cabeceras .= "From: " . $from . "" . "\r\n";
            } else {
                // Cabeceras adicionales para hotmail y demas
                $cabeceras .= 'From: ' . $from . ' || ' . $to . '' . "\r\n";
            }

//		mail($para, $titulo, $mensaje, $cabeceras);
//
//		require_once ('../email/sendMail.php');
//
//		$mail = new \email\Mail();
//		$mail->sendMail($destinatario, $titulo, $mensaje);

            echo "<script type=\"text/javascript\">
			alert(\"$envioclienteok\");
			window.location = \"add-courier.php\"
		</script>";


        }
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title><?php echo $_SESSION['ge_cname']; ?> | <?php echo $ENVIOS; ?></title>
    <meta name="description" content="<?php echo $_SESSION['ge_description']; ?>"/>
    <meta name="keywords" content="<?php echo $_SESSION['ge_keywords']; ?>"/>
    <meta name="author" content="Jaomweb">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <link rel="shortcut icon" type="image/png" href="logo-image/image_logo.php?id=2"/>

    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="../bower_components/animate.css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="../bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css"/>
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link rel="stylesheet" href="css/app.css" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" media="all">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>

    <!-- Switchery css -->
    <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>


    <!-- Plugins css -->
    <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.mobile.min.css"/>
    <link rel="stylesheet" href="css/jquery.auto-complete.css">
    <style>
        .error {
            font-size: 13px;
            color: red;
        }
    </style>

</head>
<body>
<?php
include("header.php");
?>

<!-- content -->
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">

        <div class="wrapper-md">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blog-post">
                        <div class="panel">
                            <div class="wrapper-lg">
                                <div>
                                    <tbody>
                                    <div class="row alertaCaja" style="display: none;">
                                        <div class="col-xs-4 col-sm-4 col-md-4" style="float: none; margin: 0 auto;">
                                            <div class="alert alert-dismissible alert danger">
                                                <button type="button" class="close" data-dismiss="alert"><img
                                                            src="img/close.png" height="15" width="15"></button>
                                                <center>
                                                    <?php
                                                    require_once('database.php');
                                                    $query = mysql_query("SELECT MAX(cid) AS id FROM courier");
                                                    if ($row = mysql_fetch_row($query)) {

                                                        ?>
                                                        <a target="_blank"
                                                           href="print-invoice/invoice-print.php?cid=<?php echo codificar($id = trim($row[0])); ?>">
                                                            <img src="img/print-invoice.png" height="76" width="79"></a>
                                                    <?php } ?>

                                                    <?php
                                                    require_once('database.php');
                                                    $query = mysql_query("SELECT MAX(cid) AS id FROM courier");
                                                    if ($row = mysql_fetch_row($query)) {

                                                        ?>
                                                        <a target="_blank"
                                                           href="print-invoice/ticket-print.php?cid=<?php echo codificar($id = trim($row[0])); ?>">
                                                            <img src="img/print_label.png" height="76" width="79"></a>
                                                    <?php } ?>
                                                </center>
                                            </div>
                                        </div>
                                    </div>

                                    <tr>
                                        <h3 class="classic-title"><span><strong><i
                                                            class="fa fa-truck icon text-default-lter"></i>&nbsp;&nbsp;<?php echo $ADICIONAR; ?></strong>
                                        </h3>

                                        <!-- START Checkout form -->

                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
                                              id="formulario1">
                                            <table border="0" align="center" width="100%">
                                                <div class="row">

                                                    <!-- START Presonal information -->
                                                    <fieldset class="col-md-6">
                                                        <legend><?php echo $datosremite; ?></legend>
                                                        <!-- Name -->
                                                        <div class="row">
                                                            <div class="col-sm-2 form-group">
                                                                <label class="control-label"><i
                                                                            class="fa fa-user icon text-default-lter"></i>&nbsp;<?php echo $StaffRole; ?>
                                                                    <span class="required-field">*</span></label>
                                                                <input type="text" class="form-control"
                                                                       name="officename" id="officename"
                                                                       value="<?php echo $_SESSION['user_type']; ?>"
                                                                       readonly="true"/>
                                                            </div>
                                                            <div class="col-sm-2 form-group">
                                                                <label class="control-label"><i
                                                                            class="fa fa-user icon text-default-lter"></i>&nbsp;<?php echo $StaffUser; ?>
                                                                    <span class="required-field">*</span></label>
                                                                <input type="text" class="form-control" name="user"
                                                                       id="user"
                                                                       value="<?php echo $_SESSION['user_name']; ?>"
                                                                       readonly="true"/>
                                                            </div>
                                                            <div class="col-sm-8 form-group">

                                                                <label class="control-label">Company Name
                                                                    &nbsp;<?php if ($v0 == true) { ?><span
                                                                            class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="text" class="form-control"
                                                                       name="Shippername" id="Shippername"
                                                                       autocomplete="on" list="customers"
                                                                       value="<?php echo $companyInfor['cname']?>"/>
                                                                <input type="hidden" name="Shippername-hidden"
                                                                       id="Shippername-hidden"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div id="divRemi">
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="control-label"><?php echo $DIRECCION; ?>
                                                                        &nbsp;<?php if ($v1 == true) { ?><span
                                                                                class="error">
                                                                            <em><?php echo $L_['mandatory']; ?></em>
                                                                            </span><?php } ?></label>
                                                                    <input type="text" class="form-control"
                                                                           name="Shipperaddress" id="Shipperaddress"
                                                                           value="<?php if (isset($_POST['Shipperaddress'])) {
                                                                               echo $_POST['Shipperaddress'];
                                                                           } else {
                                                                               echo $companyInfor['caddress'];
                                                                           } ?>"/>
                                                                </div>

                                                                <div class="col-sm-3 form-group">
                                                                    <label class="control-label"><i
                                                                                class="fa fa-phone icon text-default-lter"></i>&nbsp;<?php echo $TELEFONO; ?><?php if ($v2 == true) { ?>
                                                                            <span class="error">
                                                                            <em><?php echo $L_['mandatory']; ?></em>
                                                                            </span><?php } ?></label>
                                                                    <input type="tel" class="form-control"
                                                                           name="Shipperphone" id="Shipperphone"
                                                                           value="<?php if (isset($_POST['Shipperphone'])) echo $_POST['Shipperphone']; else echo $companyInfor['cphone']; ?>"/>
                                                                </div>

                                                                <div class="col-sm-3 form-group">
                                                                    <label class="control-label"><?php echo $CEDULA; ?>
                                                                        &nbsp;<?php if ($v3 == true) { ?><span
                                                                                class="error">
                                                                            <em><?php echo $L_['mandatory']; ?></em>
                                                                            </span><?php } ?></label>
                                                                    <input type="text" class="form-control"
                                                                           name="Shippercc" id="Shippercc"
                                                                           value="<?php if (isset($_POST['Shippercc'])) echo $_POST['Shippercc']; else echo $companyInfor['nit']; ?>">
                                                                </div>
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="control-label"><?php echo $L_['lockerid']; ?>
                                                                        &nbsp;<?php if ($v4 == true) { ?><span
                                                                                class="error">
                                                                            <em><?php echo $L_['mandatory']; ?></em>
                                                                            </span><?php } ?></label>
                                                                    <input type="text" class="form-control"
                                                                           name="Shipperlocker" id="Shipperlocker"
                                                                           value="<?php if (isset($_POST['Shipperlocker'])) echo $_POST['Shipperlocker']; else echo $companyInfor['locker'] ?>">
                                                                </div>
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="control-label"><i
                                                                                class="fa fa-angle-double-right icon text-default-lter"></i>&nbsp;<strong><?php echo $PAISORIGEN; ?></strong>&nbsp;<?php if ($v5 == true) { ?>
                                                                            <span class="error">
                                                                            <em><?php echo $L_['mandatory']; ?></em>
                                                                            </span><?php } ?></label>
                                                                    <input type="text" class="form-control"
                                                                           name="Pickuptime" id="Shippercountry"
                                                                           value="<?php if (isset($_POST['Pickuptime'])) echo $_POST['Pickuptime']; else echo $companyInfor['country']; ?>">
                                                                </div>
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="control-label"><strong><?php echo $L_STATE; ?></strong>&nbsp;<?php if ($v6 == true) { ?>
                                                                            <span class="error">
                                                                            <em><?php echo $L_['mandatory']; ?></em>
                                                                            </span><?php } ?></label>
                                                                    <input type="text" class="form-control" name="state"
                                                                           id="Shipperstate"
                                                                           value="<?php if (isset($_POST['state'])) echo $_POST['state']; else echo $companyInfor['city'] ?>">
                                                                </div>
                                                                <!--                                                <div class="col-sm-3 form-group" >-->
                                                                <!--                                                    <label class="control-label"><strong>-->
                                                                <?php //echo $CODIGO; ?><!--</strong>&nbsp;-->
                                                                <?php //if ($v7==true){?><!--<span class="error"><em>-->
                                                                <?php //echo $L_['mandatory']; ?><!--</em></span>-->
                                                                <?php //}?><!--</label>-->
                                                                <!--                                                    <input type="text" class="form-control" name="iso" id="Shipperiso" value="-->
                                                                <?php //if (isset($_POST['iso'])) echo $_POST['iso']; else echo $companyInfor['country'];?><!--" >-->
                                                                <!--                                                </div>-->
                                                                <div class="col-sm-6 form-group">
                                                                    <label class="control-label"><strong><?php echo $CIUDAD; ?></strong>&nbsp;<?php if ($v8 == true) { ?>
                                                                            <span class="error">
                                                                            <em><?php echo $L_['mandatory']; ?></em>
                                                                            </span><?php } ?></label>
                                                                    <input type="text" class="form-control"
                                                                           id="Shipperciudad" name="ciudad"
                                                                           value="<?php if (isset($_POST['ciudad'])) echo $_POST['ciudad']; else echo $companyInfor['city'] ?>">
                                                                </div>
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="control-label"><strong><?php echo $CODIGOPOSTAL; ?></strong>&nbsp;<?php if ($v9 == true) { ?>
                                                                            <span class="error">
                                                                            <em><?php echo $L_['mandatory']; ?></em>
                                                                            </span><?php } ?></label>
                                                                    <input type="text" class="form-control"
                                                                           id="Shipperzipcode" name="zipcode"
                                                                           value="<?php if (isset($_POST['zipcode'])) echo $_POST['zipcode']; else echo $companyInfor['zipcode'] ?>">
                                                                </div>
                                                                <div class="col-sm-9 form-group">
                                                                    <label class="control-label"><?php echo $EMAIL; ?>
                                                                        <font color="#FF6100"><?php echo $notaemail; ?></font>&nbsp;<?php if ($v10 == true) { ?>
                                                                            <span class="error">
                                                                            <em><?php echo $L_['mandatory']; ?></em>
                                                                            </span><?php } ?></label>
                                                                    <input type="text" class="form-control"
                                                                           name="Shipperemail" id="idemail"
                                                                           placeholder="demo@emo.com"
                                                                           autocomplete=" off"
                                                                           onKeyUp="javascript:validateeMail('idemail')"
                                                                           value="<?php echo $companyInfor['bemail']?>"/>
                                                                    <strong><span id="mailOK"></span></strong>
                                                                    <p class="error"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Adress and Phone -->

                                                        <!-- START Shipment information -->
                                                        </br></br>
                                                        <legend><?php echo $Informaciondeenvio; ?></legend>

                                                        <div class="row">

                                                            <!-- Origin Office -->

                                                            <div class="col-sm-3 form-group">
                                                                <label for="zipcode" class="control-label"><i
                                                                            class="fa fa-angle-double-right icon text-default-lter"></i>&nbsp;<strong><?php echo $OFICINAORIGEN; ?></strong></label>
                                                                <select class="form-control" name="Invoiceno">
                                                                    <?php
                                                                    while ($data = dbFetchAssoc($result)) {
                                                                        ?>
                                                                        <option value="<?php echo $data['off_name']; ?>"><?php echo $data['off_name']; ?></option>
                                                                        <?php
                                                                    }//while
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3 form-group">
                                                                <label for="ccv"
                                                                       class="control-label"><strong><?php echo $CantidadPaquetes; ?></strong>&nbsp;<?php if ($v11 == true) { ?>
                                                                        <span class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="number" class="form-control qnty"
                                                                       name="Qnty"
                                                                       value="<?php if (isset($_POST['Qnty'])) echo $_POST['Qnty'] ?>"/>
                                                            </div>
                                                            <!-- Text area -->
                                                            <div class="col-sm-6 form-group">
                                                                <label for="inputTextarea" class="control-label"><i
                                                                            class="fa fa-comments icon text-default-lter"></i>&nbsp;<?php echo $DetallesdelEnvio; ?>
                                                                    &nbsp;<?php if ($v14 == true) { ?><span
                                                                            class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="text" class="form-control"
                                                                          name="Comments" required="required"
                                                                          placeholder="<?php echo $placedetails; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-6"></div>
                                                            <div class="col-sm-3 form-group">
                                                                <label class="control-label"><strong><?php echo $L_TRACKING; ?></strong></label>
                                                            </div>
                                                            <div class="col-sm-3 form-group">
                                                                <label class="control-label"><strong><?php echo $L_WEIGHT; ?></strong></label>
                                                            </div>
                                                        </div>

                                                        <div id="list_tracking">
                                                            <div class="row tracking">
                                                                <div class="col-sm-6 form-group" align="right">
                                                                    <button class="btn btn-success"
                                                                            id="btn_add_tracking_number" type="button">Add
                                                                    </button>
                                                                </div>
                                                                <div class="col-sm-3 form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="tracking_number[]"
                                                                           placeholder="<?php echo $L_TRACKING ?>"
                                                                           required="required">
                                                                </div>
                                                                <div class="col-sm-3 form-group">
                                                                    <input type="text" class="form-control input_weight"
                                                                           name="weight[]"
                                                                           placeholder="<?php echo $L_WEIGHT ?>"
                                                                           required="required">
                                                                </div>
                                                            </div>

                                                            <div class="add_tracking_number tracking"></div>
                                                            <div class="row sum">
                                                                <div class="col-sm-9 form-group"
                                                                     align="right"><?php echo $L_SUM; ?></div>
                                                                <div class="col-sm-3 form-group">
                                                                    <input type="text" class="form-control" id="sum_weight" disabled>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-5 form-group">
                                                                <label class="control-label"><i
                                                                            class="fa fa-database icon text-default-lter"></i>&nbsp;<strong><?php echo $Pagos; ?></strong></label>
                                                                <select class="form-control" name="bookingmode">
                                                                    <option selected="selected"
                                                                            value="Effective"><?php echo $Effective; ?></option>
                                                                    <option value="Debit_card"><?php echo $Debitcard; ?></option>
                                                                    <option value="Credit_card"><?php echo $Creditcard; ?></option>
                                                                    <option value="Transfer"><?php echo $Transfer; ?></option>
                                                                    <option value="Online"><?php echo $Payonline; ?></option>
                                                                    <option value="Paypal"><?php echo $L_['type_paypal']; ?></option>
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-4 form-group">
                                                                <label class="control-label"><?php echo $TipodeProducto; ?></label>
                                                                <select type="text" class="form-control"
                                                                        name="Shiptype">
                                                                    <?php
                                                                    $sql = "SELECT name FROM type_shipments  GROUP BY name";
                                                                    $query = $db->query($sql);
                                                                    if ($query->num_rows > 0) {
                                                                        while ($row = $query->fetch_array()) {
                                                                            echo '<option data-value="' . $row['name'] . '">' . utf8_encode($row['name']) . '</option>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3 form-group">
                                                                <label class="control-label"><i
                                                                            class="fa fa-plane icon text-default-lter"></i>&nbsp;<?php echo $MododelServicio; ?>
                                                                </label>
                                                                <select class="form-control" name="Mode">
                                                                    <?php
                                                                    $sql = "SELECT name FROM mode_bookings  GROUP BY name";
                                                                    $query = $db->query($sql);
                                                                    if ($query->num_rows > 0) {
                                                                        while ($row = $query->fetch_array()) {
                                                                            echo '<option data-value="' . $row['name'] . '">' . utf8_encode($row['name']) . '</option>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- Payment Mode -->
                                                        <div id="caculator_list_caculator_1">
                                                            <div class="row del_subtotal_1">
                                                                <input type="hidden" class="form-control" name="Totaldeclarate" value="0"/>
                                                                <input type="hidden" class="form-control" name="pesoreal" value="0">
                                                                <input type="hidden" class="form-control" name="variable" value="0">
                                                                <input type="hidden" class="form-control" name="Weight" value="0">
                                                                <input type="hidden" class="form-control" name="Totaldeclarado" value="0">
                                                                <input type="hidden" class="form-control" name="altura" value="0">
                                                                <input type="hidden" class="form-control" name="ancho" value="0">
                                                                <input type="hidden" class="form-control" name="longitud" value="0">
                                                                <input type="hidden" class="form-control" name="Totalfreight" value="0">
                                                                <input type="hidden" class="form-control" name="kiloadicional" value="0">

                                                                <div class="col-sm-2 form-group">
                                                                    <label class="text-primary"><strong>VND 1 Kg</strong></label>
                                                                    <input type="text" class="form-control sum1" id="sum1" name="sum1[]" value="0"/>
                                                                </div>
                                                                <div class="col-sm-2 form-group">
                                                                    <label class="text-primary"><strong>Weight (Kg)</strong></label>
                                                                    <input type="text" class="form-control sum4" id="sum4" name="sum4[]" value="0"/>
                                                                </div>
                                                                <div class="col-sm-2 form-group">
                                                                    <label class="text-primary"><strong>Phụ phí</strong></label>
                                                                    <input type="text" class="form-control sum7" value="0" id="sum7" name="sum7[]"/>
                                                                </div>
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="text-primary"><strong>Subtotal 1</strong></label>
                                                                    <input type="text" name="" value="0" disabled id="sum8"
                                                                           class="form-control sum8">
                                                                </div>
                                                                <div class="col-sm-3 form-group" style="padding-top: 25px">
                                                                    <label class="text-primary"></label>
                                                                    <button class="btn btn-success" type="button" id="add_subtotal_1">Add
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <div id="list_subtotal_1">

                                                            </div>
                                                        </div>

                                                        <!-- Peso Volumetrico -->
                                                        <div id="caculator_list_caculator_2">
                                                            <div class="show_subtotal_2">
                                                            <div class="row">
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="text-primary"><strong>Height</strong></label>
                                                                    <input type="text" class="form-control volume1" id="volume1" name="volume1[]" value="0"/>
                                                                </div>
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="text-primary"><strong>Width</strong></label>
                                                                    <input type="text" class="form-control volume2" id="volume2" name="volume2[]" value="0"/>
                                                                </div>
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="text-primary"><strong>Length</strong></label>
                                                                    <input type="text" class="form-control volume3" id="volume3" name="volume3[]" value="0"/>
                                                                </div>
                                                                <div class="col-sm-3 form-group" style="padding-top: 25px">
                                                                    <label class="text-primary"></label>
                                                                    <button class="btn btn-success" type="button" id="add_subtotal_2">Add
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <!-- m3-->
                                                            <div class="row">
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="text-primary"><strong>VND 1 m3</strong></label>
                                                                    <input type="text" class="form-control volume4" value="0" id="volume4" name="volume4[]"/>
                                                                </div>
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="text-primary"><strong>Total (m3)</strong></label>
                                                                    <input type="text" class="form-control totalpeso" name="totalpeso" id="totalpeso" value="0" disabled/>
                                                                </div>
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="text-primary"><strong>Phụ phí</strong></label>
                                                                    <input type="text" class="form-control volume5" value="0" id="volume5" name="volume5[]"/>
                                                                </div>
                                                                <div class="col-sm-3 form-group">
                                                                    <label class="text-primary"><strong>Subtotal 2</strong></label>
                                                                    <input type="text" class="form-control sum9" value="0" disabled id="sum9"/>
                                                                </div>
                                                            </div>
                                                            </div>

                                                            <div id="list_subtotal_2">

                                                            </div>
                                                        </div>
                                                        <!-- tong -->
                                                        <div class="row">
                                                            <div class="col-sm-3 form-group">
                                                                <button class="btn btn-success" id="caculator" type="button" style="width: 100%">Tính toán kết quả</button>
                                                            </div>
                                                            <div class="col-sm-6     form-group" align="right">
                                                                <label class="text-primary"><strong>Subtotal Shipping</strong></label>
                                                            </div>
                                                            <div class="col-sm-3 form-group">
                                                                <input type="text" class="form-control" value="0" disabled id="resultado"/>
                                                                <input type="hidden" class="form-control" value="0" name="shipping_subtotal" id="shipping_subtotal"/>
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                    <!-- START Receiver info  -->
                                                    <fieldset class="col-md-6">
                                                        <legend><?php echo $DatosDestinatario; ?></legend>
                                                        <!-- Name -->
                                                        <div class="row">
                                                            <div class="col-sm-6 form-group">
                                                                <label class="control-label"><?php echo $ID_CLIENT; ?>
                                                                    &nbsp;<?php if ($v12 == true) { ?><span
                                                                            class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <!--                                                    <input type="text" class="form-control" name="locker" id="locker" autocomplete="on" list="customers" value="-->
                                                                <?php //if (isset($_POST['Receivername'])) echo $_POST['Receivername']?><!--">-->
                                                                <input id="clientID" name="clientID" autofocus
                                                                       type="text" class="form-control" name="q"
                                                                       required="required">
                                                            </div>
                                                            <div class="col-sm-6 form-group">
                                                                <label class="control-label"><?php echo $NOMBREDESTINATARIO; ?>
                                                                    &nbsp;<?php if ($v12 == true) { ?><span
                                                                            class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="text" class="form-control"
                                                                       name="Receivername" id="Receivername"
                                                                       autocomplete="on" list="customers"
                                                                       value="<?php if (isset($_POST['Receivername'])) echo $_POST['Receivername'] ?>">
                                                            </div>
                                                        </div>

                                                        <!-- Adress and Phone -->
                                                        <div class="row">
                                                            <div class="col-sm-3 form-group">
                                                                <label class="control-label"><?php echo $DIRECCION; ?>
                                                                    &nbsp;<?php if ($v13 == true) { ?><span
                                                                            class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="text" class="form-control"
                                                                       name="Receiveraddress" id="Receiveraddress"
                                                                       value="<?php if (isset($_POST['Receiveraddress'])) echo $_POST['Receiveraddress'] ?>">
                                                            </div>

                                                            <div class="col-sm-3 form-group">
                                                                <label class="control-label"><i
                                                                            class="fa fa-phone icon text-default-lter"></i>&nbsp;<?php echo $TELEFONO; ?>
                                                                    &nbsp;<?php if ($v15 == true) { ?><span
                                                                            class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="tel" class="form-control"
                                                                       name="Receiverphone" id="Receiverphone"
                                                                       value="<?php if (isset($_POST['Receiverphone'])) echo $_POST['Receiverphone'] ?>">
                                                            </div>

                                                            <div class="col-sm-3 form-group">
                                                                <label class="control-label"><i
                                                                            class="fa fa-phone icon text-default-lter"></i>&nbsp;<?php echo $TELEFONO2; ?>
                                                                    &nbsp;<?php if ($v16 == true) { ?><span
                                                                            class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="tel" class="form-control" name="telefono1"
                                                                       id="Receivertelefono1"
                                                                       value="<?php if (isset($_POST['telefono1'])) echo $_POST['telefono1'] ?>">
                                                            </div>

                                                            <div class="col-sm-3 form-group">
                                                                <label class="control-label"><?php echo $CEDULA; ?>
                                                                    &nbsp;<?php if ($v17 == true) { ?><span
                                                                            class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="text" class="form-control"
                                                                       name="Receivercc_r" id="Receivercc_r"
                                                                       value="<?php if (isset($_POST['Receivercc_r'])) echo $_POST['Receivercc_r'] ?>">
                                                            </div>
                                                            <div class="col-sm-3 form-group">
                                                                <label class="control-label"><i
                                                                            class="fa fa-angle-double-right icon text-default-lter"></i>&nbsp;<strong><?php echo $PAISDESTINO; ?></strong>&nbsp;<?php if ($v18 == true) { ?>
                                                                        <span class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="text" class="form-control"
                                                                       name="paisdestino" id="Receivercountry1"
                                                                       value="<?php if (isset($_POST['paisdestino'])) echo $_POST['paisdestino'] ?>">
                                                            </div>
                                                            <div class="col-sm-3 form-group">
                                                                <label class="control-label"><strong><?php echo $L_STATE; ?></strong>&nbsp;<?php if ($v19 == true) { ?>
                                                                        <span class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="text" class="form-control" name="state1"
                                                                       id="Receiverstate1"
                                                                       value="<?php if (isset($_POST['state1'])) echo $_POST['state1'] ?>">

                                                            </div>
                                                            <div class="col-sm-3 form-group">
                                                                <label class="control-label"><strong><?php echo $CODIGO; ?></strong>&nbsp;<?php if ($v20 == true) { ?>
                                                                        <span class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="text" class="form-control" name="iso1"
                                                                       id="Receiveriso1"
                                                                       value="<?php if (isset($_POST['iso1'])) echo $_POST['iso1'] ?>">
                                                            </div>

                                                            <div class="col-sm-3 form-group">
                                                                <label class="control-label"><strong><?php echo $CIUDAD; ?></strong>&nbsp;<?php if ($v21 == true) { ?>
                                                                        <span class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="text" class="form-control" name="city1"
                                                                       id="Receivercity1"
                                                                       value="<?php if (isset($_POST['city1'])) echo $_POST['city1'] ?>">
                                                            </div>
                                                            <div class="col-sm-3 form-group">
                                                                <label class="control-label"><strong><?php echo $CODIGOPOSTAL; ?></strong>&nbsp;<?php if ($v22 == true) { ?>
                                                                        <span class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="text" class="form-control" name="zipcode1"
                                                                       id="Receiverzipcode1"
                                                                       value="<?php if (isset($_POST['zipcode1'])) echo $_POST['zipcode1'] ?>">
                                                            </div>
                                                            <div class="col-sm-9 form-group">
                                                                <label class="control-label"><?php echo $EMAIL; ?><font
                                                                            color="#FF6100"><?php echo $notaemail; ?></font>&nbsp;<?php if ($v23 == true) { ?>
                                                                        <span class="error">
                                                                        <em><?php echo $L_['mandatory']; ?></em>
                                                                        </span><?php } ?></label>
                                                                <input type="email" class="form-control"
                                                                       name="Receiveremail" id="id_mail"
                                                                       placeholder="demo@emo.com"
                                                                       onKeyUp="javascript:validateMail('id_mail')">
                                                                <strong><span id="emailOK"></span></strong>
                                                                <p class="error"></p>
                                                            </div>
                                                        </div>
                                                        </br></br>

                                                        <!-- Name -->
                                                        <div class="form-group">
                                                            <label for="name-card"
                                                                   class="text-success"><strong><?php echo $NUMEROENVIO; ?></strong></label>
                                                            <?php
                                                            $qryEmpresa = mysql_query("SELECT * FROM company");
                                                            while ($row = mysql_fetch_array($qryEmpresa)) {
                                                                $pre = $row["prefijo"];
                                                                $cons = $row["cons_no"];
                                                            }
                                                            mysql_free_result($qryEmpresa);
                                                            $pa = mysql_query("SELECT MAX(cons_no)as maximo FROM c_tracking");
                                                            if ($row = mysql_fetch_array($pa)) {
                                                                if ($row['maximo'] == NULL) {
                                                                    $cons_no = '' . $cons . '';
                                                                } else {
                                                                    $cons_no = $row['maximo'] + 1;
                                                                }
                                                            }

                                                            ?>
                                                            <input type="text" class="form-control"
                                                                   value="<?php echo $_SESSION['ge_prefix']; ?>-<?php echo "" . $cons_no; ?>">
                                                        </div>
                                                        </br>

                                                        <!-- Status and Pickup Date -->
                                                        <div class="form-group">
                                                            <label for="dtp_input1" class="control-label"><i
                                                                        class="fa fa-calendar icon text-default-lter"></i>&nbsp;<?php echo $FECHARECOLECCIONENVIO; ?></i>
                                                            </label>
                                                            <div>
                                                                <div class="demo-section k-content">
                                                                    <input type="date" class="form-control"
                                                                           name="Packupdate" id="datetimepicker"
                                                                           title="datetimepicker" style="width: 100%;">
                                                                </div><!-- input-group -->
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-4 form-group">
                                                                <label for="month" class="control-label"><i
                                                                            class="fa fa-sort-amount-asc icon text-default-lter"></i>&nbsp;<?php echo $estado; ?>
                                                                </label>
                                                                <select class="form-control" name="status" id="status">
                                                                    <?php
                                                                    $sql = "SELECT servicemode FROM service_mode  ORDER BY servicemode";
                                                                    $query = $db->query($sql);
                                                                    if ($query->num_rows > 0) {
                                                                        while ($row = $query->fetch_array()) {
                                                                            echo '<option data-value="' . $row['servicemode'] . '">' . $row['servicemode'] . '</option>';

                                                                        }
                                                                    }

                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-8 form-group">
                                                                <label for="dtp_input1" class="control-label"><i
                                                                            class="fa fa-calendar icon text-default-lter"></i>&nbsp;<?php echo $fechaestimadadeliver; ?></i>
                                                                </label>
                                                                <div>
                                                                    <div class="demo-section k-content">
                                                                        <input type="date" class="form-control"
                                                                               name="Schedule" id="datestimepicker"
                                                                               title="datestimepicker">
                                                                    </div><!-- input-group -->
                                                                </div>
                                                    </fieldset>
                                                    <div class="col-md-6 text-left">
                                                        </br></br>
                                                        <button type="submit"
                                                                class="btn btn-large btn-success"><?php echo $GUARDARENVIO; ?></button>
                                                    </div>
                                                </div>
                                </div>
                            </div>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- / content -->

<?php include("footer.php"); ?>

<?php include("footer_add_courier.php"); ?>

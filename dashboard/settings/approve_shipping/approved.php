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
	require '../../requirelanguage.php';
	require_once('../../database.php');
	include ( "../../css/sms/src/NexmoMessage.php" );
	
	$cid 			= (int)$_POST['cid'];
	$deliveryboy 	= $_POST['deliveryboy'];
	$receivedby 	= $_POST['receivedby'];
	$drs 			= $_POST['drs'];
	$cons_no 		= $_POST['cons_no'];
    $ship_name		= $_POST['ship_name'];
	$shippercc 		= $_POST['shippercc'];
	$locker 		= $_POST['locker'];
	$s_phone 		= $_POST['s_phone'];
	$s_add 			= $_POST['s_add'];
	$email 			= $_POST['email'];
	$countries 		= $_POST['countries'];
	$iso 			= $_POST['iso'];
	$ciudad 		= $_POST['ciudad'];
	$zipcode 		= $_POST['zipcode'];
	$rev_name 		= $_POST['rev_name'];
	$r_phone 		= $_POST['r_phone'];
	$r_phone1 		= $_POST['r_phone1'];
	$r_add 			= $_POST['r_add'];
	$receivercc_r 	= $_POST['receivercc_r'];
	$paisdestino 	= $_POST['paisdestino'];
	$iso1 			= $_POST['iso1'];
	$city1 			= $_POST['city1'];
	$zipcode1 		= $_POST['zipcode1'];
	$receiveremail 	= $_POST['receiveremail'];
	$office_origin 	= $_POST['office_origin'];
	$type 			= $_POST['type'];
	$book_mode 	= $_POST['book_mode'];
	$service 		= $_POST['service'];
	$note 			= $_POST['note'];
	$Qnty 			= $_POST['Qnty'];
	$variable 		= $_POST['variable'];
	$kiloadicional 	= $_POST['kiloadicional'];
	$weight 		= $_POST['weight'];
	$declarate 		= $_POST['declarate'];
	$declarado 		= $_POST['declarado'];
	$recogida 		= $_POST['recogida'];
	$shipping_subtotal = $_POST['shipping_subtotal'];
	$pesoreal 		= $_POST['pesoreal'];
	$altura 		= $_POST['altura'];
	$ancho 			= $_POST['ancho'];
	$longitud  		= $_POST['longitud'];
	$totalpeso 		= $_POST['totalpeso'];
	$date 			= $_POST['date'];
	$deliverydate  	= $_POST['deliverydate'];
	$status 		= $_POST['status'];
	$payment 		= $_POST['payment'];
	$paymode 		= $_POST['paymode'];
	$deliver 		= $_POST['deliver'];
	$deliveruser 	= $_POST['deliveruser'];
	$office 		= $_POST['office'];
	$comments 		= $_POST['comments'];
	$notes 			= $_POST['notes'];
	$user 			= $_POST['user'];


	## Obtengo datos de la empresa
	$qryEmpresa =  mysql_query("SELECT * FROM company");

	while($row = mysql_fetch_array($qryEmpresa)) {

		$pre  = $row["prefijo"];
		$cons  = $row["cons_no"];
	}
	mysql_free_result($qryEmpresa);
	
	$pa=mysql_query("SELECT MAX(cons_no)as maximo FROM c_tracking");				
        if($row=mysql_fetch_array($pa)){
			if($row['maximo']==NULL){
				$cons_no=''.$cons.'';
			}else{
				$cons_no=$row['maximo']+1;
			}
		}

	$sql = "INSERT INTO courier_online (cons_no,deliveryboy,receivedby,drs,ship_name,shippercc,locker,s_phone,s_add,email,countries,iso,ciudad,zipcode,rev_name,r_phone,r_phone1,
	r_add,receivercc_r,paisdestino,iso1,city1,zipcode1,receiveremail,office_origin,type,book_mode,service,note,Qnty,variable,kiloadicional,weight,declarate,declarado,recogida,
	shipping_subtotal,pesoreal,altura,ancho,longitud,totalpeso,date,deliverydate,status,payment,paymode,deliver,deliveruser,comments,office,user)
	
	VALUES('$pre-$cons_no', '$deliveryboy', '$receivedby', '$drs', '$ship_name','$shippercc','$locker','$s_phone','$s_add','$email','$countries','$iso','$ciudad','$zipcode',
	'$rev_name','$r_phone','$r_phone1','$r_add','$receivercc_r','$paisdestino','$iso1','$city1','$zipcode1','$receiveremail','$office_origin','$type','$book_mode','$service',
	'$note','$Qnty','$variable','$kiloadicional','$weight','$declarate','$declarado','$recogida','$shipping_subtotal','$pesoreal','$altura','$ancho','$longitud','$totalpeso',
	'$date','$deliverydate','$status','Pending','$paymode','$deliver','$deliveruser','$comments','$office', '$user')";
	dbQuery($sql);
	
	$sql_4 = "INSERT INTO courier_customer (tracking,ship_name, phone, s_add, cc, locker, correo, rev_name, r_phone, telefono1, r_add, cc_r, email, type, weight, variable, 
	kiloadicional, shipping_subtotal, altura, ancho, longitud, totalpeso, invice_no, qty, book_mode, freight, declarate, declarado, mode, pick_date, schedule, pick_time, iso, 
	ciudad, zipcode, paisdestino, iso1, city1, zipcode1, status, payment,paymode,comments, notes,officename, user, book_date, pesoreal)
	
	VALUES('$pre-$cons_no','$ship_name','$s_phone', '$s_add', '$shippercc', '$locker', '$email', '$rev_name',
	'$r_phone', '$r_phone1', '$r_add', '$receivercc_r', '$receiveremail', '$type','$weight', '$variable', '$kiloadicional', '$shipping_subtotal', 
	'$altura', '$ancho', '$longitud', '$totalpeso', '$office_origin', '$Qnty', '$book_mode', '$recogida',  '$declarate', '$declarado', '$service', '$date', 
	'$deliverydate', '$countries', '$iso', '$ciudad', '$zipcode', '$paisdestino', '$iso1', '$city1', '$zipcode1', '$status', 'Pending','$paymode','$note', 'none', '$office', 
	'$user', '$date', '$pesoreal')";	
		//echo $sql;
	dbQuery($sql_4);
	
	$sql_1 = "INSERT INTO c_tracking (tracking,cons_no,officename,user, book_date)
			VALUES('$pre-$cons_no','$cons_no','$office','$user','$date' )";	
		//echo $sql;
	dbQuery($sql_1);

	$sql_2 = "UPDATE  online_booking SET status='Approved', tracking='$pre-$cons_no' WHERE id = '$cid'";
	dbQuery($sql_2);
	
	$sql_3 = "INSERT INTO accounting (tracking,ship_name,email,locker,book_mode,comments,shipping_subtotal,status,office,user, book_date)
				VALUES('$pre-$cons_no','$ship_name','$email','$locker','$book_mode','$note','$shipping_subtotal','$status','$office','$user',curdate() )";	
			//echo $sql;
	dbQuery($sql_3);
	
	$destinatario = "".$email."";
	
	## Obtengo datos de las facturas tracking
	$boxsms =  mysql_query("SELECT tracking FROM c_tracking ");

	while($row = mysql_fetch_array($boxsms)) {

		$sms  = $row["tracking"];
	}
	mysql_free_result($boxsms);
	
	## Obtengo datos de la API KEY
	$apiconfig =  mysql_query("SELECT apikey,apisecret FROM api_sms WHERE id='1' ");

	while($row = mysql_fetch_array($apiconfig)) {

		$api_key  = $row["apikey"];
		$api_secret  = $row["apisecret"];
	}
	mysql_free_result($apiconfig);
	
	## Obtengo datos configuracion email
	$settingssms =  mysql_query("SELECT detailsend,detailinvoice,detailprice FROM api_sms WHERE id='4'");

	while($row = mysql_fetch_array($settingssms)) {

		$apia  = $row["detailsend"];
		$apib  = $row["detailinvoice"];
		$apic  = $row["detailprice"];
	}
	mysql_free_result($settingssms);
	
	
	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage(''.$api_key.'', ''.$api_secret.'');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message.

	$info = $nexmo_sms->sendText($_POST['s_phone'], $_POST['ship_name'], ''.$ship_name.' '.$apia.' '.$note.' '.$apib.' '.$sms.' '.$apic.' '.$shipping_subtotal.'');
	// Step 3: Display an overview of the message
	
	$result1 =  mysql_query("SELECT * FROM company");
	while($row = mysql_fetch_array($result1)) {

		$to  = $row["bemail"];
		$address  = $row["caddress"];
		$namecompanie  = $row["cname"];
		$footer  = $row["footer_website"];
		$web  = $row["website"];
		$url = APP_URL."/logo-image/image_logo.php?id=1'";

		// subject

		$subject = ''.$approvede.' | '.$row["cname"].'';
		$from = $row["bemail"];
		// message			   	
		
		// HTML email starts here
		
		$message  = "<html><body>";	
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
																				<p style='color:#404040;font-size:16px;line-height:24px;font-weight:lighter;padding:0;margin:0'>$hola <strong>$ship_name</strong></p><br>
																				<p style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>
																				$sureserva</p><br>
																				<p style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>
																				$parainiciar <strong>$no</strong></p>
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
																		<td colspan='4' align='center'><h2 style='font-size:24px'>$approvede</h2></td>
																	</tr>
																	<tr>
																		<td colspan='4'>&nbsp;</td>
																	</tr>
																	<tr>
																		<td width='120' align='right' valign='top'><img src='http://deprixapro.jaom.info/icon-approved.png' alt='tool' width='107' height='130'></td>
																		<td width='30'></td>
																		<td align='left' valign='middle'>
																			<h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>$estadodelenvio</h3>
																			<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
																			<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$_Tracking:</strong> <strong>$pre-$cons_no</strong></div>
																			<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$estado:</strong> <strong>$status</strong></div>
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
																							<td align='center' style='margin:0;text-align:center'><a href='$web' style='font-size:18px;font-family:HelveticaNeue-Light,Arial,sans-serif;line-height:22px;text-decoration:none;color:#ffffff;font-weight:bold;border-radius:2px;background-color:#00a3df;padding:14px 40px;display:block' target='_blank'>$ingresecli!</a></td>
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
																			<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>$hola $sname $estaes <br /><br /> <strong> $address $porfavor</div>
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

		
		$para  = ''.$destinatario.''; 
		$titulo = ''.$subject.'';
		$mensaje ="".$message."";
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		
		$tipocorreos=explode('@',$para);

		if ($tipocorreos['1']=='gmail.com'){
			
			// Cabeceras adicionales para gmail
			$cabeceras .= "From: ".$from."" . "\r\n";
		}
		else {
			// Cabeceras adicionales para hotmail y demas
			$cabeceras .= 'From: '.$from.' || '.$to.'' . "\r\n";
		}
		
		mail($para, $titulo, $mensaje, $cabeceras);
	   
	   echo "<script type=\"text/javascript\">
				alert(\"$envioapproved\");
				window.location = \"../../online-bookings.php\"
			</script>";	

	}	
?>
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
	require '../../requirelanguage.php';
	require_once('../../database-settings.php');
	include ( "../../css/sms/src/NexmoMessage.php" );
	
	$pick_time = $_POST['pick_time'];
	$citaddress = $_POST['citaddress'];
	$status = $_POST['status'];
	$comments = $_POST['comments'];
	$cid = (int)$_POST['cid'];
	$deliverydate = $_POST['deliverydate'];
	$tracking = $_POST['tracking'];
	$tracking = $_POST['tracking'];
	$letra = $_POST['letra'];
	$user = $_POST['user'];
	$ship_name = $_POST['ship_name'];
	$phone = $_POST['phone'];
	$correo = $_POST['correo'];
	
	#
	## Obtengo datos de la empresa
	$qryEmpresa =  mysql_query("SELECT * FROM company");

	while($row = mysql_fetch_array($qryEmpresa)) {

		$pre  = $row["prefijo"];
	}
	
	$sql = "INSERT INTO courier_track (cid, tracking, letra, pick_time, status, comments, bk_time, ship_name, phone, correo, user)
			VALUES ($cid, '$tracking', '$pre', '$pick_time | $citaddress', '$status', '$comments', NOW(), '$ship_name', '$phone', '$correo', '$user')";
	dbQuery($sql);
	
	$sql_1 = "UPDATE courier SET status='$status' WHERE tracking = '$tracking'";
	dbQuery($sql_1);
	
	$sql_2 = "UPDATE courier_customer SET status='$status' WHERE  tracking = '$tracking'";
	dbQuery($sql_2);
	
	$sql_3 = "UPDATE accounting SET status='$status' WHERE  tracking = '$tracking'";
	dbQuery($sql_3);
	
	$destinatario = "".$correo."";
	
	## Obtengo datos de la API KEY
	$apiconfig =  mysql_query("SELECT apikey,apisecret FROM api_sms WHERE id='1' ");

	while($row = mysql_fetch_array($apiconfig)) {

		$api_key  = $row["apikey"];
		$api_secret  = $row["apisecret"];
	}
	mysql_free_result($apiconfig);
	
	## Obtengo datos configuracion email
	$settingssms =  mysql_query("SELECT detailsend,detailinvoice,detailprice FROM api_sms WHERE id='3'");

	while($row = mysql_fetch_array($settingssms)) {

		$apia  = $row["detailsend"];
		$apib  = $row["detailinvoice"];
		$apic  = $row["detailprice"];
	}
	mysql_free_result($settingssms);
	
	
	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage(''.$api_key.'', ''.$api_secret.'');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message.

	$info = $nexmo_sms->sendText($_POST['phone'], $_POST['ship_name'], ''.$ship_name.', '.$apia.' '.$pre.'-'.$cons_no.'. '.$apib.' '.$status.'. '.$apic.' '.$pick_time.'|'.$citaddress.'');
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

		$subject = ''.$UPDATEEXIT.' | '.$row["cname"].'';
		$from = $row["bemail"];
		// message
			
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
																		<h1 style='font-family:HelveticaNeue-Light,arial,sans-serif;font-size:40px;color:#404040;line-height:40px;font-weight:bold;margin:0;padding:0'>$welcome  $namecompanie</h1>
																	</td>
																	<td width='25'></td>
																</tr>
																<tr>
																	<td colspan='3' height='40'></td></tr><tr><td colspan='5' align='center'>
																		<p style='color:#404040;font-size:16px;line-height:24px;font-weight:lighter;padding:0;margin:0'>$hola <strong>$ship_name</strong></p><br>
																		<p style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>
																		$actualizalinea</p>
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
													<td>
														<table width='570' align='center' border='0' cellspacing='0' cellpadding='0'>
														<tbody>
															<tr>
																<td colspan='4' align='center'>&nbsp;</td>
															</tr>
															<tr>
																<td colspan='4' align='center'><h2 style='font-size:24px'>$infoclientee</h2></td>
															</tr>
															<tr>
																<td colspan='4'>&nbsp;</td>
															</tr>
															<tr>
																<td width='120' align='right' valign='top'><img src='http://deprixapro.jaom.info/icon-tracking.png' alt='tool' width='139' height='112'></td>
																<td width='30'></td>
																<td align='left' valign='middle'>
																	<h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>$estadodelenvio</h3>
																	<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
																	<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$_Tracking:</strong> <strong>$tracking</strong></div>
																	<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$estado</strong> <strong>$status</strong></div>
																	<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$NUEVAUBICACION</strong> <strong>$pick_time</strong></div>
																	<div style='line-height:10px;padding:0;margin:0'>&nbsp;</div>
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
																					<td align='center' style='margin:0;text-align:center'><a href='$web' style='font-size:18px;font-family:HelveticaNeue-Light,Arial,sans-serif;line-height:22px;text-decoration:none;color:#ffffff;font-weight:bold;border-radius:2px;background-color:#00a3df;padding:14px 40px;display:block' target='_blank'>Login!</a></td>
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
			alert(\"$actualizalinea ".$status."\");
			window.location = \"../../index.php\"
		</script>";
	} 
?>
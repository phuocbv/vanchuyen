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
	require_once('../../database.php');
	require_once('../../database-settings.php');
	require '../../requirelanguage.php';
	require_once('../../funciones.php');
	
	$fname = $_POST['fname'];
	$name = $fname;
	$cc = $_POST['cc'];
	$company = $_POST['company'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$telefono = $_POST['telefono'];
	$address=$_POST['address'];
	$country = $_POST['country'];
	$department = $_POST['department'];
	$state = $_POST['state'];
	$iso = $_POST['iso'];
	$zipcode = $_POST['zipcode'];
	$lang = $_POST['lang'];
	$estado = $_POST['estado'];
	$pass	= $_POST['pwd'];
	$pwdmd5	= md5(PASS_SALT.$_POST['pwd']); #pass with salt
	$imagen = $_POST['imagen'];
	$tipo_imagen = $_POST['tipo_imagen'];
	
	$pa=mysql_query("SELECT MAX(locker)as maximo FROM tbl_clients");				
	if($row=mysql_fetch_array($pa)){
		if($row['maximo']==NULL){
			$locker='100001';
		}else{
			$locker=$row['maximo']+1;
		}
	}

		
	$sql1 =mysql_query("SELECT * FROM tbl_clients WHERE email='$email'");
			if($rr=mysql_fetch_array($sql1)){
				
				 echo "<script type=\"text/javascript\">

						alert(\"$email This is registered as Mail, enter a different email, thanks.\");

						window.location = \"../../../signup.php\"

					</script>"; 							
			}else{
				$sql1 ="INSERT INTO tbl_clients (locker,name,cc,email,phone,telefono,address,pwd,company,country,department,state,iso,zipcode,lang,estado,date,imagen,tipo_imagen) VALUES 	
				('$locker','$name','0','$email','$phone','0','$address','$pwdmd5','$company','$country','none','$state','$zipcode','none','en_customer','1',curdate(),'$imagen','$tipo_imagen')";
			}
			
		dbQuery($sql1);
		
		
	
		$result1 =  mysql_query("SELECT * FROM company");
		while($row = mysql_fetch_array($result1)) {
			
			$to  = $row["bemail"];
			$address  = $row["caddress"];
			$namecompanie  = $row["cname"];
			$footer  = $row["footer_website"];
			$web  = $row["website"];
			$infolocker = $row["locker"];
			$dirslocker = $row["dirlocker"];
			$url = APP_URL."/logo-image/image_logo.php?id=1'";
			// subject
			
			$subject = ''.$welcometo.' '.$row["cname"].'';
			$from = $row["bemail"]; 
			
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
																		<td align='left' valign='middle' style='padding:0;margin:0;font-size:0;line-height:0'><a href='$web' target='_blank'><img src='$url' alt='DEPRIXA' ></a></td>
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
																			<p style='color:#404040;font-size:16px;line-height:24px;font-weight:lighter;padding:0;margin:0'>$hola <strong>$name</strong></p><br>
																			<p style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>
																			$calidawelcome</p>
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
																	<td colspan='4' align='center'><h2 style='font-size:24px'>Información de Casillero</h2></td>
																</tr>
																
																<tr>
																	<td width='120' align='right' valign='top'><img src='http://deprixapro.jaom.info/casillero.png' alt='tool' width='84' height='140'></td>
																	<td width='30'></td>
																	<td align='left' valign='middle'>
																		<h3 style='color:#404040;font-size:18px;line-height:24px;padding:0;margin:0'>$infolocker</h3>
																		<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
																		</br>
																		<div style='color:#FF4D4D;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$dirslocker</strong></div>
																		<div style='line-height:10px;padding:0;margin:0'>&nbsp;</div>
																	</td>
																	<td width='30'></td>
																</tr>
																</br>
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
																	<td width='120' align='right' valign='top'><img src='http://deprixapro.jaom.info/customer.png' alt='tool' width='59' height='108'></td>
																	<td width='30'></td>
																	<td align='left' valign='middle'>
																		<h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>$namecustomers:</h3>
																		<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$name</strong></div>
																		<div style='line-height:10px;padding:0;margin:0'>&nbsp;</div>
																	</td>
																	<td align='left' valign='middle'>
																		<h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>$lockerid:</h3>
																		<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$locker</strong></div>
																		<div style='line-height:10px;padding:0;margin:0'>&nbsp;</div>
																	</td>
																	<td width='30'></td>
																</tr>
																<tr>
																	<td colspan='5' height='40' style='padding:0;margin:0;font-size:0;line-height:0'></td>
																</tr>
																<tr>
																	<td width='120' align='right' valign='top'><img src='http://deprixapro.jaom.info/username.png' alt='no fees' width='46' height='45'></td>
																	<td width='30'></td>
																	<td align='left' valign='middle'>
																		<h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>$placeuser:</h3>
																		<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$email</strong></div>
																		<div style='line-height:10px;padding:0;margin:0'>&nbsp;</div>
																	</td>
																	<td width='30'></td>
																</tr>
																<tr>
																	<td colspan='5' height='40' style='padding:0;margin:0;font-size:0;line-height:0'></td>
																</tr>
																<tr>
																	<td width='120' align='right' valign='top'><img src='http://deprixapro.jaom.info/password.png' alt='creditibility' width='46' height='45' class='CToWUd'></td>
																	<td width='30'></td>
																	<td align='left' valign='middle'>
																		<h3 style='color:#404040;font-size:18px;line-height:24px;font-weight:bold;padding:0;margin:0'>$password:</h3>
																		<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$pass</strong></div>
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
																						<td align='center' style='margin:0;text-align:center'><a href='$web' style='font-size:18px;font-family:HelveticaNeue-Light,Arial,sans-serif;line-height:22px;text-decoration:none;color:#ffffff;font-weight:bold;border-radius:2px;background-color:#00a3df;padding:14px 40px;display:block' target='_blank'>$L_clientsntry</a></td>
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
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>$hola $name $estaes <br /><br /> <strong> $address $porfavor</div>
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
		
		$para  = ''.$email.''; 
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
		
	}
	
	$pa=mysql_query("SELECT MAX(locker)as maximo FROM tbl_clients");				
	if($row=mysql_fetch_array($pa)){
		if($row['maximo']==NULL){
			$locker='100001';
		}else{
			$locker=$row['maximo']+1;
		}
	}

	$fname = $_POST['fname'];
	$name = $fname;
	$shipname_cc = $_POST['shipname_cc'];
	$locker = $_POST['locker'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address=$_POST['address'];
	$country = $_POST['country'];	
	$state = $_POST['state'];
	$iso = $_POST['iso'];
	$zipcode = $_POST['zipcode'];
	$note = $_POST['note'];	
	$name_delivery = $_POST['name_delivery'];
	$Receivercc = $_POST['Receivercc'];
	$email_delivery = $_POST['email_delivery'];
	$phone_delivery = $_POST['phone_delivery'];
	$phone_delivery2 = $_POST['phone_delivery2'];
	$address_delivery = $_POST['address_delivery'];
	$company_delivery = $_POST['company_delivery'];
	$scountry = $_POST['scountry'];
	$sstate = $_POST['sstate'];
	$iso1 = $_POST['iso1'];
	$zipcode1 = $_POST['zipcode1'];
	$type = $_POST['type'];
	$service = $_POST['service'];
	$Qnty = $_POST['Qnty'];
	$weight = $_POST['weight'];
	$height = $_POST['height'];
	$width = $_POST['width'];
	$length = $_POST['length'];
	$courier_name = $_POST['courier_name'];
	$freight = $_POST['freight'];
	$booking_date = $_POST['booking_date'];
	$datedelivery = $_POST['datedelivery'];
	$status = $_POST['status'];
	$reasons = $_POST['reasons'];
	$delivery = $_POST['delivery'];
	$tracking = $_POST['tracking'];
	$officename = $_POST['officename'];
	

	$sql = "INSERT INTO online_booking (name,shipname_cc,locker,email,phone,address,country,state,iso,zipcode,note,name_delivery,Receivercc,email_delivery,company_delivery,address_delivery,phone_delivery,phone_delivery2,scountry,iso1,sstate,zipcode1,type,service,courier_name,freight, Qnty,width,height,weight,length,booking_date,collection_date,status,reasons,delivery,tracking,officename)

			VALUES ('$name','0','$locker','$email','$phone','$address','$country','$state','none','$zipcode','$note','$name_delivery','0','$email_delivery','$company_delivery','$address_delivery','$phone_delivery','0','$scountry','none','$sstate','0','$type','$service','$courier_name','$freight','0','$width','$height','$weight','$length',NOW(),'$datedelivery','Pending','none','none','0','$officename')";						

	dbQuery($sql);
	
	require '../../requirelanguage.php';
	$result1 =  mysql_query("SELECT * FROM company");
	while($row = mysql_fetch_array($result1)) {
	
		$to  = $row["bemail"];
		$address  = $row["caddress"];
		$namecompanie  = $row["cname"];
		$footer  = $row["footer_website"];
		$web  = $row["website"];
		$url = APP_URL."/logo-image/image_logo.php?id=1'";

		// subject

		$subject = ''.$NOTYONLINE.' | '.$row["cname"].'';
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
																			<p style='color:#404040;font-size:16px;line-height:24px;font-weight:lighter;padding:0;margin:0'>Hello <strong>$name</strong></p><br>
																			<p style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>
																			$CUANDOAPPROVE:</p><br>
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
																	<td colspan='4' align='center'><h2 style='font-size:24px'>$NOTYONLINE</h2></td>
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
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$de:</strong> $country | $state</div>
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$a:</strong> $scountry | $sstate</strong></div>
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$DELIVERYTYPE:</strong> <strong>$type</strong></div>
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$NAMESERVICE:</strong> <strong>$service</strong></div>
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$deliverystatus:</strong> $status</div>
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>$cantidad: <strong> $Qnty</strong>&nbsp;&nbsp;Peso: <strong> $weight</strong></div>
																		<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'><strong>$DetallesdelEnvio:</strong> <strong>$note</strong></div>
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
																						<td align='center' style='margin:0;text-align:center'><a href='$web' style='font-size:18px;font-family:HelveticaNeue-Light,Arial,sans-serif;line-height:22px;text-decoration:none;color:#ffffff;font-weight:bold;border-radius:2px;background-color:#00a3df;padding:14px 40px;display:block' target='_blank'>$tracking!</a></td>
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
																		<div style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>$hola $name $estaes <br /><br /> <strong> $address $porfavor</div>
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

		$para  = ''.$email.''; 
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
				alert(\"$_POST[fname] Thank you for registering and booking with us\");
				window.location = \"../../../index.php\"
			</script>";	 
	}
	
   ?>
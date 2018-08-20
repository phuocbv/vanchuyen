<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Contact form</title> <!-- Aquí va el título de la página -->

</head>
<body>
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

	//It captures the form fields

	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Subjects = $_POST["Subjects"];
	$Message = $_POST['Message'];

	if ($Name=='' || $Email=='' || $Subjects=='' || $Message==''){ // If it is missing a piece of information in the form mandara an alert to the user.

	echo "<script>alert('The fields marked with * are mandatory');location.href ='javascript:history.back()';</script>";

	}else{

		require_once('../dashboard/database.php');

		$result =  mysql_query("SELECT * FROM company");
		while($row = mysql_fetch_array($result)) {
		
			$sendmail  		= $row["bemail"];

			//It captures the form fields

			$Name = $_POST['Name'];
			$Email = $_POST['Email'];
			$Subjects = $_POST["Subjects"];
			$Message = $_POST['Message'];
			
			$message  = "<html><body>";
			$message .= "<table width='100%' bgcolor='#f6f8f1' border='0' cellpadding='0' cellspacing='0'>
							<tr>
							  <td>   
								<table bgcolor='#ffffff' class='content' align='center' cellpadding='0' cellspacing='0' border='0'>
								  <tr>
									<td class='innerpadding borderbottom'>
									  <table width='100%' border='0' cellspacing='0' cellpadding='0'>
										<tr>
										  <td class='h2'>
											$Subjects
										  </td>
										</tr>
										</br>
										<tr>
										  <td  class='h2'>
											<strong>Name Client:</strong> $Name
										  </td>
										</tr>
										<tr>
										  <td  class='h2'>
											<strong>Email Client:</strong> $Email
										  </td>
										</tr>
									  </table>
									</td>
								  </tr>
								  </br></br>
								  <tr>
									<td class='innerpadding borderbottom'>
									   <table width='115' align='left' border='0' cellpadding='0' cellspacing='0'>  
										<tr>
										  <td class='bodycopy'>
											<strong>Message:</stromng>
										  </td>
										</tr>
									  </table>
									  <table class='col380' align='left' border='0' cellpadding='0' cellspacing='0' style='width: 100%; max-width: 380px;'>  
										<tr>
										  <td>
											<table width='100%' border='0' cellspacing='0' cellpadding='0'>
											  <tr>
												<td class='bodycopy'>
												  $Message
												</td>
											  </tr>
											</table>
										  </td>
										</tr>
									  </table>
									</td>
								  </tr>
								</table>
								</td>
							  </tr>
							</table>";
			$message .= "</body></html>";	

			$para  = ''.$sendmail.''; 
			$titulo = ''.$Subjects.'';
			$mensaje ="".$message."";
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";			
			
			$tipocorreos=explode('@',$para);

			if ($tipocorreos['1']=='gmail.com'){
				
				// Additional headers for gmail
				$cabeceras .= "From: ".$Name."" . "\r\n";
			}
			else {
				// Additional headers for hotmail and others
				$cabeceras .= 'From: '.$Name.' || '.$Email.'' . "\r\n";
			}
			
			mail($para, $titulo, $mensaje, $cabeceras);
			
			echo "<script>alert('Formulario enviado exitosamente, le responderemos lo más pronto posible.');
					window.location = \"../contact\"
				 </script>";
		}
	}
?>
</body>
</html>
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
	$conn = conexion();
	
	$id						= $_POST['id'];	
	$tra_parcel0			= $_POST['tra_parcel0'];
	$tra_parcel1			= $_POST['tra_parcel1'];
	$tra_parcel2			= $_POST['tra_parcel2'];
	$tra_parcel3			= $_POST['tra_parcel3'];	
	$tra_parcel4			= $_POST['tra_parcel4'];
	$tra_parcel5			= $_POST['tra_parcel5'];
	$tra_parcel6			= $_POST['tra_parcel6'];
	$tra_parcel7			= $_POST['tra_parcel7'];
	$tra_parcel8			= $_POST['tra_parcel8'];
	$tra_parcel9			= $_POST['tra_parcel9'];
	$tra_parcel10 			= $_POST['tra_parcel10'];
	$tra_parcel11			= $_POST['tra_parcel11'];	
	$tra_parcel12			= $_POST['tra_parcel12'];
	$tra_parcel13			= $_POST['tra_parcel13'];
	$tra_parcel14			= $_POST['tra_parcel14'];
	$tra_parcel15			= $_POST['tra_parcel15'];
	$tra_parcel16			= $_POST['tra_parcel16'];	
	$tra_parcel17			= $_POST['tra_parcel17'];
	$tra_parcel18			= $_POST['tra_parcel18'];
	$tra_parcel19			= $_POST['tra_parcel19'];
	$tra_parcel20			= $_POST['tra_parcel20'];	
	$tra_parcel21			= $_POST['tra_parcel21'];
	$tra_parcel22			= $_POST['tra_parcel22'];	
	$tra_parcel23			= $_POST['tra_parcel23'];
	$tra_parcel24			= $_POST['tra_parcel24'];
	$tra_parcel25			= $_POST['tra_parcel25'];
	$tra_parcel26			= $_POST['tra_parcel26'];
	$tra_parcel27			= $_POST['tra_parcel27'];
	$tra_parcel28			= $_POST['tra_parcel28'];
	$tra_parcel29			= $_POST['tra_parcel29'];
	$tra_parcel30			= $_POST['tra_parcel30'];
	$tra_parcel31			= $_POST['tra_parcel31'];
	

	$sql = "UPDATE  w_trackresult SET 
	
							tra_parcel0='$tra_parcel0', 
							tra_parcel1='$tra_parcel1', 
							tra_parcel2='$tra_parcel2', 
							tra_parcel3='$tra_parcel3', 
							tra_parcel4='$tra_parcel4', 
							tra_parcel5='$tra_parcel5', 
							tra_parcel6='$tra_parcel6',
							tra_parcel7='$tra_parcel7', 
							tra_parcel8='$tra_parcel8', 
							tra_parcel9='$tra_parcel9', 
							tra_parcel10='$tra_parcel10', 
							tra_parcel11='$tra_parcel11', 
							tra_parcel12='$tra_parcel12', 
							tra_parcel13='$tra_parcel13', 
							tra_parcel14='$tra_parcel14',
							tra_parcel15='$tra_parcel15',
							tra_parcel16='$tra_parcel16', 
							tra_parcel17='$tra_parcel17', 
							tra_parcel18='$tra_parcel18', 
							tra_parcel19='$tra_parcel19',
							tra_parcel20='$tra_parcel20',
							tra_parcel21='$tra_parcel21',
							tra_parcel22='$tra_parcel22', 
							tra_parcel23='$tra_parcel23', 
							tra_parcel24='$tra_parcel24', 
							tra_parcel25='$tra_parcel25',
							tra_parcel26='$tra_parcel26',
							tra_parcel27='$tra_parcel27',
							tra_parcel28='$tra_parcel28',
							tra_parcel29='$tra_parcel29',
							tra_parcel30='$tra_parcel30',
							tra_parcel31='$tra_parcel31'
							
							WHERE id='1'";


	if ($conn->query($sql) === TRUE) {
		echo "<script type=\"text/javascript\">
			alert(\"Many thank you for your update.\");
			window.location = \"../../d_home.php\"
		</script>"; 
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();
	
	
 
	
?>
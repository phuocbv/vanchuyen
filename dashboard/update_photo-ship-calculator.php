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
session_start();
require_once('database.php');


	$cid			=$_POST['cid'];
	$id_photo 		= $_POST['cid'];
	$name_courier 	= $_POST['name_courier'];
	$services 		= $_POST['services'];
	$shipping_day 	= $_POST['shipping_day'];
	$rate1 			= $_POST['rate1'];
	$Weight 		= $_POST['Weight'];
	$WeightType 	= $_POST['WeightType'];

	$rutaEnServidor='img/imagescalculator';
	$rutaTemporal=$_FILES['imagen']['tmp_name'];
	$nombreImagen=$_FILES['imagen']['name'];
	$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
	move_uploaded_file($rutaTemporal,$rutaDestino);
	
	$sql = "UPDATE scheduledpickup SET name_courier='$name_courier', services='$services', shipping_day='$shipping_day', rate1='$rate1',
									   Weight='$Weight', WeightType='$WeightType', ruta_imagen = '$rutaDestino' WHERE cid='$id_photo'";
	$res = mysql_query($sql);


	if ($res){
		echo "<script type=\"text/javascript\">
				alert(\"Thank you very much for your update.\");
				window.location = \"shipping-charge.php\"
			</script>";
	}else{
		echo '<script type=\"text/javascript\">
				alert(\"The image could not be loade.\");
				window.location = \"shipping-charge.php\"
			</script>';
	} 

    
?>
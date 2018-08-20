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


	$cid=$_POST['cid'];
	$id_photo = $_POST['tracking'];

	$rutaEnServidor='img/uploadsphoto';
	$rutaTemporal=$_FILES['imagen']['tmp_name'];
	$nombreImagen=$_FILES['imagen']['name'];
	$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
	move_uploaded_file($rutaTemporal,$rutaDestino);
	
	$sql = "UPDATE courier SET ruta_imagen = '$rutaDestino' WHERE tracking='$id_photo'";
	$res = mysql_query($sql);
	
	$sql_1 = "UPDATE courier_customer SET ruta_imagen = '$rutaDestino' WHERE tracking='$id_photo'";
	$res = mysql_query($sql_1);
	
	$sql_2 = "UPDATE courier_online SET ruta_imagen = '$rutaDestino' WHERE cons_no='$id_photo'";
	$res = mysql_query($sql_2);

	if ($res){
		echo "<script type=\"text/javascript\">
				alert(\"Thank you very much for your update.\");
				window.location = \"index.php\"
			</script>";
	}else{
		echo '<script type=\"text/javascript\">
				alert(\"The image could not be loade.\");
				window.location = \"index.php\"
			</script>';
	} 

    
?>
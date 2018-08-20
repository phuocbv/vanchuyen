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
require_once('../database.php');
require_once('../library.php');
require_once('../funciones.php');
require '../requirelanguage.php';
require '../requirelanguage_image.php';

if($_SESSION['user_type']=='client'){
		
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		} else {
		   echo "<script type=\"text/javascript\">
					alert(\"This page is for registered users only.\");
					window.location = \"../../signup.php\"
				</script>";	
		exit;
		}
		
		$now = time();
		if($now > $_SESSION['expire']) {
		session_destroy();
		
		 echo "<script type=\"text/javascript\">
					alert(\"Your session has ended.\");
					window.location = \"../../login.php\"
				</script>";	
		exit;
	}
	
}else{
	header('Location: ../../404.php');
}

date_default_timezone_set($_SESSION['ge_timezone']);
$styling=mysql_fetch_array(mysql_query("SELECT * FROM styles"));
$qname = $_SESSION['user_name']; 
$fechai=date('Y-m-d');
$fechaf=date('Y-m-d');

ob_end_flush();												 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $_SESSION['ge_cname']; ?> | <?php echo $L_['paymenthistory']; ?></title>
  <meta name="description" content="<?php echo $_SESSION['ge_description']; ?>"/>
  <meta name="keywords" content="<?php echo $_SESSION['ge_keywords']; ?>" />
  <meta name="author" content="Jaomweb">	
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  
  <link rel="shortcut icon" type="image/png" href="../logo-image/image_logo.php?id=2"/>

  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../../bower_components/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../../bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />
  
  <!-- Style Status -->
  <style><?php echo $styling['style']; ?></style>

</head>
<body>
<?php
include("header.php");
?>
  
 <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">      
<div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="
    app.settings.asideFolded = false; 
    app.settings.asideDock = false;
  ">
  <!-- main -->
  <div class="col">
    <!-- main header -->
    <div class="bg-light lter b-b wrapper-md">

    </div>
    <!-- / main header -->
    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">

      <!-- service -->
      <div class="panel hbox hbox-auto-xs no-border">

		<div class="col-sm-12">
			<div class="card-box table-responsive">
					<h4 class="header-title m-t-0 m-b-20"><?php echo $L_['paymenthistory']; ?></h4>
				<table border="0" align="center">
					<tr>				
						<td><strong>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rangofecha; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><i class="icon-append fa fa-calendar"></i>&nbsp;&nbsp;<input type="date" id="bd-desde" class="gentxt1" value="<?php echo $fechai; ?>"/></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $A; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><i class="icon-append fa fa-calendar"></i>&nbsp;&nbsp;<input type="date" id="bd-hasta" class="gentxt1" value="<?php echo $fechaf; ?>"/></td>
						
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a target="_blank" href="javascript:reportpayhistoryPDF();"><img src="../img/pdf.png" alt="x" border="0" height="35" width="26" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a target="_blank" href="javascript:reportpayhistoryEXCEL();"><img src="../img/excel.png" alt="x" border="0" height="35" width="26" /></a>
						</td>
					</tr>
				</table>
				</br>
				   <table ui-jq="dataTable" ui-options="" class="table table-striped b-t b-b">			  
					<thead>
					  <tr>					  
						  <th><?php echo $L_['dateinvoice']; ?></th>
						  <th><?php echo $L_['paydate']; ?></th>
						  <th><?php echo $L_['numbertracking']; ?></th>
						  <th><?php echo $L_['detailhistory']; ?></th>
						  <th><?php echo $L_['customernumber']; ?></th>
						  <th><?php echo $L_['paymodehistory']; ?></th>
						  <th><?php echo $L_['paidhistory']; ?></th>
						  <th><?php echo $L_['paidstatus']; ?></th>
					  </tr>
					</thead>

					<tbody>
					<?php 

						$initial = 0; // Empezar a contar desde 0
						$result3 = mysql_query("SELECT * FROM accounting WHERE email='$qname' AND payment='OK' ORDER BY cid");
						while($row = mysql_fetch_array($result3)) {	

						$initial = $initial + $row['shipping_subtotal'];
					?> 
					  <tr>							  
						  <td><?php echo $row['book_date']; ?></td>		  					  
						  <td><?php echo $row['paymentdate']; ?></td>
						  <td><font color="#000"><?php echo $row['tracking']; ?></font></td>
						  <td><?php echo $row['comments']; ?></td>
						  <td><?php echo $row['ship_name']; ?></td>
						  <td><?php echo $row['book_mode']; ?></td>
						  <td style="text-align: right;"><?php echo $_SESSION['ge_curr']; ?> <?php echo $row['shipping_subtotal']; ?></td> 
						  <td align="center"><span class="label <?php echo $row['payment']; ?> label-large"><?php echo $row['payment']; ?></span></td>     
					  </tr>
						<?php } ?>	
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6" style="text-align: right;" rowspan="1">
								<b>Grand Total</b>
							</td>
							<td style="text-align: right;" rowspan="1" colspan="1">
								<b><?php echo $_SESSION['ge_curr']; ?> <?php echo $initial; ?></b>
							</td>
						</tr>
					</tfoot>	
				</table>    

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

<?php
include("../footer.php");
?>

</div>

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="../js/ui-load.js"></script>
<script src="../js/ui-jp.config.js"></script>
<script src="../js/ui-jp.js"></script>
<script src="../js/ui-nav.js"></script>
<script src="../js/ui-toggle.js"></script>
<script src="../js/reportetopay.js"></script>
<script src="../js/reportetopayship.js"></script>

</body>
</html>

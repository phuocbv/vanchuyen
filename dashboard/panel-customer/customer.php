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
require_once('../library.php');
require_once('../database.php');
require_once('../funciones.php');
require '../requirelanguage.php';

if($_SESSION['user_type']=='client'){
		
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		} else {
		   echo "<script type=\"text/javascript\">
					alert(\"This page is for registered users only.\");
					window.location = \"../../signup\"
				</script>";	
		exit;
		}
		
		$now = time();
		if($now > $_SESSION['expire']) {
		session_destroy();
		
		 echo "<script type=\"text/javascript\">
					alert(\"Your session has ended.\");
					window.location = \"../../login\"
				</script>";	
		exit;
	}
	
}else{
	header('Location: ../../404');
}

date_default_timezone_set($_SESSION['ge_timezone']);
$cons = $_POST['cons'];
$qname = $_SESSION['user_name']; 

$styling=mysql_fetch_array(mysql_query("SELECT * FROM styles")); 
ob_end_flush();													 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $_SESSION['ge_cname']; ?> | <?php echo $Paneladministracioncliente; ?></title>
  <meta name="description" content="<?php echo $_SESSION['ge_description']; ?>"/>
  <meta name="keywords" content="<?php echo $_SESSION['ge_keywords']; ?>" />
  <meta name="author" content="Jaomweb">	
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  
  <link rel="shortcut icon" type="image/png" href="../logo-image/image_logo.php?id=2"/>
  
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../../bower_components/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../../bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />
  <script type="text/javascript" charset="utf8">
  $(document).ready(function () {
        $('#grid').DataTable();
    });
	</script>	
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

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
      <div class="row">
        <div class="col-sm-6 col-xs-12">
          <h1 class="m-n font-thin h3 text-black"><?php echo $dashboard; ?></h1>
          <small class="text-muted"><?php echo $bienvenidosa; ?> <?php echo $_SESSION['ge_cname']; ?></small>
        </div>        
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
      <!-- stats -->
      <div class="row">
        <div class="col-md-4">
          <div class="row row-sm text-center">
			<div class="col-xs-12">
				<div class="inline" align="center">
				<?php  					
					$result3 = mysql_query("SELECT * FROM tbl_clients WHERE  email='".$_SESSION["user_name"]."' ");
					while($row = mysql_fetch_array($result3)) {					
				?> 
				<div ui-jq="easyPieChart" ui-options="{
						percent: 100,
						lineWidth: 5,
						trackColor: '#e8eff0',
						barColor: '#23b7e5',
						scaleColor: false,
						color: '#3a3f51',
						size: 134,
						lineCap: 'butt',
						rotate: -90,
						animate: 1000
					  }">
					<div class="thumb-xl">
					  <img src="../logo-image/imagen-customer.php?id=<?php echo $row['id']; ?>" class="img-circle" alt="...">
					</div>
				</div>
					<div class="h4 m-t m-b-xs"><?php echo $row['name']; ?></div>
					<small class="text-muted m-b"><?php echo $L_['lockerid']; ?>: <font color="#FAD733"><?php echo $row['locker']; ?></font></small>
				</div> 
				<?php } ?>
            </div>         
            <div class="col-xs-6">
			<?php
				// Always first connect to the database mysql
				$sql = "SELECT * FROM online_booking WHERE  status = 'Pending' AND email='".$_SESSION["user_name"]."'";  // sentence sql
				$result = mysql_query($sql);
				$numero1 = mysql_num_rows($result); // get the number of rows
			?>
              <div class="panel padder-v item">
                <div class="h1 text-info font-thin h1"><?php echo $numero1; ?></div>
                <span class="text-muted text-xs"><?php echo $enviopendiente; ?></span>
                <div class="top text-right w-full">
                  <i class="fa icon-plane text-warning m-r-sm"></i>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <a href class="block panel padder-v bg-info item">
                <span class="text-white font-thin h1 block">
				<?php
				$result = mysql_query("SELECT SUM(shipping_subtotal) as total FROM courier_customer WHERE  correo='".$_SESSION["user_name"]."' AND payment='Pending'");   
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				echo $s.formato($row["total"]);	
				
				?></span>
                <span class="text-muted text-xs"><?php echo $totalfactura; ?></span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-money text-muted m-r-sm"></i>
                </span>
              </a>
            </div>              
          </div>
        </div>
        <div class="col-md-5">
          <div class="panel wrapper">

		<h1 class="m-n font-thin h3 text-black"><?php echo $reservaonline; ?></h1>
          <small class="text-muted"><?php echo $heredetail; ?></small>
        
			<div class="table-responsive">
			  <table  ui-jq="dataTable" class="table table-striped b-t b-b">
				<thead>
					<tr>
					  <th><?php echo $fechareserva; ?></th>
					  <th><?php echo $de; ?></th>  
					  <th><?php echo $a; ?></th>
					  <th><?php echo $detalles; ?></th>
					  <th><?php echo $estado; ?></th> 			  
					</tr>
				</thead>
				<tbody>
					<?php  					
					   $result3 = mysql_query("SELECT * FROM online_booking  where email='$qname' AND status='Pending'");
						while($row = mysql_fetch_array($result3)) {							
					?>  
					<tr>
						<td><?php echo $row ["booking_date"]; ?></td>
						<td><?php echo $row ["state"]; ?>,<?php echo $row ["country"]; ?>.</td>
						<td><?php echo $row ["sstate"]; ?>,<?php echo  $row ["scountry"]; ?>.<br></td>
						<td><?php echo $row ["note"]; ?></td>
						<td><span class="label <?php echo $row['status']; ?> label-large"><?php echo $row['status']; ?></span></td>
					</tr>
					<?php } ?>	
				</tbody>
			  </table>
			</div>
          </div>
        </div>
		
		
		<div class="col-md-3">
			<div class="panel wrapper">
				<h4><i class="fa fa-cubes"></i>&nbsp;&nbsp;<?php echo $enviosrecientes; ?></a></h4>
				<div class="table-responsive">
					<table  class="table table-striped m-b-none">
						<thead>
							<tr>
								<th><?php echo $tracking; ?></th>
								<th><?php echo $fecha; ?></th>
								<th><?php echo $estado; ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$result5 = mysql_query("SELECT c.cid, c.cons_no,c.date, c.email, 
								s.color,s.servicemode, c.status FROM courier_online c, service_mode s  
								WHERE LEFT(date, 10) = CURDATE() AND s.servicemode = c.status AND c.email='$qname' ORDER BY c.cid DESC");
								while($row = mysql_fetch_array($result5)) {				
							?>  
							<tr>
								<td><font color="#000"><?php echo $row['cons_no']; ?></font></td>
								<td><font color="#000"><?php echo $row['date']; ?></font></td>								
								<td><span style="background: #<?php echo $row['color']; ?>;"  class="label label-large" ><?php echo $row['status']; ?></span></td> 
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div> 
			</div>
		</div>
	</div>
      <!-- / stats -->
	  
	  <!-- service courier-->
      <div class="panel hbox hbox-auto-xs no-border">
        <div class="col wrapper">
           <h1 class="m-n font-thin h3 text-black"><?php echo $estadoaprobadosonline; ?></h1>
          <small class="text-muted"><?php echo $listaenvios; ?></small>
			<div class="table-responsive">
				<table  ui-jq="dataTable" class="table table-striped b-t b-b">
					<thead>
					  <tr>
						  <th><?php echo $PAYING; ?></th>
						  <th></th>
						  <th><?php echo $tracking; ?></th>
						  <th><?php echo $modopago; ?></th>
						  <th><?php echo $L_['lockerid']; ?></th>
						  <th><?php echo $remitente; ?></th>
						  <th><?php echo $destinatario; ?></th>
						  <th><?php echo $fechaenvio; ?></th>
						  <th><?php echo $estadodelenvio; ?></th>
						  <th>Image of shipping</th>
					  </tr>
					</thead>

					<tbody>
					  <tr>
						<?php
							//$result3 = mysql_query("SELECT * FROM courier WHERE status != 'delivered' ORDER BY cid DESC");
							$result3 = mysql_query("SELECT f.cid, f.tracking, f.book_mode, f.shipping_subtotal, f.correo, f.locker,f.ship_name, f.rev_name, f.pick_date, g.color, f.status,f.ruta_imagen
										FROM courier_customer f, service_mode g
										WHERE g.servicemode = f.status
										AND f.status != 'delivered'
										AND f.correo='$qname'
										ORDER BY f.cid DESC");

							while($row = mysql_fetch_array($result3)) {
								$ruta_imagen=$row['ruta_imagen'];
						?>		
						  <td align="center"><a href="paybill.php"><img src="images/paybill.png"  height="28" width="34"></a></td>
						  <td align="center"><a target="_blank" href="../print-invoice/invoice-print.php?cid=<?php echo codificar($row['cid']); ?>">
						  <i class="glyphicon glyphicon-print icon text-dark-lter"></a></td>							  						  
						  <td><font color="#000"><?php echo $row['tracking']; ?></font></td>
						  <td><span class="label <?php echo $row['book_mode']; ?> label-large"><?php echo $row['book_mode']; ?></span></td> 
						  <td><?php echo $row ["locker"]; ?></td>
						  <td><?php echo $row['ship_name']; ?></td>
						  <td><?php echo $row['rev_name']; ?></td>
						  <td><?php echo $row['pick_date']; ?></td>
						  <td><span style="background: #<?php echo $row['color']; ?>;"  class="label label-large" ><?php echo $row['status']; ?></span>
						  </td>						  
						  <td><p><a href="#" class="alternar-respuesta"><img src="images/search_photo.png" border="0" height="28" width="50"></p></a>
							  <p class="respuesta" style="display:none">
							  <img onclick="javascript:this.width=500;this.height=400" ondblclick="javascript:this.width=100;this.height=80" src="../<?php echo $ruta_imagen; ?>" width="100"/></p>
						  </td>	
					  </tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
        </div>
      </div>
      <!-- / service -->
    </div>
  </div>
  <!-- / main -->
</div>
	</div>
  </div>
  <!-- /content -->


  <!-- footer -->
 <?php
include("../footer.php");
?>
  <!-- / footer -->

</div>

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="../js/ui-load.js"></script>
<script src="../js/ui-jp.config.js"></script>
<script src="../js/ui-jp.js"></script>
<script src="../js/ui-nav.js"></script>
<script src="../js/ui-toggle.js"></script>
<script>
	// jQuery
$(document).ready(function(){ 
	$('.alternar-respuesta').on('click',function(e){
		$(this).parent().next().toggle();
		e.preventDefault();
	});
	$('#alternar-todo').on('click',function(e){
		$('.respuesta').toggle('slow');
		e.preventDefault();
	});
});
</script>
<script type="text/javascript" charset="utf8" src="../js/jquery.dataTables.js"></script>


</body>
</html>

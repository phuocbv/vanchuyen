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
require_once('database.php');
require_once('library.php');
require 'requirelanguage.php';
require_once('funciones.php');

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
    header('Location: ../404');
}

date_default_timezone_set($_SESSION['ge_timezone']);

if ($_POST['cons'] == "") {
    $cid = $_GET['cid'];
    $cid = decodificar($cid);
    $sql = "SELECT * FROM courier WHERE cid ='$cid'";
} else {
    $posted = $_POST['cons'];
    $sql = "SELECT * FROM courier WHERE cons_no ='$posted'";
}
$result = dbQuery($sql);
$count = mysql_num_rows($result);
if ($count > 0) {

    while ($data = dbFetchAssoc($result)) {
        //get list tracking
        $sqGetListTracking = "SELECT * FROM tracking_number WHERE cons_no ='" . $data['cons_no'] . "'";
        $listTrackingQuery = dbQuery($sqGetListTracking);
        $listTracking = array();

        while ($row = mysql_fetch_array($listTrackingQuery)) {
            array_push($listTracking, $row);
        }

        extract($data);
        ob_end_flush();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8"/>
            <title><?php echo $_SESSION['ge_cname']; ?> | <?php echo $editarenvio; ?></title>
            <meta name="description" content="<?php echo $_SESSION['ge_description']; ?>"/>
            <meta name="keywords" content="<?php echo $_SESSION['ge_keywords']; ?>"/>
            <meta name="author" content="Jaomweb">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

            <link rel="shortcut icon" type="image/png" href="logo-image/image_logo.php?id=2"/>

            <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" type="text/css"/>
            <link rel="stylesheet" href="../bower_components/animate.css/animate.css" type="text/css"/>
            <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css" type="text/css"/>
            <link rel="stylesheet" href="../bower_components/simple-line-icons/css/simple-line-icons.css"
                  type="text/css"/>
            <link rel="stylesheet" href="css/font.css" type="text/css"/>
            <link rel="stylesheet" href="css/app.css" type="text/css"/>

            <!-- Required - Form style -->
            <!--  <script type= "text/javascript" src="../process/countries.js"></script> -->

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
        <div class="col wrapper">
        <div class="row">
        <div class="col-xs-12 col-lg-12 col-xl-7">
            <div class="card-box">
                <div class="text-xs-center">
                    <tbody>
                    <h3 class="classic-title"><span><strong><i class="fa fa-truck icon text-default-lter"></i>&nbsp;&nbsp;<?php echo $actualizarenvio; ?></strong>
                    </h3>
                    <!-- START Checkout form -->

                    <form action="settings/add_courier/update.php" name="formulario" method="post">
                        <table border="0" align="center" width="100%">

                            <!-- START Presonal information -->
                            <fieldset class="col-md-6">
                                <legend><strong><?php echo $datosremite; ?></strong></legend>
                                <!-- Name -->
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label class="control-label"><i class="fa fa-user icon text-default-lter"></i>&nbsp;<?php echo $StaffRole; ?>
                                            <span class="required-field">*</span></label>
                                        <input type="text" name="officename" id="officename"
                                               value="<?php echo $_SESSION['user_type']; ?>" class="form-control"
                                               readonly="true">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="control-label"><i class="fa fa-user icon text-default-lter"></i>&nbsp;<?php echo $StaffUser; ?>
                                            <span class="required-field">*</span></label>
                                        <input type="text" name="user" id="user"
                                               value="<?php echo $_SESSION['user_name']; ?>" class="form-control"
                                               readonly="true">
                                    </div>
                                    <div class="col-sm-6 form-group">

                                        <label class="control-label"><?php echo $NOMBREREMITENTE; ?><span
                                                    class="required-field">*</span></label>
                                        <input type="text" name="Shippername" class="form-control" autocomplete="off"
                                               required value="<?php echo $ship_name; ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-5 form-group">
                                        <label class="control-label"><?php echo $DIRECCION; ?><span
                                                    class="required-field">*</span></label>
                                        <input type="text" name="Shipperaddress" class="form-control" required
                                               value="<?php echo $s_add; ?>">
                                    </div>

                                    <div class="col-sm-3 form-group">
                                        <label class="control-label"><i class="fa fa-phone icon text-default-lter"></i>&nbsp;<?php echo $TELEFONO; ?>
                                        </label>
                                        <input type="text" class="form-control" name="Shipperphone" required
                                               value="<?php echo $phone; ?>">
                                    </div>

                                    <div class="col-sm-4 form-group">
                                        <label class="control-label"><?php echo $CEDULA; ?></i></label>
                                        <input type="text" name="Shippercc" class="form-control"
                                               value="<?php echo $cc; ?>" required>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-info"><i
                                                    class="fa fa-angle-double-right icon text-default-lter"></i>&nbsp;<strong><?php echo $PAISORIGEN; ?></strong></label>
                                        <input name="Pickuptime" value="<?php echo $pick_time; ?>" class="form-control">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-info"><strong><?php echo $L_STATE; ?></strong></label>
                                        <input type="text" value="<?php echo $state; ?>" name="state"
                                               class="form-control">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-info"><strong><?php echo $CIUDAD; ?></strong></label>
                                        <input type="text" value="<?php echo $ciudad; ?>" name="ciudad"
                                               class="form-control">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-info"><strong><?php echo $CODIGO; ?></strong></label>
                                        <input name="iso" value="<?php echo $iso; ?>" class="form-control">
                                    </div>
                                </div>

                                <!-- Adress and Phone -->

                                <!-- START Shipment information -->

                                <legend><strong><?php echo $Informaciondeenvio; ?></strong></legend>

                                <!-- Country and state -->
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label class="control-label"><i
                                                    class="fa fa-database icon text-default-lter"></i>&nbsp;<strong><?php echo $Pagos; ?></strong></label>
                                        <input name="Bookingmode" class="form-control" id="Bookingmode"
                                               value="<?php echo $book_mode; ?>" readonly="true">

                                    </div>

                                    <div class="col-sm-5 form-group">
                                        <label class="control-label"><?php echo $TipodeProducto; ?></label>
                                        <input name="Shiptype" class="form-control" id="Shiptype"
                                               value="<?php echo $type; ?>">

                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label class="control-label"><i class="fa fa-plane icon text-default-lter"></i>&nbsp;<?php echo $MododelServicio; ?>
                                        </label>
                                        <input name="Mode" class="form-control" id="Mode" value="<?php echo $mode; ?>">

                                    </div>
                                </div>
                                <!-- Qnty -->
                                <div class="row">

                                    <!-- Origin Office -->

                                    <div class="col-sm-3 form-group">
                                        <label><?php echo $CantidadPaquetes; ?></label>
                                        <input type="text" class="form-control" name="Qnty"
                                               value="<?php echo $qty; ?>"/>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="zipcode" class="control-label"><i
                                                    class="fa fa-angle-double-right icon text-default-lter"></i>&nbsp;<?php echo $OFICINAORIGEN; ?>
                                        </label>
                                        <input name="Invoiceno" id="Invoiceno" class="form-control"
                                               value="<?php echo $invice_no; ?>">

                                    </div>
                                    <!-- Destination Office -->
                                    <div class="col-sm-5 form-group">
                                        <label for="zipcode" class="control-label"><i
                                                    class="fa fa-angle-double-right icon text-default-lter"></i>&nbsp;<?php echo $OFICINADESTINO; ?>
                                        </label>
                                        <input name="Pickuptime" id="Pickuptime" class="form-control"
                                               value="<?php echo $pick_time; ?>">

                                    </div>
                                </div>

                                <!-- List Tracking -->
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label class="control-label"><?php echo $L_TRACKING; ?></label>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="control-label"><?php echo $L_WEIGHT; ?></label>
                                    </div>
                                </div>

                                <div class="tracking">
                                    <?php
                                    $sum = 0;
                                    foreach ($listTracking as $tracking) {
                                        $sum += $tracking['weight'];
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-3 form-group">
                                                <input type="text" class="form-control" name="tracking[]"
                                                       value="<?php echo $tracking['tracking']; ?>"/>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <input type="number" class="form-control weight" name="weight[]"
                                                       value="<?php echo $tracking['weight']; ?>"/>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3 form-group" align="right">
                                        <label class="control-label"><?php echo $L_SUM; ?></label>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="control-label" id="sum_weight"><?php echo $sum . ' kg'; ?></label>
                                    </div>
                                </div>
                                <!-- List Tracking -->

                                <!-- Payment Mode -->
                                <input type="hidden" id="sum2" name="Totaldeclarate" class="form-control"
                                       value="<?php echo $declarate; ?>"/>
                                <input type="hidden" class="form-control" name="pesoreal"
                                       value="<?php echo $pesoreal; ?>"/>

                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label class="text-success"><?php echo $_SESSION['ge_curr']; ?> 1 Kg</label>
                                        <input type="number" id="sum1" class="form-control" name="variable"
                                               value="<?php echo $variable; ?>"/>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-success"><?php echo $PesoKg; ?></label>
                                        <input type="number" id="sum4" class="form-control" name="Weight"
                                               value="<?php echo $weight; ?>"/>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-success">Phụ phí</label>
                                        <input type="number" id="sum7" name="Totaldeclarado" class="form-control"
                                               value="<?php echo $declarado; ?>"/>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-success">Subtotal 1</label>
                                        <input type="text" name="" value="<?php echo $variable * $weight + $declarado?>" disabled id="sum8"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label class="text-danger"><?php echo $Altura; ?></label>
                                        <input type="number" id="volume1" class="form-control" name="altura"
                                               value="<?php echo $altura; ?>"/>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-danger"><?php echo $Ancho; ?></label>
                                        <input type="number" id="volume2" class="form-control" name="ancho"
                                               value="<?php echo $ancho; ?>"/>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="ccv"
                                               class="text-danger"><?php echo $Longitud; ?></strong></i></label>
                                        <input type="number" id="volume3" class="form-control"
                                               name="longitud" value="<?php echo $longitud; ?>"/>
                                    </div>
                                </div>
                                <?php $totalpeso = $altura * $ancho * $longitud;?>
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label class="text-success"><?php echo $_SESSION['ge_curr']; ?> 1 m3</label>
                                        <input type="number" id="volume4" class="form-control" name="Totalfreight"
                                               value="<?php echo $freight; ?>"/>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-success"><?php echo $TotalPesoVolumetrico; ?></i></label>
                                        <input type="text" class="form-control" name="totalpeso" id="totalpeso"
                                               value="<?php echo $totalpeso; ?>" disabled/>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-success">Phụ phí</label>
                                        <input type="number" id="volume5" class="form-control" name="kiloadicional"
                                               value="<?php echo $kiloadicional; ?>"/>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-success">Subtotal 2</label>
                                        <input type="text" class="form-control" value="<?php echo $freight * $totalpeso + $kiloadicional?>" disabled id="sum9"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 form-group" align="right">
                                        <label class="text-success"><strong>Subtotal Shipping</strong></label>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <input type="text" class="form-control" value="<?php echo $shipping_subtotal; ?>" disabled id="resultado"/>
                                        <input type="hidden" class="form-control" value="<?php echo $shipping_subtotal; ?>" name="shipping_subtotal" id="shipping_subtotal"/>
                                    </div>
                                </div>

                                <!-- Payment Mode -->

                                <div class="row">
                                    <!-- Text area -->
                                    <div class="col-sm-12 form-group">
                                        <label for="inputTextarea" class="control-label"><i
                                                    class="fa fa-comments icon text-default-lter"></i>&nbsp;<?php echo $DetallesdelEnvio; ?>
                                        </label>
                                        <input class="form-control" name="Comments" id="Comments"
                                               value="<?php echo $comments; ?>">
                                    </div>
                                </div>
                            </fieldset>


                            <!-- START Receiver info  -->
                            <fieldset class="col-md-6">
                                <legend><strong><?php echo $DatosDestinatario; ?></strong></legend>
                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-sm-12 form-group">
                                        <label class="control-label"><?php echo $NOMBREDESTINATARIO; ?><span
                                                    class="required-field">*</span></label>
                                        <input type="text" class="form-control" name="Receivername"
                                               value="<?php echo $rev_name; ?>">

                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="control-label"><?php echo $DIRECCION; ?><span
                                                    class="required-field">*</span></label>
                                        <input type="text" name="Receiveraddress" class="form-control" required
                                               value="<?php echo $r_add; ?>">
                                    </div>

                                    <div class="col-sm-3 form-group">
                                        <label class="control-label"><i class="fa fa-phone icon text-default-lter"></i>&nbsp;<?php echo $TELEFONO; ?>
                                        </label>
                                        <input type="text" class="form-control" name="Receiverphone" required
                                               value="<?php echo $r_phone; ?>">
                                    </div>

                                    <div class="col-sm-3 form-group">
                                        <label class="control-label"><i class="fa fa-phone icon text-default-lter"></i>&nbsp;<?php echo $TELEFONO2; ?>
                                        </label>
                                        <input type="tel" class="form-control" name="telefono1" id="telefono1"
                                               autocomplete="off" required value="<?php echo $telefono1; ?>">
                                    </div>

                                    <div class="col-sm-3 form-group">
                                        <label class="control-label"><?php echo $CEDULA; ?></i></label>
                                        <input type="text" name="Receivercc_r" id="Receivercc_r" class="form-control"
                                               value="<?php echo $cc_r; ?>" autocomplete="off" required>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-info"><i
                                                    class="fa fa-angle-double-right icon text-default-lter"></i>&nbsp;<strong><?php echo $PAISDESTINO; ?></strong></label>
                                        <input name="paisdestino" class="form-control"
                                               value="<?php echo $paisdestino; ?>">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-info"><strong><?php echo $L_STATE; ?></strong></label>
                                        <input type="text" class="form-control" name="state1"
                                               value="<?php echo $state1; ?>">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-info"><strong><?php echo $CIUDAD; ?></strong></label>
                                        <input type="text" class="form-control" name="city1"
                                               value="<?php echo $city1; ?>">
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="text-info"><strong><?php echo $CODIGO; ?></strong></label>
                                        <input name="iso1" class="form-control" value="<?php echo $iso1; ?>">
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label class="control-label"><?php echo $EMAIL; ?><font
                                                    color="#FF6100"><?php echo $notaemail; ?></font></i></label>
                                        <input type="text" name="Receiveremail" id="Receiveremail" class="form-control"
                                               value="<?php echo $email; ?>" required readonly="true">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-sm-12 form-group">
                                        <label for="name-card"
                                               class="text-success"><strong><?php echo $NUMEROENVIO; ?></strong></label>
                                        <input type="text" class="form-control"
                                               value="<?php echo $letra; ?>-<?php echo $cons_no; ?>" id="ConsignmentNo"
                                               readonly="true"/>
                                    </div>

                                    <!-- Status and Pickup Date -->
                                    <div class="col-sm-12 form-group">
                                        <label for="dtp_input1" class="control-label"><i
                                                    class="fa fa-calendar icon text-default-lter"></i>&nbsp;<?php echo $FECHARECOLECCIONENVIO; ?></i>
                                        </label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="Packupdate"
                                                       value="<?php echo $pick_date; ?>" id="datepicker-autoclose"
                                                       readonly="true">
                                                <span class="input-group-addon bg-custom b-0"><i
                                                            class="glyphicon glyphicon-calendar"></i></span>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5 form-group">
                                        <label for="month" class="control-label"><i
                                                    class="fa fa-sort-amount-asc icon text-default-lter"></i>&nbsp;<?php echo $estado; ?>
                                        </label>
                                        <input class="form-control" name="status" id="status"
                                               value="<?php echo $status; ?>" readonly="true">
                                    </div>
                                    <div class="col-sm-7 form-group">
                                        <label for="dtp_input1" class="control-label"><i
                                                    class="fa fa-calendar icon text-default-lter"></i>&nbsp;<?php echo $FechadeEntrega; ?></i>
                                        </label>
                                        <div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="Schedule"
                                                       value="<?php echo $schedule; ?>" id="datepicker">
                                                <span class="input-group-addon bg-custom b-0"><i
                                                            class="glyphicon glyphicon-calendar"></i></span>
                                            </div><!-- input-group -->
                                        </div>

                            </fieldset>
                            <div class="col-sm-12 form-group">
                                <br>
                                <br>
                                <input class="btn btn-success" name="Submit" type="submit" id="submit"
                                       value="<?php echo $ACTUALIZARENVIO; ?>">
                                <input name="cid" id="cid" value="<?php echo $cid; ?>" type="hidden">
                            </div>
                </div>
            </div>
        </div>
        </table>
        </form>
        </tbody>

    <?php } ?>
    </div>

    <div class="col-xs-12 col-lg-12 col-xl-5">
        <div class="card-box">
            <div class="table-responsive">
                <br><br><br>
                <h4 class="header-title m-t-0 m-b-30"><?php echo $HISTORIALDEENVIOS; ?></h4>
                <br>
                <table ui-jq="dataTable" ui-options="" class="table table-striped b-t b-b">
                    <thead>
                    <tr>
                        <th><?php echo $_Tracking; ?></th>
                        <th><?php echo $NUEVAUBICACION; ?></th>
                        <th><?php echo $estado; ?></th>
                        <th><?php echo $FechayTiempo; ?></th>
                        <th><?php echo $Observaciones; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $result3 = mysql_query("SELECT c.id, c.cid, c.tracking, c.pick_time, c.status, c.bk_time,
																								c.comments, s.color FROM courier_track c, service_mode s WHERE c.cid = '$cid' and s.servicemode = c.status ORDER BY c.bk_time");
                    while ($row = mysql_fetch_array($result3)) {
                        ?>
                        <tr>
                            <td><?php echo $row['tracking']; ?></td>
                            <td><?php echo $row['pick_time']; ?></td>
                            <td><span style="background: #<?php echo $row['color']; ?>;"
                                      class="label label-large"><?php echo $row['status']; ?></span>
                            <td><?php echo $row['bk_time']; ?></td>
                            <td><?php echo $row['comments']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- end col-->
    </div>
    </div><!-- end col-->
    </div>
    <!-- end row -->
    </div>
    </div>
    </div>
</div>
    </div>
    </div>
    <!-- / content -->

    <?php
    include("footer.php");
    ?>

    </div>

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/ui-load.js"></script>
    <script src="js/ui-jp.config.js"></script>
    <script src="js/ui-jp.js"></script>
    <script src="js/ui-nav.js"></script>
    <script src="js/ui-toggle.js"></script>
    <script src="js/ui-client.js"></script>

    <script src="assets/plugins/moment/moment.js"></script>
    <script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="assets/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/plugins/clockpicker/bootstrap-clockpicker.js"></script>
    <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="assets/pages/jquery.form-pickers.init.js"></script>

    <script>
        var sum1 = $('#sum1');//VND 1kg
        var sum4 = $('#sum4');//weight kg
        var sum7 = $('#sum7');//phu phi
        var sum8 = $('#sum8');//subtotal 1
        var volume4 = $('#volume4');//VND m3
        var totalpeso = $('#totalpeso');//the tich
        var volume5 = $('#volume5');//phu phi
        var sum9 = $('#sum9');//subtotal 2
        var volume1 = $('#volume1');//height
        var volume2 = $('#volume2');//width
        var volume3 = $('#volume3');//length
        var subtotal_shipping = $('#resultado');//subtotal shipping
        var total = $('#shipping_subtotal');//subtotal shipping

        $(document).ready(function () {
//            $('.custom-select').fancySelect(); // Custom select
            $('[data-toggle="tooltip"]').tooltip() // Tooltip
            var tracking = $('.tracking');
            var sumWeight = $('#sum_weight');
//keyup blur
            tracking.on('click', '.weight', function () {
                console.log('ok');
                var inputWeight = $('.tracking .weight');
                var count = 0;
                var i = 0;
                inputWeight.each(function () {
                    var weight = $(this).val();
                    if (weight !== "NaN") {
                        i++;
                        count += parseInt(weight) > 0 ? parseInt(weight) : 0;
                    }
                });
                sumWeight.html(count + ' kg');
            });

            sum1.on('keyup blur', function () {
                var current = $(this);
                var sum = 0;
                if (current.val() === "" || sum4.val() === "") {
                    if (sum7.val() !== "")  {
                        sum = parseFloat(sum7.val());
                    }
                } else {
                    sum = parseFloat(current.val()) * parseFloat(sum4.val());
                    if (sum7.val() !== "") {
                        sum += parseFloat(sum7.val());
                    }
                }
                sum8.val(sum);
                subtotal_shipping.val((sum + parseFloat(sum9.val())));
                total.val(sum + parseFloat(sum9.val()));
            });

            sum4.on('keyup blur', function () {
                var current = $(this);
                var sum = 0;
                if (current.val() === "" || sum1.val() === "") {
                    if (sum7.val() !== "")  {
                        sum = parseFloat(sum7.val());
                    }
                } else {
                    sum = parseFloat(current.val()) * parseFloat(sum1.val());
                    if (sum7.val() !== "") {
                        sum += parseFloat(sum7.val());
                    }
                }
                sum8.val(sum);
                subtotal_shipping.val((sum + parseFloat(sum9.val())));
                total.val(sum + parseFloat(sum9.val()));
            });

            sum7.on('keyup blur', function () {
                var current = $(this);
                var sum = 0;
                if (sum4.val() === "" || sum1.val() === "") {
                    if (current.val() !== "")  {
                        sum = parseFloat(current.val());
                    }
                } else {
                    sum = parseFloat(sum4.val()) * parseFloat(sum1.val());
                    if (current.val() !== "") {
                        sum += parseFloat(current.val());
                    }
                }
                sum8.val(sum);
                subtotal_shipping.val((sum + parseFloat(sum9.val())));
                total.val((sum + parseFloat(sum9.val())));
            });

            volume1.on('keyup blur', function () {
                var current = $(this);
                var sum = 0;
                if (current.val() !== "" && volume2.val() !== "" && volume3.val() !== "") {
                    sum = parseInt(current.val()) * parseInt(volume2.val()) * parseInt(volume3.val());
                }
                var sum_1 = 0;
                if (volume4.val() === "") {
                    if (volume5.val() !== "") {
                        sum_1 = parseFloat(volume5.val());
                    }
                } else {
                    sum_1 += sum * parseFloat(volume4.val());
                    if (volume5.val() !== "") {
                        sum_1 += parseFloat(volume5.val());
                    }
                }

                totalpeso.val(sum);
                sum9.val(sum_1);
                subtotal_shipping.val((sum_1 + parseFloat(sum8.val())));
                total.val((sum_1 + parseFloat(sum8.val())));
            });

            volume2.on('keyup blur', function () {
                var current = $(this);
                var sum = 0;
                if (current.val() !== "" && volume1.val() !== "" && volume3.val() !== "") {
                    sum = parseInt(current.val()) * parseInt(volume1.val()) * parseInt(volume3.val());
                }
                var sum_1 = 0;
                if (volume4.val() === "") {
                    if (volume5.val() !== "") {
                        sum_1 = parseFloat(volume5.val());
                    }
                } else {
                    sum_1 += sum * parseFloat(volume4.val());
                    if (volume5.val() !== "") {
                        sum_1 += parseFloat(volume5.val());
                    }
                }
                totalpeso.val(sum);
                sum9.val(sum_1);
                subtotal_shipping.val((sum_1 + parseFloat(sum8.val())));
                total.val((sum_1 + parseFloat(sum8.val())));
            });

            volume3.on('keyup blur', function () {
                var current = $(this);
                var sum = 0;
                if (current.val() !== "" && volume2.val() !== "" && volume1.val() !== "") {
                    sum = parseInt(current.val()) * parseInt(volume2.val()) * parseInt(volume1.val());
                }
                var sum_1 = 0;
                if (volume4.val() === "") {
                    if (volume5.val() !== "") {
                        sum_1 = parseFloat(volume5.val());
                    }
                } else {
                    sum_1 += sum * parseFloat(volume4.val());
                    if (volume5.val() !== "") {
                        sum_1 += parseFloat(volume5.val());
                    }
                }
                totalpeso.val(sum);
                sum9.val(sum_1);
                subtotal_shipping.val((sum_1 + parseFloat(sum8.val())));
                total.val((sum_1 + parseFloat(sum8.val())));
            });

            volume4.on('keyup blur', function () {
                var current = $(this);
                var sum = 0;
                if (current.val() === "") {
                    if (volume5.val() !== "") {
                        sum = parseFloat(volume5.val());
                    }
                } else {
                    sum = parseFloat(current.val()) * parseInt(totalpeso.val());
                    if (volume5.val() !== "") {
                        sum += parseFloat(volume5.val());
                    }
                }
                sum9.val(sum);
                subtotal_shipping.val((sum + parseFloat(sum8.val())));
                total.val((sum + parseFloat(sum8.val())));
            });

            volume5.on('keyup blur', function () {
                var current = $(this);
                var sum = 0;
                if (current.val() !== "") {
                    sum += parseFloat(current.val());
                }
                if (volume4.val() !== "") {
                    sum +=  parseFloat(volume4.val()) * parseInt(totalpeso.val());
                }
                sum9.val(sum);
                subtotal_shipping.val((sum + parseFloat(sum8.val())));
                total.val((sum + parseFloat(sum8.val())));
            });
        });
    </script>
    <script language="javascript" type="text/javascript">
        function suma() {

            var sum1 = document.getElementById("sum1");
            var sum2 = document.getElementById("sum2");
            var sum3 = document.getElementById("sum3");
            var sum4 = document.getElementById("sum4");
            var sum5 = document.getElementById("sum5");
            var input = document.getElementById("resultado");
            resultado = parseInt(sum1.value) + parseInt(sum2.value * sum5.value / 100) + parseInt(sum3.value) + parseInt(sum4.value * 10 - 10);
            input.value = resultado;
        }

        function volumetrico() {

            var volume1 = document.getElementById("volume1");
            var volume2 = document.getElementById("volume2");
            var volume3 = document.getElementById("volume3");
            var input = document.getElementById("totalpeso");
            totalpeso = parseInt(volume1.value * volume2.value * volume3.value / 6000);
            input.value = totalpeso;
        }
    </script>
</body>
    </html>
<?php } ?>

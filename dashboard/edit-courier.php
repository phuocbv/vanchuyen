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
        $sqGetListTrackingKg = "SELECT * FROM tracking_number WHERE cons_no ='" . $data['cons_no'] . "' AND type='kg'";
        $listTrackingQuerykg = dbQuery($sqGetListTrackingKg);
        $listTrackingKg = array();

        while ($row = mysql_fetch_array($listTrackingQuerykg)) {
            array_push($listTrackingKg, $row);
        }

        $sqGetListTrackingM3 = "SELECT * FROM tracking_number WHERE cons_no ='" . $data['cons_no'] . "' AND type='m3'";
        $listTrackingQueryM3 = dbQuery($sqGetListTrackingM3);
        $listTrackingM3 = array();

        while ($row = mysql_fetch_array($listTrackingQueryM3)) {
            array_push($listTrackingM3, $row);
        }

        $sqlGetSubtotalOne = "SELECT * FROM subtotal_one WHERE tracking='" . $data['tracking'] . "' AND cons_no ='" . $data['cons_no'] . "'";
        $listSubtotalOneQuery = dbQuery($sqlGetSubtotalOne);
        $listSubtotalOne = array();
        while ($row = mysql_fetch_array($listSubtotalOneQuery)) {
            array_push($listSubtotalOne, $row);
        }

        $sqlGetSubtotalTwo = "SELECT * FROM subtotal_two WHERE tracking='" . $data['tracking'] . "' AND cons_no ='" . $data['cons_no'] . "'";
        $listSubtotalTwoQuery = dbQuery($sqlGetSubtotalTwo);
        $listSubtotalTwo = array();
        while ($row = mysql_fetch_array($listSubtotalTwoQuery)) {
            array_push($listSubtotalTwo, $row);
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
                                        <input type="text" class="form-control" name="Qnty" id="qnty"
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

                                <!--default value-->
                                <input type="hidden" class="form-control" name="Totaldeclarate" value="0"/>
                                <input type="hidden" class="form-control" name="pesoreal" value="0">
                                <input type="hidden" class="form-control" name="variable" value="0">
                                <input type="hidden" class="form-control" name="Weight" value="0">
                                <input type="hidden" class="form-control" name="Totaldeclarado" value="0">
                                <input type="hidden" class="form-control" name="altura" value="0">
                                <input type="hidden" class="form-control" name="ancho" value="0">
                                <input type="hidden" class="form-control" name="longitud" value="0">
                                <input type="hidden" class="form-control" name="Totalfreight" value="0">
                                <input type="hidden" class="form-control" name="kiloadicional" value="0">
                                <!--default value-->

                                <!-- List Tracking -->
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label class="control-label"><?php echo $L_TRACKING; ?></label>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label class="control-label"><?php echo $L_WEIGHT; ?></label>
                                    </div>
                                </div>

                                <div class="tracking " id="tracking">
                                    <?php
                                    $sum = 0;
                                    foreach ($listTrackingKg as $key => $tracking) {
                                        $sum += $tracking['weight'];
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-3 form-group">
                                                <input type="text" class="form-control" name="tracking[]"
                                                       value="<?php echo $tracking['tracking']; ?>"/>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <input type="text" class="form-control weight" name="weight[]"
                                                       value="<?php echo $tracking['weight']; ?>"/>
                                            </div>
                                            <?php if ($key == 0) { ?>
                                                <div class="col-sm-6 form-group">
                                                    <button class="btn btn-success"
                                                            id="btn_add_tracking_number" type="button">Add(kg)
                                                    </button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-6 form-group">
                                                    <button class="btn btn-danger delTrackingNumber" type="button">Del(kg)
                                                    </button>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <div id="add_show_tracking">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3 form-group" align="right">
                                        <label class="control-label"><?php echo $L_SUM . '(kg)'; ?></label>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <input type="text" class="form-control weight" disabled id="sumWeight"
                                               value="<?php echo $sum ?>"/>
                                    </div>
                                </div>

                                <div class="list_tracking_m3 " id="list_tracking_m3">
                                    <?php
                                    $sum = 0;
                                    foreach ($listTrackingM3 as $key => $tracking) {
                                        $sum += $tracking['weight'];
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-3 form-group">
                                                <input type="text" class="form-control" name="tracking_number_m3[]"
                                                       value="<?php echo $tracking['tracking']; ?>"/>
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <input type="text" class="form-control input_m3" name="m3[]"
                                                       value="<?php echo $tracking['weight']; ?>"/>
                                            </div>
                                            <?php if ($key == 0) { ?>
                                                <div class="col-sm-6 form-group">
                                                    <button class="btn btn-success"
                                                            id="btn_add_tracking_m3" type="button">Add(m3)
                                                    </button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-6 form-group">
                                                    <button class="btn btn-danger delTrackingNumberM3" type="button">Del(m3)
                                                    </button>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <div id="add_tracking_number_m3">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3 form-group" align="right">
                                        <label class="control-label">Tổng(m3)</label>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <input type="text" class="form-control weight" disabled id="sum_m3"
                                               value="<?php echo $sum ?>"/>
                                    </div>
                                </div>
                                <!-- List Tracking -->

                                <!-- Payment Mode -->
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

                            <fieldset class="col-md-12">
                                <!-- List subtotal one -->
                                <div id="caculator_list_caculator_1">
                                    <?php $sum = 0 ?>
                                    <?php foreach ($listSubtotalOne as $key => $value) { ?>
                                        <?php if ($key == 0) { ?>
                                            <div class="row del_subtotal_1">
                                                <div class="col-sm-2 form-group">
                                                    <label class="text-success">VND 1 Kg</label>
                                                    <input type="text" class="form-control sum1" name="sum1[]"
                                                           value="<?php echo $value['sum_1'] ?>"/>
                                                </div>
                                                <div class="col-sm-2 form-group">
                                                    <label class="text-success">Weight (Kg)</label>
                                                    <input type="text" class="form-control sum4" name="sum4[]"
                                                           value="<?php echo $value['sum_4'] ?>"/>
                                                </div>
                                                <div class="col-sm-2 form-group">
                                                    <label class="text-success">Phụ phí</label>
                                                    <input type="text" class="form-control sum7"
                                                           value="<?php echo $value['sum_7'] ?>" name="sum7[]"/>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="text-success">Subtotal 1</label>
                                                    <input type="text" name=""
                                                           value="<?php $sum += $value['sum_1'] * $value['sum_4'] + $value['sum_7'];
                                                           echo formatMoney($value['sum_1'] * $value['sum_4'] + $value['sum_7'], 0) ?>"
                                                           disabled
                                                           class="form-control sum8">
                                                </div>
                                                <div class="col-sm-3 form-group" style="padding-top: 25px">
                                                    <label class="text-success"></label>
                                                    <button class="btn btn-success" type="button" id="add_subtotal_1">
                                                        Add
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="row del_subtotal_1">
                                                <div class="col-sm-2 form-group">
                                                    <input type="text" class="form-control sum1" name="sum1[]"
                                                           value="<?php echo $value['sum_1'] ?>"/>
                                                </div>
                                                <div class="col-sm-2 form-group">
                                                    <input type="text" class="form-control sum4" name="sum4[]"
                                                           value="<?php echo $value['sum_4'] ?>"/>
                                                </div>
                                                <div class="col-sm-2 form-group">
                                                    <input type="text" class="form-control sum7"
                                                           value="<?php echo $value['sum_7'] ?>" name="sum7[]"/>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <input type="text" name=""
                                                           value="<?php $sum += $value['sum_1'] * $value['sum_4'] + $value['sum_7'];
                                                           echo formatMoney($value['sum_1'] * $value['sum_4'] + $value['sum_7'], 0) ?>"
                                                           disabled
                                                           class="form-control sum8">
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <button class="btn btn-danger btn_del_subtotal_1" type="button">
                                                        Del
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <div id="list_subtotal_1">

                                    </div>
                                </div>
                                <!-- List subtotal one -->

                                <!-- List subtotal two -->
                                <div id="caculator_list_caculator_2">
                                    <?php foreach ($listSubtotalTwo as $key => $value) { ?>
                                        <?php if ($key == 0) { ?>
                                            <div class="show_subtotal_2">
                                                <div class="row">
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">Height</label>
                                                        <input type="text" class="form-control volume1" name="volume1[]"
                                                               value="<?php echo $value['volume_1'] ?>"/>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">Width</label>
                                                        <input type="text" class="form-control volume2" name="volume2[]"
                                                               value="<?php echo $value['volume_2'] ?>"/>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">Length</label>
                                                        <input type="text" class="form-control volume3" name="volume3[]"
                                                               value="<?php echo $value['volume_3'] ?>"/>
                                                    </div>
                                                    <div class="col-sm-3 form-group" style="padding-top: 25px">
                                                        <label class="text-primary"></label>
                                                        <button class="btn btn-success" type="button"
                                                                id="add_subtotal_2">Add
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php
                                                $subtotal2 = str_replace(",", ".", $value['volume_1']) *
                                                    str_replace(",", ".", $value['volume_2']) *
                                                    str_replace(",", ".", $value['volume_3']) * $value['volume_4'] + $value['volume_5'];
                                                $sum += $subtotal2;
                                                ?>
                                                <!-- m3-->
                                                <div class="row">
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">VND 1 m3</label>
                                                        <input type="text" class="form-control volume4"
                                                               value="<?php echo $value['volume_4'] ?>"
                                                               name="volume4[]"/>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">Total (m3)</label>
                                                        <input type="text" class="form-control totalpeso"
                                                               name="totalpeso"
                                                               value="<?php echo str_replace(".", ",",str_replace(",", ".", $value['volume_1']) *
                                                                   str_replace(",", ".",$value['volume_2']) *
                                                                   str_replace(",", ".", $value['volume_3'])) ?>"
                                                               disabled/>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">Phụ phí</label>
                                                        <input type="text" class="form-control volume5"
                                                               value="<?php echo $value['volume_5'] ?>"
                                                               name="volume5[]"/>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">Subtotal 2</label>
                                                        <input type="text" class="form-control sum9"
                                                               value="<?php echo formatMoney($subtotal2, 0) ?>"
                                                               disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="show_subtotal_2">
                                                <div class="row">
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">Height</label>
                                                        <input type="text" class="form-control volume1" name="volume1[]"
                                                               value="<?php echo $value['volume_1'] ?>"/>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">Width</label>
                                                        <input type="text" class="form-control volume2" name="volume2[]"
                                                               value="<?php echo $value['volume_2'] ?>"/>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">Length</label>
                                                        <input type="text" class="form-control volume3" name="volume3[]"
                                                               value="<?php echo $value['volume_3'] ?>"/>
                                                    </div>
                                                    <div class="col-sm-3 form-group" style="padding-top: 25px">
                                                        <label class="text-primary"></label>
                                                        <button class="btn btn-danger btn_del_subtotal_2" type="button">
                                                            Del
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php
                                                $subtotal2 = str_replace(",", ".", $value['volume_1']) *
                                                    str_replace(",", ".", $value['volume_2']) *
                                                    str_replace(",", ".", $value['volume_3']) * $value['volume_4'] + $value['volume_5'];
                                                $sum += $subtotal2;
                                                ?>
                                                <!-- m3-->
                                                <div class="row">
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">VND 1 m3</label>
                                                        <input type="text" class="form-control volume4"
                                                               value="<?php echo $value['volume_4'] ?>"
                                                               name="volume4[]"/>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">Total (m3)</label>
                                                        <input type="text" class="form-control totalpeso"
                                                               name="totalpeso"
                                                               value="<?php echo str_replace(".", ",", str_replace(",", ".", $value['volume_1']) *
                                                                   str_replace(",", ".", $value['volume_2']) *
                                                                   str_replace(",", ".", $value['volume_3'])) ?>"
                                                               disabled/>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">Phụ phí</label>
                                                        <input type="text" class="form-control volume5"
                                                               value="<?php echo $value['volume_5'] ?>"
                                                               name="volume5[]"/>
                                                    </div>
                                                    <div class="col-sm-3 form-group">
                                                        <label class="text-primary">Subtotal 2</label>
                                                        <input type="text" class="form-control sum9"
                                                               value="<?php echo formatMoney($subtotal2, 0) ?>" disabled
                                                               id="sum9"/>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <div id="list_subtotal_2">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 form-group" align="right">
                                        <label class="text-primary"><strong>Subtotal Shipping</strong></label>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <input type="text" class="form-control"
                                               value="<?php echo formatMoney($sum, 0) ?>" disabled id="resultado"/>
                                        <input type="hidden" class="form-control" value="<?php echo $sum ?>"
                                               name="shipping_subtotal" id="shipping_subtotal"/>
                                    </div>
                                </div>
                                <!-- List subtotal one -->
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <button class="btn btn-success" id="caculator" type="button"
                                                style="width: 100%">Tính toán kết
                                            quả
                                        </button>
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
    <script src="js/simple.money.format.js"></script>

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
            $('.weight').simpleMoneyFormat();
            $('.sum1').simpleMoneyFormat();
            $('.sum4').simpleMoneyFormat();
            $('.sum7').simpleMoneyFormat();
//            $('.volume1').simpleMoneyFormat();
//            $('.volume2').simpleMoneyFormat();
//            $('.volume3').simpleMoneyFormat();
            $('.volume4').simpleMoneyFormat();
            $('.volume5').simpleMoneyFormat();

            var tracking = $('.tracking');
            var sumWeight = $('#sum_weight');
            var addShowTrackingNumber = $('#add_show_tracking');
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
            tracking.on('click', '.delTrackingNumber', function () {
                $(this).closest('.row').remove();
            });
            tracking.on('click', '#btn_add_tracking_number', function () {
                addShowTrackingNumber.append('<div class="row">\n' +
                    '                                            <div class="col-sm-3 form-group">\n' +
                    '                                                <input type="text" class="form-control" name="tracking[]"\n' +
                    '                                                       value=""/>\n' +
                    '                                            </div>\n' +
                    '                                            <div class="col-sm-3 form-group">\n' +
                    '                                                <input type="text" class="form-control weight" name="weight[]"\n' +
                    '                                                       value=""/>\n' +
                    '                                            </div>\n' +
                    '                                                <div class="col-sm-6 form-group">\n' +
                    '                                                    <button class="btn btn-danger delTrackingNumber" type="button">Del(kg)\n' +
                    '                                                    </button>\n' +
                    '                                                </div>\n');
                addShowTrackingNumber.find('.weight').simpleMoneyFormat();
            });

            $('#btn_add_tracking_m3').on('click', function () {
                $('#add_tracking_number_m3').append('<div class="row">\n' +
                    '                                            <div class="col-sm-3 form-group">\n' +
                    '                                                <input type="text" class="form-control" name="tracking_number_m3[]"/>\n'+
                    '                                            </div>\n' +
                    '                                            <div class="col-sm-3 form-group">\n' +
                    '                                                <input type="text" class="form-control input_m3" name="m3[]">\n' +
                    '                                            </div>\n' +
                    '                                                <div class="col-sm-6 form-group">\n' +
                    '                                                    <button class="btn btn-danger delTrackingNumberM3" type="button">Del(m3)\n' +
                    '                                                    </button>\n' +
                    '                                                </div>\n' +
                    '                                        </div>');
                $('#list_tracking_m3').find('.input_m3').simpleMoneyFormat();
            });

            $('#list_tracking_m3').on('click', '.delTrackingNumberM3', function () {
                $(this).closest('.row').remove();
            });

            $('#add_subtotal_2').on('click', function () {
                $('#list_subtotal_2').append('<div class="show_subtotal_2"><div class="row">\n' +
                    '                                                            <div class="col-sm-3 form-group">\n' +
                    '                                                                <label class="text-primary">Height</label>\n' +
                    '                                                                <input type="text" class="form-control volume1" name="volume1[]" value="0"/>\n' +
                    '                                                            </div>\n' +
                    '                                                            <div class="col-sm-3 form-group">\n' +
                    '                                                                <label class="text-primary">Width</label>\n' +
                    '                                                                <input type="text" class="form-control volume2" name="volume2[]" value="0"/>\n' +
                    '                                                            </div>\n' +
                    '                                                            <div class="col-sm-3 form-group">\n' +
                    '                                                                <label class="text-primary">Length</label>\n' +
                    '                                                                <input type="text" class="form-control volume3" name="volume3[]" value="0"/>\n' +
                    '                                                            </div>\n' +
                    '                                                            <div class="col-sm-3 form-group" style="padding-top: 25px">\n' +
                    '                                                                <label class="text-primary"></label>\n' +
                    '                                                                <button class="btn btn-danger btn_del_subtotal_2" type="button">Del\n' +
                    '                                                                </button>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div>\n' +
                    '\n' +
                    '                                                        <!-- m3-->\n' +
                    '                                                        <div class="row">\n' +
                    '                                                            <div class="col-sm-3 form-group">\n' +
                    '                                                                <label class="text-primary">VND 1 m3</label>\n' +
                    '                                                                <input type="text" class="form-control volume4" value="0" name="volume4[]"/>\n' +
                    '                                                            </div>\n' +
                    '                                                            <div class="col-sm-3 form-group">\n' +
                    '                                                                <label class="text-primary">Total (m3)</label>\n' +
                    '                                                                <input type="text" class="form-control totalpeso" name="totalpeso" value="0" disabled/>\n' +
                    '                                                            </div>\n' +
                    '                                                            <div class="col-sm-3 form-group">\n' +
                    '                                                                <label class="text-primary">Phụ phí</label>\n' +
                    '                                                                <input type="text" class="form-control volume5" value="0" name="volume5[]"/>\n' +
                    '                                                            </div>\n' +
                    '                                                            <div class="col-sm-3 form-group">\n' +
                    '                                                                <label class="text-primary">Subtotal 2</label>\n' +
                    '                                                                <input type="text" class="form-control sum9" value="0" disabled id="sum9"/>\n' +
                    '                                                            </div>\n' +
                    '                                                        </div></div>');
                $('#list_subtotal_2').find('.volume4').simpleMoneyFormat();
                $('#list_subtotal_2').find('.volume5').simpleMoneyFormat();
            });


            $('#caculator_list_caculator_2').on('click', '.btn_del_subtotal_2', function () {
                $(this).closest('.show_subtotal_2').remove();
            });
            $('#add_subtotal_1').on('click', function () {
                $('#list_subtotal_1').append('<div class="row del_subtotal_1"><div class="col-sm-2 form-group">\n' +
                    '<input type="text" class="form-control sum1" name="sum1[]" value="0"/>' +
                    '</div>\n' +
                    '<div class="col-sm-2 form-group">\n' +
                    '<input type="text" class="form-control sum4" name="sum4[]" value="0"/>\n' +
                    '</div>\n' +
                    '<div class="col-sm-2 form-group">\n' +
                    '<input type="text" class="form-control sum7" value="0" name="sum7[]"/>\n' +
                    '</div>\n' +
                    '<div class="col-sm-3 form-group">\n' +
                    '<input type="text" name="" value="0" disabled class="form-control sum8">\n' +
                    '</div>\n' +
                    '<div class="col-sm-3 form-group">\n' +
                    '<button class="btn btn-danger btn_del_subtotal_1" type="button">Del\n' +
                    '</button>\n' +
                    '</div></div>')
                $('#list_subtotal_1').find('.sum1').simpleMoneyFormat();
                $('#list_subtotal_1').find('.sum4').simpleMoneyFormat();
                $('#list_subtotal_1').find('.sum7').simpleMoneyFormat();
            });
            $('#caculator_list_caculator_1').on('click', '.btn_del_subtotal_1', function () {
                $(this).closest('.del_subtotal_1').remove();
            });

            $('#caculator').on('click', function () {
                var tong = 0;
                var count = 0;
                var trackingNumber = 0;
                var trackingM3 = 0;
                $('#tracking').find('.weight').each(function () {
                    var current = $(this);
                    if (current.val() !== "") {
                        count++;
                        trackingNumber += parseFloat(current.val().replace(/\./g, ''));
                    }
                });
                $('#list_tracking_m3').find('.input_m3').each(function () {
                    var current = $(this);
                    if (current.val() !== "") {
                        count++;
                        trackingM3 += parseFloat(current.val().replace(/\./g, ''));
                    }
                });
                $('#caculator_list_caculator_1').find('.del_subtotal_1').each(function () {
                    var current = $(this);
                    var subtotal_1 = parseFloat(current.find('.sum1').val().replace(/\./g, ''))
                        * parseFloat(current.find('.sum4').val().replace(/\./g, ''))
                        + parseFloat(current.find('.sum7').val().replace(/\./g, ''));
                    current.find('.sum8').val(subtotal_1.formatMoney(0, ',', '.'));
                    tong += subtotal_1;
                });
                $('#caculator_list_caculator_2').find('.show_subtotal_2').each(function () {
                    var current = $(this);
                    var the_tich = parseFloat(current.find('.volume1').val().replace(',', '.'))
                        * parseFloat(current.find('.volume2').val().replace(',', '.'))
                        * parseFloat(current.find('.volume3').val().replace(',', '.'));
                    current.find('.totalpeso').val(the_tich.toFixed(2).replace('.', ','));
                    var subtotal_2 = parseFloat(current.find('.volume4').val().replace(/\./g, ''))
                        * parseFloat(current.find('.totalpeso').val().replace(',', '.'))
                        + parseFloat(current.find('.volume5').val().replace(/\./g, ''));
                    current.find('.sum9').val(subtotal_2.formatMoney(0, ',', '.'));
                    tong += subtotal_2;
                });
                $('#sumWeight').val(trackingNumber.formatMoney(0, ',', '.'));
                $('#sum_m3').val(trackingM3.formatMoney(0, ',', '.'));
                $('#qnty').val(count);
                subtotal_shipping.val(tong.formatMoney(0, ',', '.'));
                total.val(tong);
            });
        });
        Number.prototype.formatMoney = function (c, d, t) {
            var n = this,
                c = isNaN(c = Math.abs(c)) ? 2 : c,
                d = d == undefined ? "." : d,
                t = t == undefined ? "," : t,
                s = n < 0 ? "-" : "",
                i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
                j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
        };

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

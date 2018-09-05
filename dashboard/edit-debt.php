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

$accounting = null;

if (isset($_POST['id'])) {
    $id = decodificar($_POST['id']);
    $debt = $_POST['debt'];
    $debt = str_replace(".", "", $debt);
    $sqlUpdateDebt = "UPDATE accounting SET pay = '$debt' WHERE cid = '$id'";
    dbQuery($sqlUpdateDebt);
    if ($_SESSION['user_type'] == 'Administrator') {
        header('Location: debt.php');
    } else if ($_SESSION['user_type'] == 'Employee') {
        header('Location: debt_employee.php');
    }
}

if (isset($_GET['id'])) {
    $account_id = decodificar($_GET['id']);
    $sqlSelectCost = "SELECT * FROM accounting WHERE cid='$account_id'";
    $result = dbQuery($sqlSelectCost);
    $count = mysql_num_rows($result);

    if ($count > 0) {
        while ($data = dbFetchAssoc($result)) {
            $accounting = $data;
        }
    }
}

date_default_timezone_set($_SESSION['ge_timezone']);

ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title><?php echo $_SESSION['ge_cname']; ?> | <?php echo $ENVIOS; ?></title>
    <meta name="description" content="<?php echo $_SESSION['ge_description']; ?>"/>
    <meta name="keywords" content="<?php echo $_SESSION['ge_keywords']; ?>"/>
    <meta name="author" content="Jaomweb">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <link rel="shortcut icon" type="image/png" href="logo-image/image_logo.php?id=2"/>

    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="../bower_components/animate.css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="../bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css"/>
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link rel="stylesheet" href="css/app.css" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" media="all">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>

    <!-- Switchery css -->
    <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>


    <!-- Plugins css -->
    <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.mobile.min.css"/>
    <link rel="stylesheet" href="css/jquery.auto-complete.css">
    <style>
        .error {
            font-size: 13px;
            color: red;
        }
    </style>

</head>
<body>
<?php
include("header.php");
?>

<!-- content -->
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="wrapper-md">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blog-post">
                        <div class="panel">
                            <div class="wrapper-lg">
                                <h3 class="classic-title"><span><strong><i
                                                    class="fa fa-truck icon text-default-lter"></i>&nbsp;&nbsp;Edit Debt</strong>
                                </h3>

                                <!-- START Checkout form -->
                                <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $_GET['id'] ?>" method="post">
                                    <table border="0" align="center" width="100%">
                                        <div class="row">
                                            <!-- START Cost information -->
                                            <fieldset class="col-md-6">
                                                <legend>Debt Data</legend>
                                                <input hidden name="id"
                                                       value="<?php echo codificar($accounting['cid']) ?>"/>
                                                <!-- Name -->
                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">&nbsp;Tracking: </label>
                                                        <label class="control-label">&nbsp;<?php echo $accounting['tracking'] ?></label>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">&nbsp;Name Client:</label>
                                                        <label class="control-label">&nbsp;<?php echo $accounting['ship_name'] ?></label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">&nbsp;Date: </label>
                                                        <label class="control-label">&nbsp;<?php echo $accounting['book_date'] ?></label>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">&nbsp;Revenue: </label>
                                                        <label class="control-label">&nbsp;<?php echo formato($accounting['shipping_subtotal']) ?></label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label">Pay</label>
                                                        <input type="text" class="form-control" name="debt"
                                                               required="required" id="pay"
                                                               value="<?php echo($accounting['pay']) ?>"/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="submit"
                                                                class="btn btn-large btn-success col-sm-12">Edit Debt
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- Adress and Phone -->
                                            </fieldset>
                                        </div>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / content -->
</body>
<?php include("footer.php"); ?>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="js/ui-load.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>
<script src="js/delivery.js"></script>

<script src="js/plugins/moment/moment.js"></script>
<script src="js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="js/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="js/plugins/clockpicker/bootstrap-clockpicker.js"></script>
<script src="js/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="js/jquery.form-pickers.init.js"></script>

<!-- App js -->
<script src="js/jquery.core.js"></script>
<script src="js/jquery.app.js"></script>

<script src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>
<!-- auto complate -->
<script src="js/jquery.auto-complete.min.js"></script>
<script src="js/simple.money.format.js"></script>
<script>
    $(function () {
        $('#pay').simpleMoneyFormat();
    });
</script>
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
$payForOther = null;
$user = null;

if (isset($_POST['id'])) {
    $id = decodificar($_POST['id']);
    $rate = str_replace(".", "", $_POST['rate']);
    $currency = str_replace(".", "", $_POST['currency']);
    $surcharge = str_replace(".", "", $_POST['surcharge']);
    $pay = $_POST['pay'];
    $pay = str_replace(".", "", $pay);

    if ($pay == '') {
        $pay = 0;
    }
    $date = date_create( $_POST['date']);
    $date = date_format($date,"Y/m/d");
    $content = $_POST['content'];

    $sqlUpdatePayForOther = "UPDATE pay_for_other SET date = '$date', exchange_rate = '$rate', 
        currency = '$currency', surcharge = '$surcharge', content = '$content', pay = '$pay' WHERE id = '$id'";
    dbQuery($sqlUpdatePayForOther);
    if ($_SESSION['user_type'] == 'Administrator') {
        header('Location: pay_for_other.php');
    } else if ($_SESSION['user_type'] == 'Employee') {
        header('Location: pay_for_other_employee.php');
    }

}

$date = '';
if (isset($_GET['id'])) {
    $id = decodificar($_GET['id']);
    $sqlSelectCost = "SELECT * FROM pay_for_other WHERE id='$id'";
    $result = dbQuery($sqlSelectCost);
    $count = mysql_num_rows($result);

    if ($count > 0) {
        while ($data = dbFetchAssoc($result)) {
            $payForOther = $data;
        }
    }

    $sqlSelectUser = "SELECT * FROM tbl_clients WHERE cc='" . $payForOther['client_id'] . "'";
    $resultUser = dbQuery($sqlSelectUser);
    $countUser = mysql_num_rows($resultUser);

    if ($countUser > 0) {
        while ($data = dbFetchAssoc($resultUser)) {
            $user = $data;
        }
    }
}
$date = $payForOther['date'];
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
                                                    class="fa fa-truck icon text-default-lter"></i>&nbsp;&nbsp;Add Pay For Orther</strong>
                                </h3>

                                <!-- START Checkout form -->
                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="formulario1">
                                    <table border="0" align="center" width="100%">
                                        <div class="row">
                                            <!-- START Cost information -->
                                            <legend>Pay For Orther Data</legend>
                                            <!-- Name -->
                                            <input type="hidden" value="<?php echo codificar($id); ?>" name="id">
                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">Client ID<span
                                                                class="required-field">*</span></label>
                                                    <input type="text" id="clientID" class="form-control" name="client_id" required autofocus disabled value="<?php echo $payForOther['client_id']?>"/>
                                                </div>
                                                <div class="col-sm-9 form-group">
                                                    <label class="control-label">Information Client</label>
                                                    <input type="text" id="infor_client" class="form-control" disabled="disabled"
                                                           value="<?php echo $user['cc'] . ' | ' . $user['name'] . ' | ' . $user['email'] . ' | ' . $user['phone']?>"/>
                                                </div>
                                                <input type="hidden" value="" name="clientID" id="client_id">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label"><i
                                                                class="fa fa-calendar icon text-default-lter"></i>Date<span
                                                                class="required-field">*</span></label>
                                                    <div class="demo-section k-content">
                                                        <input type="date" class="form-control" name="date"
                                                               id="datestimepicker" title="datestimepicker" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">Rate</label>
                                                    <input type="text" class="form-control" id="rate" name="rate" required="required" value="<?php echo $payForOther['exchange_rate']?>"/>
                                                </div>

                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">Currency</label>
                                                    <input type="text" class="form-control" id="currency" name="currency" required="required" value="<?php echo $payForOther['currency']?>"/>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">Surcharge</label>
                                                    <input type="text" class="form-control" id="surcharge" name="surcharge" required="required" value="<?php echo $payForOther['surcharge']?>"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label class="control-label">Pay</label>
                                                    <input type="text" class="form-control" id="pay" name="pay" value="<?php echo $payForOther['pay']?>"/>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label class="control-label">Content</label>
                                                    <input type="text" class="form-control" name="content" required="required" value="<?php echo $payForOther['content']?>"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-large btn-success col-sm-12">
                                                        Edit Pay For Other
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

<script src="js/kendo.all.min.js"></script>
<!-- auto complate -->
<script src="js/jquery.auto-complete.min.js"></script>
<script src="js/simple.money.format.js"></script>
<script>
    $(document).ready(function () {
        $('#pay').simpleMoneyFormat();
        $('#surcharge').simpleMoneyFormat();
        $('#rate').simpleMoneyFormat();
        $('#currency').simpleMoneyFormat();

        var clientID =  $('#clientID');

        $("#datestimepicker").kendoDateTimePicker({
            value: new Date('<?php echo $date?>'),
            dateInput: true
        });
        var ajaxListClient = $.ajax({
            type: 'POST',
            url: 'ajaxpais.php',
            data: 'list_client_ID=1'
        });
        ajaxListClient.done(function (data) {
            var listClientID = JSON.parse(data);
            clientID.autoComplete({
                minChars: 1,
                source: function(term, suggest){
                    term = term.toLowerCase();
                    var suggestions = [];
                    for (var i = 0; i < listClientID.length; i++)
                        if (~listClientID[i].toLowerCase().indexOf(term)) suggestions.push(listClientID[i]);
                    suggest(suggestions);
                }
            });
        });

        clientID.on('blur',function () {
            var clientID = this.value;
            getClientByID(clientID);
        });
        clientID.on('keyup',function () {
            var clientID = this.value;
            getClientByID(clientID);
        });
    });

    function getClientByID(clientID) {
        if (clientID) {
            $.ajax({
                type: 'POST',
                url: 'ajaxpais.php',
                data: 'clientID=' + clientID,
                success: function (json) {
                    var obj = JSON.parse(json);
                    $('#infor_client').val(obj.identification + ' | ' + obj.nombre + ' | ' + obj.email);
                    $('#client_id').val(obj.identification);
                }
            });
        }
    }
</script>

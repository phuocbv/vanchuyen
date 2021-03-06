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

if($_SESSION['user_type']=='Administrator' or $_SESSION['user_type']=='Employee'){

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
        echo "<script type=\"text/javascript\">
					alert(\"This page is for registered users only.\");
					window.location = \"../signup\"
				</script>";
        exit;
    }

    $now = time();
    if($now > $_SESSION['expire']) {
        session_destroy();

        echo "<script type=\"text/javascript\">
					alert(\"Your session has ended.\");
					window.location = \"../login\"
				</script>";
        exit;
    }

}else{
    header('Location: ../404');
}
$v_cost = false;
$v_content = false;

if (isset($_POST['cost'])) {
    $cost = $_POST['cost'];
    $content = $_POST['content'];
    $money = $_POST['money'];
    $user = $_SESSION['user_name'];
    $role = $_SESSION['user_type'];
    $date = date_create( $_POST['date']);
    $date = date_format($date,"Y/m/d");
    $money = str_replace(".","",$money);
    $sqlAddCost = "INSERT INTO cost (date, content, cost, money, user, role, create_date) VALUES ('$date' , '$content', '$cost', '$money', '$user', '$role', NOW())";
    dbQuery($sqlAddCost);
}

date_default_timezone_set($_SESSION['ge_timezone']);

ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $_SESSION['ge_cname']; ?> | <?php echo $ENVIOS; ?></title>
    <meta name="description" content="<?php echo $_SESSION['ge_description']; ?>"/>
    <meta name="keywords" content="<?php echo $_SESSION['ge_keywords']; ?>" />
    <meta name="author" content="Jaomweb">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="shortcut icon" type="image/png" href="logo-image/image_logo.php?id=2"/>

    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../bower_components/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="../bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link rel="stylesheet" href="css/app.css" type="text/css" />
    <link href="css/style.css" rel="stylesheet" media="all">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>

    <!-- Switchery css -->
    <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />


    <!-- Plugins css -->
    <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.mobile.min.css" />
    <link rel="stylesheet" href="css/jquery.auto-complete.css">
    <style>
        .error {
            font-size:13px;
            color:red;
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
                                <h3 class="classic-title"><span><strong><i class="fa fa-truck icon text-default-lter"></i>&nbsp;&nbsp;Add Cost</strong></h3>

                                <!-- START Checkout form -->
                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="formulario1" >
                                    <table border="0" align="center" width="100%" >
                                        <div class="row">
                                            <!-- START Cost information -->
                                            <fieldset class="col-md-6">
                                                <legend>Cost Data</legend>
                                                <!-- Name -->
                                                <div class="row" >
                                                    <div class="col-sm-6 form-group">
                                                        <label  class="control-label">&nbsp;Cost Name<span class="required-field">*</span></label>
                                                        <input type="text" class="form-control" name="cost" required/>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label  class="control-label"><i class="fa fa-calendar icon text-default-lter"></i>Date<span class="required-field">*</span></label>
                                                        <div class="demo-section k-content">
                                                            <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d')?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label  class="control-label">Content&nbsp;<?php if (true==true){?><span class="error"></span><?php }?></label>
                                                        <input type="text"  class="form-control" name="content" required="required" id="Shipperaddress" value=""/>
                                                    </div>

                                                    <div class="col-sm-6 form-group">
                                                        <label  class="control-label">&nbspMoney<?php if ($v2==true){?><span class="error"><em><?php echo $L_['mandatory']; ?></em></span><?php }?></label>
                                                        <input type="text" class="form-control" name="money" id="money" required="required"/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-large btn-success col-sm-12">Add Cost</button>
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
        // create DateTimePicker from input HTML element
//        $("#datestimepicker").kendoDateTimePicker({
//            value: new Date(),
//            dateInput: true
//        });
        $("#money").simpleMoneyFormat();
    });
</script>

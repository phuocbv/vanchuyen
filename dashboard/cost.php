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
require_once('funciones.php');
require_once('library.php');
require 'requirelanguage.php';

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
    header('Location:../404');
}

date_default_timezone_set($_SESSION['ge_timezone']);
$styling = mysql_fetch_array(mysql_query("SELECT * FROM styles"));

$meses = array('', 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sept', 'Oct', 'Nov', 'Dic');
for ($x = 1; $x <= 12; $x = $x + 1) {
    $dinero[$x] = 0;
}

$anno = date('Y');

$sql = mysql_query("SELECT * FROM courier");
while ($row = mysql_fetch_array($sql)) {
    $y = date("Y", strtotime($row['book_date']));

    $mes = (int)date("m", strtotime($row['book_date']));

    if ($y == $anno) {
        $dinero[$mes] = $dinero[$mes] + $row['shipping_subtotal'];
    }
}
for ($x = 1; $x <= 12; $x = $x + 1) {
    $dineros[$x] = 0;
}
$sql_1 = mysql_query("SELECT * FROM courier_online");
while ($row = mysql_fetch_array($sql_1)) {
    $y = date("Y", strtotime($row['date']));

    $mes = (int)date("m", strtotime($row['date']));

    if ($y == $anno) {
        $dineros[$mes] = $dineros[$mes] + $row['shipping_subtotal'];
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?php echo $_SESSION['ge_cname']; ?> | <?php echo $ADMINISTRACION; ?></title>
    <meta name="description" content="<?php echo $_SESSION['ge_description']; ?>"/>
    <meta name="keywords" content="<?php echo $_SESSION['ge_keywords']; ?>"/>
    <meta name="author" content="Jaomweb">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <link rel="shortcut icon" type="image/png" href="logo-image/image_logo.php?id=2"/>

    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="../bower_components/animate.css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="../bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css"/>
    <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link rel="stylesheet" href="css/app.css" type="text/css"/>
    <!-- Plugins css -->

    <script src="js/amcharts.js" type="text/javascript"></script>
    <script src="js/serial.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.mobile.min.css"/>
    <!-- Style Status -->
    <style><?php echo $styling['style']; ?></style>
</head>
<body>

<?php include("header.php"); ?>


<!-- content -->
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <!-- main -->
        <div class="col">
            <!-- main header -->
            <div class="bg-light lter b-b wrapper-md"></div>
            <!-- / main header -->
            <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">

                <!-- service -->
                <div class="panel hbox hbox-auto-xs no-border">
                    <div class="col wrapper">
                        <i class="fa fa-circle-o text-info m-r-sm pull-right"></i>
                        <h4><i class="icon-plane"></i>COST LIST</a></h4>
                        <br>
                        <div class="table-responsive">
                            <table ui-jq="dataTable" class="table table-striped b-t b-b">
                                <thead>
                                <tr>
                                    <?php
                                    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Administrator') {
                                        ?>
                                        <th>&nbsp;</th>
                                    <?php } ?>
                                    <th>&nbsp;</th>
                                    <th>Cost</th>
                                    <th>Date</th>
                                    <th>Content</th>
                                    <th>Money</th>
                                    <th>User</th>
                                    <th>Role</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <?php
                                    $result3 = mysql_query("SELECT * FROM cost");
                                    $sum_cost = 0;
                                    $sum_money = 0;
                                    while ($row = mysql_fetch_array($result3)) {
                                        $sum_cost += $row['cost'];
                                        $sum_money += $row['money'];
                                    ?>
                                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'Administrator') { ?>
                                        <td align="center">
                                            <a href="#" alt="Borrar Registro" onclick="del_list_admin(<?php echo $row['id']; ?>);">
                                                <img src="img/delete.png" height="20" width="18"></a></td>
                                    <?php } ?>
                                    <td align="center"><a href="edit-courier.php?cid=<?php echo codificar($row['id']); ?>">
                                            <img src="img/edit.png" height="20" width="18"></a></td>
                                    <td><strong><?php echo $_SESSION['ge_curr'] . formato($row['cost']); ?></strong></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['content']; ?></td>
                                    <td><?php echo $row['money']; ?></td>
                                    <td><?php echo $row['user']; ?></td>
                                    <td><?php echo $row['role']; ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Sum: <?php echo $_SESSION['ge_curr'] . formato($sum_cost)?></th>
                                    <th></th>
                                    <th></th>
                                    <th><?php echo $sum_money?></th>
                                    <th></th>
                                    <th></th>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
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
<script src="js/delivery.js"></script>
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#grid').DataTable();
    });

    function del_list_admin(id) {
        if (window.confirm('<?php echo $DELETEADMIN; ?>')) {
            window.location = "deletes/delete_list_cost.php?action=del&id="+id;
        }
    }
</script>
</body>
</html>

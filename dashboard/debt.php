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
require_once('funciones.php');
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
    header('Location: ../404');
}

$date = $_GET['date'] != '' ? $_GET['date'] : '';
$where = '';

if ($date != '') {
    $dateExactly = date_create($date);
    $dateExactly = date_format($dateExactly, "Y/m/d");
    $where .= " WHERE book_date = '$dateExactly' ";
}
$where .= " ORDER BY book_date DESC";

date_default_timezone_set($_SESSION['ge_timezone']);
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title><?php echo $_SESSION['ge_cname']; ?> | <?php echo $L_['accounting']; ?></title>
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
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
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
        <div class="hbox hbox-auto-xs hbox-auto-sm">
            <!-- main -->
            <div class="col">
                <!-- main header -->
                <div class="bg-light lter b-b wrapper-md">

                </div>
                <!-- / main header -->
                <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                    <!-- service -->
                    <div class="panel hbox hbox-auto-xs no-border">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <div align="center">
                                    <div class="col-md-12 col-lg-12" style="margin-top: 30px">
                                        <table border="0" align="center">
                                            <form method="get" class="form-inline">
                                                <tr>
                                                    <td><strong>Date&nbsp;&nbsp;</strong></td>
                                                    <td><i class="icon-append fa fa-calendar"></i>&nbsp;&nbsp;<input
                                                                type="date" class="accounting" name="date"
                                                                value="<?php echo $date ?>"></td>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                                                                        class="btn btn-lg btn-success">
                                                            <i class="icon-search"></i> <strong>Search</strong></button>
                                                    </td>
                                                </tr>
                                            </form>
                                        </table>
                                    </div>
                                    </br></br>
                                    <div class="col-md-12 col-lg-12">
                                        <table id="table" class="table table-striped b-t b-b">
                                            <thead>
                                            <tr>
                                                <td></td>
                                                <td><strong>ID</strong></td>
                                                <td><strong>Client ID</strong></td>
                                                <td><strong><?php echo $L_['name_client']; ?></strong></td>
                                                <td><strong><?php echo $L_['name_date']; ?></strong></td>
                                                <td><strong>Revenue</strong></td>
                                                <td><strong>Payment</strong></td>
                                                <td><strong>Debt</strong></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $initial = 0; // Empezar a contar desde 0
                                            $payment = 0;
                                            $debt = 0;

                                            $result = mysql_query("SELECT * FROM accounting " . $where);
                                            while ($row = mysql_fetch_array($result)) {
                                                $initial += (float)$row['shipping_subtotal'];
                                                $payment += (float)$row['pay'];
                                                $debt += (float)($row['shipping_subtotal'] - $row['pay']);
                                                ?>
                                                <tr>
                                                    <td align="center"><a
                                                                href="edit-debt.php?id=<?php echo codificar($row['cid']); ?>">
                                                            <img src="img/edit.png" height="20" width="18"></a></td>
                                                    <td><?php echo $row['cid'] ?></td>
                                                    <td><?php echo $row['client_id'] ?></td>
                                                    <td><?php echo $row['ship_name']; ?></td>
                                                    <td><?php echo $row['book_date']; ?></td>
                                                    <td><?php echo formato($row['shipping_subtotal']); ?></td>
                                                    <td><?php echo formato($row['pay']) ?></td>
                                                    <td><?php echo formato($row['shipping_subtotal'] - $row['pay']) ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="5" style="text-align: right;" rowspan="1">
                                                    <b><?php echo $L_['name_sales']; ?></b>
                                                </td>
                                                <td rowspan="1" colspan="1">
                                                    <b><?php echo $_SESSION['ge_curr']; ?>&nbsp;
                                                        <span id="display_sum"><?php echo formato($initial); ?></span></b>
                                                </td>
                                                <td>
                                                    <b><?php echo $_SESSION['ge_curr']; ?>&nbsp;
                                                        <span id="display_sum_pay"><?php echo formato($payment); ?></span></b>

                                                </td>
                                                <td>
                                                    <b><?php echo $_SESSION['ge_curr']; ?>&nbsp;
                                                        <span id="display_sum_debt"><?php echo formato($debt); ?></span></b>

                                                </td>
                                            </tr>
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
</div>
<!-- / content -->

<?php
include("footer.php");
?>

</div>
<script type="text/javascript">
    function cambiarcont(pagina) {
        $("#contenido").load(pagina);
    }
</script>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="js/ui-load.js"></script>
<script src="js/ui-jp.config.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>
<script src="js/delivery.js"></script>
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
<script>
    $(function () {
        var table = $('#table').DataTable();
        table.on('search.dt', function () {
            var data = table.rows({filter: 'applied'}).data();
            var sum = 0;
            var sum_pay = 0;
            var sum_debt = 0;
            for (var i = 0; i < data.length; i++) {
                sum += parseFloat(data[i][4].replaceAll(",", ""));
                sum_pay += parseFloat(data[i][5].replaceAll(",", ""));
                sum_debt += parseFloat(data[i][6].replaceAll(",", ""));
            }
            $('#display_sum').html((sum).formatMoney(2, '.', ','));
            $('#display_sum_pay').html((sum_pay).formatMoney(2, '.', ','));
            $('#display_sum_debt').html((sum_debt).formatMoney(2, '.', ','));
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

    String.prototype.replaceAll = function (search, replacement) {
        var target = this;
        return target.replace(new RegExp(search, 'g'), replacement);
    };

</script>

</body>
</html>

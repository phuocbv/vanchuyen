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

$from = $_GET['from'];
$to = $_GET['to'];
$date_form = date_create($from);
$date_form = date_format($date_form,"Y/m/d");
$date_to = date_create($to);
$date_to = date_format($date_to,"Y/m/d");


$sqlRevenue = "SELECT * FROM accounting ";
$sqlCost = "SELECT * FROM cost  ";
$dateFull = '';

if (isset($from) && isset($to)) {
    $sqlRevenue .= " WHERE book_date BETWEEN '$date_form' AND '$date_to' ";
    $sqlCost .= " WHERE date BETWEEN '$date_form' AND '$date_to' ";
}

$sqlRevenue .= " ORDER BY book_date DESC";
$sqlCost .= " ORDER BY date DESC";

$listAccount = mysql_query($sqlRevenue);
$listCost = mysql_query($sqlCost);
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
    <style>
        .OK {
            background: #00D96D;
        }
        .Bank {
            background: #999;
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
                            <i class="fa fa-circle-o text-info m-r-sm pull-right"></i>
                            <h4><i class="icon-plane"></i>SEARCH</a></h4>
                            <div class="card-box table-responsive">
                                <div align="center">
                                    <table border="0" align="center">
                                        <form name="form1" action="" method="get" class="form-inline">
                                            <tr>
                                                <td><strong>From&nbsp;&nbsp;</strong></td>
                                                <td><i class="icon-append fa fa-calendar"></i>&nbsp;&nbsp;<input
                                                            type="date" class="accounting" name="from"
                                                            value="<?php echo date_format(date_create($from),"Y-m-d"); ?>"></td>
                                                <td><strong>&nbsp;&nbsp;&nbsp;&nbsp;To&nbsp;&nbsp;</strong></td>
                                                <td><i class="icon-append fa fa-calendar"></i>&nbsp;&nbsp;<input
                                                            type="date" class="accounting" name="to"
                                                            value="<?php echo date_format(date_create($to),"Y-m-d"); ?>"></td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit"
                                                                                    class="btn btn-lg btn-success">
                                                        <i class="icon-search"></i> <strong>Search</strong></button>
                                                </td>
                                            </tr>
                                        </form>
                                    </table>
                                </div>
                                <div>
                                    <h4><i class="icon-plane"></i>REVENUE</a></h4>
                                    <table id="tableRevenue" class="table table-striped b-t b-b">
                                        <thead>
                                        <tr>
                                            <td></td>
                                            <td><strong>
                                                    <center><?php echo $L_['name_date']; ?></center>
                                                </strong></td>
                                            <td><strong><?php echo $L_['name_client']; ?></strong></td>
                                            <td><strong>
                                                    <center><?php echo $L_['name_book_mode']; ?></center>
                                                </strong></td>
                                            <td><strong><?php echo $L_['name_value']; ?>
                                                </strong></td>
                                            <td><strong>
                                                    <center>User</center>
                                                </strong></td>
                                            <td><strong>
                                                    <center>Role</center>
                                                </strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sumPrice = 0;
                                        while ($row = mysql_fetch_array($listAccount)) {
                                            $sumPrice += (float)$row['shipping_subtotal'];
                                            if ($row['book_mode'] == 'Effective') {
                                                $book_mode = '<span class="label label-primary">' . $L_['type_effective'] . '</span>';
                                            } elseif ($row['book_mode'] == 'Debit_card') {
                                                $book_mode = '<span class="label label-default">' . $L_['type_debit'] . '</span>';
                                            } elseif ($row['book_mode'] == 'Credit_card') {
                                                $book_mode = '<span class="label label-danger">' . $L_['type_credit'] . '</span>';
                                            } elseif ($row['book_mode'] == 'Transfer') {
                                                $book_mode = '<span class="label label-warning">' . $L_['type_transfers'] . '</span>';
                                            } elseif ($row['book_mode'] == 'Paypal') {
                                                $book_mode = '<span class="label label-info">PAYPAL</span>';
                                            }
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <center><?php $book_date = date_create($row['book_date']);
                                                            $book_date = date_format($book_date, "d-m-Y"); echo $book_date; ?></center>
                                                </td>
                                                <td><?php echo $row['ship_name']; ?></td>
                                                <td>
                                                    <center><?php echo $book_mode; ?>&nbsp;&nbsp;<span
                                                                class="label <?php echo $row['payment']; ?> label-large"><?php echo $row['payment']; ?></span>&nbsp;&nbsp;<span
                                                                class="label <?php echo $row['paymode']; ?> label-large"><?php echo $row['paymode']; ?></span>
                                                    </center>
                                                </td>
                                                <td class="sum" value="<?php echo (int)$row['shipping_subtotal'] ?>">
                                                    <?php echo $s . ' ' . formato($row['shipping_subtotal']); ?>
                                                </td>
                                                <td>
                                                    <center><?php echo $row['user']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $row['office']; ?></center>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td align="right"><b><?php echo $L_['name_sales']; ?></b></td>
                                            <td>
                                                <b><?php echo $_SESSION['ge_curr']; ?>&nbsp;<span
                                                            id="display_sum"><?php echo formato($sumPrice) ?></span></b>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <br><br>
                                <div>
                                    <h4><i class="icon-plane"></i>COST</a></h4>
                                    <table id="tableCost" class="table table-striped b-t b-b">
                                        <thead>
                                        <tr>
                                            <td></td>
                                            <td><strong>Date</strong></td>
                                            <td><strong>Cost Name</strong></td>
                                            <td><strong>Content</strong></td>
                                            <td><strong>Money</strong></td>
                                            <td><strong>User</strong></td>
                                            <td><strong>Role</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sumMoney = 0;
                                        //var_dump($listCost);die();
                                        if ($listCost) {
                                            while ($row = mysql_fetch_array($listCost)) {
                                                $sumMoney += (float)$row['money'];
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php $book_date = date_create($row['date']);
                                                        $book_date = date_format($book_date, "d-m-Y"); echo $book_date;?></td>
                                                    <td><?php echo $row['cost']; ?></td>
                                                    <td><?php echo $row['content'] ?></td>
                                                    <td class="sum" value="<?php echo (int)$row['money'] ?>">
                                                        <?php echo formato($row['money']); ?>
                                                    </td>
                                                    <td><?php echo $row['user'] ?></td>
                                                    <td><?php echo $row['role'] ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td align="right"><b><?php echo $L_['name_sales']; ?></b></td>
                                            <td>
                                                <b>
                                                    <?php echo $_SESSION['ge_curr']; ?>&nbsp;
                                                    <span id="display_sum_cost"><?php echo formato($sumMoney) ?></span>
                                                </b>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <br><br>
                                <div>
                                    <h4><i class="icon-plane"></i>Profit</a></h4>
                                    <table id="tableRevenue" class="table table-striped b-t b-b">
                                        <thead>
                                        <tr>
                                            <td><strong>Date</strong></td>
                                            <td><strong>Revenue</strong></td>
                                            <td><strong>Cost</strong></td>
                                            <td><strong>Profit</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $dateFull?></td>
                                            <td><b><?php echo $_SESSION['ge_curr'] . ' ' . formato($sumPrice) ?></b></td>
                                            <td><b><?php echo $_SESSION['ge_curr'] . ' ' . formato($sumMoney) ?></b></td>
                                            <td><b><?php echo $_SESSION['ge_curr'] . ' ' . formato($sumPrice - $sumMoney)?></b></td>
                                        </tr>
                                        </tbody>
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
<script type="text/javascript" charset="utf8" src="js/app.js"></script>
<script>
    var month = $('#month');
    var year = $('#year');
    var day = $('#day');
    $(function () {
        var tableRevenue = $('#tableRevenue').DataTable({order:[[0,"desc"]]});
        tableRevenue.on('search.dt', function () {
            var data = tableRevenue.rows({filter: 'applied'}).data();
            var sum = 0;
            for (var i = 0; i < data.length; i++) {
                sum += parseFloat(data[i][4].replaceAll(",", ""));
            }console.log(sum);
            $('#display_sum').html((sum).formatMoney(2, '.', ','));
        });

        var tableCost = $('#tableCost').DataTable({order:[[0,"desc"]]});
        tableCost.on('search.dt', function () {
            var data = tableCost.rows({filter: 'applied'}).data();
            var sum = 0;
            for (var i = 0; i < data.length; i++) {
                sum += parseFloat(data[i][4].replaceAll(",", ""));
            }
            $('#display_sum_cost').html((sum).formatMoney(2, '.', ','));
        });

        year.on('change', function () {
            var current = $(this);
            var valueDay = '<option value="">Chọn ngày</option>';
            var days = [];
            if (current.val() != '' && month.val() != '') {
                days = getDaysInMonth(parseInt(month.val()), current.val());
                days.forEach(function (day) {
                    valueDay += "<option value='" + day.getDate() + "'>" + day.getDate() + "</option>";
                });
            }
            day.empty();
            day.html(valueDay);
        });

        month.on('change', function () {
            var current = $(this);
            var days = [];
            var valueDay = '<option value="">Chọn ngày</option>';
            if (current.val() != '' && year.val() != '') {
                days = getDaysInMonth(parseInt(current.val()), year.val());
                days.forEach(function (day) {
                    valueDay += "<option value='" + day.getDate() + "'>" + day.getDate() + "</option>";
                });
            }
            day.empty();
            day.html(valueDay);
        });
        var valueDay = '<option value="">Chọn ngày</option>';
        var days = [];
        var day_search = '<?php echo $day?>';
        if (month.val() != '' && year.val() != '') {
            days = getDaysInMonth(parseInt(month.val()), year.val());
            days.forEach(function (day) {
                if (day_search != '' && day_search == day.getDate()) {
                    valueDay += "<option value='" + day.getDate() + "' selected>" + day.getDate() + "</option>";
                }
                valueDay += "<option value='" + day.getDate() + "'>" + day.getDate() + "</option>";
            });
        }
        day.empty();
        day.html(valueDay);
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

    String.prototype.replaceAll = function(search, replacement) {
        var target = this;
        return target.replace(new RegExp(search, 'g'), replacement);
    };
</script>
</body>
</html>

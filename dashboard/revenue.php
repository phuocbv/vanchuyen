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

error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
require_once('database.php');
require_once('library.php');
require_once('funciones.php');
require 'requirelanguage.php';

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

$company=mysql_fetch_array(mysql_query("SELECT * FROM company"));
$styling=mysql_fetch_array(mysql_query("SELECT * FROM styles"));
date_default_timezone_set($_SESSION['ge_timezone']);

$user=$_SESSION['cod_name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo $_SESSION['ge_cname']; ?> | <?php echo $L_['accounting']; ?></title>
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
                            <i class="fa fa-circle-o text-info m-r-sm pull-right"></i>
                            <h4><i class="icon-plane"></i>REVENUE</a></h4>
                            <div class="card-box table-responsive">
                                <div align="center">
                                    <table border="0" align="center">
                                        <form name="form1" action="" method="get" class="form-inline">
                                            <tr>
                                                <td><strong>Chọn năm&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>
                                                    <select class="accounting" name="year">
                                                        <option value="all" <?php if($trans=='all'){ echo 'selected'; } ?>><?php echo $L_['type_all']; ?></option>
                                                        <option value="Effective" <?php if($trans=='Effective'){ echo 'selected'; } ?>><?php echo $L_['type_effective']; ?></option>
                                                        <option value="Debit_card" <?php if($trans=='Debit_card'){ echo 'selected'; } ?>><?php echo $L_['type_debit']; ?></option>
                                                        <option value="Credit_card" <?php if($trans=='Credit_card'){ echo 'selected'; } ?>><?php echo $L_['type_credit']; ?></option>
                                                        <option value="Transfer" <?php if($trans=='Transfer'){ echo 'selected'; } ?>><?php echo $L_['type_transfers']; ?></option>
                                                        <option value="Paypal" <?php if($trans=='Paypal'){ echo 'selected'; } ?>>PAYPAL</option>
                                                    </select>
                                                </td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;Chọn tháng&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>
                                                    <select class="accounting" name="month">
                                                        <option value="0">Chọn tháng</option>
                                                        <?php
                                                            for ($i = 1; $i <= 12; $i++) {
                                                                echo "<option value='$i'>Tháng $i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;Chọn ngày&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>
                                                    <select class="accounting" name="trans">
                                                        <option value="all" <?php if($trans=='all'){ echo 'selected'; } ?>><?php echo $L_['type_all']; ?></option>
                                                        <option value="Effective" <?php if($trans=='Effective'){ echo 'selected'; } ?>><?php echo $L_['type_effective']; ?></option>
                                                        <option value="Debit_card" <?php if($trans=='Debit_card'){ echo 'selected'; } ?>><?php echo $L_['type_debit']; ?></option>
                                                        <option value="Credit_card" <?php if($trans=='Credit_card'){ echo 'selected'; } ?>><?php echo $L_['type_credit']; ?></option>
                                                        <option value="Transfer" <?php if($trans=='Transfer'){ echo 'selected'; } ?>><?php echo $L_['type_transfers']; ?></option>
                                                        <option value="Paypal" <?php if($trans=='Paypal'){ echo 'selected'; } ?>>PAYPAL</option>
                                                    </select>
                                                </td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td><button type="submit" class="btn btn-md btn-success"><i class="icon-search"></i><strong>Search</strong></button></td>
                                            </tr>
                                        </form>
                                    </table>
                                    </br></br>
                                    <table id="table" class="table table-striped b-t b-b">
                                        <thead>
                                        <tr>
                                            <td><strong>ID</strong></td>
                                            <td><strong>TRACKING</strong></td>
                                            <td><strong><?php echo $L_['name_client']; ?></strong></td>
                                            <td><strong><center><?php echo $L_['name_book_mode']; ?></center></strong></td>
                                            <td><strong><center><?php echo $L_['name_date']; ?></center></strong></td>
                                            <td><strong><center><?php echo $L_['name_value']; ?></center></strong></td>
                                            <td><strong><center><?php echo $L_['name_employ']; ?></center></strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $initial = 0; // Empezar a contar desde 0
                                        $result=mysql_query("SELECT * FROM accounting ".$where);
                                        while($row=mysql_fetch_array($result)){
                                            if($row['book_mode']=='Effective'){
                                                $book_mode='<span class="label label-primary">'.$L_['type_effective'].'</span>';
                                            }elseif($row['book_mode']=='Debit_card'){
                                                $book_mode='<span class="label label-default">'.$L_['type_debit'].'</span>';
                                            }elseif($row['book_mode']=='Credit_card'){
                                                $book_mode='<span class="label label-danger">'.$L_['type_credit'].'</span>';
                                            }elseif($row['book_mode']=='Transfer'){
                                                $book_mode='<span class="label label-warning">'.$L_['type_transfers'].'</span>';
                                            }elseif($row['book_mode']=='Paypal'){
                                                $book_mode='<span class="label label-info">PAYPAL</span>';
                                            }

                                            $initial = $initial + $row['shipping_subtotal'];

                                            ?>
                                            <tr>
                                                <td><?php echo $row['cid'] ?></td>
                                                <td><?php echo $row['tracking'] ?></td>
                                                <td><?php echo $row['ship_name']; ?></td>
                                                <td><center><?php echo $book_mode; ?>&nbsp;&nbsp;<span class="label <?php echo $row['payment']; ?> label-large"><?php echo $row['payment']; ?></span>&nbsp;&nbsp;<span class="label <?php echo $row['paymode']; ?> label-large"><?php echo $row['paymode']; ?></span></center></td>
                                                <td><center><?php echo $row['book_date']; ?></center></td>
                                                <td class="sum" value="<?php echo $row['shipping_subtotal']?>"><center><?php echo $s.' '.formato($row['shipping_subtotal']); ?></center></td>
                                                <td><center><?php echo $row['office']; ?></center></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="5" style="text-align: right;" rowspan="1">
                                                <b><?php echo $L_['name_sales']; ?></b>
                                            </td>
                                            <td style="text-align: center;" rowspan="1" colspan="1">
                                                <b><?php echo $_SESSION['ge_curr']; ?>&nbsp;<span id="display_sum"><?php echo $initial; ?></span></b>
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
        $('#table').DataTable({
            drawCallback: function () {
                var sum = 0;
                $('#table tr td.sum').each(function () {
                    var current = $(this);
                    sum += parseInt(current.attr('value'));
                });
                $('#display_sum').html((sum).formatMoney(2, '.', ','));
            }
        });
    });

    Number.prototype.formatMoney = function(c, d, t){
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

</body>
</html>

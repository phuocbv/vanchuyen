<?php
/******************************************************************************
#                      PHP Authorize.net Payment Terminal v2.0
#******************************************************************************
#      Author:     Convergine.com
#      Email:      info@convergine.com
#      Website:    http://www.convergine.com
#
#
#      Version:    2.0
#      Copyright:  (c) 2012 - Convergine.com
#
#*******************************************************************************/

error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require("functions.php");
require_once('../../library.php');
require_once('../../database.php');


## Obtengo datos de la empresa
$qryEmpresa =  mysql_query("SELECT * FROM company");

while($row = mysql_fetch_array($qryEmpresa)) {

	$mail  = $row["bemail"];
	$merlogin  = $row["merchant_login"];
	$merkey  = $row["merchant_tran_key"];
	$coins  = $row["currency"];

}
mysql_free_result($qryEmpresa); 


//THIS IS TITLE ON PAGES
$title = "Authorize.net Payment"; //site title
//THIS IS ADMIN EMAIL FOR NEW PAYMENT NOTIFICATIONS.
$admin_email = "".$mail.""; //this email is for notifications about new payments


$shipping_subtotal= $_GET['shipping_subtotal'];

$sql_1 = "SELECT shipping_subtotal,comments FROM courier_customer WHERE shipping_subtotal = '$shipping_subtotal' AND payment='Pending' ";
$result2 = dbQuery($sql_1);		
while($data = dbFetchAssoc($result2)) {
	extract($data);	
	
	$item_amount = $shipping_subtotal; // This is the amount charged for the item that a user is about to pay for
	$item_name = $comments;
}


//IF YOU NEED TO ADD MORE SERVICES JUST ADD THEM THE SAME WAY THEY APPEAR BELOW.
$services = array(
				  array("".$item_name."", "".$item_amount.""),
			);
//NOW, IF YOU WANT TO ACTIVATE THE DROPDOWN WITH SERVICES ON THE TERMINAL
//ITSELF, CHANGE BELOW VARIABLE TO TRUE;			
$show_services = true;

// set  to   RECUR  - for recurring payments, ONETIME - for onetime payments
$payment_mode = "ONETIME";


//service name   |   price  to charge   | Billing period  "Day", "Week", "Month", "Year"   |  how many periods of previous field per billing period | trial period in days | Trial amount
$recur_services = array(
				 array("Service 1 monthly WITH 30 DAYS TRIAL", "49.99", "Month", "1", "30", "24.99"),
				 array("Service 1 monthly", "49.99", "Month", "1", "0", "0"),
				 array("Service 1 quaterly", "149.99", "Month", "3", "0", "0"),
				 array("Service 1 semi-annualy", "249.99", "Month", "6", "0", "0"),
				 array("Service 1 annualy", "349.99", "Year", "1", "0", "0")
				);
//IF YOU'RE GOING LIVE FOLLOWING VARIABLE SHOULD BE SWITCH TO true
// IT WILL AUTOMATICALLY REDIRECT ALL NON-HTTTPS REQUESTS TO HTTPS.
// MAKE SURE SSL IS INSTALLED ALREADY.
$redirect_non_https = false;
$liveMode = false;


if(!$liveMode){
//TEST MODE
define('MERCHANT_LOGIN', "".$merlogin."");
define('MERCHANT_TRAN_KEY', "".$merkey."");
define('GATEWAY_URL', 'https://test.authorize.net/gateway/transact.dll');
define('TEST_MODE', 'TRUE');
define('ARBHOST', 'apitest.authorize.net');
define('ARBPATH', '/xml/v1/request.api');
} else {
//LIVE MODE
define('MERCHANT_LOGIN', "".$merlogin."");
define('MERCHANT_TRAN_KEY', "".$merkey."");
define('GATEWAY_URL', 'https://secure.authorize.net/gateway/transact.dll');
define('TEST_MODE', 'FALSE');
define('ARBHOST', 'api.authorize.net');
define('ARBPATH', '/xml/v1/request.api');
}



/*******************************************************************************************************
    PAYPAL EXPRESS CHECKOUT CONFIGURATION VARIABLES
********************************************************************************************************/
$enable_paypal = true; //shows/hides paypal payment option from payment form.
$paypal_merchant_email = "johanosorio19@hotmail.com";
$paypal_success_url = "http://payments.jaom.info/paypal_thankyou.php";
$paypal_cancel_url = "http://payments.jaom.info/paypal_cancel.php";
$paypal_ipn_listener_url = "http://payments.jaom.info/paypal_listener.php";
$paypal_custom_variable = "some_var";
$paypal_currency = "".$coins."";
$sandbox = false; //if you want to test payments with your sandbox account change to true (you must have account at https://developer.paypal.com/ and YOU MUST BE LOGGED IN WHILE TESTING!)
if($liveMode){ $sandbox = false; } else { $sandbox = true; }


//DO NOT CHANGE ANYTHING BELOW THIS LINE, UNLESS SURE OF COURSE
define("PAYMENT_MODE",$payment_mode);
if(!$sandbox){
    define("PAYPAL_URL_STD","https://www.paypal.com/cgi-bin/webscr");
} else {
    define("PAYPAL_URL_STD","https://www.sandbox.paypal.com/cgi-bin/webscr");
}

//DO NOT CHANGE ANYTHING BELOW THIS LINE, UNLESS SURE OF COURSE
if($redirect_non_https){
	if ($_SERVER['SERVER_PORT']!=443) {
		$sslport=443; //whatever your ssl port is
		$url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		header("Location: $url");
		exit();
	}
}
?>
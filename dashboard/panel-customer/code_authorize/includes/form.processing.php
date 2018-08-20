<?php
// *************************************************************************
// *                                                                       *
// *  DEPRIXA -  Integrated Web system                               *
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


						
						
$province = str_replace("-AU-", "", $state);

	# PLEASE DO NOT EDIT FOLLOWING LINES IF YOU'RE NOT SURE ------->
        if ($show_services) {
            if($payment_mode=="RECUR"){
                $amount = number_format($recur_services[$service][1], 2);
            } else {
                $amount = number_format($services[$service][1], 2);
            }
            $item_description = $services[$service][0];
        }


		$continue = false;
		if(!empty($amount) && is_numeric($amount)){ 	
			$cctype = (!empty($_POST['cctype']))?strip_tags(str_replace("'","`",strip_tags($_POST['cctype']))):'';
			$ccname = (!empty($_POST['ccname']))?strip_tags(str_replace("'","`",strip_tags($_POST['ccname']))):'';
			$ccn = (!empty($_POST['ccn']))?strip_tags(str_replace("'","`",strip_tags($_POST['ccn']))):'';
			$exp1 = (!empty($_POST['exp1']))?strip_tags(str_replace("'","`",strip_tags($_POST['exp1']))):'';
			$exp2 = (!empty($_POST['exp2']))?strip_tags(str_replace("'","`",strip_tags($_POST['exp2']))):'';
			$cvv = (!empty($_POST['cvv']))?strip_tags(str_replace("'","`",strip_tags($_POST['cvv']))):'';
			
			
            if($cctype!="PP"){
                //CREDIT CARD PHP VALIDATION
                if(empty($ccn) || empty($cctype) || empty($exp1) || empty($exp2) || empty($ccname) || empty($cvv) || empty($address) || empty($state) || empty($city)){
                    $continue = false;
                    $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> Not all required fields were filled out.</p></div></div><br />';
                } else { $continue = true; }

                if(!is_numeric($cvv)){
                    $continue = false;
                    $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> CVV number can contain numbers only.</p></div></div><br />';
                } else {
                    $continue = true;
                }

                if(!is_numeric($ccn)){
                    $continue = false;
                    $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> Credit Card number can contain numbers only.</p></div></div><br />';
                } else {
                    $continue = true;
                }

                if(date("Y-m-d", strtotime($exp2."-".$exp1."-01")) < date("Y-m-d")){
                    $continue = false;
                    $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> Your credit card is expired.</p></div></div><br />';
                } else {
                    $continue = true;
                }

                if($continue){
                    //echo "1";
                    if(validateCC($ccn,$cctype)){
                        $continue = true;
                    } else {
                        $continue = false;
                        $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> The number you\'ve entered does not match the card type selected.</p></div></div><br />';
                    }
                }

                if($continue){
                    if(luhn_check($ccn)){
                        $continue = true;
                    } else {
                        $continue = false;
                        $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> Invalid credit card number.</p></div></div><br />';
                    }
                }

            } else {
                $continue = true;
            }
			
			switch($cctype){
				case "V":
					$cctype = "VISA";
				break;
				case "M":
					$cctype = "MASTERCARD";
				break;
                case "DI":
                    $cctype = "DINERS CLUB";
                break;
				case "D":
					$cctype = "DISCOVER";
				break;
				case "A":
					$cctype = "AMEX";
				break;
                case "PP":
                    $cctype = "PAYPAL";
                break;
			}

            $transactID = mktime()."-".rand(1,999);
            require 'includes/authorizenet.class.php';
            if($continue && $cctype!="PAYPAL"){
				###########################################################################
				###	Authorize.net PROCESSING
				###########################################################################
				//PROCESS PAYMENT BY WEBSITE PAYMENTS PRO



                switch($payment_mode){
                case "ONETIME":

                    $a = new authorizenet_class;
                    // You login using your login, login and tran_key, or login and password.  It
                    // varies depending on how your account is setup.
                    // I believe the currently reccomended method is to use a tran_key and not
                    // your account password.  See the AIM documentation for additional information.

                    $a->add_field('x_login', MERCHANT_LOGIN);
                    $a->add_field('x_tran_key', MERCHANT_TRAN_KEY);
                    //$a->add_field('x_password', 'CHANGE THIS TO YOUR PASSWORD');

                    $a->add_field('x_version', '3.1');
                    $a->add_field('x_type', 'AUTH_CAPTURE');
                    $a->add_field('x_test_request', TEST_MODE);    // Just a test transaction
                    $a->add_field('x_relay_response', 'FALSE');

                    $a->add_field('x_delim_data', 'TRUE');
                    $a->add_field('x_delim_char', '|');
                    $a->add_field('x_encap_char', '');


                    // Setup fields for customer information.  This would typically come from an
                    // array of POST values froma secure HTTPS form.



                    // Using credit card number '4007000000027' performs a successful test.  This
                    // allows you to test the behavior of your script should the transaction be
                    // successful.  If you want to test various failures, use '4222222222222' as
                    // the credit card number and set the x_amount field to the value of the
                    // Response Reason Code you want to test.
                    //
                    // For example, if you are checking for an invalid expiration date on the
                    // card, you would have a condition such as:
                    // if ($a->response['Response Reason Code'] == 7) ... (do something)
                    //
                    // Now, in order to cause the gateway to induce that error, you would have to
                    // set x_card_num = '4222222222222' and x_amount = '7.00'

                    $x_exp_date = $exp1 . (substr($exp2,-2,2));
                    $x_card_num = $ccn;
                    $x_card_code = $cvv;


                    //  Setup fields for payment information
                    $a->add_field('x_method', 'CC');
                    $a->add_field('x_card_num', $x_card_num);   // test successful visa
                    //$a->add_field('x_card_num', '370000000000002');   // test successful american express
                    //$a->add_field('x_card_num', '6011000000000012');  // test successful discover
                    //$a->add_field('x_card_num', '5424000000000015');  // test successful mastercard
                    // $a->add_field('x_card_num', '4222222222222');    // test failure card number

                    $a->add_field('x_exp_date', $x_exp_date);
                    $a->add_field('x_card_code', $x_card_code);    // Card CAVV Security code


                    $a->add_field('x_first_name', $fname);
                    $a->add_field('x_last_name', $lname);
                    $a->add_field('x_address', $address);
                    $a->add_field('x_city', $city);
                    $a->add_field('x_state', $state);
                    $a->add_field('x_zip', $zip);
                    //$a->add_field('x_country', $country);
                    $a->add_field('x_email', $email);
                    //$a->add_field('x_phone', $phone);

                    $a->add_field('x_amount', number_format($amount,2));


                    // Process the payment and output the results
                    switch ($a->process()) {

                        case 1:  // Successs
                            $sMessageResponse= "<br /><div>Your payment was <b>APPROVED</b>!";
                            $sMessageResponse .= "<div>";
                            $sMessageResponse .= $a->get_response_reason_text();
                            $sMessageResponse .= "</div>";
                            $sMessageResponse .= "<br/><a href='../../panel-customer/paybill.php'>Return to payment page</a><br /><br/></div>";
                            $mess = '<div class="ui-widget"><div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;">'.$sMessageResponse.'</div></div><br />';

                            #**********************************************************************************************#
                            #		THIS IS THE PLACE WHERE YOU WOULD INSERT ORDER TO DATABASE OR UPDATE ORDER STATUS.
                            #**********************************************************************************************#

                            #**********************************************************************************************#
                            /******************************************************************
                            ADMIN EMAIL NOTIFICATION
                            ******************************************************************/
                            $headers  = "MIME-Version: 1.0\n";
                            $headers .= "Content-type: text/html; charset=utf-8\n";
                            $headers .= "From: 'Authorize.net Payment Terminal' <noreply@".$_SERVER['HTTP_HOST']."> \n";
                            $subject = "New Payment Received";
                            $message =  "New payment was successfully received through authorize.net <br />";
                            $message .= "from ".$fname." ".$lname."  on ".date('m/d/Y')." at ".date('g:i A').".<br /> Payment total is: $".number_format($amount,2);
                            $message .= "<br />Tracking: \"" . $item_number . "\"";
                            
                            $message .= "<br />Description of the article \"".$item_description."\"";
                             
                            $message .= "<br /><br />Billing Information:<br />";
                            $message .= "Full Name: ".$fname." ".$lname."<br />";
                            $message .= "Email: ".$email."<br />";
                            $message .= "Address: ".$address."<br />";
                            $message .= "City: ".$city."<br />";
                            $message .= "Country: ".$country."<br />";
                            $message .= "State/Province: ".$state."<br />";
                            $message .= "ZIP/Postal Code: ".$zip."<br />";
                            mail($admin_email,$subject,$message,$headers);

                            /******************************************************************
                            CUSTOMER EMAIL NOTIFICATION
                            ******************************************************************/
                            $subject = "Payment Received!";
                            $message =  "Dear ".$fname.",<br />";
                            $message .= "<br /> Thank you for your payment.";
                            $message .= "<br /><br />";
                            
                            $message .= "<br />Description of the article \"" . $item_description . "\"";
                             
			                $message .= "<br />Tracking: \"" . $item_number . "\"";			
                            $message .= "<br />Payment amount: $" . number_format($amount, 2);
                            $message .= "<br /><br />Billing Information:<br />";
                            $message .= "Full Name: " . $fname . " " . $lname . "<br />";
                            $message .= "Email: " . $email . "<br />";
                            $message .= "Address: " . $address . "<br />";
                            $message .= "City: " . $city . "<br />";
                            $message .= "Country: " . $country . "<br />";
                            $message .= "State/Province: " . $state . "<br />";
                            $message .= "ZIP/Postal Code: " . $zip . "<br />";

                            $message .= "<br /><br />Kind Regards,<br />" . $_SERVER['HTTP_HOST'];
                            mail($email,$subject,$message,$headers);

                            //-----> send notification end
                            $show_form=0;
                            
                            error_reporting(E_ERROR | E_WARNING | E_PARSE);
				
							require_once('../../database.php');
										
							$sql ="UPDATE courier_customer SET payment='OK', paymode='Authorize' WHERE tracking='".$item_number."'";
							dbQuery($sql);
							
							$sql_1 ="UPDATE courier SET payment='OK', paymode='Authorize' WHERE tracking='".$item_number."'";
							dbQuery($sql_1);
							
							$sql_2 ="UPDATE accounting SET payment='OK', paymode='Authorize' WHERE tracking='".$item_number."'";
							dbQuery($sql_2);
							
							$sql_3 ="UPDATE courier_online SET payment='OK', paymode='Authorize' WHERE cons_no='".$item_number."'";
							dbQuery($sql_3);

                        break;

                        case 2:  // Declined
                            $sMessageResponse= "<br /><div>Your payment was <b>DECLINED</b>!";
                            $sMessageResponse .= "<div>";
                            $sMessageResponse .= $a->get_response_reason_text();
                            $sMessageResponse .= "</div>";
                            $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">'.$sMessageResponse.'</div></div><br />';
                        break;

                        case 3:  // Error
                            $sMessageResponse= "<br /><div>Payment processing returned <b>ERROR</b>!";
                            $sMessageResponse .= "<div>";
                            $sMessageResponse .= $a->get_response_reason_text();
                            $sMessageResponse .= "</div>";
                            $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">'.$sMessageResponse.'</div></div><br />';
                        break;
                    }
                break;
                case "RECUR":
                /*******************************************************************************************************
                RECURRING PROCESSING
                *******************************************************************************************************/
                    $arb_interval = get_arb_interval($recur_services[$service][2],$recur_services[$service][3]);
                    $ccnamet = explode(" ",$ccname);
                    $firstName = isset($ccnamet[0])?$ccnamet[0]:$ccname;
                    $lastName = str_replace($firstName,"",implode(" ",$ccnamet));
                    $firstName = trim($firstName);
                    $lastName = trim($lastName);
                    $arb_request =
                            "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
                            "<ARBCreateSubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
                            "<merchantAuthentication>".
                            "<name>" . MERCHANT_LOGIN . "</name>".
                            "<transactionKey>" . MERCHANT_TRAN_KEY . "</transactionKey>".
                            "</merchantAuthentication>".
                    		"<refId>" . $transactID . "</refId>".
                            "<subscription>".
                            //"<name>" . $name . "</name>".
                            "<paymentSchedule>".
                            "<interval>".
                            "<length>". $arb_interval[1] ."</length>".
                            "<unit>". $arb_interval[0]  ."</unit>".
                            "</interval>".
                            "<startDate>" . date("Y-m-d") . "</startDate>".
                            "<totalOccurrences>9999</totalOccurrences>";
                    if($recur_services[$service][4]!="0"){  $arb_request .= "<trialOccurrences>1</trialOccurrences>"; }
                    $arb_request .= "</paymentSchedule>".
                            "<amount>". $amount ."</amount>";
                    if($recur_services[$service][4]!="0"){  $arb_request .= "<trialAmount>" . $recur_services[$service][5] . "</trialAmount>"; }
                    $arb_request .= "<payment>".
                            "<creditCard>".
                            "<cardNumber>" . $ccn . "</cardNumber>".
                            "<expirationDate>" . $exp2."-".$exp1 . "</expirationDate>".
                            "</creditCard>".
                            "</payment>".
                            "<billTo>".
                            "<firstName>". $firstName . "</firstName>".
                            "<lastName>" . $lastName . "</lastName>".
                            "</billTo>".
                            "</subscription>".
                            "</ARBCreateSubscriptionRequest>";

                    //send the xml via curl
                    $arb_response = send_request_via_curl(ARBHOST,ARBPATH,$arb_request);
                    //if curl is unavilable you can try using fsockopen
                    //$arb_response = send_request_via_fsockopen(ARBHOST,ARBPATH,$arb_request);
                    //if the connection and send worked $response holds the return from Authorize.net
                    if ($arb_response){
                        /*
                        a number of xml functions exist to parse xml results, but they may or may not be avilable on your system
                        please explore using SimpleXML in php 5 or xml parsing functions using the expat library
                        in php 4
                        parse_return is a function that shows how you can parse though the xml return if these other options are not avilable to you
                        */
                        list ($refId, $resultCode, $code, $text, $subscriptionId) = parse_return($arb_response);

                        if(strtolower(substr($code,0,1))=="e"){

                            $my_status="<div>Subscription Un-successful!<br/>";
                            $my_status .=$subscriptionId."<br />";
                            $my_status .="Response Code: ".$resultCode."<br />";
                            $my_status .="Response Reason Code: ".$code."<br />";
                            $my_status .="Response Text: ".$text."<br /><br />";
                            $error=0;
                            $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">'.$my_status.'</div></div><br />';

                        } else {

                            $my_status="<br/><div>Subscription Created Successfully!<br/>";
                            $my_status .= "Subscription ID: " . $subscriptionId . "<br />";
                            $my_status .="Thank you for your payment<br /><br />";
                            $my_status .="Gateway Response:<br />";
                            $my_status .="Response Code: ".$resultCode."<br />";
                            $my_status .="Response Reason Code: ".$code."<br />";
                            $my_status .="Response Text: ".$text."<br /><br />";
                            $my_status .= "You will receive confirmation email within 5 minutes.<br/><br/><a href='../../panel-customer/paybill.php'>Return to payment page</a></div><br/>";
                            $error=0;
                            $mess = '<div class="ui-widget"><div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;">'.$my_status.'</div></div><br />';
                            /******************************************************************
                            ADMIN EMAIL NOTIFICATION
                            ******************************************************************/
                            $headers  = "MIME-Version: 1.0\n";
                            $headers .= "Content-type: text/html; charset=utf-8\n";
                            $headers .= "From: 'Authorize.net Payment Terminal' <noreply@".$_SERVER['HTTP_HOST']."> \n";
                            $subject = "New Recurring Payment Received";
                            $message = "New recurring payment was successfully received through authorize.net <br />";
                            $message .= "from ".$fname." ".$lname."  on ".date('m/d/Y')." at ".date('g:i A').".<br /> Payment total is: $".number_format($amount,2);
                            if($show_services){
                                $message .= "<br />Payment was made for \"".$recur_services[$service][0]."\"";
                            } else {
                                $message .= "<br />Payment description: \"".$item_description."\"";
                            }
                            $message .= "<br/>Start Date: ".date("Y-m-d")."<br />";
                            $message .= "Billing Frequency: ".$recur_services[$service][3]. " ". $recur_services[$service][2]."<br />";
                            $message .= "Subscription ID: ".$subscriptionId."<br />";
                            $message .= "Reference ID: ".$refId."<br /><br />";
                            $message .= "<br /><br />Billing Information:<br />";
                            $message .= "Full Name: ".$fname." ".$lname."<br />";
                            $message .= "Email: ".$email."<br />";
                            $message .= "Address: ".$address."<br />";
                            $message .= "City: ".$city."<br />";
                            $message .= "Country: ".$country."<br />";
                            $message .= "State/Province: ".$state."<br />";
                            $message .= "ZIP/Postal Code: ".$zip."<br /><br />";

                            $message .= "If for any reason you need to cancel this subscription you can follow <a href='http://".$_SERVER["SERVER_NAME"].str_replace("/index.php","",$_SERVER["REQUEST_URI"])."/cancel.php?subid=".$subscriptionId."'>this link</a><br />";
                            mail($admin_email,$subject,$message,$headers);

                            /******************************************************************
                            CUSTOMER EMAIL NOTIFICATION
                            ******************************************************************/
                            $subject = "Payment Received!";
                            $message =  "Dear ".$fname.",<br />";
                            $message .= "<br /> Thank you for your payment.";
                            $message .= "<br /><br />";
                            if($show_services){
                                $message .= "<br />Payment was made for \"".$recur_services[$service][0]."\"";
                            } else {
                                $message .= "<br />Payment description: \"".$item_description."\"";
                            }
                            $message .= "<br/>Start Date: ".date("Y-m-d")."<br />";
                            $message .= "Billing Frequency: ".$recur_services[$service][3]. " ". $recur_services[$service][2]."<br />";
                            $message .= "Subscription ID: ".$subscriptionId."<br />";
                            $message .= "Reference ID: ".$refId;
                            $message .= "<br />Payment amount: $" . number_format($amount, 2);
                            $message .= "<br /><br />Billing Information:<br />";
                            $message .= "Full Name: " . $fname . " " . $lname . "<br />";
                            $message .= "Email: " . $email . "<br />";
                            $message .= "Address: " . $address . "<br />";
                            $message .= "City: " . $city . "<br />";
                            $message .= "Country: " . $country . "<br />";
                            $message .= "State/Province: " . $state . "<br />";
                            $message .= "ZIP/Postal Code: " . $zip . "<br /><br />";
                            $message .= "If for any reason you need to cancel this subscription you can follow <a href='http://".$_SERVER["SERVER_NAME"].str_replace("/index.php","",$_SERVER["REQUEST_URI"])."/cancel.php?subid=".$subscriptionId."'>this link</a>";
                            $message .= "<br /><br />Kind Regards,<br />" . $_SERVER['HTTP_HOST'];
                            mail($email,$subject,$message,$headers);
                            //-----> send notification end
                            $show_form=0;
                            #**********************************************************************************************#
                            #		THIS IS THE PLACE WHERE YOU WOULD INSERT ORDER TO DATABASE OR UPDATE ORDER STATUS.
                            #**********************************************************************************************#

                            #**********************************************************************************************#
                        }
                    }  else  {
                        $count=0;
                        $my_status="<div>Transaction Un-successful!<br/>";
                        $my_status .="There was an error with your credit card processing.<br/>";
                        $error=1;
                        $mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">'.$my_status.'</div></div><br />';
                    }
                break;
            }
			
			// The following two functions are for debugging and learning the behavior
			// of authorize.net's response codes.  They output nice tables containing
			// the data passed to and recieved from the gateway.
			//$a->dump_fields();      // outputs all the fields that we set
			//$a->dump_response();    // outputs the response from the payment gateway 

			} else if($continue && $cctype=="PAYPAL"){
                require('includes/paypal.class.php');
                $paypal = new paypal_class;

                $paypal->add_field('business', $paypal_merchant_email);
                $paypal->add_field('return', $paypal_success_url);
                $paypal->add_field('cancel_return', $paypal_cancel_url);
                $paypal->add_field('notify_url', $paypal_ipn_listener_url);

                    if($payment_mode=="ONETIME"){
                        if($show_services){
                            $paypal->add_field('item_name_1', strip_tags(str_replace("'","",$services[$service][0])));
                        } else {
                            $paypal->add_field('item_name_1', strip_tags(str_replace("'","",$item_description)));
                        }
                        $paypal->add_field('amount_1', $amount);
                        $paypal->add_field('item_number_1', $transactID);
                        $paypal->add_field('quantity_1', '1');
                        $paypal->add_field('custom', $paypal_custom_variable);
                        $paypal->add_field('upload', 1);
                        $paypal->add_field('cmd', '_cart');
                        $paypal->add_field('txn_type', 'cart');
                        $paypal->add_field('num_cart_items', 1);
                        $paypal->add_field('payment_gross', $amount);
                        $paypal->add_field('currency_code',$paypal_currency);

                    } else if($payment_mode=="RECUR"){
                        if($show_services){
                            $paypal->add_field('item_name', strip_tags(str_replace("'","",$recur_services[$service][0])));
                        } else {
                            $paypal->add_field('item_name', strip_tags(str_replace("'","",$item_description)));
                        }
                        $paypal->add_field('item_number', $transactID);

                        //TRIAL PERIOD
                        if($recur_services[$service][4]!="0"){
                            $paypal->add_field('a1', $recur_services[$service][5]);
                            $paypal->add_field('p1', $recur_services[$service][4]);
                            $paypal->add_field('t1', "D");
                        }
                        $paypal->add_field('a3', $amount);
                        $paypal_duration = getDurationPaypal($recur_services[$service][2]); //get duration based on recurring_services array
                        $paypal->add_field('p3', $recur_services[$service][3]);
                        $paypal->add_field('t3', (is_array($paypal_duration)?$paypal_duration[0]:$paypal_duration));
                        $paypal->add_field('src', '1');
                        $paypal->add_field('no_note', '1');
                        $paypal->add_field('no_shipping', '1');
                        $paypal->add_field('custom', $paypal_custom_variable);
                        $paypal->add_field('currency_code',$paypal_currency);
                    }
                    $show_form=0;
                    $mess = $paypal->submit_paypal_post(); // submit the fields to paypal


            }


				
		} elseif(!is_numeric($amount) || empty($amount)) { 
			if($show_services){
				$mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> Please select service you\'re paying for.</p></div></div><br />';
			} else { 
				$mess = '<div class="ui-widget"><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Error!</strong> Please type amount to pay for services!</p></div></div><br />';
			}
			$show_form=1; 
		} 
	# END OF PLEASE DO NOT EDIT IF YOU'RE NOT SURE
?>
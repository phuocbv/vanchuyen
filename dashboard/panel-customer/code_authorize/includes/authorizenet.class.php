<?php
/*******************************************************************************
 *                Authorize.net AIM Interface using CURL
 *******************************************************************************
 *      Author:     Micah Carrick
 *      Email:      email@micahcarrick.com
 *      Website:    http://www.micahcarrick.com
 *
 *      File:       authorizenet.class.php
 *      Version:    1.0.1
 *      Copyright:  (c) 2005 - Micah Carrick 
 *                  You are free to use, distribute, and modify this software 
 *                  under the terms of the GNU General Public License.  See the
 *                  included license.txt file.
 *      
 *******************************************************************************
 *  REQUIREMENTS:
 *      - PHP4+ with CURL and SSL support
 *      - An Authorize.net AIM merchant account
 *      - (optionally) http://www.authorize.net/support/AIM_guide.pdf
 *  
 *******************************************************************************
 *  VERION HISTORY:
 *  
 *      v1.0.1 [01.19.2006] - Fixed urlencode glitch (finally)
 *      v1.0.0 [04.07.2005] - Initial Version
 *
 *******************************************************************************
 *  DESCRIPTION:
 *
 *      This class was developed to simplify interfacing a PHP script to the
 *      authorize.net AIM payment gateway.  It does not do all the work for
 *      you as some of the other scripts out there do.  It simply provides
 *      an easy way to implement and debug your own script.  
 * 
 *******************************************************************************
*/

class authorizenet_class {

   var $field_string;
   var $fields = array();
   
   var $response_string;
   var $response = array();
   
   var $gateway_url = GATEWAY_URL;
   
   function authorizenet_class() {
      
      // some default values
      
      $this->add_field('x_version', '3.1');
      $this->add_field('x_delim_data', 'TRUE');
      $this->add_field('x_delim_char', '|');  
      $this->add_field('x_url', 'FALSE');
      $this->add_field('x_type', 'AUTH_ONLY');
      $this->add_field('x_method', 'CC');
      $this->add_field('x_relay_response', 'FALSE');
     
   }
   
   function add_field($field, $value) {
   
      // adds a field/value pair to the list of fields which is going to be 
      // passed to authorize.net.  For example: "x_version=3.1" would be one
      // field/value pair.  A list of the required and optional fields to pass
      // to the authorize.net payment gateway are listed in the AIM document
      // available in PDF form from www.authorize.net

      $this->fields["$field"] = $value;   

   }

   function process() {
       
      // This function actually processes the payment.  This function will 
      // load the $response array with all the returned information.  The return
      // values for the function are:
      // 1 - Approved
      // 2 - Declined
      // 3 - Error
 
      // construct the fields string to pass to authorize.net
      foreach( $this->fields as $key => $value ) 
         $this->field_string .= "$key=" . urlencode( $value ) . "&";
      
      // execute the HTTPS post via CURL
      $ch = curl_init($this->gateway_url); 
      curl_setopt($ch, CURLOPT_HEADER, 0); 
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
      curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim( $this->field_string, "& " )); 
      $this->response_string = urldecode(curl_exec($ch)); 
      
      if (curl_errno($ch)) {
         $this->response['Response Reason Text'] = curl_error($ch);
         return 3;
      }
      else curl_close ($ch);
 
       
      // load a temporary array with the values returned from authorize.net
      $temp_values = explode('|', $this->response_string);
 
      // load a temporary array with the keys corresponding to the values 
      // returned from authorize.net (taken from AIM documentation)
      $temp_keys= array ( 
           "Response Code", "Response Subcode", "Response Reason Code", "Response Reason Text",
           "Approval Code", "AVS Result Code", "Transaction ID", "Invoice Number", "Description",
           "Amount", "Method", "Transaction Type", "Customer ID", "Cardholder First Name",
           "Cardholder Last Name", "Company", "Billing Address", "City", "State",
           "Zip", "Country", "Phone", "Fax", "Email", "Ship to First Name", "Ship to Last Name",
           "Ship to Company", "Ship to Address", "Ship to City", "Ship to State",
           "Ship to Zip", "Ship to Country", "Tax Amount", "Duty Amount", "Freight Amount",
           "Tax Exempt Flag", "PO Number", "MD5 Hash", "Card Code (CVV2/CVC2/CID) Response Code",
           "Cardholder Authentication Verification Value (CAVV) Response Code"
      );
 
      // add additional keys for reserved fields and merchant defined fields
      for ($i=0; $i<=27; $i++) {
         array_push($temp_keys, 'Reserved Field '.$i);
      }
      $i=0;
      while (sizeof($temp_keys) < sizeof($temp_values)) {
         array_push($temp_keys, 'Merchant Defined Field '.$i);
         $i++;
      }
 
      // combine the keys and values arrays into the $response array.  This
      // can be done with the array_combine() function instead if you are using
      // php 5.
      for ($i=0; $i<sizeof($temp_values);$i++) {
         $this->response["$temp_keys[$i]"] = $temp_values[$i];
      }
      // $this->dump_response();
      // Return the response code.
      return $this->response['Response Code'];

   }
   
   function get_response_reason_text() {
      return $this->response['Response Reason Text'];
   }

   function dump_fields() {
 
      // Used for debugging, this function will output all the field/value pairs
      // that are currently defined in the instance of the class using the
      // add_field() function.
      
      echo "<h3>authorizenet_class->dump_fields() Output:</h3>";
      echo "<table width=\"95%\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\">
            <tr>
               <td bgcolor=\"black\"><b><font color=\"white\">Field Name</font></b></td>
               <td bgcolor=\"black\"><b><font color=\"white\">Value</font></b></td>
            </tr>"; 
            
      foreach ($this->fields as $key => $value) {
         echo "<tr><td>$key</td><td>".urldecode($value)."&nbsp;</td></tr>";
      }
 
      echo "</table><br>"; 
   }

   function dump_response() {
 
      // Used for debuggin, this function will output all the response field
      // names and the values returned for the payment submission.  This should
      // be called AFTER the process() function has been called to view details
      // about authorize.net's response.
      
      echo "<h3>authorizenet_class->dump_response() Output:</h3>";
      echo "<table width=\"95%\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\">
            <tr>
               <td bgcolor=\"black\"><b><font color=\"white\">Index&nbsp;</font></b></td>
               <td bgcolor=\"black\"><b><font color=\"white\">Field Name</font></b></td>
               <td bgcolor=\"black\"><b><font color=\"white\">Value</font></b></td>
            </tr>";
            
      $i = 0;
      foreach ($this->response as $key => $value) {
         echo "<tr>
                  <td valign=\"top\" align=\"center\">$i</td>
                  <td valign=\"top\">$key</td>
                  <td valign=\"top\">$value&nbsp;</td>
               </tr>";
         $i++;
      } 
      echo "</table><br>";
   }    
}


/*******************************************************************************
 *                Authorize.net ARB Interface using CURL
 *******************************************************************************

/****NOTE***
Please download the PHP SDK available at https://developer.authorize.net/downloads/ for more current code.
*/

/*
D I S C L A I M E R
WARNING: ANY USE BY YOU OF THE SAMPLE CODE PROVIDED IS AT YOUR OWN RISK.
Authorize.Net provides this code "as is" without warranty of any kind, either express or implied, including but not limited to the implied warranties of merchantability and/or fitness for a particular purpose.
Authorize.Net owns and retains all right, title and interest in and to the Automated Recurring Billing intellectual property.
*/

//function to send xml request via fsockopen
function send_request_via_fsockopen($host,$path,$content)
{
	$posturl = "ssl://" . $host;
	$header = "Host: $host\r\n";
	$header .= "User-Agent: PHP Script\r\n";
	$header .= "Content-Type: text/xml\r\n";
	$header .= "Content-Length: ".strlen($content)."\r\n";
	$header .= "Connection: close\r\n\r\n";
	$fp = fsockopen($posturl, 443, $errno, $errstr, 30);
	if (!$fp)
	{
		$response = false;
	}
	else
	{
		error_reporting(E_ERROR);
		fputs($fp, "POST $path  HTTP/1.1\r\n");
		fputs($fp, $header.$content);
		fwrite($fp, $out);
		$response = "";
		while (!feof($fp))
		{
			$response = $response . fgets($fp, 128);
		}
		fclose($fp);
		error_reporting(E_ALL ^ E_NOTICE);
	}
	return $response;
}

//function to send xml request via curl
function send_request_via_curl($host,$path,$content)
{
	$posturl = "https://" . $host . $path;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $posturl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	return $response;
}


//function to parse Authorize.net response
function parse_return($content)
{
	$refId = substring_between($content,'<refId>','</refId>');
	$resultCode = substring_between($content,'<resultCode>','</resultCode>');
	$code = substring_between($content,'<code>','</code>');
	$text = substring_between($content,'<text>','</text>');
	$subscriptionId = substring_between($content,'<subscriptionId>','</subscriptionId>');
	return array ($refId, $resultCode, $code, $text, $subscriptionId);
}

//helper function for parsing response
function substring_between($haystack,$start,$end)
{
	if (strpos($haystack,$start) === false || strpos($haystack,$end) === false)
	{
		return false;
	}
	else
	{
		$start_position = strpos($haystack,$start)+strlen($start);
		$end_position = strpos($haystack,$end);
		return substr($haystack,$start_position,$end_position-$start_position);
	}
}

?>
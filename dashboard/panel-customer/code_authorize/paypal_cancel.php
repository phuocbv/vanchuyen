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
	
	//REQUIRE CONFIGURATION FILE
	require("includes/config.php"); //important file. Don't forget to edit it!

	//REQUIRE SITE HEADER TEMPLATE		
	require "includes/site.header.php"; 
?>
<div align="center" class="wrapper">
    <div class="form_container">
    	<h1>Payment Cancelled!</h1>
            <div id="accordion">
                <p>You have cancelled paypal payment.<br /><br /><a href="index.php">Back To Terminal</a></p>
            </div>
    </div>
</div>
<?php require "includes/site.footer.php"; ?>
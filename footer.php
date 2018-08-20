<!-- .footer -->
		
<footer id="footer" class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-9">
						<div class="copyright"><?php echo $company['footer_website']; ?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="privacy"><?php echo $L_['privacy']; ?></a>
						&nbsp;&nbsp;|&nbsp;&nbsp;<a href="terms"><?php echo $L_['terms']; ?></a></div>
							
							
					</div>
					
					<div class="col-md-4 col-sm-3">
						<a class="back-to-top" href="#"><?php echo $L_['backtotop']; ?></a>
					</div>
				</div>
			</div><!-- .container -->
		</footer><!-- site-footer -->
	</div><!-- #wrapper -->

	<!-- jQuery -->    
	<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>  
    <script type="text/javascript" src="assets/css/libs/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/css/libs/sticky/jquery.sticky.js"></script>
    <script type="text/javascript" src="assets/css/libs/owl.carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/css/libs/waypoints/waypoints.min.js"></script>
    <script type="text/javascript" src="assets/css/libs/counterup/jquery.counterup.min.js"></script>
	
    <!-- orther script -->
    <script  type="text/javascript" src="assets/js/main.js"></script>
	<script src="assets/js/jquery.validate.js"></script>
	<script src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>
	
	<script>
		$(document).ready(function () {
			// create DateTimePicker from input HTML element
			$("#datetimepicker").kendoDateTimePicker({
				value: new Date(),
				dateInput: true
			});
		});
	</script>
	<script type="text/javascript">
		
		function volumetrico(){
			
			var num2 = "1.341";
			var volume1 = document.getElementById("volume1");
			var volume2 = document.getElementById("volume2");
			var volume3 = document.getElementById("volume3");
			var input = document.getElementById("totalpeso");
			totalpeso = parseFloat(Math.round(volume1.value * volume2.value * volume3.value) /6000 ).toFixed(1);
			input.value= totalpeso;
			
		}
		</script>

		<script>
			$.validator.setDefaults({
				submit: function() {
					alert("submitted!");
				}
			});

			$(document).ready(function() {
				$("#userForm").validate({
					rules: {
						name: "required",
						shipping: {
							required: true,
							minlength: 6
						},
					   
					},
					messages: {
						name: "Please enter your name",           
						shipping: {
								required: "Please enter a valid tracking number...",
								minlength: "Your tracking number must consist of at least 13 characters"
						},           
					}
				});
			});
			
			$(document).ready(function() {
				$("#userForm2").validate({
					rules: {
						name: "required",
						shipping_online: {
							required: true,
							minlength: 6
						},
					   
					},
					messages: {
						name: "Please enter your name",           
						shipping_online: {
								required: "Please enter a valid tracking number...",
								minlength: "Your tracking number must consist of at least 13 characters"
						},           
					}
				});
			});
		</script>
		
		<script>
		
			$(document).ready(function(){
			$('#country3').on('change',function(){
				var countryID = $(this).val();
				if(countryID){
					$.ajax({
						type:'POST',
						url:'dashboard/ajaxpais2.php',
						data:'country_id='+countryID,
						success:function(html){
							$('#state3').html(html);
							$('#city3').html('<option value="">City</option>'); 
						}
					}); 
				}else{
					$('#state3').html('<option value="">state</option>');
					$('#city3').html('<option value="">City</option>'); 
				}
			});
			
			$('#state3').on('change',function(){
				var stateID = $(this).val();
					if(stateID){
						$.ajax({
							type:'POST',
						   url:'dashboard/ajaxpais2.php',
							data:'state_id='+stateID,
							success:function(html){
								$('#city3').html(html);
							}
						}); 
					}else{
						$('#city3').html('<option value="">Select state first</option>'); 
					}
				});
			});
		
		
		
	
		$(document).ready(function(){
			$('#country1').on('change',function(){
				var countryID = $(this).val();
				if(countryID){
					$.ajax({
						type:'POST',
						url:'dashboard/ajaxpais1.php',
						data:'country_id='+countryID,
						success:function(html){
							$('#state1').html(html);
							$('#city1').html('<option value="">City</option>'); 
						}
					}); 
				}else{
					$('#state1').html('<option value="">State</option>');
					$('#city1').html('<option value="">City</option>'); 
				}
			});
			
			$('#state1').on('change',function(){
				var stateID = $(this).val();
					if(stateID){
						$.ajax({
							type:'POST',
						   url:'dashboard/ajaxpais1.php',
							data:'state_id='+stateID,
							success:function(html){
								$('#city1').html(html);
							}
						}); 
					}else{
						$('#city1').html('<option value="">Select state first</option>'); 
					}
				});
			});	

			$(document).ready(function(){
			$('#country2').on('change',function(){
				var countryID = $(this).val();
				if(countryID){
					$.ajax({
						type:'POST',
						url:'dashboard/ajaxpais.php',
						data:'country_id='+countryID,
						success:function(html){
							$('#state2').html(html);
							$('#city2').html('<option value="">City</option>'); 
						}
					}); 
				}else{
					$('#state2').html('<option value="">State</option>');
					$('#city2').html('<option value="">City</option>'); 
				}
			});
			
			$('#state2').on('change',function(){
				var stateID = $(this).val();
					if(stateID){
						$.ajax({
							type:'POST',
						   url:'dashboard/ajaxpais.php',
							data:'state_id='+stateID,
							success:function(html){
								$('#city2').html(html);
							}
						}); 
					}else{
						$('#city2').html('<option value="">Select state first</option>'); 
					}
				});
			});		
		</script>
		<!-- END PAGE LEVEL JS-->
		
		<script type="text/javascript" src="../dashboard/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<script type="text/javascript">
			$('.form_datetime').datetimepicker({
				//language:  'en',
				weekStart: 2,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 0,
				startView: 2,
				forceParse: 0,
				showMeridian: 3
			});
			$('.form_date').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 0,
				startView: 1,
				minView: 0,
				forceParse: 0
			});
			$('.form_time').datetimepicker({
				language:  'en',
				weekStart: 2,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 0,
				startView: 1,
				minView: 0,
				maxView: 1,
				forceParse: 0
			});
		</script>
</body>

</html>
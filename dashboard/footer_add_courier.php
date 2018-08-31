</div>

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
	
	<script src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>
    <!-- auto complate -->
    <script src="js/jquery.auto-complete.min.js"></script>
	<script>
		$(document).ready(function () {
			// create DateTimePicker from input HTML element
			$("#datetimepicker").kendoDateTimePicker({
				value: new Date(),
				dateInput: true
			});
		});
	</script>
	
	<script>
		$(document).ready(function () {
			// create DateTimePicker from input HTML element
			$("#datestimepicker").kendoDateTimePicker({
				value: new Date(),
				dateInput: true
			});
		});
	</script>
	
	<script type="text/javascript">
	$(function alertaBox()
	{
		$("div.alertaCaja").slideDown("fast");
		setTimeout(function(){
			window.history.replaceState( {} , '', document.URL.split('?')[0] );
			$("div.alertaCaja").slideUp("fast");
		}, 18000);
	});
	</script>

	<script type="text/javascript">

		function validateMail(idMail)
		{
			//We create an object or
			object=document.getElementById(idMail);
			valueForm=object.value;

			// Pattern for the mail
			var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
			if(valueForm.search(patron)==0)
			{
				//Mail correct
				object.style.color="#36D900";
				return;
			}
			//Mail incorrect
			object.style.color="#FF4000";
		}
		//-->
		document.getElementById('id_mail').addEventListener('input', function() {
			campo = event.target;
			valido = document.getElementById('emailOK');

			emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
			//Se muestra un texto a modo de ejemplo, luego va a ser un icono
			if (emailRegex.test(campo.value)) {
			 valido.innerText = "<?php echo $emailtext; ?>";
			} else {
			  valido.innerText = "<?php echo $emailtextx; ?>";
			}
		});
		
		function validateeMail(idMail)
		{
			//We create an object or
			object=document.getElementById(idMail);
			valueForm=object.value;

			// Pattern for the mail
			var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
			if(valueForm.search(patron)==0)
			{
				//Mail correct
				object.style.color="#36D900";
				return;
			}
			//Mail incorrect
			object.style.color="#FF4000";
		}
		//-->
		document.getElementById('idemail').addEventListener('input', function() {
			campo = event.target;
			valido = document.getElementById('mailOK');

			emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
			//Se muestra un texto a modo de ejemplo, luego va a ser un icono
			if (emailRegex.test(campo.value)) {
			 valido.innerText = "<?php echo $emailtext; ?>";
			} else {
			  valido.innerText = "<?php echo $emailtextx; ?>";
			}
		});

		function suma(){

			var num2 = "5.56789";
			var sum1 = document.getElementById("sum1");
			var sum2 = document.getElementById("sum2");
			var sum3 = document.getElementById("sum3");
			var sum4 = document.getElementById("sum4");
			var sum5 = document.getElementById("sum5");
			var sum6 = document.getElementById("sum6");
			var input = document.getElementById("resultado");
			resultado = parseFloat(Math.round(sum1.value * sum4.value) + parseFloat(sum6.value) + parseFloat(sum2.value * sum5.value/100)  + parseFloat(sum3.value)).toFixed(2);
			input.value= resultado;
		}

		function volumetrico(){

			var num2 = "1.341";
			var volume1 = document.getElementById("volume1");
			var volume2 = document.getElementById("volume2");
			var volume3 = document.getElementById("volume3");
			var input = document.getElementById("totalpeso");
			totalpeso = parseFloat(Math.round(volume1.value * volume2.value * volume3.value) /6000 ).toFixed(2);
			input.value= totalpeso;

		}
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#country').on('change',function(){
			var countryID = $(this).val();
			if(countryID){
				$.ajax({
					type:'POST',
					url:'ajaxpais.php',
					data:'country_id='+countryID,
					success:function(html){
						$('#state').html(html);
						$('#city').html('<option value="">City</option>');
					}
				});
			}else{
				$('#state').html('<option value="">Capital</option>');
				$('#city').html('<option value="">City</option>');
			}
		});

		$('#country').on('change',function(){
			var countryID = $(this).val();
			if(countryID){
				$.ajax({
					type:'POST',
					url:'ajaxpais.php',
					data:'iso='+countryID,
					success:function(html){
						$('#iso').html(html);
					}
				});
			}
		});

		$('#state').on('change',function(){
			var stateID = $(this).val();
			if(stateID){
				$.ajax({
					type:'POST',
					url:'ajaxpais.php',
					data:'state_id='+stateID,
					success:function(html){
						$('#city').html(html);
					}
				});
			}else{
				$('#city').html('<option value="">City</option>');
			}

		});
		$('#Shippername').on('blur',function(){
			var customer_id = getListValue($(this)[0]);
			if(customer_id){
				$.ajax({
					type:'POST',
					url:'ajaxpais.php',
					data:'customer_id='+customer_id,
					success:function(json){
						obj = JSON.parse(json);
						document.getElementById('Shipperaddress').setAttribute('value',obj.addresses);
						document.getElementById('idemail').setAttribute('value',obj.email);
						document.getElementById('Shippercc').setAttribute('value',obj.identification);
						document.getElementById('Shipperlocker').setAttribute('value',obj.lockerid);
						document.getElementById('Shipperphone').setAttribute('value',obj.telephone);
						document.getElementById('Shipperzipcode').setAttribute('value',obj.zip);
						document.getElementById('Shippercountry').setAttribute('value',obj.country);
						document.getElementById('Shipperstate').setAttribute('value',obj.state1);
						document.getElementById('Shipperciudad').setAttribute('value',obj.city);
						document.getElementById('Shipperiso').setAttribute('value',obj.isos);
						
					}
				});
			}else{
				///$('#city').html('<option value="">Ciudad</option>');
			}
		});


		function getListValue(input) {
			//var input = e.target,
				var list = input.getAttribute('list'),
				options = $('#' + list + ' option'),
				hiddenInput = $(input.id + '-hidden'),
				inputValue = input.value;

			hiddenInput.value = inputValue;

			for(var i = 0; i < options.length; i++) {
				var option = options[i];

				if(option.innerText === inputValue) {
					return hiddenInput.value = option.getAttribute('data-value');
					break;
				}
			}
		}

		//numero dos


		$('#Receivername').on('blur',function(){
			var customer_ida = getListValue($(this)[0]);
			if(customer_ida){
				$.ajax({
					type:'POST',
					url:'ajaxpais.php',
					data:'customer_id='+customer_ida,
					success:function(json){
						obj = JSON.parse(json);
						document.getElementById('Receiveraddress').setAttribute('value',obj.addresses);
						document.getElementById('id_mail').setAttribute('value',obj.email);
						document.getElementById('Receivercc_r').setAttribute('value',obj.identification);
						document.getElementById('Receiverphone').setAttribute('value',obj.telephone);						
						document.getElementById('Receivertelefono1').setAttribute('value',obj.phone2);
						document.getElementById('Receiverzipcode1').setAttribute('value',obj.zip);						
						document.getElementById('Receivercountry1').setAttribute('value',obj.country);
						document.getElementById('Receiverstate1').setAttribute('value',obj.state1);
						document.getElementById('Receivercity1').setAttribute('value',obj.city);
						document.getElementById('Receiveriso1').setAttribute('value',obj.isos);

					}

				});
			}
		});
        var listClientID = [];
        var ajax = $.ajax({
//            async:false,
            type:'POST',
            url:'ajaxpais.php',
            data:'list_client_ID=1',
            success:function(data){
                var listClientID = JSON.parse(data);
                $('#clientID').autoComplete({
                    minChars: 1,
                    source: function(term, suggest){
                        term = term.toLowerCase();
                        var suggestions = [];
                        for (var i = 0; i < listClientID.length; i++)
                            if (~listClientID[i].toLowerCase().indexOf(term)) suggestions.push(listClientID[i]);
                        suggest(suggestions);
                    }
                });
            }
        });

        $('#clientID').on('blur',function () {
            var clientID = this.value;
            getClientByID(clientID);
        });
        $('#clientID').on('keyup',function () {
            var clientID = this.value;
            getClientByID(clientID);
        });

        var addTrackingNumber = $('.add_tracking_number');
        var tracking = $('.tracking');
        var qnty = $('.qnty');
        var sumWeight = $('.sum #sum_weight');

        $('#btn_add_tracking_number').on('click', function () {
            addTrackingNumber.append('<div class="row tracking_number"><div class="col-sm-6 form-group" align="right">' +
                '<button class="btn btn-danger delTrackingNumber" type="button">Del</button></div>\n'+
                '<div class="col-sm-3 form-group"><input type="text" class="form-control" name="tracking_number[]" placeholder="Tracking number" required="required"></div>\n'+
                '<div class="col-sm-3 form-group"><input type="number" class="form-control input_weight" name="weight[]" placeholder="Weight(kg)" required="required"></div></div>')
        });

        addTrackingNumber.on('click', '.delTrackingNumber', function () {
            $(this).parents('.tracking_number').remove();
            var inputWeight = $('.tracking input.input_weight');
            var count = 0;
            var i = 0;
            inputWeight.each(function () {
                var weight = $(this).val();
                if (weight !== "NaN") {
                    i++;
                    count += parseInt(weight) > 0 ? parseInt(weight) : 0;
                }
            });
            sumWeight.html(count + ' kg');
            qnty.val(i);
        });

        tracking.on('keyup blur', '.input_weight', function () {
            var inputWeight = $('.tracking input.input_weight');
            var count = 0;
            var i = 0;
            inputWeight.each(function () {
                var weight = $(this).val();
                if (weight !== "NaN") {
                    i++;
                    count += parseInt(weight) > 0 ? parseInt(weight) : 0;
                }
            });
            sumWeight.html(count + ' kg');
            qnty.val(i);
        });

        var inputWeight = $('.tracking input.input_weight');
        var count = 0;
        var i = 0;
        inputWeight.each(function () {
            var weight = $(this).val();
            if (weight !== "NaN") {
                i++;
                count += parseInt(weight) > 0 ? parseInt(weight) : 0;
            }
        });
        sumWeight.html(count + ' kg');
        qnty.val(0);

        var sum1 = $('#sum1');//VND 1kg
        var sum4 = $('#sum4');//weight kg
        var sum7 = $('#sum7');//phu phi
        var sum8 = $('#sum8');//subtotal 1
        var volume4 = $('#volume4');//VND m3
        var totalpeso = $('#totalpeso');//the tich
        var volume5 = $('#volume5');//phu phi
        var sum9 = $('#sum9');//subtotal 2
        var volume1 = $('#volume1');//height
        var volume2 = $('#volume2');//width
        var volume3 = $('#volume3');//length
        var subtotal_shipping = $('#resultado');//subtotal shipping
        var total = $('#shipping_subtotal');//subtotal shipping

        sum1.on('keyup blur', function () {
            var current = $(this);
            var sum = 0;
            if (current.val() === "" || sum4.val() === "") {
                if (sum7.val() !== "")  {
                    sum = parseFloat(sum7.val());
                }
            } else {
                sum = parseFloat(current.val()) * parseFloat(sum4.val());
                if (sum7.val() !== "") {
                    sum += parseFloat(sum7.val());
                }
            }
            sum8.val(sum.toFixed(2));
            subtotal_shipping.val((sum + parseFloat(sum9.val())).toFixed(2));
            total.val((sum + parseFloat(sum9.val())).toFixed(2));
        });

        sum4.on('keyup blur', function () {
            var current = $(this);
            var sum = 0;
            if (current.val() === "" || sum1.val() === "") {
                if (sum7.val() !== "")  {
                    sum = parseFloat(sum7.val());
                }
            } else {
                sum = parseFloat(current.val()) * parseFloat(sum1.val());
                if (sum7.val() !== "") {
                    sum += parseFloat(sum7.val());
                }
            }
            sum8.val(sum.toFixed(2));
            subtotal_shipping.val((sum + parseFloat(sum9.val())).toFixed(2));
            total.val((sum + parseFloat(sum9.val())).toFixed(2));
        });

        sum7.on('keyup blur', function () {
            var current = $(this);
            var sum = 0;
            if (sum4.val() === "" || sum1.val() === "") {
                if (current.val() !== "")  {
                    sum = parseFloat(current.val());
                }
            } else {
                sum = parseFloat(sum4.val()) * parseFloat(sum1.val());
                if (current.val() !== "") {
                    sum += parseFloat(current.val());
                }
            }
            sum8.val(sum.toFixed(2));
            subtotal_shipping.val((sum + parseFloat(sum9.val())).toFixed(2));
            total.val((sum + parseFloat(sum9.val())).toFixed(2));
        });

        volume1.on('keyup blur', function () {
            var current = $(this);
            var sum = 0;
            if (current.val() !== "" && volume2.val() !== "" && volume3.val() !== "") {
                sum = parseInt(current.val()) * parseInt(volume2.val()) * parseInt(volume3.val());
            }
            var sum_1 = 0;
            if (volume4.val() === "") {
                if (volume5.val() !== "") {
                    sum_1 = parseFloat(volume5.val());
                }
            } else {
                sum_1 += sum * parseFloat(volume4.val());
                if (volume5.val() !== "") {
                    sum_1 += parseFloat(volume5.val());
                }
            }

            totalpeso.val(sum);
            sum9.val(sum_1.toFixed(2));
            subtotal_shipping.val((sum_1 + parseFloat(sum8.val())).toFixed(2));
            total.val((sum_1 + parseFloat(sum8.val())).toFixed(2));
        });

        volume2.on('keyup blur', function () {
            var current = $(this);
            var sum = 0;
            if (current.val() !== "" && volume1.val() !== "" && volume3.val() !== "") {
                sum = parseInt(current.val()) * parseInt(volume1.val()) * parseInt(volume3.val());
            }
            var sum_1 = 0;
            if (volume4.val() === "") {
                if (volume5.val() !== "") {
                    sum_1 = parseFloat(volume5.val());
                }
            } else {
                sum_1 += sum * parseFloat(volume4.val());
                if (volume5.val() !== "") {
                    sum_1 += parseFloat(volume5.val());
                }
            }
            totalpeso.val(sum);
            sum9.val(sum_1.toFixed(2));
            subtotal_shipping.val((sum_1 + parseFloat(sum8.val())).toFixed(2));
            total.val((sum_1 + parseFloat(sum8.val())).toFixed(2));
        });

        volume3.on('keyup blur', function () {
            var current = $(this);
            var sum = 0;
            if (current.val() !== "" && volume2.val() !== "" && volume1.val() !== "") {
                sum = parseInt(current.val()) * parseInt(volume2.val()) * parseInt(volume1.val());
            }
            var sum_1 = 0;
            if (volume4.val() === "") {
                if (volume5.val() !== "") {
                    sum_1 = parseFloat(volume5.val());
                }
            } else {
                sum_1 += sum * parseFloat(volume4.val());
                if (volume5.val() !== "") {
                    sum_1 += parseFloat(volume5.val());
                }
            }
            totalpeso.val(sum);
            sum9.val(sum_1.toFixed(2));
            subtotal_shipping.val((sum_1 + parseFloat(sum8.val())).toFixed(2));
            total.val((sum_1 + parseFloat(sum8.val())).toFixed(2));
        });

        volume4.on('keyup blur', function () {
            var current = $(this);
            var sum = 0;
            if (current.val() === "") {
                if (volume5.val() !== "") {
                    sum = parseFloat(volume5.val());
                }
            } else {
                sum = parseFloat(current.val()) * parseInt(totalpeso.val());
                if (volume5.val() !== "") {
                    sum += parseFloat(volume5.val());
                }
            }
            sum9.val(sum.toFixed(2));
            subtotal_shipping.val((sum + parseFloat(sum8.val())).toFixed(2));
            total.val((sum + parseFloat(sum8.val())).toFixed(2));
        });

        volume5.on('keyup blur', function () {
            var current = $(this);
            var sum = 0;
            if (current.val() !== "") {
                sum += parseFloat(current.val());
            }
            if (volume4.val() !== "") {
                sum +=  parseFloat(volume4.val()) * parseInt(totalpeso.val());
            }
            sum9.val(sum.toFixed(2));
            subtotal_shipping.val((sum + parseFloat(sum8.val())).toFixed(2));
            total.val((sum + parseFloat(sum8.val())).toFixed(2));
        });
	});

	function getClientByID(clientID) {
        if(clientID){
            $.ajax({
                type:'POST',
                url:'ajaxpais.php',
                data:'clientID='+clientID,
                success:function(json){
                    obj = JSON.parse(json);
                    document.getElementById('Receiveraddress').setAttribute('value', obj.addresses);
                    document.getElementById('Receivername').setAttribute('value', obj.nombre);
                    document.getElementById('id_mail').setAttribute('value',obj.email);
                    document.getElementById('Receivercc_r').setAttribute('value',obj.identification);
                    document.getElementById('Receiverphone').setAttribute('value',obj.telephone);
                    document.getElementById('Receivertelefono1').setAttribute('value',obj.phone2);
                    document.getElementById('Receiverzipcode1').setAttribute('value',obj.zip);
                    document.getElementById('Receivercountry1').setAttribute('value',obj.country);
                    document.getElementById('Receiverstate1').setAttribute('value',obj.state1);
                    document.getElementById('Receivercity1').setAttribute('value',obj.city);
                    document.getElementById('Receiveriso1').setAttribute('value',obj.isos);

                }

            });
        }
    }
	</script>	
</body>
</html>
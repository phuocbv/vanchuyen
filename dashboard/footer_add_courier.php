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
<script src="js/simple.money.format.js"></script>
<script>
    $(document).ready(function () {
        // create DateTimePicker from input HTML element
        $("#datetimepicker").kendoDateTimePicker({
            value: new Date(),
            dateInput: true
        });
        $('.sum1').simpleMoneyFormat();
        $('.sum4').simpleMoneyFormat();
        $('.sum7').simpleMoneyFormat();
//            $('.sum8').simpleMoneyFormat();
//            $('.volume1').simpleMoneyFormat();
//            $('.volume2').simpleMoneyFormat();
//            $('.volume3').simpleMoneyFormat();

        $('.volume4').simpleMoneyFormat();
        $('.volume5').simpleMoneyFormat();
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
    $(function alertaBox() {
        $("div.alertaCaja").slideDown("fast");
        setTimeout(function () {
            window.history.replaceState({}, '', document.URL.split('?')[0]);
            $("div.alertaCaja").slideUp("fast");
        }, 18000);
    });
</script>

<script type="text/javascript">

    function validateMail(idMail) {
        //We create an object or
        object = document.getElementById(idMail);
        valueForm = object.value;

        // Pattern for the mail
        var patron = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        if (valueForm.search(patron) == 0) {
            //Mail correct
            object.style.color = "#36D900";
            return;
        }
        //Mail incorrect
        object.style.color = "#FF4000";
    }

    //-->
    document.getElementById('id_mail').addEventListener('input', function () {
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

    function validateeMail(idMail) {
        //We create an object or
        object = document.getElementById(idMail);
        valueForm = object.value;

        // Pattern for the mail
        var patron = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        if (valueForm.search(patron) == 0) {
            //Mail correct
            object.style.color = "#36D900";
            return;
        }
        //Mail incorrect
        object.style.color = "#FF4000";
    }

    //-->
    document.getElementById('idemail').addEventListener('input', function () {
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

    function suma() {

        var num2 = "5.56789";
        var sum1 = document.getElementById("sum1");
        var sum2 = document.getElementById("sum2");
        var sum3 = document.getElementById("sum3");
        var sum4 = document.getElementById("sum4");
        var sum5 = document.getElementById("sum5");
        var sum6 = document.getElementById("sum6");
        var input = document.getElementById("resultado");
        resultado = parseFloat(Math.round(sum1.value * sum4.value) + parseFloat(sum6.value) + parseFloat(sum2.value * sum5.value / 100) + parseFloat(sum3.value)).toFixed(2);
        input.value = resultado;
    }

    function volumetrico() {

        var num2 = "1.341";
        var volume1 = document.getElementById("volume1");
        var volume2 = document.getElementById("volume2");
        var volume3 = document.getElementById("volume3");
        var input = document.getElementById("totalpeso");
        totalpeso = parseFloat(Math.round(volume1.value * volume2.value * volume3.value) / 6000).toFixed(2);
        input.value = totalpeso;

    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#country').on('change', function () {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxpais.php',
                    data: 'country_id=' + countryID,
                    success: function (html) {
                        $('#state').html(html);
                        $('#city').html('<option value="">City</option>');
                    }
                });
            } else {
                $('#state').html('<option value="">Capital</option>');
                $('#city').html('<option value="">City</option>');
            }
        });

        $('#country').on('change', function () {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxpais.php',
                    data: 'iso=' + countryID,
                    success: function (html) {
                        $('#iso').html(html);
                    }
                });
            }
        });

        $('#state').on('change', function () {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxpais.php',
                    data: 'state_id=' + stateID,
                    success: function (html) {
                        $('#city').html(html);
                    }
                });
            } else {
                $('#city').html('<option value="">City</option>');
            }

        });
        $('#Shippername').on('blur', function () {
            var customer_id = getListValue($(this)[0]);
            if (customer_id) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxpais.php',
                    data: 'customer_id=' + customer_id,
                    success: function (json) {
                        obj = JSON.parse(json);
                        document.getElementById('Shipperaddress').setAttribute('value', obj.addresses);
                        document.getElementById('idemail').setAttribute('value', obj.email);
                        document.getElementById('Shippercc').setAttribute('value', obj.identification);
                        document.getElementById('Shipperlocker').setAttribute('value', obj.lockerid);
                        document.getElementById('Shipperphone').setAttribute('value', obj.telephone);
                        document.getElementById('Shipperzipcode').setAttribute('value', obj.zip);
                        document.getElementById('Shippercountry').setAttribute('value', obj.country);
                        document.getElementById('Shipperstate').setAttribute('value', obj.state1);
                        document.getElementById('Shipperciudad').setAttribute('value', obj.city);
                        document.getElementById('Shipperiso').setAttribute('value', obj.isos);

                    }
                });
            } else {
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

            for (var i = 0; i < options.length; i++) {
                var option = options[i];

                if (option.innerText === inputValue) {
                    return hiddenInput.value = option.getAttribute('data-value');
                    break;
                }
            }
        }

        //numero dos


        $('#Receivername').on('blur', function () {
            var customer_ida = getListValue($(this)[0]);
            if (customer_ida) {
                $.ajax({
                    type: 'POST',
                    url: 'ajaxpais.php',
                    data: 'customer_id=' + customer_ida,
                    success: function (json) {
                        obj = JSON.parse(json);
                        document.getElementById('Receiveraddress').setAttribute('value', obj.addresses);
                        document.getElementById('id_mail').setAttribute('value', obj.email);
                        document.getElementById('Receivercc_r').setAttribute('value', obj.identification);
                        document.getElementById('Receiverphone').setAttribute('value', obj.telephone);
                        document.getElementById('Receivertelefono1').setAttribute('value', obj.phone2);
                        document.getElementById('Receiverzipcode1').setAttribute('value', obj.zip);
                        document.getElementById('Receivercountry1').setAttribute('value', obj.country);
                        document.getElementById('Receiverstate1').setAttribute('value', obj.state1);
                        document.getElementById('Receivercity1').setAttribute('value', obj.city);
                        document.getElementById('Receiveriso1').setAttribute('value', obj.isos);

                    }

                });
            }
        });
        var listClientID = [];
        var ajax = $.ajax({
//            async:false,
            type: 'POST',
            url: 'ajaxpais.php',
            data: 'list_client_ID=1',
            success: function (data) {
                var listClientID = JSON.parse(data);
                $('#clientID').autoComplete({
                    minChars: 1,
                    source: function (term, suggest) {
                        term = term.toLowerCase();
                        var suggestions = [];
                        for (var i = 0; i < listClientID.length; i++)
                            if (~listClientID[i].toLowerCase().indexOf(term)) suggestions.push(listClientID[i]);
                        suggest(suggestions);
                    }
                });
            }
        });

        $('#clientID').on('blur', function () {
            var clientID = this.value;
            getClientByID(clientID);
        });
        $('#clientID').on('keyup', function () {
            var clientID = this.value;
            getClientByID(clientID);
        });

        var addTrackingNumber = $('.add_tracking_number');
        var addTrackingM3 = $('.add_tracking_number_m3');
        var tracking = $('.tracking');
        var qnty = $('.qnty');
        var sumWeight = $('#sum_weight');
        $('#list_tracking_m3').find('.input_m3').simpleMoneyFormat();

        $('#btn_add_tracking_number').on('click', function () {
            addTrackingNumber.append('<div class="row tracking_number"><div class="col-sm-6 form-group" align="right">' +
                '<button class="btn btn-danger delTrackingNumber" type="button">Del(kg)</button></div>\n' +
                '<div class="col-sm-3 form-group"><input type="text" class="form-control" name="tracking_number[]" placeholder="Tracking number" required="required"></div>\n' +
                '<div class="col-sm-3 form-group"><input type="text" class="form-control input_weight" name="weight[]" placeholder="Weight(kg)" required="required"></div></div>')
            addTrackingNumber.find('.input_weight').simpleMoneyFormat();
        });

        addTrackingNumber.on('click', '.delTrackingNumber', function () {
            $(this).parents('.tracking_number').remove();
        });

        $('#btn_add_tracking_m3').on('click', function () {
            addTrackingM3.append('<div class="row tracking_m3">\n' +
                '                                                                <div class="col-sm-6 form-group" align="right">\n' +
                '                                                                    <button class="btn btn-danger btn_del_tracking_m3" type="button">Del(m3)\n' +
                '                                                                    </button>\n' +
                '                                                                </div>\n' +
                '                                                                <div class="col-sm-3 form-group">\n' +
                '                                                                    <input type="text" class="form-control"\n' +
                '                                                                           name="tracking_number_m3[]"\n' +
                '                                                                           placeholder="tracking m3"\n' +
                '                                                                           required="required">\n' +
                '                                                                </div>\n' +
                '                                                                <div class="col-sm-3 form-group">\n' +
                '                                                                    <input type="text" class="form-control input_m3"\n' +
                '                                                                           name="m3[]"\n' +
                '                                                                           placeholder="m3"\n' +
                '                                                                           required="required">\n' +
                '                                                                </div>\n' +
                '                                                            </div>')
            addTrackingM3.find('.input_m3').simpleMoneyFormat();
        });

        $('#list_tracking_m3').on('click', '.btn_del_tracking_m3', function () {
            $(this).closest('.tracking_m3').remove();
        });


        //phan tinh subtotal shipping
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

        $('#caculator').on('click', function () {
            var tong = 0;
            var count = 0;
            var trackingNumber = 0;
            var trackingM3 = 0;
            $('#list_tracking').find('.input_weight').each(function () {
                var current = $(this);
                count++;
                trackingNumber += parseFloat(current.val().replace(/\./g, ''));
            });
            $('#list_tracking_m3').find('.input_m3').each(function () {
                var current = $(this);
                trackingM3 += parseFloat(current.val().replace(/\./g, ''));
                count++;
            });
            $('#caculator_list_caculator_1').find('.del_subtotal_1').each(function () {
                var current = $(this);
                var subtotal_1 = parseFloat(current.find('.sum1').val().replace(/\./g, ''))
                    * parseFloat(current.find('.sum4').val().replace(/\./g, ''))
                    + parseFloat(current.find('.sum7').val().replace(/\./g, ''));
                current.find('.sum8').val(subtotal_1.formatMoney(0, ',', '.'));
                tong += subtotal_1;
            });
            $('#caculator_list_caculator_2').find('.show_subtotal_2').each(function () {
                var current = $(this);
                var the_tich = parseFloat(current.find('.volume1').val().replace(',', '.'))
                    * parseFloat(current.find('.volume2').val().replace(',', '.'))
                    * parseFloat(current.find('.volume3').val().replace(',', '.'));
                current.find('.totalpeso').val(the_tich.toFixed(2).replace('.', ','));
                var subtotal_2 = parseFloat(current.find('.volume4').val().replace(/\./g, ''))
                    * parseFloat(current.find('.totalpeso').val().replace(',', '.'))
                    + parseFloat(current.find('.volume5').val().replace(/\./g, ''));
                current.find('.sum9').val(subtotal_2.formatMoney(0, ',', '.'));
                tong += subtotal_2;
            });
            sumWeight.val(trackingNumber.formatMoney(0, ',', '.'));
            $('#sum_m3').val(trackingM3.formatMoney(0, ',', '.'));
            subtotal_shipping.val(tong.formatMoney(0, ',', '.'));
            total.val(tong);
            qnty.val(count);
        });

        $('.tracking .input_weight').simpleMoneyFormat();

        $('#add_subtotal_1').on('click', function () {
            $('#list_subtotal_1').append('<div class="row del_subtotal_1"><div class="col-sm-2 form-group">\n' +
                '<input type="text" class="form-control sum1" id="sum1" name="sum1[]" value="0"/>' +
                '</div>\n' +
                '<div class="col-sm-2 form-group">\n' +
                '<input type="text" class="form-control sum4" id="sum4" name="sum4[]" value="0"/>\n' +
                '</div>\n' +
                '<div class="col-sm-2 form-group">\n' +
                '<input type="text" class="form-control sum7" value="0" id="sum7" name="sum7[]"/>\n' +
                '</div>\n' +
                '<div class="col-sm-3 form-group">\n' +
                '<input type="text" name="" value="0" disabled id="sum8" class="form-control sum8">\n' +
                '</div>\n' +
                '<div class="col-sm-3 form-group">\n' +
                '<button class="btn btn-danger btn_del_subtotal_1" type="button">Del\n' +
                '</button>\n' +
                '</div></div>')
            $('#list_subtotal_1').find('.sum1').simpleMoneyFormat();
            $('#list_subtotal_1').find('.sum4').simpleMoneyFormat();
            $('#list_subtotal_1').find('.sum7').simpleMoneyFormat();
        });
        $('#list_subtotal_1').on('click', '.btn_del_subtotal_1', function () {
            $(this).closest('.del_subtotal_1').remove();
        });

        //add_subtotal_2
        $('#add_subtotal_2').on('click', function () {
            $('#list_subtotal_2').append('<div class="show_subtotal_2"><div class="row">\n' +
                '                                                            <div class="col-sm-3 form-group">\n' +
                '                                                                <label class="text-primary"><strong>Height</strong></label>\n' +
                '                                                                <input type="text" class="form-control volume1" id="volume1" name="volume1[]" value="0"/>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col-sm-3 form-group">\n' +
                '                                                                <label class="text-primary"><strong>Width</strong></label>\n' +
                '                                                                <input type="text" class="form-control volume2" id="volume2" name="volume2[]" value="0"/>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col-sm-3 form-group">\n' +
                '                                                                <label class="text-primary"><strong>Length</strong></label>\n' +
                '                                                                <input type="text" class="form-control volume3" id="volume3" name="volume3[]" value="0"/>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col-sm-3 form-group" style="padding-top: 25px">\n' +
                '                                                                <label class="text-primary"></label>\n' +
                '                                                                <button class="btn btn-danger btn_del_subtotal_2" type="button">Del\n' +
                '                                                                </button>\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '\n' +
                '                                                        <!-- m3-->\n' +
                '                                                        <div class="row">\n' +
                '                                                            <div class="col-sm-3 form-group">\n' +
                '                                                                <label class="text-primary"><strong>VND 1 m3</strong></label>\n' +
                '                                                                <input type="text" class="form-control volume4" value="0" id="volume4" name="volume4[]"/>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col-sm-3 form-group">\n' +
                '                                                                <label class="text-primary"><strong>Total (m3)</strong></label>\n' +
                '                                                                <input type="text" class="form-control totalpeso" name="totalpeso" id="totalpeso" value="0" disabled/>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col-sm-3 form-group">\n' +
                '                                                                <label class="text-primary"><strong>Phụ phí</strong></label>\n' +
                '                                                                <input type="text" class="form-control volume5" value="0" id="volume5" name="volume5[]"/>\n' +
                '                                                            </div>\n' +
                '                                                            <div class="col-sm-3 form-group">\n' +
                '                                                                <label class="text-primary"><strong>Subtotal 2</strong></label>\n' +
                '                                                                <input type="text" class="form-control sum9" value="0" disabled id="sum9"/>\n' +
                '                                                            </div>\n' +
                '                                                        </div></div>');
    //            $('#list_subtotal_2').find('.volume1').simpleMoneyFormat();
    //            $('#list_subtotal_2').find('.volume2').simpleMoneyFormat();
    //            $('#list_subtotal_2').find('.volume3').simpleMoneyFormat();
            $('#list_subtotal_2').find('.volume4').simpleMoneyFormat();
            $('#list_subtotal_2').find('.volume5').simpleMoneyFormat();
        });

        $('#list_subtotal_2').on('click', '.btn_del_subtotal_2', function () {
            $(this).closest('.show_subtotal_2').remove();
        })
    });

    function getClientByID(clientID) {
        if (clientID) {
            $.ajax({
                type: 'POST',
                url: 'ajaxpais.php',
                data: 'clientID=' + clientID,
                success: function (json) {
                    obj = JSON.parse(json);
                    document.getElementById('Receiveraddress').setAttribute('value', obj.addresses);
                    document.getElementById('Receivername').setAttribute('value', obj.nombre);
                    document.getElementById('id_mail').setAttribute('value', obj.email);
                    document.getElementById('Receivercc_r').setAttribute('value', obj.identification);
                    document.getElementById('Receiverphone').setAttribute('value', obj.telephone);
                    document.getElementById('Receivertelefono1').setAttribute('value', obj.phone2);
                    document.getElementById('Receiverzipcode1').setAttribute('value', obj.zip);
                    document.getElementById('Receivercountry1').setAttribute('value', obj.country);
                    document.getElementById('Receiverstate1').setAttribute('value', obj.state1);
                    document.getElementById('Receivercity1').setAttribute('value', obj.city);
                    document.getElementById('Receiveriso1').setAttribute('value', obj.isos);

                }

            });
        }
    }

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
</script>
</body>
</html>
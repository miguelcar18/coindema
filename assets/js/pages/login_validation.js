/* ------------------------------------------------------------------------------
*
*  # Login form with validation
*
*  Specific JS code additions for login_validation.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {

	// Style checkboxes and radios
	$('.styled').uniform();


    // Setup validation
    $(".form-validate").validate({
        ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            //label.addClass("validation-valid-label").text("Correcto")
            label.addClass("validation-valid-label")
        },
        rules: {
            password: {
                minlength: 4
            }
        },
        messages: {
            username: "Ingrese su nombre de usuario",
            password: {
            	required: "Ingrese su contraseña",
            	minlength: jQuery.validator.format("Al menos {0} caracteres requeridos")
            }
        },
        submitHandler: function () {
            var accion = '';
            var cargando = '<img src="assets/images/loader.gif" />';
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#loginForm")[0]);
            $.ajax({
                url:  $("form#loginForm").attr('action'),
                type: $("form#loginForm").attr('method'),
                headers: {'X-CSRF-TOKEN' : token},
                data: formData,
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $('div#respuesta').css('display', 'block');
                    $('div#respuesta').html(cargando);
                    $('.btn-primary').attr('disabled', true);
                },
                success:function(respuesta){
                    if(respuesta.message == "error")
                    {
                        var mensaje = '<div class="alert bg-danger-400 alert-styled-left">';
                        mensaje+='<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>';
                        mensaje+='<span class="text-semibold">¡Error! </span> Usuario y/o contraseña incorrectos.';
                        mensaje+='</div>';
                        $('div#respuesta').empty();
                        $('div#respuesta').fadeOut(10000).html(mensaje);
                        $('.btn-primary').attr('disabled', false);
                    }
                    else
                    {
                        $('div#respuesta').empty();
                        window.location = 'http://'+window.location.host+"/coindema/";
                    }
                }
            })            
        return false;
    }
    });

});

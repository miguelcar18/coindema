/********
    
$('#username').blur(function(){
    $('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);
    var username = $(this).val();        
    var dataString = 'username='+username;
    $.ajax({
        type: "POST",
        url: "check_username_availablity.php",
        data: dataString,
        success: function(data) {
            $('#Info').fadeIn(1000).html(data);
        }
    });
});              

********/


function errorPlacement(error, element){
    if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
        if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
            error.appendTo( element.parent().parent().parent().parent() );
        }
         else {
            error.appendTo( element.parent().parent().parent().parent().parent() );
        }
    }
    else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
        error.appendTo( element.parent().parent().parent() );
    }
    else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
        error.appendTo( element.parent() );
    }
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
}

function mensajeExito(textoMensaje){
    var alertMessage = '<div class="alert bg-success alert-styled-left">';
    alertMessage+='<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Cerrar</span></button>';
    alertMessage+='<span class="text-bold">Exito! </span> '+textoMensaje;
    alertMessage+='</div>';
    return alertMessage;
}

function mensajeError(textoMensaje){
    var mensaje = '<div class="alert bg-danger-400 alert-styled-left">';
    mensaje+='<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Cerrar</span></button>';
    mensaje+='<span class="text-bold">¡Error! </span> '+textoMensaje;
    mensaje+='</div>';
    return mensaje;
}

$(function() {
	// Style checkboxes and radios
	$('.styled').uniform();

    // Formulario comunicaciones
    $('.pickadate-comunicacion').pickadate({
        labelMonthNext: 'Ir al mes siguiente',
        labelMonthPrev: 'Ir al mes anterior',
        labelMonthSelect: 'Escoja un mes de la lista desplegable',
        labelYearSelect: 'Escoja un año de la lista desplegable',
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        format: 'dd/mm/yyyy',
        today: 'Hoy',
        clear: 'Limpiar',
        formatSubmit: 'yyyy-mm-dd',
        selectMonths: true,
        selectYears: true
    });

    $(".switch").bootstrapSwitch();

    $('div#respuesta').fadeOut(10000);

    /******* Editar Usuario *******/
    $("#editUserForm").validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            username: {
                required: true
            },
            rol: {
                required: true
            }
        },
        messages: {
            name: "Ingrese un nombre y apellido",
            email: {
                required: "Ingrese un email",
                email: "Ingrese un email válido"
            },
            username: "Ingrese un nombre de usuario",
            rol: "Seleccione un rol"
        },
        ignore: 'input[type=hidden], .select2-search__field',
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        validClass: "validation-valid-label",
        highlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        unhighlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        errorPlacement: function (error, element){ errorPlacement(error, element); },
        success: function(label) { label.addClass("validation-valid-label").text("Correcto") }
    });

    /******* Agregar Usuario *******/
    $("#addUserForm").validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            username: {
                required: true
            },
            rol: {
                required: true
            },
            password: {
                required: true,
                minlength: 4
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            name: "Ingrese un nombre y apellido",
            email: {
                required: "Ingrese un email",
                email: "Ingrese un email válido"
            },
            username: "Ingrese un nombre de usuario",
            rol: "Seleccione un rol",
            password: "Ingrese una contraseña",
            password_confirmation: {
                required: "Confirme la contraseña ingresada",
                equalTo: "Ambas contraseñas deben de ser iguales"
            }
        },
        submitHandler: function () {
            var accion = '';
            var cargando = '<img src="../assets/images/loader.gif" />';
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#addUserForm")[0]);
            $.ajax({
                url:  $("form#addUserForm").attr('action'),
                type: $("form#addUserForm").attr('method'),
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
                    $('div#respuesta').empty();
                    if(respuesta.message == "error")
                    {
                        var mensaje = mensajeError('Error al ingresar los datos.');
                        $('div#respuesta').fadeOut(10000).html(mensaje);
                        $('.btn-primary').attr('disabled', false);
                    }
                    else if(respuesta.message == "correcto")
                    {
                        var alertMessage = mensajeExito('Usuario creado satisfactoriamente.');
                        $('#respuesta').html(alertMessage);
                        $('div#respuesta').fadeIn();
                        $('#addUserForm').reset();
                        $("#file").val("");
                        $('.btn-primary').attr('disabled', false);
                        $('div#respuesta').fadeOut(10000);
                    }
                }
            })  
            return false;
        },
        ignore: 'input[type=hidden], .select2-search__field',
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        validClass: "validation-valid-label",
        highlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        unhighlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        errorPlacement: function (error, element){ errorPlacement(error, element); },
        success: function(label) { label.addClass("validation-valid-label").text("Correcto") }
    });

    /******* Cambiar contraseña *******/
    $("#passwordForm").validate({
        rules: {
            password_actual: {
                required: true,
                minlength: 4
            },
            password: {
                required: true,
                minlength: 4
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            password_actual: {
                required: "Ingrese la contraseña actual",
                minlength: "Ingrese un mínimo de {0} caracteres"
            },
            password: {
                required: "Ingrese una nueva contraseña",
                minlength: "Ingrese un mínimo de {0} caracteres"
            },
            password_confirmation: {
                required: "Confirme la nueva contraseña",
                equalTo: "Ambas contraseñas deben de ser iguales"
            }
        },
        submitHandler: function () {
            var accion = '';
            var cargando = '<img src="../assets/images/loader.gif" />';
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#passwordForm")[0]);

            $.ajax({
                url:  $("form#passwordForm").attr('action'),
                type: $("form#passwordForm").attr('method'),
                headers: {'X-CSRF-TOKEN' : token},
                data: formData,
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $('div#respuesta').css('display', 'block');
                    $('.btn-info').attr('disabled', true);
                },
                success:function(respuesta){
                    $('#respuesta').empty();
                    if(respuesta.message == "correcto")
                    {
                        var alertMessage = mensajeExito('Contraseña cambiada satisfactoriamente.');
                        $('#respuesta').html(alertMessage);
                        $('div#respuesta').fadeIn();
                        $('#passwordForm').reset();
                        $('.btn-info').attr('disabled', false);
                        $('div#respuesta').fadeOut(10000);
                    }
                    else if(respuesta.message == "error")
                    {
                        var alertMessageError = mensajeError('La contraseña acutal ingresada es incorrecta.');
                        $('#respuesta').html(alertMessageError);
                        $('div#respuesta').fadeIn();
                        $('.btn-info').attr('disabled', false);
                        $('#password_actual').focus();
                        $('div#respuesta').fadeOut(10000);
                    }
                }
            })
            return false;
        },
        ignore: 'input[type=hidden], .select2-search__field',
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        validClass: "validation-valid-label",
        highlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        unhighlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        errorPlacement: function (error, element){ errorPlacement(error, element); },
        success: function(label) { label.addClass("validation-valid-label").text("Correcto") }
    });

    /******* Formulario vehiculo ******/
    $("#vehiculoForm").validate({
        rules: {
            unidad: {
                required: true
            },
            marca: {
                required: true
            },
            modelo: {
                required: true
            },
            placa: {
                required: true
            },
            serial: {
                required: true
            },
            carroceria: {
                required: true
            },
            serial_motor: {
                required: true
            },
            color: {
                required: true
            },
            departamento: {
                required: true
            },
            estado: {
                required: true
            }
        },
        messages: {
            unidad: {
                required: "Ingrese una unidad"
            },
            marca: {
                required: "Ingrese una marca"
            },
            modelo: {
                required: "Ingrese un modelo"
            },
            placa: {
                required: "Ingrese una placa"
            },
            serial: {
                required: "Ingrese un serial"
            },
            carroceria: {
                required: "Ingrese una carroceria"
            },
            serial_motor: {
                required: "Ingrese el serial del motor"
            },
            color: {
                required: "Ingrese el color"
            },
            departamento: {
                required: "Seleccione un departamento"
            },
            estado: {
                required: "Ingrese la condición del vehiculo"
            }
        },
        submitHandler: function () {
            var accion = '';
            var cargando = '';
            if($("button#submit").attr('data') == 1)
            {
                accion = 'agregado';
                cargando = '<img src="../assets/images/loader.gif" />';
            }
            else if($("button#submit").attr('data') == 0)
            {
                accion = 'actualizado';
                cargando = '<img src="../../assets/images/loader.gif" />';
            }
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#vehiculoForm")[0]);
            $.ajax({
                url:  $("form#vehiculoForm").attr('action'),
                type: $("form#vehiculoForm").attr('method'),
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
                    var alertMessage = mensajeExito('Vehiculo '+accion+' satisfactoriamente.');
                    $('#respuesta').html(alertMessage);
                    $('div#respuesta').fadeIn();
                    if($("button#submit").attr('data') == 1)
                        $('#vehiculoForm').reset();
                    $('.btn-primary').attr('disabled', false);
                    $('div#respuesta').fadeOut(10000);
                }
            })  
            return false;
        },
        ignore: 'input[type=hidden], .select2-search__field',
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        validClass: "validation-valid-label",
        highlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        unhighlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        errorPlacement: function (error, element){ errorPlacement(error, element); },
        success: function(label) { label.addClass("validation-valid-label").text("Correcto") }
    });

    /******* Formulario inventario ******/
    $("#inventarioForm").validate({
        rules: {
            producto: {
                required: true
            },
            modelo: {
                required: true
            },
            marca: {
                required: true
            },
            cantidad: {
                required: true,
                number: true
            },
            serial: {
                required: true
            },
            departamento: {
                required: true
            }
        },
        messages: {
            producto: {
                required: "Seleccione un tipo de producto"
            },
            modelo: {
                required: "Ingrese un modelo"
            },
            marca: {
                required: "Ingrese una marca"
            },
            cantidad: {
                required: "Ingrese una cantidad", 
                number: "Ingrese solo números"
            },
            serial: {
                required: "Ingrese un serial"
            },
            departamento: {
                required: "Seleccione un departamento"
            }
        },
        submitHandler: function () {
            var accion = '';
            var cargando = '';
            if($("button#submit").attr('data') == 1)
            {
                accion = 'agregado';
                cargando = '<img src="../assets/images/loader.gif" />';
            }
            else if($("button#submit").attr('data') == 0)
            {
                accion = 'actualizado';
                cargando = '<img src="../../assets/images/loader.gif" />';
            }
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#inventarioForm")[0]);
            $.ajax({
                url:  $("form#inventarioForm").attr('action'),
                type: $("form#inventarioForm").attr('method'),
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
                    var alertMessage = mensajeExito('Registro '+accion+' satisfactoriamente.');
                    $('#respuesta').html(alertMessage);
                    $('div#respuesta').fadeIn();
                    if($("button#submit").attr('data') == 1)
                        $('#inventarioForm').reset();
                    $('.btn-primary').attr('disabled', false);
                    $('div#respuesta').fadeOut(10000);
                }
            })  
            return false;
        },
        ignore: 'input[type=hidden], .select2-search__field',
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        validClass: "validation-valid-label",
        highlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        unhighlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        errorPlacement: function (error, element){ errorPlacement(error, element); },
        success: function(label) { label.addClass("validation-valid-label").text("Correcto") }
    });

    /******* Formulario departamentos */
    $("#departamentoForm").validate({
        rules: {
            nombre: {
                required: true
            }
        },
        messages: {
            nombre: {
                required: "Ingrese un nombre"
            }
        },
        submitHandler: function () {
            var accion = '';
            var cargando = '';
            if($("button#submit").attr('data') == 1)
            {
                accion = 'agregado';
                cargando = '<img src="../assets/images/loader.gif" />';
            }
            else if($("button#submit").attr('data') == 0)
            {
                accion = 'actualizado';
                cargando = '<img src="../../assets/images/loader.gif" />';
            }
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#departamentoForm")[0]);
            $.ajax({
                url:  $("form#departamentoForm").attr('action'),
                type: $("form#departamentoForm").attr('method'),
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
                    var alertMessage = mensajeExito('Departamento '+accion+' satisfactoriamente.');
                    $('#respuesta').html(alertMessage);
                    $('div#respuesta').fadeIn();
                    if($("button#submit").attr('data') == 1)
                        $('#departamentoForm').reset();
                    $('.btn-primary').attr('disabled', false);
                    $('div#respuesta').fadeOut(10000);
                }
            })  
            return false;
        },
        ignore: 'input[type=hidden], .select2-search__field',
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        validClass: "validation-valid-label",
        highlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        unhighlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        errorPlacement: function (error, element){ errorPlacement(error, element); },
        success: function(label) { label.addClass("validation-valid-label").text("Correcto") }
    });

    /******* Formulario comunicaciones */
    $("#comunicacionForm").validate({
        rules: {
            orden: {
                required: true
            },
            numero_oficio: {
                required: true
            },
            fecha: {
                required: true
            },
            de: {
                required: true
            },
            para: {
                required: true
            },
            asunto: {
                required: true
            }
        },
        messages: {
            orden: {
                required: "Seleccione una orden"
            },
            numero_oficio: {
                required: "Ingrese un número de oficio"
            },
            fecha: {
                required: "Ingrese una fecha"
            },
            de: {
                required: "Ingrese de quien hace la comunicación"
            },
            para: {
                required: "Ingrese para quien es la comunicación"
            },
            asunto: {
                required: "Ingrese un asunto"
            }
        },
        submitHandler: function () {
            var accion = '';
            var cargando = '';
            if($("button#submit").attr('data') == 1)
            {
                accion = 'agregada';
                cargando = '<img src="../assets/images/loader.gif" />';
            }
            else if($("button#submit").attr('data') == 0)
            {
                accion = 'actualizada';
                cargando = '<img src="../../assets/images/loader.gif" />';
            }
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#comunicacionForm")[0]);
            $.ajax({
                url:  $("form#comunicacionForm").attr('action'),
                type: $("form#comunicacionForm").attr('method'),
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
                    var alertMessage = mensajeExito('Comunicación '+accion+' satisfactoriamente.');
                    $('#respuesta').html(alertMessage);
                    $('div#respuesta').fadeIn();
                    if($("button#submit").attr('data') == 1)
                        $('#comunicacionForm').reset();
                    $('.btn-primary').attr('disabled', false);
                    $('div#respuesta').fadeOut(10000);
                }
            })  
            return false;
        },
        ignore: 'input[type=hidden], .select2-search__field',
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        validClass: "validation-valid-label",
        highlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        unhighlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        errorPlacement: function (error, element){ errorPlacement(error, element); },
        success: function(label) { label.addClass("validation-valid-label").text("Correcto") }
    });

    /******* Formulario permisos */
    $("#permisoForm").validate({
        rules: {
            cedula: {
                required: true,
                number: true
            },
            nombre: {
                required: true
            },
            cargo: {
                required: true
            },
            tipo_personal: {
                required: true
            },
            adscrito: {
                required: true
            },
            tipo_permiso: {
                required: true
            },
            duracion: {
                required: true
            },
            fecha_requerida: {
                required: true
            }
        },
        messages: {
            cedula: {
                required: "Ingrese una cédula",
                number: "Solo ingrese números"
            },
            nombre: {
                required: "Ingrese un nombre"
            },
            cargo: {
                required: "Ingrese un cargo"
            },
            tipo_personal: {
                required: "Ingrese el tipo de personal"
            },
            adscrito: {
                required: "Ingrese en donde está adscrito"
            },
            tipo_permiso: {
                required: "Ingrese el tipo de permiso"
            },
            duracion: {
                required: "Ingrese la duración del permiso"
            },
            fecha_requerida: {
                required: "Seleccione la fecha de inicio del permiso"
            }
        },
        submitHandler: function () {
            var accion = '';
            var cargando = '';
            if($("button#submit").attr('data') == 1)
            {
                accion = 'agregado';
                cargando = '<img src="../assets/images/loader.gif" />';
            }
            else if($("button#submit").attr('data') == 0)
            {
                accion = 'actualizado';
                cargando = '<img src="../../assets/images/loader.gif" />';
            }
            var token = $("input[name=_token]").val();
            var formData = new FormData($("form#permisoForm")[0]);
            $.ajax({
                url:  $("form#permisoForm").attr('action'),
                type: $("form#permisoForm").attr('method'),
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
                    var alertMessage = mensajeExito('Comunicación '+accion+' satisfactoriamente.');
                    $('#respuesta').html(alertMessage);
                    $('div#respuesta').fadeIn();
                    if($("button#submit").attr('data') == 1)
                        $('#permisoForm').reset();
                    $('.btn-primary').attr('disabled', false);
                    $('div#respuesta').fadeOut(10000);
                }
            })  
            return false;
        },
        ignore: 'input[type=hidden], .select2-search__field',
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        validClass: "validation-valid-label",
        highlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        unhighlight: function(element, errorClass) { $(element).removeClass(errorClass); },
        errorPlacement: function (error, element){ errorPlacement(error, element); },
        success: function(label) { label.addClass("validation-valid-label").text("Correcto") }
    });
});
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Solicitud y autorización de permisos No {{ $permiso->id }}</title>
        <link href="{{ asset('assets/images/favicon.ico') }}" rel="shortcut icon">
        <link rel="stylesheet" href="{{ asset('assets/css/pdf.css') }}">
    </head>
    <body marginwidth="0" marginheight="0">
        <div id="header">
            <table cellpadding="0" cellspacing="0" border="0" class="header" width="100%"s>
                <tbody>
                    <tr>
                        <td style="width:20%">
                            <img src="{{ asset('assets/images/logo_udo.jpg') }}" width="100px" height="auto" style="float: right; margin: 0.5em;">
                        </td>
                        <td style="width:80%; text-align: left; margin-left: 0.5em;">
                            <b>UNIVERSIDAD DE ORIENTE</b>
                            <br>
                            <b>NÚCLEO MONAGAS</b>
                            <br>
                            <b>COORDINACIÓN DE SERVICIOS GENERALES (GUARITOS)</b>
                            <br>
                            <b>MATURÍN - MONAGAS</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size:18px; padding: 10px 0 0 0;" colspan="2">
                            <b>SOLICITUD Y AUTORIZACIÓN DE PERMISOS</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right; font-size:14px" colspan="2">
                            Fecha: {{ date("d/m/Y") }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="footer">
            <div class="page-number"></div>
        </div>
        <table cellpadding="1" cellspacing="0" border="0" width="100%">
            <tbody>
                <tr>
                    <td style="border: black 1px solid" width="33%">
                        <b>CÉDULA:</b><br>
                        {{ number_format($permiso->cedula, 0, '', '.') }}
                    </td>
                    <td style="border: black 1px solid" width="34%">
                        <b>APELLIDOS Y NOMBRES:</b><br>
                        {{ ucwords(strtolower($permiso->nombre)) }}
                    </td>
                    <td style="border: black 1px solid" width="33%">
                        <b>TIPO DE PERSONAL:</b><br>
                        {{ $permiso->tipo_personal }}
                    </td>
                </tr>
                <tr>
                    <td style="border: black 1px solid" width="33%">
                        <b>CARGO:</b><br>
                        {{ $permiso->cargo }}
                    </td>
                    <td style="border: black 1px solid" width="34%">
                        <b>ADSCRITO A:</b><br>
                        {{ $permiso->adscrito }}
                    </td>
                    <td style="border: black 1px solid" width="33%">
                        <b>TIPO DE PERMISO:</b><br>
                        {{ $permiso->tipo_permiso }}
                    </td>
                </tr>
                <tr>
                    <td style="border: black 1px solid" width="33%">
                        <b>DURACIÓN DEL PERMISO:</b><br>
                        {{ $permiso->duracion }}
                    </td>
                    <td style="border: black 1px solid" width="34%">
                        {{--*/ $separarDesde =  explode('-', $permiso->desde) /*--}}
                        {{--*/ $fechaDesde=  $separarDesde[2].'/'.$separarDesde[1].'/'.$separarDesde[0] /*--}}
                        <b>DESDE:</b><br>
                        {{ $fechaDesde }}
                    </td>
                    <td style="border: black 1px solid" width="33%">
                        {{--*/ $separarHasta =  explode('-', $permiso->hasta) /*--}}
                        {{--*/ $fechaHasta=  $separarHasta[2].'/'.$separarHasta[1].'/'.$separarHasta[0] /*--}}
                        <b>HASTA:</b><br>
                        {{ $fechaHasta }}
                    </td>
                </tr>
                <tr>
                    <td style="border: black 1px solid" width="33%">
                        <b>¿REQUIERE SUPLENTE?</b><br>
                        @if($permiso->suplente == 1)
                            Si
                        @elseif($permiso->suplente == 0)
                            No
                        @endif
                    </td>
                    <td colspan="2" style="border: black 1px solid" width="67%">
                        <b>CONDICIÓN:</b><br>
                        @if($permiso->aprobacion == 1)
                            Aprobado
                        @elseif($permiso->aprobacion == 0)
                            Reprobado
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Resultados de consulta de permisos</title>
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
                            @if($tipo_permiso == "" && $desde == "" && $hasta == "" && $suplente == "" && $aprobacion == "")
                            <b>LISTADO TOTAL DE PERMISOS</b><br><br>
                            @else
                            <b>LISTADO DE PERMISOS <br>(
                                @if($tipo_permiso != "")
                                    Permisos {{ $tipo_permiso }},
                                @endif 
                                @if($desde != "")
                                    {{--*/ $separarDesde =  explode('-', $desde) /*--}}
                                    {{--*/ $fechaDesde=  $separarDesde[2].'/'.$separarDesde[1].'/'.$separarDesde[0] /*--}}
                                    Desde el {{ $fechaDesde }}, 
                                @endif
                                @if($hasta != "")
                                    {{--*/ $separarHasta =  explode('-', $hasta) /*--}}
                                    {{--*/ $fechaHasta=  $separarHasta[2].'/'.$separarHasta[1].'/'.$separarHasta[0] /*--}}
                                    Hasta el {{ $fechaHasta }}, 
                                @endif
                                @if($suplente != "")
                                    @if($suplente == 1)
                                        Con suplentes
                                    @elseif($suplente == 0)
                                        Sin suplentes
                                    @endif
                                @endif
                                @if($aprobacion != "")
                                    @if($aprobacion == 1)
                                        Aprobados
                                    @elseif($aprobacion == 0)
                                        Reprobados
                                    @endif
                                @endif
                            )</b>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right; font-size:14px" colspan="2">
                            Fecha: {{ date("d/m/Y") }}<br>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table cellpadding="2" cellspacing="0" border="0" width="100%">
                <thead>
                    <tr style="background-color: #6699ff; color: white; border: 1px solid black">
                        <th style="text-align: left; width: 12%">Cédula</th>
                        <th style="text-align: left; width: 34%">Nombre y apellido</th>
                        <th style="text-align: left; width: 18%">Tipo de permiso</th>
                        <th style="width: 12%">Desde</th>
                        <th style="width: 12%">Hasta</th>
                        <th style="width: 12%">Estado</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="footer">
            <div class="page-number"></div>
        </div>
        <table cellpadding="2" cellspacing="0" border="0" width="100%">
            <tbody>
                @foreach($permisos as $permiso)
                <tr>
                    <td style="width: 12%; text-align: right">
                        {{ number_format($permiso->cedula, 0, '', '.') }}
                    </td>
                    <td style="width: 34%; text-align: left;">
                        {{ ucwords(strtolower($permiso->nombre)) }}
                    </td>
                    <td style="width: 18%; text-align: center">
                        {{ $permiso->tipo_permiso }}
                    </td>
                    <td style="width: 12%; text-align: center">
                        {{--*/ $separarDesde =  explode('-', $permiso->desde) /*--}}
                        {{--*/ $fechaDesde=  $separarDesde[2].'/'.$separarDesde[1].'/'.$separarDesde[0] /*--}}
                        {{ $fechaDesde }}
                    </td>
                    <td style="width: 12%; text-align: center">
                        {{--*/ $separarHasta =  explode('-', $permiso->hasta) /*--}}
                        {{--*/ $fechaHasta=  $separarHasta[2].'/'.$separarHasta[1].'/'.$separarHasta[0] /*--}}
                        {{ $fechaHasta }}
                    </td>
                    <td style="width: 12%; text-align: center">
                        @if($permiso->aprobacion == 1)
                            Aprobado
                        @elseif($permiso->aprobacion == 0)
                            Reprobado
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
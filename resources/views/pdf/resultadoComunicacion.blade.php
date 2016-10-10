<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Resultados de consulta de comunicaciones</title>
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
                            @if($orden == "" && $fecha == "" && $numero_oficio == "" && $de == "" && $para == "" && $asunto == "")
                                <b>LISTADO TOTAL DE COMUNICACIONES</b><br><br>
                            @else
                            <b>LISTADO DE COMUNICACIONES <br>(
                                @if($orden != "")
                                    Orden: {{ $orden }},
                                @endif 
                                @if($fecha != "")
                                    {{--*/ $separar =  explode('-', $fecha) /*--}}
                                    {{--*/ $fecham=  $separar[2].'/'.$separar[1].'/'.$separar[0] /*--}}
                                    Fecha: {{ $fecham }}, 
                                @endif
                                @if($numero_oficio != "")
                                    Oficio Nº: {{ $numero_oficio }}, 
                                @endif
                                @if($de != "")
                                    De {{ $de }}
                                @endif
                                @if($para != "")
                                    Para {{ $para }}
                                @endif
                                @if($asunto != "")
                                    Asunto {{ $asunto }}
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
                        <th align="left" style="width: 16%">Orden</th>
                        <th align="left" style="width: 16%">Fecha</th>
                        <th align="left" style="width: 16%">Nº Oficio</th>
                        <th align="left" style="width: 16%">De</th>
                        <th align="left" style="width: 16%">Para</th>
                        <th align="left" style="width: 20%">Asunto</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="footer">
            <div class="page-number"></div>
        </div>
        <table cellpadding="2" cellspacing="0" border="0" width="100%">
            <tbody>
                @foreach($comunicaciones as $comunicacion)
                <tr>
                    <td style="width: 16%">
                        {{ ucwords(strtolower($comunicacion->orden)) }}
                    </td>
                    <td style="width: 16%">
                        {{--*/ $separar =  explode('-', $comunicacion->fecha) /*--}}
                        {{--*/ $fecha=  $separar[2].'/'.$separar[1].'/'.$separar[0] /*--}}
                        {{ $fecha }}
                    </td>
                    <td style="width: 16%">
                        {{ $comunicacion->numero_oficio }}
                    </td>
                    <td style="width: 16%">
                        {{ $comunicacion->de }}
                    </td>
                    <td style="width: 16%">
                        {{ $comunicacion->para }}
                    </td>
                    <td style="width: 20%">
                        {{ $comunicacion->asunto }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
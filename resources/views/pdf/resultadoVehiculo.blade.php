<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Resultados de consulta de vehículos</title>
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
                            @if($unidad == "" && $marca == "" && $modelo == "" && $placa == "" && $serial == "" && $carroceria == "" && $serial_motor == "" && $color == "" && $departamento == "" && $estado == "")
                                <b>LISTADO TOTAL DE VEHÍCULOS</b>
                            @else
                            <b>LISTADO DE VEHÍCULOS <br>(
                                @if($unidad != "")
                                    Unidad: {{ $unidad }},
                                @endif 
                                @if($marca != "")
                                    Marca: {{ $marca }}, 
                                @endif
                                @if($modelo != "")
                                    Modelo: {{ $modelo }}, 
                                @endif
                                @if($placa != "")
                                    Placa: {{ $placa }}, 
                                @endif
                                @if($color != "")
                                    Color: {{ $color }}, 
                                @endif
                                @if($departamento != "")
                                    Departamento: {{ $nombreDep }}
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
        </div>
        <div id="footer">
            <div class="page-number"></div>
        </div>
        <table cellpadding="2" cellspacing="0" border="0" width="100%">
            <thead>
                <tr>
                    <th align="left">Unidad</th>
                    <th align="left">Marca</th>
                    <th align="left">Modelo</th>
                    <th align="left">Placa</th>
                    <th align="left">Color</th>
                    <th align="left">Departamento</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6"><br></td>
                </tr>
                @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>
                        {{ $vehiculo->unidad }}
                    </td>
                    <td>
                        {{ $vehiculo->marca }}
                    </td>
                    <td>
                        {{ $vehiculo->modelo }}
                    </td>
                    <td>
                        {{ $vehiculo->placa }}
                    </td>
                    <td>
                        {{ $vehiculo->color }}
                    </td>
                    <td>
                        {{ $vehiculo->nombreDepartamento->nombre }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Resultados de consulta de registros de inventario</title>
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
                            @if($producto == "" && $modelo == "" && $marca == "" && $cantidad == "" && $serial == "" && $departamento == "")
                                <b>LISTADO TOTAL DE REGISTROS EN INVENTARIO</b>
                            @else
                            <b>LISTADO DE REGISTROS EN INVENTARIO <br>(
                                @if($producto != "")
                                    Producto: {{ $producto }},
                                @endif 
                                @if($modelo != "")
                                    Modelo: {{ $modelo }}, 
                                @endif
                                @if($marca != "")
                                    Marca: {{ $marca }}, 
                                @endif
                                @if($cantidad != "")
                                    Cantidad: {{ $cantidad }}, 
                                @endif
                                @if($serial != "")
                                    Serial: {{ $serial }}, 
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
                    <th style="text-align: left">Producto</th>
                    <th style="text-align: left">Modelo</th>
                    <th style="text-align: left">Marca</th>
                    <th style="text-align: left">Cantidad</th>
                    <th style="text-align: left">Serial</th>
                    <th style="text-align: left">Departamento</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6"><br></td>
                </tr>
                @foreach($inventarios as $inventario)
                <tr>
                    <td>
                        {{ ucwords(strtolower($inventario->producto)) }}
                    </td>
                    <td>
                        {{ $inventario->modelo }}
                    </td>
                    <td>
                        {{ $inventario->marca }}
                    </td>
                    <td>
                        {{ $inventario->cantidad }}
                    </td>
                    <td>
                        {{ $inventario->serial }}
                    </td>
                    <td>
                        {{ $inventario->nombreDepartamento->nombre }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
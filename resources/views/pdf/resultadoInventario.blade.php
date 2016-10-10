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
                        <td style="width:20%" align="center">
                            <img src="{{ asset('assets/images/logo_udo.jpg') }}" width="100px" height="auto">
                        </td>
                        <td style="width:80%; margin-left: 0.5em;">
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
                                <b>LISTADO TOTAL DE REGISTROS EN INVENTARIO</b><br><b style="visibility: hidden;">( Producto: equipos, Modelo: modelo, Marca: marca, Serial: serial, Departamento: Almacén )</b>
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
            <table cellpadding="2" cellspacing="0" border="0" width="100%">
                <thead>
                    <tr style="background-color: #6699ff; color: white; border: 1px solid black">
                        <th style="width: 13%;">Producto</th>
                        <th style="width: 15%;">Modelo</th>
                        <th style="width: 15%;">Marca</th>
                        <th style="width: 10%;">Cantidad</th>
                        <th style="width: 15%;">Serial</th>
                        <th style="width: 32%;">Departamento</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="footer">
            <div class="page-number"></div>
        </div>
        <table cellpadding="2" cellspacing="0" border="0" width="100%">
            <tbody>
                @foreach($inventarios as $inventario)
                <tr>
                    <td style="width: 13%">
                        {{ ucwords(strtolower($inventario->producto)) }}
                    </td>
                    <td style="width: 15%">
                        {{ $inventario->modelo }}
                    </td>
                    <td style="width: 15%">
                        {{ $inventario->marca }}
                    </td>
                    <td style="width: 10%" align="right">
                        {{ $inventario->cantidad }}
                    </td>
                    <td style="width: 15%">
                        {{ $inventario->serial }}
                    </td>
                    <td style="width: 32%">
                        {{ $inventario->nombreDepartamento->nombre }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
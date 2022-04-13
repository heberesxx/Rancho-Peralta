<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Guia Salgraf</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap_prince.css">
    <script src="js/bootstrap_prince.js"></script>
    <style>
        /* latin-ext */
        @font-face {
            font-family: 'Bree Serif';
            font-style: normal;
            font-weight: 400;
            src: url(https://fonts.gstatic.com/s/breeserif/v16/4UaHrEJCrhhnVA3DgluA96Tp56N1.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Bree Serif';
            font-style: normal;
            font-weight: 400;
            src: url(https://fonts.gstatic.com/s/breeserif/v16/4UaHrEJCrhhnVA3DgluA96rp5w.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Bree Serif', serif;
        }

        span,
        h4,
        .letra {
            font-family: "Times New Roman";
            font-size: 14px;
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        .titulo {
            font-family: "Arial Narrow", Arial, sans-serif;
            font-size: 14px;
            white-space: pre;
        }

        .titulopie {
            font-family: Tahoma, Verdana, Segoe, sans-serif;
            font-size: 14px;
            white-space: pre;
        }

        .row>.sinespacio {
            display: inline-block;
            margin: 0;
            float: left;
            white-space: nowrap;
        }

        .row>.limpiar {
            clear: both;
        }

        table {
            border: 0px;
            border-spacing: 0px;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 0px;
            border: 0px;
            margin: 0px;
        }

        .izq {
            text-align: right;
        }

        .borde {
            border-style: solid;
            border-width: 1px;
            border-color: black;
            padding-bottom: 3px;
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }



        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: left;

        }

        #logo img {
            width: 90px;
            float: left;
        }

        h1 {

            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            background: url(dimension.png);
        }

        #project {

            text-align: center;
            font-size: 1.5em;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }



        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }

        @page {
            size: 8.5in 11in;
            margin: 1cm
        }
    </style>
</head>

<body>
 
        <div id="logo">
            <img src="../public/vendor/adminlte/dist/img/logo.jpeg" style="width: 120px; height:120px; border-radius:50%;">
        </div>
        <h1>Factura de Venta de Ganado</h1>
        <div id="project" class="clearfix">
          


        </div>

  
    <div class="container">

        <hr>
        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">@foreach($clientes as $cliente)
                    {{'Lote N°: '.$cliente->COD_VENTA}}
                    @endforeach
                </div>
            </div>
            <div class="col-xs-2">
                <div id="numerolote"></div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">@foreach($clientes as $cliente)
                    {{'Fecha Venta: '.$cliente->FECHA_VENTA}}
                    @endforeach
                </div>
            </div>
            <div class="col-xs-2">
                <div id="fechaventa"></div>
            </div>
            <div class="col-xs-2">
                <div class="titulo">@foreach($clientes as $cliente)
                    {{'Cliente: '.$cliente->CLIENTE}}
                    @endforeach
                </div>
            </div>
            <div class="col-xs-5">
                <div id="Cliente"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">@foreach($clientes as $cliente)
                    {{'Celular: '.$cliente->CELULAR}}
                    @endforeach
                </div>
            </div>
            <div class="col-xs-2">
                <div id="telefono"></div>
            </div>
            <div class="col-xs-2">
                <div class="titulo">@foreach($clientes as $cliente)
                    {{'Dirección: '.$cliente->DIRECCION}}
                    @endforeach
                </div>
            </div>
            <div class="col-xs-5">
                <div id="direccion"></div>
            </div>
        </div>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Número</th>
                    <th class="text-center">Descripcion</th>

                    <th class="text-center">Precio Unitario</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1;@endphp
                @foreach($detalles as $detalle)
                <tr>
                    <td>{{$i}}</td>
                    <td class="text-center" style="width: auto;">{{'Nombre: '.$detalle->NOMBRE.', Color: '.$detalle->COLOR.', ´Peso: '.$detalle->PESO.', Raza: '.$detalle->RAZA}}</td>
                    <td class="text-center" style="width:auto; text-align: right;">{{$detalle->PRECIO}}</td>
                </tr>
                @php $i++;@endphp
                @endforeach
            </tbody>
        </table><br>

        <div class="row sinespacio">

            <div class="col-xs-3">
                <div id="blanco4"></div>
            </div>
            <div class="col-xs-3">
          
                <
                    Total a pagar: 
                  
            </div>
            
            <div class="col-xs-3">
                <div class="izq borde" id="apagar">@foreach($clientes as $cliente)
                    {{$cliente->TOTAL}} @endforeach</div>
            </div>
            
        </div>


</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Preguntas de Seguridad</title>
    <link rel="stylesheet" href="style.css" media="all" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Preguntas de Seguridad</title>

    <style type="text/css">
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
            text-align: center;

        }

        #logo img {
            width: 90px;
            float: center;
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
    </style>
</head>




<body>
    <header class="clearfix">
        <div id="logo">
            <img src="../public/vendor/adminlte/dist/img/logo.jpeg" style="width: 120px; height:120px; border-radius:50%;">
        </div>
        <h1>Preguntas de Seguridad</h1>
        <div id="project" class="clearfix">
            <div>
                <p>Generado por:

                    @foreach($usuarios as $usuario)
                    {{$usuario->name}}
                    @endforeach
                </p>
            </div>
            <div>{{'Fecha de consulta: '.date('d-m-Y');}}</div>

        </div>

    </header>


    <main>

        <table>
            <thead style="background-color: #e1e2f6;">
                <tr>
                    <th class="desc">C??digo</th>
                    <th class="desc">Pregunta</th>
                    <th class="desc"> Fecha Creaci??n </th>
                    <th class="desc"> Fecha Actualizaci??n </th>

                </tr>

            </thead>
            <tbody>
                @php $i=1;@endphp
                @foreach ($preguntas as $pregunta)
                <tr>
                    <td class="desc">{{ $pregunta->id }}</td>
                    <td class="desc">{{ $pregunta->pregunta }} </td>
                    <td class="desc">{{\Carbon\Carbon::parse( $pregunta->created_at)->format('d-m-Y H:i:s') }}</td>
                    <td class="desc">{{\Carbon\Carbon::parse( $pregunta->updated_at)->format('d-m-Y H:i:s') }}</td>

                </tr>

                @php $i++;@endphp
                @endforeach


            </tbody>
        </table>
        </table>

    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 780, "P??g $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
	</script>


</body>

</html>
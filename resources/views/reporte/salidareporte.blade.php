<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reporte Producción Leche</title>
	<style type="text/css">
		.clearfix:after {
			content: "";
			display: table;
			clear: both;
		}

		a {
			color: #0087C3;
			text-decoration: none;
		}

		body {
			position: relative;
			margin: 0 auto;
			color: #001028;
			background: #FFFFFF;
			font-family: Arial, sans-serif;
			font-size: 12px;
			font-family: Arial;
		}

		header {
			padding: 10px 0;
			margin-bottom: 20px;
			border-bottom: 1px solid #AAAAAA;
		}

		#logo {
			float: left;
			margin-top: 8px;
		}

		#logo img {
			height: 720px;
		    width: 720px;
		}


		h1 {
			border-top: 1px solid #5D6975;
			border-bottom: 1px solid #5D6975;
			color: #5D6975;
			font-size: 2.4em;
			line-height: 1.4em;
			font-weight: normal;
			text-align: center;
			margin: 0 0 0;
			margin-bottom: 20px;

		}


		#reporte {
			float: left;
			margin-bottom: 20px;
			text-align: center;
		}

		h2.name {

			font-weight: normal;
			margin: 0;
			text-align: center;
			color: #001028;
		}


		#company {
			float: right;
			text-align: right;
		}

		#details {
			margin-bottom: 50px;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			border-spacing: 0;

		}

		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 10px;

		}

		th {
			background-color: #64EEF1;
		}

		td {
			text-align: center;
		}
	</style>
</head>

<body>

	<header class="clearfix">
		 <!-- <div id="logo">
			<img src="https://cdn.worldvectorlogo.com/logos/rancho.svg">
		</div> -->
		<div id="company">
			<h2 class="name">Rancho Peralta</h2>
			<div><a href="http://www.PeraltRanch.somee.com">peraltranch.sommee.com</a></div>
		</div>
		
	</header>

	<main>
		<div id="details" class="clearfix">
			<div id="Reporte">

				<h2 class="name">Reporte Producción de Leche</h2>

			</div>

		</div>

		<table  id="table" class="">

			<thead>
				<tr>
					<th>Registro</th>
					<th>No. ganado</th>
					<th>Días lactancia</th>
					<th>Producción (ltr)</th>
					<th>Fecha ordeño</th>
				</tr>

			</thead>
			<tbody>

				@foreach($leche[0] as $dato)
				<tr>
					<td>{{ $dato->COD_REGISTRO_LECHE}}</td>
					<td>{{ $dato->COD_REGISTRO_GANADO}}</td>
					<td>{{ $dato->DIA_LACTANCIA}}</td>
					<td>{{ $dato->PRD_LITROS}}</td>
					<td>{{ \Carbon\Carbon::parse($dato->FEC_ORDENIO)->format('d/m/Y')}}</td>
				</tr>


				@endforeach

			</tbody>
		</table>
	</main>
	<script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 780, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
	</script>
</body>

</html>
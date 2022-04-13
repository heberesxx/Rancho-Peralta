@extends('adminlte::page')

@section('title', 'Reportes Compra Ganado')

@section('content_header')
<div class="container-fluid">
	<div class="row">

		<h3 class="text-center">Nuevo Reporte</h3>


	</div>
</div>

@stop

@section('content')
<div class="container-fluid">
	<div class="col">
		<div class="row">
			<div class="col-md-6">
				<div class="card card-info">


					<div class="card-header">
						<h3 class="card-title">Datos </h3>
					</div>
					<form accion="{{url('reportes_comprasg.store')}}" method="POST" role="form">
						@csrf()
						<div class="card-body">
							<h6><span style="color: rgb(20, 20, 20);"> * Campos obligatorios </span></h6>
							<div class="row">

								<div class="col-lg-6">
									<div class="form-group">
										<label><span style="color: red;"> * </span>Desde:</label>
										<input class="form-control" name="inicio" placeholder="" type='date' max="{{ date('Y-m-d') }}">
										@if ($errors->has('inicio'))
										<div id="inicio-error" class="error text-danger pl-3" for="inicio" style="display: bock;">
											<strong>
												{{ $errors->first('inicio') }}
											</strong>
										</div>
										@endif
									</div>


								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Hasta:</label>
										<input class="form-control" name="final" placeholder="" type='date' max="{{ date('Y-m-d') }}">
										@if ($errors->has('final'))
										<div id="final-error" class="error text-danger pl-3" for="final" style="display: bock;">
											<strong>
												{{ $errors->first('final') }}
											</strong>
										</div>
										@endif
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-lg-6">
									<button type="submit" class="btn btn-block btn-primary btn-block" target="_blank" data-toggle="modal" data-target="">Generar PDF</button>

								</div>
								<div class="col-lg-6">
									<button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
								</div>

							</div>
						</div>
					</form>

				</div>
			</div>


		</div>
		<div class="row">
			<div class="col-md-12">

				<table id="TB" class="table table-bordered table-hover US">

					<tr class="text-center">
						<h4 style="text-align: center; font: size 20px;">{{'Mostrando datos Desde: '.\Carbon\Carbon::parse($parametros[1] )->format('d-m-Y')}}</h4>
						<h4 style="text-align: center; font: size 20px;">{{'Hasta: '.\Carbon\Carbon::parse($parametros[2] )->format('d-m-Y')}}</h4>
					</tr>
					<thead>

						<tr>

							<th class="text-center">#</th>
							<th class="text-center">Lote</th>
							<th class="text-center">Fecha Compra</th>
							<th class="text-center">Proveedor</th>
							<th class="text-center">Precio de Compra</th>

							<th class="text-center">Nom. Ganado</th>

						</tr>

					</thead>
					<tbody>
						@php $i=1;@endphp
						@foreach($compras as $compra)
						<tr>
							<td class="text-center">{{$i}}</td>
							<td class="text-center">{{ $compra->COD_COMPRA_GANADO}}</td>
							<td class="text-center">{{ \Carbon\Carbon::parse($compra->FEC_COMPRA)->format('d-m-Y')}}</td>
							<td class="text-center">{{ $compra->PERSONA}}</td>
							<td class="text-center">{{ $compra->PRECIO}}</td>
							<td class="text-center">{{ $compra->NOM_GANADO}}</td>

						</tr>
						@php $i++;@endphp

						@endforeach

					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>
@stop

@section('css')
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset ('vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

@stop

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>


<script>
	$(document).ready(function() {
		$('#TB').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"

			},
			"bSort": false,
			"autoWidth": false,
			"responsive": true,
			dom: '<"pt-2 row" <"col-xl mt-2"l><"col-xl text-center"B><"col-xl text-right mt-2 "f>> <"row"rti<"col"><p>>',
			buttons: {
				dom: {
					button: {

						className: 'btn'

					}
				},
				buttons: [{

						extend: 'print',
						text: 'Imprimir',
						className: 'btn btn-secondary glyphicon glyphicon-duplicate'
					},
					{
						extend: "excel",
						exportOptions: {
							columns: [0, 1, 2, 3, 4, 5],
							rows: [0, 1, 2],
						},
						text: 'Excel',
						className: 'btn btn-success',


						// 1 - ejemplo básico - uso de templates pre-definidos
						//definimos los parametros al exportar a excel

						excelStyles: {
							template: "header_blue", // Apply the 'header_blue' template part (white font on a blue background in the header/footer)
						},


						// 2 - estilos a una fila   

						excelStyles: { // Add an excelStyles definition
							cells: "2",
							// adonde se aplicaran los estilos (fila 2)
							style: { // The style block
								font: { // Style the font
									name: "Arial", // Font name
									size: "12", // Font size
									color: "FFFFFF", // Font Color
									b: true, // negrita SI
								},
								fill: { // Estilo de relleno (background)
									pattern: { // tipo de rellero (pattern or gradient)
										color: "ff7961", // color de fondo de la fila
									}
								}
							}
						},



						deleteCells: [ // Agregar una opción de configuración insertCells                   
							{
								cells: '11', // Inserta los datos en las filas 5 y 6 contando desde el encabezado

							},

						],



						// ejemplo para IMPRIMIR

						pageStyle: {
							sheetPr: {
								pageSetUpPr: {
									fitToPage: 1 // Fit the printing to the page
								}
							},
							printOptions: {
								horizontalCentered: true,
								verticalCentered: true,
							},
							pageSetup: {
								orientation: "landscape", // Orientacion
								paperSize: "9", // Tamaño del papel (1 = Legal, 9 = A4)
								fitToWidth: "1", // Ajustar al ancho de la página
								fitToHeight: "0", // Ajustar al alto de la página
							},
							pageMargins: {
								left: "0.2",
								right: "0.2",
								top: "0.4",
								bottom: "0.4",
								header: "0",
								footer: "0",
							},
							repeatHeading: true, // Repeat the heading row at the top of each page
							repeatCol: 'A:A', // Repeat column A (for pages wider than a single printed page)
						},
						excelStyles: {
							template: 'blue_gray_medium', // Add a template style as well if you like
						}

					}
				]

			}





		});
	});
</script>
</script>
@stop
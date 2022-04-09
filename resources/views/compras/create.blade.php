@extends('adminlte::page')

@section('title', 'Compras Ganado')
@can('INSERTAR_LOTES GANADO')
@section('content_header')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Nueva Compra de Ganado</h1>
		</div>
		<div class="col-sm-6">

		</div>
	</div>
</div>

@stop
<style type="text/css">
	.transformacion2 {
		text-transform: capitalize;
	}
</style>
<style>
	.currSign:before {
		content: '$';
	}
</style>
@section('content')
@include('sweetalert::alert')
<div class="container-fluid ">
	@if (session('info'))
	<div class="alert alert-success alert-dismissible mt-2 text-dark" role="alert">
		<span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
		<strong>{{ session('info') }}</strong>
	</div>
	@endif
	<div class="col">
		<div class="row">

			<div class="col-md-6">


				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">Datos del Lote de Compra</h3>
					</div>
					<form action="{{ route('lotescompras.store') }}" method="post">
						@csrf()
						<div class="card-body md-6">
						
							<h6><span style="color: red;"> * </span>Campos obligatorios </h6>

							<div class="row">

								<div class="col-lg-4">
									<div class="form-group">
										<label><span style="color: red;"> * </span>Fecha de compra</label>
										<input class="form-control border-dark" placeholder="FEC_COMPRA" name="FEC_COMPRA" id="FEC_COMPRA" type="date" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}" requerid>
										@if ($errors->has('FEC_COMPRA'))
										<div id="FEC_COMPRA-error" class="error text-danger pl-3" for="FEC_COMPRA" style="display: bock;">
											<strong>
												{{ $errors->first('FEC_COMPRA') }}
											</strong>
										</div>
										@endif
									</div>
								</div>
								<div class="col-lg-5">
									<div class="form-group">

										@livewire('buscador-proveedores')


									</div>
								</div>
								<div class="col-lg-3">
									</br>
									<div class="form-group">
										<div class="col-sm-12 col-xs-12 mb-4">
											<button type="submit" class="btn btn-success w-100">Generar Lote de Compra <i class="fas fa-check-circle ml-2"></i>
											</button>
										</div>
									</div>
								</div>


							</div>

						</div>

					</form>


				</div>

				<div class="row">





					<div class="col-md-12">
					<h6><strong>Recuerde que para poder agregar ganado a su lista de compras, tiene que generar un lote. </strong> </h6>
						<h6 class="text-center">Detalles del lote en proceso</h6>
						<table id="TB" class="table table-bordered table-hover US">
							<thead style="background-color: #e1e2f6;">
								<tr>
									<th>N°</th>
									<th>Descripción </th>
									<th>Precio </th>
									<th style="width: auto;">Acción</th>


								</tr>
							</thead>
							<tbody>
								@php $i=1;@endphp
								@foreach($compras as $compras)
								<tr>
									<td>{{$i }}</td>
									<td>{{'Nombre: '.$compras->NOM_GANADO.', Color: '.$compras->CLR_GANADO.', Raza: '.$compras->NOM_RAZA.', Sexo: '.$compras->SEX_GANADO.', Peso(kg): '.$compras->PES_ACTUAL.', Fierro: '.$compras->FIE_GANADO.
										', Status: '.$compras->DET_ESTADO.', Lugar: '.$compras->DIR_LUGAR.', Status compra: '.$compras->STATUS}}</td>
									<td>{{$compras->PRE_GANADO }}</td>



									<td style="width: auto;">
										<!-- boton de eliminar -->
										<button type="submit" class=" btn btn-danger btn-sm  fa fa-times-circle" form="delete_{{$compras->COD_DETALLE_COMPRA}}" onclick="return confirm('¿Desea eliminar el registro permanentemente?')">



										</button>

										<form action="{{route('compras.destroy', $compras->COD_DETALLE_COMPRA)}}" id="delete_{{$compras->COD_DETALLE_COMPRA}}" method="post" enctype="multipart/form-data" hidden>
											@csrf()
											@method('DELETE')
										</form>
										<!-- ----- -->
									</td>

								</tr>
								@php $i++;@endphp
								@endforeach
							</tbody>
						</table>

					</div>


				</div>
			</div>

			<div class="col-md-6">
				<div class="row">

					<div class="card card-info">

						<div class="card-header">
							<h3 class="card-title">Detalles de la Compra</h3>
						</div>

						<div class="card-body md-6">
							<h6><span style="color: black;">Status del lote en proceso</span></h6>

							<table class="table table-bordered table-hover US">
								<thead style="background-color: #e1e2f6;">
									<tr>
										<th>N°</th>
										<th>Fecha </th>
										<th>Proveedor </th>
										<th>Cantidad</th>
										<th>Total</th>
										<th>Cancelar</th>





									</tr>
								</thead>
								<tbody>
									@php $i=1;@endphp
									@foreach ($datos["lotes"] as $lote)
									<tr>
										<td>{{$lote->COD_COMPRA_GANADO}}</td>
										<td>{{\Carbon\Carbon::parse($lote->FECHA)->format('d-m-Y')}}</td>
										<td>{{$lote->NOMBRE}}</td>
										<td>{{$lote->CANTIDAD}}</td>
										<td style="text-align: right;">{{$lote->TOTAL}}</td>
										<td>
											<a type="submit" class=" btn btn-danger btn-sm  " href=" {{ url('lotescompras/' .$lote->COD_COMPRA_GANADO . '/edit') }}">Cancelar Lote

											</a>

											<form action=" {{ url('lotescompras', $lote->COD_COMPRA_GANADO) }} " method="post">
												@csrf()

												@method('PUT')
											</form>
										</td>

									</tr>
									@php $i++;@endphp
									@endforeach
								</tbody>
							</table>
							<br>


							<div class="form-group">
								<div class="col-sm-12 col-xs-12 mb-4">
									<form action="{{route('confirmarlote.store')}}" method="post">
										@csrf()
										<button type="submit" class="btn btn-primary w-100">Confirmar Lote <i class="fas fa-check-circle ml-2"></i>
										</button>
									</form>
								</div>
							</div>


							<form action="{{ route('compras.store') }}" method="post">
								@csrf()
								
								<h6><span style="color: red;">* </span> Campos obligatorios </h6>
								<div class="row">

									<div class="col-lg-4">
										<div class="form-group">
											<label><span style="color: red;">*</span>Nombre:</label>
											<input id="NOMBRE" class="form-control border-dark transformacion2" placeholder="Ingrese el Nombre" type="text" name="NOMBRE" value="{{ old('NOMBRE') }}" autofocus>

											@if ($errors->has('NOMBRE'))
											<div id="nombre_ganado-error" class="error text-danger pl-3" for="NOMBRE" style="display: bock;">
												<strong>
													{{ $errors->first('NOMBRE') }}
												</strong>
											</div>
											@endif
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label><span style="color: red;">*</span>Color:</label>
											<input id="COLOR" class="form-control border-dark" placeholder="Ingrese el Color" type="text" name="COLOR" value="{{ old('COLOR') }}" autofocus>

											@if ($errors->has('COLOR'))
											<div id="COLOR-error" class="error text-danger pl-3" for="COLOR" style="display: bock;">
												<strong>
													{{ $errors->first('COLOR') }}
												</strong>
											</div>
											@endif
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">

											@livewire('buscador-razas')
										</div>

									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<label><span style="color: red;">*</span>Sexo:</label>
											<select id="SEXO" class="form-control border-dark" type="text" name="SEXO" value="{{ old('SEXO') }}" autofocus>
												<option value="" selected disabled>Seleccione</option>
												<option value="1" {{ old('SEXO') == 1 ? 'selected' : ' ' }}>MACHO </option>
												<option value="2" {{ old('SEXO') == 2 ? 'selected' : ' ' }}>HEMBRA </option>
											</select>
											@if ($errors->has('SEXO'))
											<div id="SEXO-error" class="error text-danger pl-3" for="SEXO" style="display: bock;">
												<strong>
													{{ $errors->first('SEXO') }}
												</strong>
											</div>
											@endif
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<label><span style="color: red;"></span>Peso (kg):</label>
											<input id="PESO" class="form-control border-dark" placeholder="Ingrese el peso actual del ganado en kg..." type="number" step="0.01" min="1" name="PESO" value="{{ old('PESO') }}" autofocus>

											@if ($errors->has('PESO'))
											<div id="PESO-error" class="error text-danger pl-3" for="PESO" style="display: bock;">
												<strong>
													{{ $errors->first('PESO') }}
												</strong>
											</div>
											@endif
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											@livewire('buscador-estados')
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<label><span style="color: red;"> </span>Fierro:</label>
											<input id="FIERRO" class="form-control border-dark" placeholder="" type="text" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" name="FIERRO" value="{{ old('FIERRO') }}" autofocus>

											@if ($errors->has('FIERRO'))
											<div id="FIERRO-error" class="error text-danger pl-3" for="FIERRO" style="display: bock;">
												<strong>
													{{ $errors->first('FIERRO') }}
												</strong>
											</div>
											@endif
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label><span style="color: red;">*</span>Lugar:</label>
											<select name="LUGAR" class="form-control border-dark" id="LUGAR" class="form-control border-dark" type="text" name="LUGAR" value="{{ old('LUGAR') }}" autofocus>
												<option value="" selected disabled>Seleccione</option>
												@foreach ($datos['lugares'] as $lugar)
												<option value="{{ $lugar->COD_LUGAR }}" {{ old('LUGAR') == $lugar->COD_LUGAR ? 'selected' : '' }}>
													{{ $lugar->DIR_LUGAR }}
												</option>
												@endforeach
											</select>
											@if ($errors->has('LUGAR'))
											<div id="lugar-error" class="error text-danger pl-3" for="LUGAR" style="display: bock;">
												<strong>
													{{ $errors->first('LUGAR') }}
												</strong>
											</div>
											@endif
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label><span style="color: red;">*</span>Precio(L)</label>
											<input id="PRECIO" class="form-control border-dark" style="text-align: right;" type="number" step="0.01" name="PRECIO" value="{{ old('PRECIO') }}" autofocus>

											@if ($errors->has('PRECIO'))
											<div id="PRECIO-error" class="error text-danger pl-3" for="PRECIO" style="display: bock;">
												<strong>
													{{ $errors->first('PRECIO') }}
												</strong>
											</div>
											@endif
										</div>

									</div>

								</div>
								<div class="row">
								<div class="col-sm-6 col-xs-12 mb-2">
									<a href="{{ route('lotescompras.index') }}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
									</a>
								</div>

								<div class="col-sm-6 col-xs-12 mb-2">
									<button type="submit" class="btn btn-success w-100">Agregar <i class="fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>

							</div>

						</div>

						
							
						


						</form>



					</div>


				</div>

			</div>

		</div>


	</div>
</div>

@stop
@else
@section('content')
<div class="content-wrapper">
	<div class="error-page">
		<h2 class="headline text-warning"> 403</h2>
		<div class="error-content">
			<h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! página no encontrada.</h3>
			<p>
				No podemos mostrar esta página porque no tienes permisos, <a href="{{ route('dashboard') }}">retorna
					a
					la pantalla principal</a> o pide permisos al administrador.
			</p>

		</div>

	</div>
</div>
@stop
@endcan





<script>
	let x = document.querySelectorAll(".myDIV");
	for (let i = 0, len = x.length; i < len; i++) {
		let num = Number(x[i].innerHTML)
			.toLocaleString('en');
		x[i].innerHTML = num;
		x[i].classList.add("currSign");
	}
</script>
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


<script>
	$(document).ready(function() {
		$('#TB').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
			},
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
</script>
@stop

@livewireScripts
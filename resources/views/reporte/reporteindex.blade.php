@extends('adminlte::page')

@section('title', 'Reportes')

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
					<form accion="{{url('reportes')}}" method="POST" role="form">
						@csrf()
						<div class="card-body">
							<h6><span style="color: rgb(20, 20, 20);"> * Campos obligatorios </span></h6>
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label><span style="color: red;"> * </span>Tipo Reporte</label>
										<select class="custom-select" name="reporte">
											<option value="" selected disabled>Seleccione un Tipo</option>
											<option value="1">Producción Leche</option>
											<option value="2">Compras de Ganado</option>
											<option value="3">Compras de Embriones</option>
											<option value="4">Compras de Esperma</option>
											<option value="5">Venta Ganado</option>
										</select>
										@if ($errors->has('reporte'))
										<div id="reporte-error" class="error text-danger pl-3" for="reporte" style="display: bock;">
											<strong>
												{{ $errors->first('reporte') }}
											</strong>
										</div>
										@endif
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label><span style="color: red;"> * </span>Desde:</label>
										<input class="form-control" name="inicio" placeholder="" type='date' max="{{ date('Y-m-d') }}" >
										@if ($errors->has('inicio'))
										<div id="inicio-error" class="error text-danger pl-3" for="inicio" style="display: bock;">
											<strong>
												{{ $errors->first('inicio') }}
											</strong>
										</div>
										@endif
									</div>


								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>Hasta:</label>
										<input class="form-control" name="final" placeholder="" type='date' max="{{ date('Y-m-d') }}" >
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
									<button type="submit" class="btn btn-block btn-primary btn-block" data-toggle="modal" data-target="">Generar</button>

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
	</div>
</div>














			@stop

			@section('css')
			<link rel="stylesheet" href="/css/admin_custom.css">
			@stop

			@section('js')
			<script>
				console.log('Hi!');
			</script>
			@stop
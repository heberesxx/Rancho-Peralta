@extends('adminlte::page')

@section('title', 'Compra Medicamento')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Lotes de Medicamentos</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid ">
    @if (session('info'))
    <div class="alert alert-success text-center " role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <strong>{{ session('info') }}</strong>
    </div>
    @endif

    <div class="row">

        <div class="col-md-6">



            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del Lote de Medicamento</h3>
                </div>
                <form action="{{ route('agregarlote_medicamento.store') }}" method="post">
                    @csrf()
                    <div class="card-body md-6">
                        <h6><span style="color: black;"> * Campos obligatorios </span></h6>

                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>Fecha de Compra</label>
                                    <input class="form-control border-dark" placeholder="FEC_LOTE" name="FEC_LOTE" id="FEC_LOTE" type="date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" value="{{ old('FEC_LOTE') }}" requerid>
                                    @if ($errors->has('FEC_LOTE'))
                                    <div id="FEC_LOTE-error" class="error text-danger pl-3" for="FEC_LOTE" style="display: bock;">
                                        <strong>
                                            {{ $errors->first('FEC_LOTE') }}
                                        </strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><span style="color: red;"> * </span>Fecha de Vencimiento</label>
                                    <input id="FEC_VENCIMIENTO" class="form-control border-dark" placeholder="Ingrese la cantidad comprada..." type="date" min="{{date('Y-m-d');}}"  name="FEC_VENCIMIENTO" value="{{old('FEC_VENCIMIENTO')}}" autofocus>
                                    @if ($errors->has('FEC_VENCIMIENTO'))
                                    <div id="FEC_VENCIMIENTO-error" class="error text-danger pl-3" for="FEC_VENCIMIENTO" style="display: bock;">
                                        <strong>
                                            {{ $errors->first('FEC_VENCIMIENTO') }}
                                        </strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                </br>
                                <div class="form-group">
                                    <div class="col-sm-12 col-xs-12 mb-4">
                                        <button type="submit" class="btn btn-success w-100">Generar Lote de Medicamento <i class="fas fa-check-circle ml-2"></i>
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

                    <h6 class="text-center">Detalles del lote en proceso</h6>
                    <table id="TB" class="table table-bordered table-hover US">
                        <thead style="background-color: #e1e2f6;">
                            <tr>
                                <th>N°</th>
                                <th>Medicamento </th>
                                <th>Cantidad </th>
                                <th style="width: auto;">Acción</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1;@endphp
                            @foreach($ventas as $ventas)
                            <tr>
                                <td>{{$i }}</td>
                                <td>{{$ventas->MEDICAMENTO }}</td>
                                <td>{{$ventas->CANTIDAD }}</td>



                                <td style="width: auto;">

                                    <button type="submit" class=" btn btn-danger btn-sm  fa fa-times-circle" form="delete_{{$ventas->COD_DETALLE_LOTE}}" onclick="return confirm('¿Desea eliminar el registro permanentemente?')">



                                    </button>

                                    <form action="{{route('lote_medicamento.destroy', $ventas->COD_DETALLE_LOTE)}}" id="delete_{{$ventas->COD_DETALLE_LOTE}}" method="post" enctype="multipart/form-data" hidden>
                                        @csrf()
                                        @method('DELETE')
                                    </form>


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

                <div class="card card-info col-md-12">

                    <div class="card-header">
                        <h3 class="card-title">Detalles de la Compra</h3>
                    </div>

                    <div class="card-body">
                        <h6><span style="color: black;">Status del lote en proceso</span></h6>

                        <table class="table table-bordered table-hover US">
                            <thead style="background-color: #e1e2f6;">
                                <tr>
                                    <th>N°</th>
                                    <th>Fecha Vencimiento</th>

                                    <th>Cantidad Total</th>

                                    <th>Cancelar</th>





                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos["lotes"] as $lote)
                                <tr>
                                    <td>{{$lote->COD_COMPRA_MEDICAMENTO}}</td>
                                    <td>{{\Carbon\Carbon::parse($lote->FECHA)->format('d-m-Y')}}</td>

                                    <td>{{$lote->CANTIDAD}}</td>

                                    <td>
                                        <a type="submit" class=" btn btn-danger btn-sm  " href=" {{ url('agregarlote_medicamento/' .$lote->COD_COMPRA_MEDICAMENTO . '/edit') }}">Cancelar Lote

                                        </a>

                                        <form action=" {{ url('agregarlote_medicamento', $lote->COD_COMPRA_MEDICAMENTO) }} " method="post">
                                            @csrf()

                                            @method('PUT')
                                        </form>
                                    </td>

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        <br>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="col-sm-12 col-xs-12 mb-4">
                                        <form action="{{route('confirmarlote_medicamento.store')}}" method="post">
                                            @csrf()
                                            <button type="submit" class="btn btn-primary w-100">Confirmar Lote <i class="fas fa-check-circle ml-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <a href="{{route('medicamento.create')}}" class="btn btn-info" type="submit">
                                        <span class="mr-2">Añadir medicamento </span> <i class="fas fa-plus-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <form action="{{ route('lote_medicamento.store') }}" method="post">
                            @csrf()
                            <h6><span style="color: red;">* </span> Campos obligatorios </h6>
                            <div class="row">

                                <div class="col-lg-6">


                                    <div class="form-group">

                                        @livewire('buscador-medicamentos')


                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label><span style="color: red;">*</span>Cantidad:</label>
                                        <input id="CAN_MEDICAMENTO" class="form-control border-dark" placeholder="Ingrese la cantidad a agregar..." type="number" name="CAN_MEDICAMENTO" value="{{old('CAN_MEDICAMENTO')}}" autofocus>

                                        @if ($errors->has('CAN_MEDICAMENTO'))
                                        <div id="CAN_MEDICAMENTO-error" class="error text-danger pl-3" for="CAN_MEDICAMENTO" style="display: bock;">
                                            <strong>
                                                {{ $errors->first('CAN_MEDICAMENTO') }}
                                            </strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12 mb-2">
                                        <a href="{{ route('medicamento.index') }}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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

@section('content')
<div class="error-page">
    <h2 class="headline text-warning"> 403</h2>
    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! página no encontrada.</h3>
        <p>
            No podemos mostrarle esta página porque no tiene permisos, si desea acceder consulte al administrador de seguridad.
        </p>

    </div>

</div>
@stop


@section('footer')
<strong>Copyright &copy; 2022<a href="#">UNAH</a>.</strong> Todos los derechos reservados
<div class="float-right d-none d-sm-inline-block">

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
@STOP

@livewireScripts
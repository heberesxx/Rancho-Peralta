@extends('adminlte::page')

@section('title', 'Generar venta')
@can('INSERTAR_VENTAS')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Registro de nueva venta</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>

@stop

@section('content')

<div class="container-fluid ">
    @if (session('info'))
    <div class="alert alert-success alert-dismissible mt-2 text-dark" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <strong>{{ session('info') }}</strong>
    </div>
    @endif
    <div class="col-12">
        <div class="row">

            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Lote de Venta</h3>
                    </div>
                    <form action="{{route('lotesventa.store')}}" method="post">
                        @csrf()
                        <div class="card-body md-6">
                            <h6><span style="color: black;"> * Campos obligatorios </span></h6>

                            <div class="row">

                                <div class="col-lg-2-5">

                                    <div class="form-group">
                                        <label><span style="color: red;"> * </span>Fecha de Venta</label>
                                        <input name="FEC_VENTA" placeholder="" id="FEC_VENTA" class="form-control" id="FEC_VENTA" type='date' min="2000-01-01" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}">
                                        @if ($errors->has('FEC_VENTA'))
                                        <div id="FEC_VENTA-error" class="error text-danger pl-3" for="FEC_VENTA" style="display: bock;">
                                            <strong>
                                                {{$errors -> first('FEC_VENTA')}}
                                            </strong>
                                        </div>
                                        @endif




                                    </div>
                                </div>


                                <div class="col-lg-5">
                                    <div class="form-group">
                                        @livewire('buscador-clientes')
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    </br>
                                    <div class="form-group">
                                        <div class="col-sm-12 col-xs-12 mb-6">
                                            <button type="submit" class="btn btn-success w-100">Generar Lote de Venta <i class="fas fa-check-circle ml-2"></i>
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
                                    <th>Descripción </th>
                                    <th>Precio </th>
                                    <th style="width: auto;">Acción</th>


                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1;@endphp
                                @foreach($ventas as $ventas)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{'Nombre: '.$ventas->NOMBRE.
                                        ', Arete: '.$ventas->ARETE.
                                    ', Color: '.$ventas->COLOR.
                                ', Peso'.$ventas->PESO.
                            ', Estado: '.$ventas->ESTADO.
                        ', Lugar: '.$ventas->LUGAR.
                    ', Raza: '.$ventas->RAZA}}</td>
                                    <td>{{$ventas->PRECIO}}</td>
                                    <td style="width: auto;">
                                        <!-- boton de eliminar -->
                                        <button type="submit" class=" btn btn-danger btn-sm  fa fa-times-circle" form="delete_{{$ventas->COD_DETALLE_VENTA}}" onclick="return confirm('¿Desea eliminar el registro permanentemente?')">



                                        </button>

                                        <form action="{{route('ventas.destroy', $ventas->COD_DETALLE_VENTA)}}" id="delete_{{$ventas->COD_DETALLE_VENTA}}" method="post" enctype="multipart/form-data" hidden>
                                            @csrf()
                                            @method('DELETE')
                                        </form>
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
                            <h3 class="card-title">Detalles de la Venta</h3>
                        </div>
                        <div class="card-body md-6">
                            <h6><span style="color: black;">Status del lote en proceso</span></h6>
                            <table id="TB" class="table table-bordered table-hover US">
                                <thead style="background-color: #e1e2f6;">
                                    <tr>
                                        <th>N°</th>
                                        <th>Fecha </th>
                                        <th>Cliente </th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th>Cancelar</th>





                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1;@endphp
                                    @foreach ($datos["lotes"] as $lote)
                                    <tr>
                                        <td>{{$lote->COD_VENTA}}</td>
                                        <td>{{\Carbon\Carbon::parse($lote->FECHA)->format('d-m-Y')}}</td>
                                        <td>{{$lote->NOMBRE}}</td>
                                        <td>{{$lote->CANTIDAD}}</td>
                                        <td style="text-align: right;">{{$lote->TOTAL}}</td>
                                        <td>
                                            <a type="submit" class=" btn btn-danger btn-sm  " href=" {{ url('lotesventa/' .$lote->COD_VENTA. '/edit') }}">Cancelar Lote

                                            </a>

                                            <form action=" {{ url('lotesventa', $lote->COD_VENTA) }} " method="post">
                                                @csrf()

                                                @method('PUT')
                                            </form>
                                        </td>

                                    </tr>
                                    @php $i++;@endphp
                                    @endforeach
                                </tbody>
                            </table></br>
                            <div class="form-group">
                                <div class="col-sm-12 col-xs-12 mb-4">
                                    <form action="{{route('confirmarlote_venta.store')}}" method="post">
                                        @csrf()
                                        <button type="submit" class="btn btn-primary w-100">Confirmar Lote <i class="fas fa-check-circle ml-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <form action="{{route('ventas.store')}}" method="post">
                                @csrf()
                                <h6><span style="color: red;">* </span> Campos obligatorios </h6>
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="form-group">

                                            @livewire('buscador-ganado-venta')


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label><span style="color: red;"> * </span>Precio de Venta</label>
                                            <input name="PRE_VENTA" placeholder="" «nbsp» class="form-control"  style="text-align: right;" type="number" min="3" step="0.01" requerid value="{{ old('PRE_VENTA') }}">
                                            @if ($errors->has('PRE_VENTA'))
                                            <div id="PRE_VENTA-error" class="error text-danger pl-3" for="PRE_VENTA" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('PRE_VENTA')}}
                                                </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="{{route('lotesventa.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                                        </a>
                                    </div>

                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-success w-100">Guardar <i class="fas fa-check-circle ml-2"></i>
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
                No podemos mostrar esta página porque no tienes permisos, si deseas ingresar pide permisos al administrador.
            </p>

        </div>

    </div>
</div>
@stop
@endcan

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
@stop
@livewireScripts

<!---------------------------------------------- fin Formulario crear ventas------------------------------------>
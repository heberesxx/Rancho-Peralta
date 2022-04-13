@extends('adminlte::page')

@section('title', 'Nueva compra de esperma')
@can('INSERTAR_LOTES ESPERMA')
@section('content_header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Nueva Compra de Esperma</h1>
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
<div class="container-fluid ">
    @if (session('info'))
    <div class="alert alert-success text-center" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <strong>{{ session('info') }}</strong>
    </div>
    @endif
    <div class="col">
        <div class="row">

            <div class="col-sm-6">


                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Lote de Compra</h3>
                    </div>
                    <form action="{{ route('lotescompras_esperma.store') }}" method="post">
                        @csrf()
                        <div class="card-body md-6">
                            <h6><span style="color: black;"> * Campos obligatorios </span></h6>

                            <div class="row">

                                <div class="col-lg-2-5">
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
                                    <td>{{'Número de Pajilla: '.$compras->NUM_PAJILLA.', Raza Donador: '.$compras->RAZ_TORO_DONADOR.', Nombre Toro: '.$compras->NOM_TORO_DONADOR.', Observación: '.$compras->OBS_COMPRA_ESPERMA.', Estado esperma: '.$compras->IND_ESPERMA.', Status compra: '.$compras->STATUS}}</td>
                                    <td>{{$compras->PRE_ESPERMA }}</td>



                                    <td style="width: auto;">
                                        <!-- boton de eliminar -->
                                        <button type="submit" class=" btn btn-danger btn-sm  fa fa-times-circle" form="delete_{{$compras->COD_DETALLE_COMPRA}}" onclick="return confirm('¿Desea eliminar el registro permanentemente?')">



                                        </button>

                                        <form action="{{route('esperma.destroy', $compras->COD_DETALLE_COMPRA)}}" id="delete_{{$compras->COD_DETALLE_COMPRA}}" method="post" enctype="multipart/form-data" hidden>
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

            <div class="col-sm-6">
                <div class="row">

                    <div class="card card-info">

                        <div class="card-header">
                            <h3 class="card-title">Detalles de la Compra</h3>
                        </div>

                        <div class="card-body md-6">
                            <h6><span style="color: black;">Status del lote en proceso</span></h6>

                            <table id="TB" class="table table-bordered table-hover US">
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
                                        <td>{{$lote->COD_COMPRA_ESPERMA}}</td>
                                        <td>{{\Carbon\Carbon::parse($lote->FECHA)->format('d-m-Y')}}</td>
                                        <td>{{$lote->NOMBRE}}</td>
                                        <td>{{$lote->CANTIDAD}}</td>
                                        <td style="text-align: right;">{{$lote->TOTAL}}</td>
                                        <td>
                                            <a type="submit" class=" btn btn-danger btn-sm  " href=" {{ url('lotescompras_esperma/' .$lote->COD_COMPRA_ESPERMA . '/edit') }}">Cancelar Lote

                                            </a>

                                            <form action=" {{ url('lotescompras_esperma', $lote->COD_COMPRA_ESPERMA) }} " method="post">
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
                                    <form action="{{route('confirmarlote_esperma.store')}}" method="post">
                                        @csrf()
                                        <button type="submit" class="btn btn-primary w-100">Confirmar Lote <i class="fas fa-check-circle ml-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <form action="{{route('esperma.store')}}" method="post">
                                @csrf()
                                <h6><span style="color: red;">* </span> Campos obligatorios </h6>

                                <div class="row">

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label><span style="color: red;"> * </span>N° Pajilla:</label>
                                            <input id="NUM_PAJILLA" class="form-control border-dark" type="number" min="1" name="NUM_PAJILLA" value="{{old('NUM_PAJILLA')}}" autofocus>

                                            @if ($errors->has('NUM_PAJILLA'))
                                            <div id="NUM_PAJILLA-error" class="error text-danger pl-3" for="NUM_PAJILLA" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('NUM_PAJILLA')}}
                                                </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <style type="text/css">
                                                .transformacion1 {
                                                    text-transform: uppercase;
                                                }
                                            </style>
                                            <label><span style="color: red;">*</span>Raza del Donador</label>
                                            <input id="RAZ_TORO_DONADOR" class="form-control border-dark" type="text" name="RAZ_TORO_DONADOR" maxlength="30" value="{{old('RAZ_TORO_DONADOR')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return /[A-Z, ]/i.test(event.key)" autofocus>

                                            @if ($errors->has('RAZ_TORO_DONADOR'))
                                            <div id="RAZ_TORO_DONADOR-error" class="error text-danger pl-3" for="RAZ_TORO_DONADOR" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('RAZ_TORO_DONADOR')}}
                                                </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre del Donador</label>
                                            <input id="NOM_TORO_DONADOR" class="form-control border-dark" type="text" name="NOM_TORO_DONADOR" value="{{old('NOM_TORO_DONADOR')}}"  minlength="2" maxlength="30" pattern="[A-Za-zÀ-ÿ ]{2,30}" title="Este campo solo puede contener letras y espacios" autofocus>

                                            @if ($errors->has('NOM_TORO_DONADOR'))
                                            <div id="NOM_TORO_DONADOR-error" class="error text-danger pl-3" for="NOM_TORO_DONADOR" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('NOM_TORO_DONADOR')}}
                                                </strong>
                                            </div>
                                            @endif

                                        </div>

                                    </div>
                                </div>

                                <div class="row">


                                    <div class="col-lg-12">

                                        <div class="form-group">
                                            <label>Observaciones</label>
                                            <textarea name="OBS_COMPRA_ESPERMA" id="OBS_COMPRA_ESPERMA" rows="2" class="form-control">{{old('OBS_COMPRA_ESPERMA')}}</textarea>
                                            @if ($errors->has('OBS_COMPRA_ESPERMA'))
                                            <div id="OBS_COMPRA_ESPERMA-error" class="error text-danger pl-3" for="OBS_COMPRA_ESPERMA" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('OBS_COMPRA_ESPERMA')}}
                                                </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label><span style="color: red;"> * </span>Precio (L)</label>
                                            <input id="PRE_ESPERMA" class="form-control border-dark" style="text-align: right;" type="number" step="0.01" name="PRE_ESPERMA" value="{{old('PRE_ESPERMA')}}" autofocus>

                                            @if ($errors->has('PRE_ESPERMA'))
                                            <div id="PRE_ESPERMA-error" class="error text-danger pl-3" for="PRE_ESPERMA" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('PRE_ESPERMA')}}
                                                </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12 mb-2">
                                            <a href="{{route('lotescompras_esperma.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                                            </a>
                                        </div>

                                        <div class="col-sm-6 col-xs-12 mb-2">
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
                No podemos mostrarle esta página porque no tiene permisos, si desea acceder consulte al administrador de seguridad.
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
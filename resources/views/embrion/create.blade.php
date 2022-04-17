<!--
Universidad Nacional Autónoma de Honduras (UNAH)
Facultad de Ciencias Económicas, Administrativas y Contables Departamento de Informática Administrativa
Analisis, Programacion y Evaluacion de Sistemas
Primer Período 2022

Equipo:
Jennifer Azucena Claros Flores..........(jeniclaros028@gmail.com)
Nancy Gicela Dominguez Cruz.............(cruzgicela0503@gmail.com)			 
Jeffry Joseph Aguilar Corrales..........(jeffryaguilaraguilarcorrales@gmail.com)			
Carlos Ramón Funes Silva................(Carlosramon.funessilva@gmail.com)			
Nisi Farid Sanchéz......................(farid.sanchez26@gmail.com)				
Heber Noel Espinoza Alvarado............(ever2526v5@gmail.com)				
					




===============================================================================
Catedrático:
Lic. Lester Josué Fiallos Peralta 
Lic. Lester Josué Fiallos Peralta 
Lic. Karla Melisa Garcia Pineda


===============================================================================
Programa:          Rancho Peralta 
Pantalla:          Nueva Compra de Embrión
Fecha:             23/03/2022
Programador:       Jeffry Aguilar
descripción:       Pantalla que permite realizar compras de embriones por lotes


-->


@extends('adminlte::page')

@section('title', 'Nueva Compra de Embrión')
@can('INSERTAR_LOTES EMBRIONES')
@section('content_header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Nueva Compra de Embrión</h1>
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
<style type="text/css">
    .transformacion1 {
        text-transform: uppercase;
    }
</style>

@section('content')
<div class="container-fluid ">
    @if (session('info'))
    <div class="alert alert-success text-center text-dark" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <strong>{{ session('info') }}</strong>
    </div>
    @endif
    <div class="col-12">
        <div class="row">

            <div class="col-md-6">


                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Lote de Compra</h3>
                    </div>
                    <form action="{{ route('lotescompras_embrion.store') }}" method="post">
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
                                    <th style="width: auto;">Descripción </th>
                                    <th style="width: auto;" class="text-center">Precio (L) </th>
                                    <th style="width: auto;">Acción</th>


                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1;@endphp
                                @foreach($compras as $compras)
                                <tr>
                                    <td>{{$i }}</td>
                                    <td style="width: auto;">{{'Raza Esperada: '.$compras->RAZ_ESPERADA.', Raza Donadora: '.$compras->RAZ_VACA_DONADORA.', Raza Donador: '.$compras->RAZ_TORO_DONADOR.', Observación: '.$compras->OBS_COMPRA_EMBRION.', Estado embrión: '.$compras->IND_EMBRION.', Status compra: '.$compras->STATUS}}</td>
                                    <td style="text-align: right;">{{number_format($compras->PRE_EMBRION,2,'.',',') }}</td>



                                    <td style="width: auto;">
                                        <!-- boton de eliminar -->
                                        <button type="submit" class=" btn btn-danger btn-sm  fa fa-times-circle" form="delete_{{$compras->COD_DETALLE_COMPRA}}" onclick="return confirm('¿Desea eliminar el registro permanentemente?')">



                                        </button>

                                        <form action="{{route('embrion.destroy', $compras->COD_DETALLE_COMPRA)}}" id="delete_{{$compras->COD_DETALLE_COMPRA}}" method="post" enctype="multipart/form-data" hidden>
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

                            <table id="TB" class="table table-bordered table-hover US">
                                <thead style="background-color: #e1e2f6;">
                                    <tr>
                                        <th>N°</th>
                                        <th>Fecha </th>
                                        <th>Proveedor </th>
                                        <th>Cantidad</th>
                                        <th>Total(L)</th>
                                        <th>Cancelar</th>





                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1;@endphp
                                    @foreach ($datos["lotes"] as $lote)
                                    <tr>
                                        <td>{{$lote->COD_COMPRA_EMBRION}}</td>
                                        <td>{{\Carbon\Carbon::parse($lote->FECHA)->format('d-m-Y')}}</td>
                                        <td>{{$lote->NOMBRE}}</td>
                                        <td>{{$lote->CANTIDAD}}</td>
                                        <td style="text-align: right;">{{number_format($lote->TOTAL,2,'.',',')}}</td>
                                        <td>
                                            <a type="submit" class=" btn btn-danger btn-sm  " href=" {{ url('lotescompras_embrion/' .$lote->COD_COMPRA_EMBRION . '/edit') }}">Cancelar Lote

                                            </a>

                                            <form action=" {{ url('lotescompras_embrion', $lote->COD_COMPRA_EMBRION) }} " method="post">
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
                                    <form action="{{route('confirmarlote_embrion.store')}}" method="post">
                                        @csrf()
                                        <button type="submit" class="btn btn-primary w-100">Confirmar Lote <i class="fas fa-check-circle ml-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <form action="{{route('embrion.store')}}" method="post">
                                @csrf()

                                <h6><span style="color: red;">* </span> Campos obligatorios </h6>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">

                                            <label><span style="color: red;"> *</span>Raza Esperada:</label>
                                            <input id="raza_esperada"  class="form-control border-dark" type="text" name="raza_esperada"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('raza_esperada')}}" maxlength="40"   autofocus>

                                            @if ($errors->has('raza_esperada'))
                                            <div id="raza_esperada-error" class="error text-danger pl-3" for="raza_esperada" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('raza_esperada')}}
                                                </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label><span style="color: red;"> </span>Nombre Donadora</label>
                                            <input id="vaca_donadora" class="form-control border-dark" type="text" name="vaca_donadora" value="{{old('vaca_donadora')}}" autofocus>

                                            @if ($errors->has('vaca_donadora'))
                                            <div id="vaca_donadora-error" class="error text-danger pl-3" for="vaca_donadora" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('vaca_donadora')}}
                                                </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label><span style="color: red;">*</span>Raza Donadora</label>
                                            <input id="raza_donadora" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control border-dark" type="text" name="raza_donadora" value="{{old('raza_donadora')}}" autofocus>

                                            @if ($errors->has('raza_donadora'))
                                            <div id="raza_donadora-error" class="error text-danger pl-3" for="raza_donadora" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('raza_donadora')}}
                                                </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label><span style="color: red;">*</span>Raza Donador</label>
                                            <input id="raza_donador" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control border-dark" type="text" name="raza_donador" value="{{old('raza_donador')}}" autofocus>

                                            @if ($errors->has('raza_donador'))
                                            <div id="raza_donador-error" class="error text-danger pl-3" for="raza_donador" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('raza_donador')}}
                                                </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre Donador</label>
                                            <input id="toro_donador" class="form-control border-dark" type="text" name="toro_donador" value="{{old('toro_donador')}}" autofocus>

                                            @if ($errors->has('toro_donador'))
                                            <div id="toro_donador-error" class="error text-danger pl-3" for="toro_donador" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('toro_donador')}}
                                                </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label><span style="color: red;"> * </span>Precio (L)</label>
                                            <input id="precio_embrion" class="form-control border-dark" style="text-align: right;" type="number" step="0.01" name="precio_embrion" value="{{old('precio_embrion')}}" autofocus>

                                            @if ($errors->has('precio_embrion'))
                                            <div id="precio_embrion-error" class="error text-danger pl-3" for="precio_embrion" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('precio_embrion')}}
                                                </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label><span style="color: red;"> </span>Fecha Registro</label>
                                            <input class="form-control border-dark" placeholder="Fecha registro" name="FEC_REGISTRO" type="date" value="{{date('Y-m-d')}}" requerid>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <script type="text/javascript">
                                                function onChangeTest(textbox) {
                                                    alert("Value is " + textbox.value + "\n" + "Old Value is " + textbox.oldvalue);
                                                }
                                            </script>

                                            
                                            <label>Observaciones</label>
                                            <textarea name="observacion_compra" id="observacion_compra" rows="3" class="form-control border-dark" {{old('observacion_compra')}} maxlength="150" title="Solo se permiten 150 carácteres como máximo">{{old('observacion_compra')}}</textarea>
                                            @if ($errors->has('observacion_compra'))
                                            <div id="observacion_compra-error" class="error text-danger pl-3" for="observacion_compra" style="display: bock;">
                                                <strong>
                                                    {{$errors -> first('observacion_compra')}}
                                                </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 mb-2">
                                    <a href="{{route('lotescompras_embrion.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                                    </a>
                                </div>

                                <div class="col-sm-6 col-xs-12 mb-2">
                                    <button type="submit" class="btn btn-success w-100">Agregar &nbsp;<i class="fas fa-plus"></i>&nbsp; </button> 
                                    
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
@endcan

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
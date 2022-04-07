@extends('adminlte::page')

@section('title', 'Crear Registro')
@can('INSERTAR_PRODUCCION LECHE')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Nuevo Registro de Producción</h3>


    </div>
</div>
@stop

@section('content')
<div class="container-fluid col-md-11">

    <div class="card card-info">


        <div class="card-header">
            <h3 class="card-title">Datos Generales</h3>
        </div>
        <form action="{{route('produccion_leche.store')}}" method="post">
            @csrf()
            <div class="card-body">
                <h6><span style="color: rgb(20, 20, 20);"> * Campos obligatorios </span></h6>


                <div class="row">


                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Fecha Ordeño</label>
                            <input name="FEC_ORDEÑO" placeholder="" id="FEC_ORDEÑO" class="form-control" type='date' min="2015-01-01" max="{{date('Y-m-d');}}" value="{{ old('FEC_ORDEÑO')}}">
                            @if ($errors->has('FEC_ORDEÑO'))
                            <div id="FEC_ORDEÑO-error" class="error text-danger pl-3" for="FEC_ORDEÑO" style="display: bock;">
                                <strong>
                                    {{$errors -> first('FEC_ORDEÑO')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">

                        <div class="form-group">
                            @livewire('buscador-ordenio')
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"></span>Días de Lactancia</label>
                            <input type="text" name="DIA_LACTANCIA" class="form-control" id="DIA_LACTANCIA" value="{{ old('DIA_LACTANCIA') }}">
                            @if ($errors->has('DIA_LACTANCIA'))
                            <div id="DIA_LACTANCIA-error" class="error text-danger pl-3" for="DIA_LACTANCIA" style="display: bock;">
                                <strong>
                                    {{$errors -> first('DIA_LACTANCIA')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">

                        <div class="form-group">
                            <label><span style="color: red;"> *</span> Producción en Litros</label>
                            <input id="PRD_LITROS" class="form-control border-dark" placeholder="" type="number"  step="0.01" name="PRD_LITROS" value="{{ old('PRD_LITROS') }}">

                            @if ($errors->has('PRD_LITROS'))
                            <div id="PRD_LITROS-error" class="error text-danger pl-3" for="PRD_LITROS" style="display: bock;">
                                <strong>
                                    {{$errors -> first('PRD_LITROS')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Observaciones</label>
                            <textarea name="OBS_REGISTRO" id="OBS_REGISTRO" rows="2" class="form-control" value="{{ old('OBS_REGISTRO') }}"></textarea>
                            @if ($errors->has('OBS_REGISTRO'))
                            <div id="OBS_REGISTRO-error" class="error text-danger pl-3" for="OBS_REGISTRO" style="display: bock;">
                                <strong>
                                    {{$errors -> first('OBS_REGISTRO')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-xs-12 mb-2">
                        <a href="{{route('produccion_leche.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
@livewireScripts
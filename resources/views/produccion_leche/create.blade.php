@extends('adminlte::page')

@section('title', 'Crear Registro')
@can('INSERTAR_PRODUCCION LECHE')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Nuevo Registro de Producción</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>

@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Datos Generales</h3>

    </div>
    <form action="{{route('produccion_leche.store')}}" method="post">
        @csrf()
        <div class="card-body sm-12">

            <div class="card-body sm-12">
                <h6><span style="color: black;"> * Campos obligatorios </span></h6>
            </div>


            <div class="modal-body row col-md-12">
                <div class="col-sm-4">

                    <div class="form-group">
                        <label><span style="color: red;"> * </span>Nombre de la vaca</label>
                        <select name="COD_REGISTRO_GANADO" class="form-control" id="COD_REGISTRO_GANADO" class="form-control border-dark" type="text" name="COD_REGISTRO_GANADO" value="old('COD_REGISTRO_GANADO')" autofocus value="{{ old('COD_REGISTRO_GANADO') }}">
                            <option value="" selected disabled>Seleccione la vaca</option>
                            @foreach ($datos["ganados"] as $ganado)
                            <option value="{{$ganado->COD_REGISTRO_GANADO}}">{{$ganado->NOM_GANADO}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('COD_REGISTRO_GANADO'))
                        <div id="COD_REGISTRO_GANADO-error" class="error text-danger pl-3" for="COD_REGISTRO_GANADO" style="display: bock;">
                            <strong>
                                {{$errors -> first('COD_REGISTRO_GANADO')}}
                            </strong>
                        </div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label><span style="color: red;"></span> Fecha de Ordeño</label>
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

                <div class="col-sm-4">
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

                    <div class="form-group">
                        <label><span style="color: red;"> *</span> Producción en Litros</label>
                        <input id="PRD_LITROS" class="form-control border-dark" placeholder="" type="text" name="PRD_LITROS" value="{{ old('PRD_LITROS') }}">

                        @if ($errors->has('PRD_LITROS'))
                        <div id="PRD_LITROS-error" class="error text-danger pl-3" for="PRD_LITROS" style="display: bock;">
                            <strong>
                                {{$errors -> first('PRD_LITROS')}}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><span style="color: red;"></span> Observaciones</label>
                        <textarea name="OBS_REGISTRO" id="OBS_REGISTRO" rows="4" class="form-control" value="{{ old('OBS_REGISTRO') }}"></textarea>
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
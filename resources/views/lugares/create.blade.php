@extends('adminlte::page')

@section('title', 'Crear Lugar')
@CAN('INSERTAR_LUGARES')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Nuevo Registro de Lugar</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>
@stop
@section('content')
<div class="card card-primary">
<style type="text/css">
    .transformacion1 {
        text-transform: uppercase;
    }
</style>
    <div class="card-header">
        <h3 class="card-title">Datos Generales</h3>

    </div>
    <form method="post" action="{{ route('lugares.store') }}">
        @csrf()
        <div class="card-body sm-12">
            <h6><span style="color: RED;"> * </span>Campos obligatorios </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label><span style="color: red;"> * </span>Lugar</label>
                        <input name="DIR_LUGAR" placeholder="" id="DIR_LUGAR" class="form-control" type="text" style="text-transform: uppercase;" value="{{old('DIR_LUGAR')}}" maxlength="30" minlength="2" title="Este campo solo permite letras,30 carácteres como máximo y 2 como mínimo" pattern="[A-Z ]" >
                        @if ($errors->has('DIR_LUGAR'))
                        <div id="DIR_LUGAR-error" class="error text-danger pl-3" for="DIR_LUGAR" style="display: bock;">
                            <strong>
                                {{ $errors->first('DIR_LUGAR') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label><span style="color: red;"> </span>Dirección exacta</label>
                        <textarea name="ubicacion_exacta" placeholder="" id="ubicacion_exacta" class="form-control" rows="2" maxlength="150"  title="Este campo solo acepta 150 carácteres como máximo">{{old('ubicacion_exacta')}}</textarea>
                        @if ($errors->has('ubicacion_exacta'))
                        <div id="ubicacion_exacta-error" class="error text-danger pl-3" for="ubicacion_exacta" style="display: bock;">
                            <strong>
                                {{ $errors->first('ubicacion_exacta') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-xs-12 mb-2">
                    <a href="{{ route('lugares.index') }}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
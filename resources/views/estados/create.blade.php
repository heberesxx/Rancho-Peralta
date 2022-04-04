@extends('adminlte::page')

@section('title', 'Crear Estado')
@CAN('INSERTAR_ESTADOS GANADO')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Nuevo Registro de Estado</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Datos Generales</h3>

    </div>
    <form method="post" action="{{ route('estados.store') }}">
        @csrf()
        <div class="card-body sm-12">
            <h6><span style="color: black;"> * Campos obligatorios </span></h6>
        </div>
        <div class="card-body row md-12">

            <div class="col-sm-6">
                <div class="form-group">
                    <label><span style="color: red;"> * </span>Estado</label>
                    <input name="DET_ESTADO" placeholder="" id="DET_ESTADO" class="form-control" type="text" value="{{ old('DET_ESTADO') }}">
                    @if ($errors->has('DET_ESTADO'))
                    <div id="DET_ESTADO-error" class="error text-danger pl-3" for="DET_ESTADO" style="display: bock;">
                        <strong>
                            {{ $errors->first('DET_ESTADO') }}
                        </strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label><span style="color: red;"> </span>Descripción del Estado</label>
                    <textarea name="descripcion_estado" placeholder="" id="descripcion_estado" class="form-control" rows="1" value="{{ old('descripcion_estado')}}"></textarea>
                    @if ($errors->has('descripcion_estado'))
                    <div id="descripcion_estado-error" class="error text-danger pl-3" for="descripcion_estado" style="display: bock;">
                        <strong>
                            {{ $errors->first('descripcion_estado') }}
                        </strong>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-xs-12 mb-2">
                <a href="{{ route('estados.index') }}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                </a>
            </div>


            <div class="col-sm-6 col-xs-12 mb-2">
                <button type="submit" class="btn btn-success w-100">Guardar <i class="fas fa-check-circle ml-2"></i>
                </button>
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
@extends('adminlte::page')

@section('title', 'Crear Objeto')
@can('INSERTAR_OBJETOS')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1> Registro de Objeto</h1>
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
    <form action="{{route('objetos.store')}}" method="post">
        @csrf
        <div class="card-body sm-12">
            <h6><span style="color: black;"> * Campos obligatorios </span></h6>
        </div>
        <div class="card-body row md-12">
            <div class="col-sm-6">
                <div class="form-group has-primary">
                    <label for="objeto"><span style="color: red;"> *</span>Nombre del Objeto:</label>
                    <input id="objeto" class="form-control border-dark" placeholder="Ingrese el nombre del objeto..." type="text" name="objeto" :value="old('objeto')" autofocus>

                    @if ($errors->has('objeto'))
                    <div id="objeto-error" class="error text-danger pl-3" for="objeto" style="display: bock;">
                        <strong>
                            {{$errors -> first('objeto')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group has-primary">
                    <label for="Descripcion">Descripción del Objeto:</label>
                    <input id="Descripcion" class="form-control border-dark" placeholder="Ingrese el nombre del Descripcion..." type="text" name="Descripcion" :value="old('Descripcion')" autofocus>

                    @if ($errors->has('Descripcion'))
                    <div id="Descripcion-error" class="error text-danger pl-3" for="Descripcion" style="display: bock;">
                        <strong>
                            {{$errors -> first('Descripcion')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12 mb-2">
                <a href="{{route('objetos.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
               No podemos mostrarle esta página porque no tiene permisos, si desea acceder consulte  al administrador de seguridad.
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
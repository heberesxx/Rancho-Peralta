@extends('adminlte::page')

@section('title', 'Registrar Ganado')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Nuevo Registro de Parámetro</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">

@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Datos Personales</h3>

    </div>

    <form action="{{route('parametros.store')}}" method="post">
        @csrf
        <div class="card-body sm-12">
            <h6><span style="color: black;"> * Campos obligatorios </span></h6>
        </div>

        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="form-group has-primary">
                    <label for="parametro"><span style="color: red;"> *</span>Parametro:</label>
                    <input id="parametro" class="form-control border-dark" placeholder="Ingrese el nombre del parametro..." type="text" name="parametro" :value="old('parametro')" autofocus>

                    @if ($errors->has('parametro'))
                    <div id="parametro-error" class="error text-danger pl-3" for="parametro" style="display: bock;">
                        <strong>
                            {{$errors -> first('parametro')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>

            <div class="col-sm-6 col-xs-12">
                <div class="form-group has-primary">
                    <label for="valor">Valor:</label>
                    <input id="valor" class="form-control" placeholder="Ingrese el valor..." type="text" name="valor" :value="old('valor')">

                    @if ($errors->has('valor'))
                    <div id="valor-error" class="error text-danger pl-3" for="valor" style="display: bock;">
                        <strong>
                            {{$errors -> first('valor')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6 col-xs-12 mb-2">
                <a href="{{route('parametros.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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


@section('footer')
<strong>Copyright &copy; 2022<a href="#">UNAH</a>.</strong> Todos los derechos reservados
<div class="float-right d-none d-sm-inline-block">

</div>

@stop
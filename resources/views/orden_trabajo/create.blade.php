@extends('adminlte::page')

@section('title', 'Orden de trabajo')
@can('INSERTAR_ORDEN TRABAJO')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Nuevo Orden de Trabajo</h3>


    </div>
</div>
@stop

@section('content')
<div class="container-fluid col-md-10">

    <div class="card card-info">


        <div class="card-header">
            <h3 class="card-title">Datos Genereales</h3>
        </div>

        <form action="{{ route('orden_trabajo.store') }}" method="post">
            @csrf()

            <div class="card-body">
                <h6><span style="color: rgb(20, 20, 20);"> * Campos  obligatorios </span></h6>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">

                            @livewire('medicamentos-disponibles')


                        </div>
                    </div>



                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><span style="color: red;">*</span>Cantidad:</label>
                            <input id="CAN_MEDICAMENTO" class="form-control border-dark" placeholder="Ingrese la cantidad..." type="number" name="CAN_MEDICAMENTO" value="{{old('CAN_MEDICAMENTO')}}" requerid autofocus>
                            @if (session('CAN_MEDICAMENTO'))
                            <div id="CAN_MEDICAMENTO-error" class="error text-danger pl-3" for="CAN_MEDICAMENTO" style="display: bock;">
                                <strong>
                                    {{session('CAN_MEDICAMENTO') }}
                                </strong>
                            </div>
                            @endif

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



                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('orden_trabajo.index') }}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                        </a>
                    </div>


                    <div class="col-6">
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
                    No podemos mostrar esta página porque no tienes permisos, <a href="{{route('dashboard')}}">retorna a la pantalla principal</a> o pide permisos al administrador.
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
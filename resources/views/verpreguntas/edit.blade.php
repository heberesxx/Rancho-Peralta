@extends('adminlte::page')

@section('title', 'Editar Ganado')

@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 600px;">Editar Respuesta</h3>


    </div>
</div>
@stop

@section('content')

<!-- general form elements -->
<div class="container-fluid col-md-6">

    <div class="card card-info">
        <div class="card-header">

        </div>
        <form action="{{route('verpreguntas.update',$respuesta->id_respuesta)}}" method="post">
            @csrf()
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"></span>Usuario</label>
                            <input name="id_usuario" placeholder="" id="id_usuario" class="form-control border-dark" type="text" value="{{ $respuesta->id_usuario}}"  >
                        </div>
                    </div>
              
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Respuesta:</label>
                            <input id="respuesta" class="form-control border-dark capitalize" type="text" name="respuesta" value="{{ $respuesta->respuesta }}"  autofocus>

                            @if ($errors->has('respuesta'))
                            <div id="respuesta-error" class="error text-danger pl-3" for="respuesta" style="display: bock;">
                                <strong>
                                    {{$errors -> first('respuesta')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6 ">
                        <a href="{{ route('verpreguntas.index') }}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
@stop

@section('footer')
<strong>Copyright &copy; 2022<a href="#">UNAH</a>.</strong> Todos los derechos reservados
<div class="float-right d-none d-sm-inline-block">

</div>

@stop


@livewireScripts
@extends('adminlte::page')

@section('title', 'Editar Pregunta')
@CAN('EDITAR_PREGUNTAS')
@section('content_header')

@stop

@section('content')

<div class="card card-info">
    <div class="card-header">
        <h4 class="text-center">Editar Pregunta</h4>
    </div>
    <form action="{{route('preguntas.update',$pregunta->id)}}" method="post">
        @csrf
        <!-- Token secreto para validar el request -->
        @method('PUT')
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group has-primary">
                    <label for="pregunta">Pregunta:</label>
                    <input id="pregunta" class="form-control border-dark" placeholder="Ingrese la pregunta..." type="text" name="pregunta" value="{{$pregunta->pregunta}}" autofocus>

                    @if ($errors->has('pregunta'))
                    <div id="pregunta-error" class="error text-danger pl-3" for="pregunta" style="display: bock;">
                        <strong>
                            {{$errors -> first('pregunta')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6 col-xs-12 mb-2">
                <a href="{{route('preguntas.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
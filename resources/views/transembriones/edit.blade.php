@extends('adminlte::page')

@section('title', 'Editar Transferencia')
@CAN('EDITAR_TRANSFERENCIAS EMBRION')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Editar Transferencia de Embrión</h3>


    </div>
</div>

@stop

@section('content')

<div class="container-fluid col-md-8">

    <div class="card card-info">
        <div class="card-header">
           
        </div>
        @foreach($transembriones as $transembrion)
        <form action="{{url('transembriones', $transembrion->COD_TRANS_EMBRION)}}" method="post" role="form">
            @csrf()
            @method('PUT')
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Código Transferencia</label>
                            <input name="COD_TRANS_EMBRION" value="{{$transembrion->COD_TRANS_EMBRION}}" placeholder="" id="COD_GANADO" class="form-control" disabled type="text" value="{{$transembrion->COD_TRANS_EMBRION}}"> <br />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Estado de la Transferencia</label>
                            <select name="IND_TRANS_EMBRION" class="form-control" id="IND_TRANS_ESPERMA" value="{{$transembrion->IND_FECUNDACION}}">
                                <option selected disabled> Seleccione un estado</option>
                                <option value="EN PROCESO" {{ $transembrion->IND_FECUNDACION== "EN PROCESO"  ? 'selected' : '' }}>EN PROCESO</option>
                                <option value="FECUNDÓ" {{ $transembrion->IND_FECUNDACION== "FECUNDÓ"  ? 'selected' : '' }}>FECUNDÓ</option>
                                <option value="NO FECUNDÓ" {{ $transembrion->IND_FECUNDACION== "NO FECUNDÓ"  ? 'selected' : '' }}>NO FECUNDÓ</option>
                            </select>
                            @if ($errors->has('IND_TRANS_EMBRION'))
                            <div id="IND_TRANS_EMBRION-error" class="error text-danger pl-3" for="IND_TRANS_EMBRION" style="display: bock;">
                                <strong>
                                    {{$errors -> first('IND_TRANS_EMBRION')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-12 mb-2">
                        <a href="{{route('transembriones.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xs-12 mb-2">
                        <button type="submit" class="btn btn-success w-100">Guardar <i class="fas fa-check-circle ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>

        </form>
        @endforeach
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
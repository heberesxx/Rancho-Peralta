@extends('adminlte::page')

@section('title', 'Editar Lugar')
@CAN('EDITAR_LUGARES')
@section('content_header')

@stop

@section('content')

<div class="card card-info">
    <div class="card-header">
        <h4 class="text-center">Editar Lugar</h4>
    </div>
    
    <form action="{{route('lugares.update',$lugar->COD_LUGAR)}}" method="post">
        @csrf()
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label><span style="color: red;"> * </span>Código Lugar</label>
                        <input name="COD_LUGAR" placeholder="" id="COD_LUGAR" class="form-control border-dark" disabled type="text" value="{{($lugar->COD_LUGAR)}}">
                        @if ($errors->has('COD_LUGAR'))
                        <div id="COD_LUGAR-error" class="error text-danger pl-3" for="COD_LUGAR" style="display: bock;">
                            <strong>
                                {{ $errors->first('COD_LUGAR') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><span style="color: red;"> * </span>Lugar</label>
                        <input name="DIR_LUGAR" placeholder="" id="DIR_LUGAR" class="form-control border-dark" type="text" value="{{($lugar->DIR_LUGAR)}}">
                        @if ($errors->has('DIR_LUGAR'))
                        <div id="DIR_LUGAR-error" class="error text-danger pl-3" for="DIR_LUGAR" style="display: bock;">
                            <strong>
                                {{ $errors->first('DIR_LUGAR') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><span style="color: red;"> </span>Ubicación exacta</label>
                        <textarea  name="UBI_EXACTA"  id="UBI_EXACTA"  rows ="2"class="form-control border-dark "  type="text" value="{{$lugar->UBI_EXACTA}}" autofocus>{{$lugar->UBI_EXACTA}}</textarea>
                        @if ($errors->has('UBI_EXACTA'))
                        <div id="UBI_EXACTA-error" class="error text-danger pl-3" for="UBI_EXACTA" style="display: bock;">
                            <strong>
                                {{ $errors->first('UBI_EXACTA') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group has-primary">
                        <label><span style="color: red;"></span> Status</label>
                        <select name="STATUS" id="STATUS" class="custom-select  border-dark" value="{{$lugar->STATUS}}">
                            <option selected disabled> Seleccione un lugar</option>
                            <option value="ACTIVO" {{ $lugar->STATUS== "ACTIVO"  ? 'selected' : '' }}>ACTIVO</option>
                            <option value="INACTIVO" {{ $lugar->STATUS== "INACTIVO"  ? 'selected' : '' }}>INACTIVO</option>

                            @if ($errors->has('STATUS'))
                            <div id="STATUS-error" class="error text-danger pl-3" for="STATUS" style="display: bock;">
                                <strong>
                                    {{$errors -> first('STATUS')}}
                                </strong>
                            </div>
                            @endif
                        </select>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xs-12 mb-2">
                    <a href="{{route('lugares.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
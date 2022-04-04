@extends('adminlte::page')

@section('title', 'Editar Lugar')

@section('content_header')

@stop

@section('content')

<div class="card card-info">
    <div class="card-header">
        <h4 class="text-center">Editar Lugar</h4>
    </div>

    <form  action="{{route('razas.update',$raza->COD_RAZA)}}" method="post">
        @csrf()
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label><span style="color: red;"> * </span>Código Raza</label>
                        <input name="COD_RAZA" placeholder="" id="COD_RAZA" class="form-control border-dark" disabled type="text" value="{{($raza->COD_RAZA)}}">
                        @if ($errors->has('COD_RAZA'))
                        <div id="COD_RAZA-error" class="error text-danger pl-3" for="COD_RAZA" style="display: bock;">
                            <strong>
                                {{ $errors->first('COD_RAZA') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label><span style="color: red;"> * </span>Nombre Raza</label>
                        <input name="NOM_RAZA" placeholder="" id="NOM_RAZA" class="form-control border-dark" type="text" value="{{($raza->NOM_RAZA)}}">
                        @if ($errors->has('NOM_RAZA'))
                        <div id="NOM_RAZA-error" class="error text-danger pl-3" for="NOM_RAZA" style="display: bock;">
                            <strong>
                                {{ $errors->first('NOM_RAZA') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label><span style="color: red;"> </span>Descripcion Raza</label>
                        <input  name="DET_RAZA"  id="DET_RAZA"  class="form-control border-dark "  type="text" value="{{$raza->DET_RAZA}}" autofocus>
                        @if ($errors->has('DET_RAZA'))
                        <div id="DET_RAZA-error" class="error text-danger pl-3" for="DET_RAZA" style="display: bock;">
                            <strong>
                                {{ $errors->first('detalle_raza') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-3">

                        <div class="form-group">
                            <label><span style="color: red;"></span> Status Raza</label>

                            <select name="IND_RAZA" id="IND_RAZA" class="custom-select  border-dark" value="{{$raza->IND_RAZA}}">
                                <option selected disabled> Seleccione un estado</option>
                                <option value="ACTIVO" {{ $raza->IND_RAZA== "ACTIVO"  ? 'selected' : '' }}>ACTIVO</option>
                                <option value="INACTIVO" {{ $raza->IND_RAZA== "INACTIVO"  ? 'selected' : '' }}>INACTIVO</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xs-12 mb-2">
                    <a href="{{route('razas.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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


@section('footer')
<strong>Copyright &copy; 2022<a href="#">UNAH</a>.</strong> Todos los derechos reservados
<div class="float-right d-none d-sm-inline-block">

</div>

@stop
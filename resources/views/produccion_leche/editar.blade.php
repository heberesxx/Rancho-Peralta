
@extends('adminlte::page')

@section('title', 'Editar Producción de Leche')

@section('content_header')

@stop
@can('EDITAR_PRODUCCION LECHE')
@section('content')

<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Editar Registro</h3>
  </div>
  <form action="{{ url('produccion_leche', $produccion_leche->COD_REGISTRO_LECHE)  }}" method="post">
    @csrf()
    @method('PUT')
    <div class="card-body">
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label>Código de ganado</label>
            <input class="form-control" name="COD_REGISTRO_LECHE" id="COD_REGISTRO_LECHE" placeholder="Código ganado" value="{{ $produccion_leche->COD_REGISTRO_LECHE }}" required />
          </div>
          <div class="form-group">
            <label>Fecha de ordeño</label>
            <input class="form-control" name="FEC_ORDENIO" placeholder="" id="FEC_ORDENIO" class="form-control" type='date' min="1900-01-01" value="{{ \carbon\Carbon::parse($produccion_leche->FEC_ORDENIO)->format('Y-m-d') }}" required>
            @if ($errors->has('FEC_ORDENIO'))
            <div id="FEC_ORDENIO-error" class="error text-danger pl-3" for="FEC_ORDENIO" style="display: bock;">
              <strong>
                {{$errors -> first('FEC_ORDENIO')}}
              </strong>
            </div>
            @endif
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label>Día de lactancia</label>
            <input type="text" name="DIA_LACTANCIA" class="form-control" id="DIA_LACTANCIA" value="{{ $produccion_leche->DIA_LACTANCIA }}">
            @if ($errors->has('DIA_LACTANCIA'))
            <div id="DIA_LACTANCIA-error" class="error text-danger pl-3" for="DIA_LACTANCIA" style="display: bock;">
              <strong>
                {{$errors -> first('DIA_LACTANCIA')}}
              </strong>
            </div>
            @endif
          </div>

          <div class="form-group">
            <label><span style="color: red;"> *</span> Producción en Litros</label>
            <input id="PRD_LITROS" class="form-control border-dark" placeholder="" type="text" name="PRD_LITROS" value="{{$produccion_leche->PRD_LITROS }}" :value="{{ old('PRD_LITROS') }}" />
            @if ($errors->has('PRD_LITROS'))
            <div id="PRD_LITROS-error" class="error text-danger pl-3" for="PRD_LITROS" style="display: bock;">
              <strong>
                {{$errors -> first('PRD_LITROS')}}
              </strong>
            </div>
            @endif
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label><span style="color: red;"></span> Observaciones</label>
            <textarea name="OBS_REGISTRO" id="OBS_REGISTRO" rows="4" class="form-control" value="{{ old('OBS_REGISTRO') }}">{{ $produccion_leche->OBS_REGISTRO }} </textarea>
          </div>
          @if ($errors->has('OBS_REGISTRO'))
          <div id="OBS_REGISTRO-error" class="error text-danger pl-3" for="OBS_REGISTRO" style="display: bock;">
            <strong>
              {{$errors -> first('OBS_REGISTRO')}}
            </strong>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-xs-12 mb-2">
        <a href="{{route('produccion_leche.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
@extends('adminlte::page')

@section('title', 'Editar Medicamento')
@can('EDITAR_INVENTARIO MEDICAMENTOS')
@section('content_header')
<div class="container-fluid">
  <div class="row">

    <h3 class="text-center" style="margin-left: 600px;">Editar Medicamento</h3>


  </div>
</div>
@stop

@section('content')

<div class="container-fluid col-md-8">

  <div class="card card-info">
    <div class="card-header">

    </div>
    <form action=" {{ url('medicamento', $medicamento->COD_MEDICAMENTO) }} " method="post">
      @csrf()
      @method('PUT')

      <style type="text/css">
        .transformacion2 {
          text-transform: capitalize;
        }
      </style>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-3">
            <div class="form-group">
              <label>Nombre:</label>
              <input class="form-control transformacion2" name="NOM_MEDICAMENTO" placeholder="Ingrese el nombre..." value="{{ $medicamento->NOM_MEDICAMENTO }}" />

              @if ($errors->has('NOM_MEDICAMENTO'))
              <div id="NOM_MEDICAMENTO-error" class="error text-danger pl-3" for="NOM_MEDICAMENTO" style="display: bock;">
                <strong>
                  {{ $errors->first('NOM_MEDICAMENTO') }}
                </strong>
              </div>
              @endif
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group">
              <label>Reorden:</label>
              <input class="form-control" name="CAN_REORDEN" placeholder="Ingrese la cantidad de reorden" type="number" min="1" value="{{ $medicamento->CAN_REORDEN }}" />
              @if ($errors->has('CAN_REORDEN'))
              <div id="CAN_REORDEN-error" class="error text-danger pl-3" for="CAN_REORDEN" style="display: bock;">
                <strong>
                  {{ $errors->first('CAN_REORDEN') }}
                </strong>
              </div>
              @endif
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Aplicar vía:</label>
              <textarea class="form-control" name="ADM_MEDICAMENTO" placeholder="Describa la vía de aplicación..." cols="30" rows="2">{{ $medicamento->ADM_MEDICAMENTO }}</textarea>
              @if ($errors->has('ADM_MEDICAMENTO'))
              <div id="ADM_MEDICAMENTO-error" class="error text-danger pl-3" for="ADM_MEDICAMENTO" style="display: bock;">
                <strong>
                  {{ $errors->first('ADM_MEDICAMENTO') }}
                </strong>
              </div>
              @endif
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label>Tratamiento:</label>
              <textarea class="form-control" name="TRA_MEDICAMENTO" placeholder="Describa el tratamiento..." cols="30" rows="2">{{ $medicamento->TRA_MEDICAMENTO }}</textarea>
              @if ($errors->has('TRA_MEDICAMENTO'))
              <div id="TRA_MEDICAMENTO-error" class="error text-danger pl-3" for="TRA_MEDICAMENTO" style="display: bock;">
                <strong>
                  {{ $errors->first('TRA_MEDICAMENTO') }}
                </strong>
              </div>
              @endif
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label>Dosis:</label>
              <textarea class="form-control" name="DOS_MEDICAMENTO" placeholder="Describa la dosis..." cols="30" rows="2">{{ $medicamento->DOS_MEDICAMENTO }}</textarea>
              @if ($errors->has('DOS_MEDICAMENTO'))
              <div id="DOS_MEDICAMENTO-error" class="error text-danger pl-3" for="DOS_MEDICAMENTO" style="display: bock;">
                <strong>
                  {{ $errors->first('DOS_MEDICAMENTO') }}
                </strong>
              </div>
              @endif
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 col-xs-12 mb-2">
            <a href="{{route('medicamento.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
            </a>
          </div>
          <div class="col-6" style="color: #f5f;">
            <button class="btn  btn-primary w-100 btn-success" type="submit" data-toggle="modal" data-target="#RegistrarPersona">Editar Registro <i class="fas   mr-2" data-toggle="modal"></i></button>
          </div><br></br>
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
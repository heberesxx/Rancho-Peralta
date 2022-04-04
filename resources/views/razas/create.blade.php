@extends('adminlte::page')

@section('title', 'Crear Raza')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Nuevo Registro de Raza</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Datos Generales</h3>

    </div>
    <form method="post" action="{{ route('razas.store') }}">
        @csrf()
        <div class="card-body sm-12">
            <h6><span style="color: black;"> * Campos obligatorios </span></h6>
        </div>
        <div class="card-body row md-12">

            <div class="col-sm-6">
                <div class="form-group">
                    <label><span style="color: red;"> * </span>Nombre Raza</label>
                    <input name="NOM_RAZA" placeholder="" id="NOM_RAZA" class="form-control" type="text">
                    @if ($errors->has('NOM_RAZA'))
                    <div id="NOM_RAZA-error" class="error text-danger pl-3" for="NOM_RAZA" style="display: bock;">
                        <strong>
                            {{ $errors->first('NOM_RAZA') }}
                        </strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label><span style="color: red;"> </span>Descripció Raza</label>
                    <textarea name="DET_RAZA" placeholder="" id="DET_RAZA" class="form-control" rows="1"></textarea>
                    @if ($errors->has('DET_RAZA'))
                    <div id="DET_RAZA-error" class="error text-danger pl-3" for="DET_RAZA" style="display: bock;">
                        <strong>
                            {{ $errors->first('DET_RAZA') }}
                        </strong>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-xs-12 mb-2">
                <a href="{{ route('razas.index') }}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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




@section('footer')
<strong>Copyright &copy; 2022<a href="#">UNAH</a>.</strong> Todos los derechos reservados
<div class="float-right d-none d-sm-inline-block">

</div>

@stop
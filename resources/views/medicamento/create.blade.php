@extends('adminlte::page')

@section('title', 'Crear Medicamento')
@can('INSERTAR_INVENTARIO MEDICAMENTOS')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Nuevo Registro de Medicamento</h3>


    </div>
</div>
@stop
<style type="text/css">
    .transformacion2 {
        text-transform: capitalize;
    }
</style>
@section('content')
<div class="container-fluid col-md-10">

    <div class="card card-info">


        <div class="card-header">
            <h3 class="card-title">Datos Personales</h3>
        </div>

        <form action="{{ route('medicamento.store') }}" method="post">
            @csrf()
            <div class="card-body">
                <h6><span style="color: rgb(20, 20, 20);"> * Campos  obligatorios </span></h6>



                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"> *</span>Nombre</label>
                            <input id="NOM_MEDICAMENTO" class="form-control border-dark transformacion2" placeholder="Ingrese el nombre del medicamento..." type="text" name="NOM_MEDICAMENTO" value="{{old('NOM_MEDICAMENTO')}}" require autofocus>

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
                            <label><span style="color: red;">*</span>Cantidad de reorden:</label>
                            <input id="CAN_REORDEN" class="form-control border-dark " placeholder="Ingrese la cantidad de reorden..." type="number" name="CAN_REORDEN" value="{{old('CAN_REORDEN')}}" autofocus>

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
                            <label><span style="color: red;">*</span>Aplicar vía:</label>
                            <textarea name="ADM_MEDICAMENTO" id="ADM_MEDICAMENTO" rows="2" placeholder="Describa la vía de aplicación..." class="form-control border-dark" value="{{old('ADM_MEDICAMENTO')}}"></textarea>

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
                            <label><span style="color: red;">*</span>Tratamiento:</label>
                            <textarea name="TRA_MEDICAMENTO" id="TRA_MEDICAMENTO" rows="2" placeholder="Describa el tratamiento..." class="form-control border-dark" value="{{old('TRA_MEDICAMENTO')}}"></textarea>

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
                            <label><span style="color: red;">*</span>Dosis:</label>
                            <textarea name="DOS_MEDICAMENTO" id="DOS_MEDICAMENTO" rows="2" placeholder="Describa la dosis..." value="{{old('DOS_MEDICAMENTO')}}" class="form-control border-dark"></textarea>

                            @if ($errors->has('CAN_REORDEN'))
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
                        <a href="{{ route('medicamento.index') }}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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

<strong>Copyright &copy; 2022<a href="#"> Rancho Peralta</a>.</strong> Todos los derechos reservados.
<div class="float-right d-none d-sm-inline-block">

</div>

@stop
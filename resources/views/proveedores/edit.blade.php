@extends('adminlte::page')

@section('title', 'Editar clientes')
@can('EDITAR_PROVEEDORES')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 700px;">Editar Proveedor</h3>


    </div>
</div>
@stop
<style type="text/css">
    .transformacion1 {
        text-transform: capitalize;
    }

    .transformacion2 {
        text-transform: uppercase;
    }

    .transformacion3 {
        text-transform: lowercase;
    }
</style>
@section('content')

<div class="container-fluid col-md-11">

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        @foreach( $proveedores as $proveedor)
        <form action="{{url('proveedores', $proveedor->COD_PROVEEDOR)}}" method="post">
            @csrf()
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"> *</span> Código Proveedor</label>
                            <input type="text" name="COD_PROVEEDOR" class="form-control" id="COD_PROVEEDOR" disabled value="{{$proveedor->COD_PROVEEDOR}}">
                        </div>
                    </div>
                    <div class="col-lg-2">

                        <div class="form-group">
                            <label><span style="color: red;"></span> Estado Comercial</label>

                            <select name="IND_COMERCIAL" id="IND_COMERCIAL" class="custom-select  border-dark" value="{{$proveedor->IND_COMERCIAL}}">
                                <option selected disabled> Seleccione un estado</option>
                                <option value="ACTIVO" {{ $proveedor->IND_COMERCIAL== "ACTIVO"  ? 'selected' : '' }}>ACTIVO</option>
                                <option value="INACTIVO" {{ $proveedor->IND_COMERCIAL== "INACTIVO"  ? 'selected' : '' }}>INACTIVO</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"> </span>Nombres</label>
                            <input id="primer_nombre" class="form-control border-dark transformacion1" placeholder="nombres del proveedor" type="text" name="primer_nombre" value="{{$proveedor->PRI_NOMBRE}}"  maxlength="50" pattern="[A-Za-zÀ-ÿ ]{2,50}" title="Este campo solo puede contener letras y espacios"autofocus>

                            @if ($errors->has('primer_nombre'))
                            <div id="primer_nombre-error" class="error text-danger pl-3" for="primer_nombre" style="display: bock;">
                                <strong>
                                    {{ $errors->first('primer_nombre') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"> </span>Apellidos</label>
                            <input id="primer_apellido" class="form-control border-dark transformacion1" placeholder="apellidos  del proveedor"type="text" name="primer_apellido" value="{{$proveedor->PRI_APELLIDO}}"  maxlength="50" pattern="[A-Za-zÀ-ÿ ]{2,50}" title="Este campo solo puede contener letras y espacios" autofocus>

                            @if ($errors->has('primer_apellido'))
                            <div id="primer_apellido-error" class="error text-danger pl-3" for="primer_apellido" style="display: bock;">
                                <strong>
                                    {{ $errors->first('primer_apellido') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label> <span style="color: red;"> </span> DNI Proveedor</label> <i class="fa fa-id-card" style="margin-left: 10px;"></i>
                            <input id="ID_PROVEEDOR" class="form-control border-dark " placeholder="ID del Proveedor, sin Guiones" «nbsp» type="" name="ID_PROVEEDOR" value="{{$proveedor->ID_PROVEEDOR}}" maxlength="15" minlength="13" title="Máximo 15 dígitos, mínimos 13. Solo números, sin espacios ni guíones"  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autofocus>

                            @if ($errors->has('ID_PROVEEDOR'))
                            <div id="ID_PROVEEDOR-error" class="error text-danger pl-3" for="ID_PROVEEDOR" style="display: bock;">
                                <strong>
                                    {{ $errors->first('ID_PROVEEDOR') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Sexo</label>
                            <select name="sexo_proveedor" id="sexo_proveedor" class="custom-select  border-dark" value="{{$proveedor->SEX_PROVEEDOR}}">
                                <option selected disabled> Seleccione un estado</option>
                                <option value="M" {{ $proveedor->SEX_PROVEEDOR== "M"  ? 'selected' : '' }}>M</option>
                                <option value="F" {{ $proveedor->SEX_PROVEEDOR== "F"  ? 'selected' : '' }}>F</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">

                        <div class="form-group">
                            <label><span style="color: red;"></span> Fecha de Nacimiento</label>
                            <input name="fecha_nacimiento" placeholder="" id="fecha_nacimiento" class="form-control datepicker" type='date' max="{{date('Y-m-d');}}" value="{{$fecha}}">

                            @if ($errors->has('fecha_nacimiento'))
                            <div id="fecha_nacimiento-error" class="error text-danger pl-3" for="fecha_nacimiento" style="display: bock;">
                                <strong>
                                    {{ $errors->first('fecha_nacimiento') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"> *</span>Núm de Área</label>
                            <input class="form-control" name="NUM_AREA" value="{{$proveedor->NUM_AREA}}" placeholder="Número Área del Proveedor" maxlength="4"  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"  />
                            @if ($errors->has('NUM_AREA'))
                            <div id="NUM_AREA-error" class="error text-danger pl-3" for="NUM_AREA" style="display: bock;">
                                <strong>
                                    {{ $errors->first('NUM_AREA') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" name="NUM_CELULAR"  placeholder="Número de Celular del Proveedor" class="form-control border-dark" id="NUM_CELULAR" value="{{$proveedor->NUM_CELULAR}}" minlength="7" maxlength="10"  title="Este campo debe ser un número entre 7 y 10 dígitos" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
                            @if ($errors->has('NUM_CELULAR'))
                            <div id="NUM_CELULAR-error" class="error text-danger pl-3" for="NUM_CELULAR" style="display: bock;">
                                <strong>
                                    {{ $errors->first('NUM_CELULAR') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"></span>Teléfono</label> 
                            <input id="numero_telefono" class="form-control border-dark" placeholder="Número de Teléfono del Proveedor" type="text" name="numero_telefono" value="{{($proveedor->NUM_TELEFONO)}}" minlength="7" maxlength="10"  title="Este campo debe ser un número entre 7 y 10 dígitos" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autofocus>
                            @if ($errors->has('numero_telefono'))
                            <div id="numero_telefono-error" class="error text-danger pl-3" for="numero_telefono" style="display: bock;">
                                <strong>
                                    {{$errors -> first('numero_telefono')}}
                                </strong>
                            </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><span style="color: red;"> *</span> Detalle de la Dirección</label>
                            <textarea name="DET_DIRECCION" id="DET_DIRECCION" rows="3" class="form-control border-dark">{{$proveedor->DET_DIRECCION}}</textarea>
                            @if ($errors->has('DET_DIRECCION'))
                            <div id="DET_DIRECCION-error" class="error text-danger pl-3" for="DET_DIRECCION" style="display: bock;">
                                <strong>
                                    {{ $errors->first('DET_DIRECCION') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-12 mb-2">
                        <a href="{{route('proveedores.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
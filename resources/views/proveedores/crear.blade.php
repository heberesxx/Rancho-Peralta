@extends('adminlte::page')

@section('title', 'Crear Proveedor')
@can('INSERTAR_PROVEEDORES')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Nuevo Registro de Proveedor</h3>


    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">

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
<div class="container-fluid col-md-10">

    <div class="card card-info">


        <div class="card-header">
            <h3 class="card-title">Datos Personales</h3>
        </div>
        <form action="{{route('proveedores.store')}}" method="post">
            @csrf()
            <div class="card-body">
                <h6><span style="color: rgb(20, 20, 20);"> * Campos  obligatorios </span></h6>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"> *</span>Nombres</label>
                            <input id="primer_nombre" class="form-control border-dark transformacion1" placeholder="nombres del proveedor" type="text" name="primer_nombre" value="{{old('primer_nombre')}}"  maxlength="50" pattern="[A-Za-zÀ-ÿ ]{2,50}" title="Este campo solo puede contener letras y espacios"autofocus>

                            @if ($errors->has('primer_nombre'))
                            <div id="primer_nombre-error" class="error text-danger pl-3" for="primer_nombre" style="display: bock;">
                                <strong>
                                    {{$errors -> first('primer_nombre')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"> *</span>Apellidos</label>
                            <input id="primer_apellido" class="form-control border-dark transformacion1" placeholder="apellidos  del proveedor" type="text" name="primer_apellido" value="{{old('primer_apellido')}}" maxlength="50" pattern="[A-Za-zÀ-ÿ ]{2,50}" title="Este campo solo puede contener letras y espacios" autofocus>

                            @if ($errors->has('primer_apellido'))
                            <div id="primer_apellido-error" class="error text-danger pl-3" for="primer_apellido" style="display: bock;">
                                <strong>
                                    {{$errors -> first('primer_apellido')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;">*</span> DNI Proveedor</label>

                            <input id="id_proveedor" class="form-control border-dark" placeholder="ID del Proveedor, sin Guiones" type="text" name="id_proveedor" value="{{old('id_proveedor')}}" maxlength="15" minlength="13" title="Máximo 15 dígitos, mínimos 13. Solo números, sin espacios ni guíones"  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autofocus>

                            @if ($errors->has('id_proveedor'))
                            <div id="id_proveedor-error" class="error text-danger pl-3" for="id_proveedor" style="display: bock;">
                                <strong>
                                    {{$errors -> first('id_proveedor')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Sexo</label>
                            <select name="sex_proveedor" id="sex_proveedor" value="{{old('sex_proveedor')}}" class="custom-select border-dark">
                                <option value="" selected disabled>Elija</option>
                                <option value="M" {{old('sex_proveedor') ==  'M' ? 'selected' : ' '}}>M</option>
                                <option value="F" {{old('sex_proveedor') ==  'F' ? 'selected' : ' '}}>F</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Fecha de Nacimiento</label>
                            <input name="fecha_nacimiento" placeholder="" id="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" class="form-control border-dark" type='date' min="1900-01-01" max="{{date('Y-m-d')}}">
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
                            <label><span style="color: red;"> *</span>Número de Área</label>
                            <input id="numero_area" class="form-control border-dark" placeholder="Número Área del Proveedor" type="text" name="numero_area" value="{{old('numero_area')}}" maxlength="4"  onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autofocus>

                            @if ($errors->has('numero_area'))
                            <div id="numero_area-error" class="error text-danger pl-3" for="numero_area" style="display: bock;">
                                <strong>
                                    {{$errors -> first('numero_area')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"> *</span> Celular</label>
                            <input id="NUM_CELULAR" class="form-control border-dark" placeholder="Número de Celular del Proveedor" type="text" name="NUM_CELULAR" value="{{old('NUM_CELULAR')}}"  minlength="7" maxlength="10"  title="Este campo debe ser un número entre 7 y 10 dígitos" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autofocus>

                            @if ($errors->has('NUM_CELULAR'))
                            <div id="NUM_CELULAR-error" class="error text-danger pl-3" for="NUM_CELULAR" style="display: bock;">
                                <strong>
                                    {{$errors -> first('NUM_CELULAR')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"></span>Telefono</label>
                            <input id="numero_telefono" class="form-control border-dark" placeholder="Número de Teléfono del Proveedor" type="text" name="numero_telefono" value="{{old('numero_telefono')}}" minlength="7" maxlength="10"  title="Este campo debe ser un número entre 7 y 10 dígitos" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autofocus>

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
                            <label><span style="color: red;"></span>Dirección</label>
                            <textarea name="direccion" id="direccion" rows="3" class="form-control border-dark" id="direccion" class="form-control border-dark" placeholder="Dirección del Proveedor" type="text" name="direccion" value="{{old('direccion')}}" min="5" max="200">{{old('direccion')}}</textarea>
                            @if ($errors->has('direccion'))
                            <div id="direccion-error" class="error text-danger pl-3" for="direccion" style="display: bock;">
                                <strong>
                                    {{ $errors->first('direccion') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{route('proveedores.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
@else
@section('content')
<div class="error-page">
    <h2 class="headline text-warning"> 403</h2>
    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! página no encontrada.</h3>
        <p>
            No podemos mostrar esta página porque no tienes permisos, <a href="{{ route('dashboard') }}">retorna
                a
                la pantalla principal</a> o pide permisos al administrador.
        </p>

    </div>

</div>
@stop
@endcan

@section('footer')

<strong>Copyright &copy; 2022 <a href="#">UNAH</a>.</strong> Todos los derechos reservados.
<div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0
</div>

@stop
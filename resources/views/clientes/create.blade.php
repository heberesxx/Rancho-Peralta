@extends('adminlte::page')

@section('title', 'Crear Cliente')
@can('INSERTAR_CLIENTES')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Nuevo Registro de Cliente</h3>


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>
    $('.phone_with_ddd').mask(' 0000-0000');
</script>

@section('content')
<div class="container-fluid col-md-11">

    <div class="card card-info">


        <div class="card-header">
            <h3 class="card-title">Datos Personales</h3>
        </div>

        <form action="{{ route('clientes.store') }}" method="post">
            @csrf()

            <div class="card-body">
                <h6><span style="color: rgb(20, 20, 20);"> * Campos  obligatorios </span></h6>

                <div class="row">

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;">*</span> Primer Nombre</label>
                            <input id="primer_nombre" class="form-control border-dark transformacion1" placeholder="primer nombre del cliente..." type="text" name="primer_nombre" value="{{ old('primer_nombre') }}" autofocus>

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
                            <label><span style="color: red;">*</span> Primer Apellido</label>
                            <input id="primer_apellido" class="form-control border-dark transformacion1" placeholder="primer apellido del cliente..." type="text" name="primer_apellido" value="{{ old('primer_apellido') }}" autofocus>

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
                            <label> <span style="color: red;">*</span>DNI Cliente</label>
                            <input id="ID_CLIENTE" class="form-control border-dark " placeholder="ID del Cliente..." «nbsp» type="" name="ID_CLIENTE" value="{{ old('ID_CLIENTE') }}" autofocus>

                            @if ($errors->has('ID_CLIENTE'))
                            <div id="ID_CLIENTE-error" class="error text-danger pl-3" for="ID_CLIENTE" style="display: bock;">
                                <strong>
                                    {{ $errors->first('ID_CLIENTE') }}
                                </strong>
                            </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Sexo</label>

                            <select name="sexo_cliente" id="sexo_cliente" class="custom-select  border-dark" value="{{ old('sexo_cliente') }}">
                                <option value="" selected disabled>Elija</option>
                                <option value="M" {{old('sexo_cliente') ==  'M' ? 'selected' : ' '}}>M</option>
                                <option value="F" {{old('sexo_cliente') ==  'F' ? 'selected' : ' '}}>F</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Fecha de Nacimiento</label>
                            <input name="fecha_nacimiento" placeholder="" id="fecha_nacimiento" class="form-control border-dark" type='date' min="1930-01-01" max="" value="{{ old('fecha_nacimiento') }}">
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
                            <input id="numero_area" class="form-control border-dark" placeholder="Número de área del cliente..." type="text" name="numero_area" value="{{ old('numero_area') }}" autofocus>

                            @if ($errors->has('numero_area'))
                            <div id="numero_area-error" class="error text-danger pl-3" for="numero_area" style="display: bock;">
                                <strong>
                                    {{ $errors->first('numero_area') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"> *</span> Celular</label>
                            <input id="NUM_CELULAR" class="form-control border-dark " placeholder="Número de celular del cliente..." type="text" name="NUM_CELULAR" value="{{ old('NUM_CELULAR') }}" autofocus>

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
                            <input id="numero_telefono" class="form-control border-dark" placeholder="Número de teléfono del cliente..." type="text" name="numero_telefono" :value="{{ old('numero_telefono') }}" autofocus>
                            @if ($errors->has('numero_telefono'))
                            <div id="numero_telefono-error" class="error text-danger pl-3" for="numero_telefono" style="display: bock;">
                                <strong>
                                    {{ $errors->first('numero_telefono') }}
                                </strong>
                            </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><span style="color: red;"></span>Dirección</label>
                            <textarea name="direccion" id="direccion" rows="3" class="form-control border-dark" id="direccion" class="form-control border-dark" placeholder="Dirección del cliente" type="text" name="direccion" value="{{ old('direccion') }}" min="5" max="200"></textarea>
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
                        <a href="{{ route('clientes.index') }}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
@extends('adminlte::page')

@section('title', 'Editar clientes')
@can('EDITAR_CLIENTES')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 700px;">Editar Cliente</h3>


    </div>
</div>
@stop

@section('content')

<div class="container-fluid col-md-11">

    <div class="card card-info">
        <div class="card-header">
           
        </div>
        @foreach( $personas as $persona)
        <form action="{{url('clientes', $persona->COD_CLIENTE)}}" method="post">
            @csrf()
            @method('PUT')
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Código Cliente</label>
                            <input type="text" name="COD_CLIENTE" class="form-control" id="COD_CLIENTE" disabled value="{{$persona->COD_CLIENTE}}">
                        </div>
                    </div>

                    <div class="col-lg-2">

                        <div class="form-group">
                            <label><span style="color: red;"></span> Estado Comercial</label>

                            <select name="IND_COMERCIAL" id="IND_COMERCIAL" class="custom-select  border-dark" value="{{$persona->IND_COMERCIAL}}">
                                <option selected disabled> Seleccione un estado</option>
                                <option value="ACTIVO" {{ $persona->IND_COMERCIAL== "ACTIVO"  ? 'selected' : '' }}>ACTIVO</option>
                                <option value="INACTIVO" {{ $persona->IND_COMERCIAL== "INACTIVO"  ? 'selected' : '' }}>INACTIVO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"> </span>Primer Nombre</label>
                            <input id="primer_nombre" class="form-control border-dark transformacion2" placeholder="Ingrese el primer nombre del cliente..." type="text" name="primer_nombre" value="{{$persona->PRI_NOMBRE}}" autofocus>

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
                            <label><span style="color: red;"> </span> Primer Apellido</label>
                            <input id="primer_apellido" class="form-control border-dark transformacion2" placeholder="Ingrese el primer apellido del cliente..." type="text" name="primer_apellido" value="{{$persona->PRI_APELLIDO}}" autofocus>

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
                            <label> <span style="color: red;"> </span> DNI Cliente</label> <i class="fa fa-id-card" style="margin-left: 10px;"></i>
                            <input id="ID_CLIENTE" class="form-control border-dark " placeholder="Ingrese el número de identificación, sin guiones..." «nbsp» type="" name="ID_CLIENTE" value="{{$persona->ID_CLIENTE}}" autofocus>
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
                            <select name="sexo_cliente" id="sexo_cliente" class="custom-select  border-dark" value="{{$persona->SEX_CLIENTE}}">
                                <option selected disabled> Seleccione un estado</option>
                                <option value="M" {{ $persona->SEX_CLIENTE== "M"  ? 'selected' : '' }}>M</option>
                                <option value="F" {{ $persona->SEX_CLIENTE== "F"  ? 'selected' : '' }}>F</option>
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
                            <label><span style="color: red;"></span>Núm Área</label>
                            <input id="numero_area" class="form-control border-dark" placeholder="Ingrese su número de número de área..." type="text" name="numero_area" value="{{$persona->NUM_AREA}}" autofocus>

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
                            <label><span style="color: red;"></span> Celular</label>
                            <input id="NUM_CELULAR" class="form-control border-dark" placeholder="Ingrese su número de número de celular..." type="text" name="NUM_CELULAR" value="{{($persona->NUM_CELULAR)}}" autofocus>

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
                            <label><span style="color: red;"></span>Teléfono</label> <i class="fa fa-blender-phone" style="margin-left: 10px;"></i>
                            <input id="numero_telefono" class="form-control border-dark" placeholder="Ingrese el número de teléfono del cliente..." type="text" name="numero_telefono" value="{{($persona->NUM_TELEFONO)}}" autofocus>
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
                            <label><span style="color: red;"></span> Detalle de la Dirección</label>
                            <textarea name="direccion" id="direccion" rows="3" class="form-control border-dark" id="direccion" class="form-control border-dark" placeholder="Ingrese dirección del cliente" type="text" name="direccion">{{$persona->DET_DIRECCION}}</textarea>
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
                    <div class="col-sm-6 col-xs-12 mb-2">
                        <a href="{{route('clientes.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
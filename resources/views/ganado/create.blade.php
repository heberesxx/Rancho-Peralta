@extends('adminlte::page')

@section('title', 'Registrar Ganado')
@CAN('INSERTAR_GANADO')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Nuevo Registro de Ganado</h3>


    </div>
</div>

@stop
<style type="text/css">
    .transformacion1 {
        text-transform: uppercase;
    }
</style>
<style type="text/css">
    .transformacion2 {
        text-transform: capitalize;
    }
</style>
@section('content')
<div class="container-fluid col-md-11">

    <div class="card card-info">


        <div class="card-header">
            <h3 class="card-title">Datos Generales</h3>
        </div>
        <form action="{{route('ganado.store')}}" method="post">
            @csrf()
            <div class="card-body">
                <h6><span style="color: rgb(20, 20, 20);"> * Campos  obligatorios </span></h6>

                <div class="row">
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Arete:</label>
                            <input id="NUM_ARETE" class="form-control border-dark"  type="text"  placeholder="# Arete"  name="NUM_ARETE" value="{{old('NUM_ARETE')}}" maxlength="3" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"autofocus>

                            @if ($errors->has('NUM_ARETE'))
                            <div id="NUM_ARETE-error" class="error text-danger pl-3" for="NUM_ARETE" style="display: bock;">
                                <strong>
                                    {{$errors -> first('NUM_ARETE')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Nombre:</label>
                            <input id="nombre_ganado" class="form-control border-dark capitalize" placeholder="Nombre Ganado" type="text" name="nombre_ganado" value="{{old('nombre_ganado')}}" minlength="2" maxlength="30" pattern="[A-Za-zÀ-ÿ ]{2,30}" title="Este campo solo puede contener letras y espacios" autofocus>

                            @if ($errors->has('nombre_ganado'))
                            <div id="nombre_ganado-error" class="error text-danger pl-3" for="nombre_ganado" style="display: bock;">
                                <strong>
                                    {{$errors -> first('nombre_ganado')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;">*</span>Color:</label>
                            <input id="color" class="form-control border-dark" placeholder="Color del Ganado" type="text" name="color" value="{{old('color')}}" pattern="[[A-Za-z ]+" title="Este campo solo acepta letras" minlength="2" maxlength="30" pattern="[A-Za-zÀ-ÿ ]{2,30}" title="Este campo solo puede contener letras y espacios" autofocus>

                            @if ($errors->has('color'))
                            <div id="color-error" class="error text-danger pl-3" for="color" style="display: bock;">
                                <strong>
                                    {{$errors -> first('color')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Sexo:</label>
                            <select id="sexo_ganado" class="form-control border-dark" type="text" name="sexo_ganado" value="{{old('sexo_ganado')}}" autofocus>
                                <option value="" selected disabled>Sexo del ganado</option>
                                <option value="1" {{old('sexo_ganado') ==  1 ? 'selected' : ' '}}>MACHO </option>
                                <option value="2" {{old('sexo_ganado') ==  2 ? 'selected' : ' '}}>HEMBRA </option>
                            </select>
                            @if ($errors->has('sexo_ganado'))
                            <div id="sexo_ganado-error" class="error text-danger pl-3" for="sexo_ganado" style="display: bock;">
                                <strong>
                                    {{$errors -> first('sexo_ganado')}}
                                </strong>
                            </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label><span style="color: red;"></span>Peso (kg):</label>
                            <input id="peso" class="form-control border-dark" placeholder="Peso"  type="number" step="0.01" name="peso" value="{{old('peso')}}" autofocus>

                            @if ($errors->has('peso'))
                            <div id="peso-error" class="error text-danger pl-3" for="peso" style="display: bock;">
                                <strong>
                                    {{$errors -> first('peso')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"> </span>Fierro:</label>
                            <input id="fierro" class="form-control border-dark " placeholder="Ingrese el fierro del ganado " onkeyup="javascript:this.value=this.value.toUpperCase();"  maxlength="2" type="text" name="fierro" value="{{old('fierro')}}" autofocus>

                            @if ($errors->has('fierro'))
                            <div id="fierro-error" class="error text-danger pl-3" for="fierro" style="display: bock;">
                                <strong>
                                    {{$errors -> first('fierro')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="row">
                <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Fecha de Nacimiento</label>
                            <input name="fecha_nacimiento" placeholder="" id="fecha_nacimiento" class="form-control datepicker" max="{{ date('Y-m-d') }}" type='date'  >
                            @if ($errors->has('fecha_nacimiento'))
                            <div id="fecha_nacimiento-error" class="error text-danger pl-3" for="fecha_nacimiento" style="display: bock;">
                                <strong>
                                    {{ $errors->first('fecha_nacimiento') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">

                            @livewire('buscador-razas')
                        </div>

                    </div>


                    <div class="col-lg-4">
                        <div class="form-group">
                            @livewire('buscador-estados')
                        </div>
                    </div>
                   


                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Lugar:</label>
                            <select name="lugar" class="form-control border-dark" id="lugar" class="form-control border-dark" type="text" name="lugar" value="{{old('lugar')}}" autofocus>
                                <option value="" selected disabled>Seleccione un Lugar</option>
                                @foreach ($datos["lugares"] as $lugar)
                                <option value="{{$lugar->COD_LUGAR}}">{{$lugar->DIR_LUGAR}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('lugar'))
                            <div id="lugar-error" class="error text-danger pl-3" for="lugar" style="display: bock;">
                                <strong>
                                    {{$errors -> first('lugar')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-sm-6 col-xs-12 mb-2">
                        <a href="{{route('ganado.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
@livewireScripts
@extends('adminlte::page')

@section('title', 'Registrar Nacimiento')
@can('INSERTAR_NACIMIENTOS ESPERMA')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Registrar Nacimiento por Esperma</h3>


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
        <form action="{{ route('nacimientos_esperma.store') }}" method="post" role="form">
            @csrf()
            <div class="card-body">
                <h6><span style="color: rgb(20, 20, 20);"> * Campos  obligatorios </span></h6>

                <div class="row">
                    <div class="col-lg-1">
                        <label><span style="color: red;"> </span> Arete:</label>
                        <input id="NUM_ARETE" class="form-control border-dark" placeholder="Ingrese el número de arete" type="text" name="NUM_ARETE" value="{{old('NUM_ARETE')}}"  maxlength="3" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autofocus>

                        @if ($errors->has('NUM_ARETE'))
                        <div id="NUM_ARETE-error" class="error text-danger pl-3" for="NUM_ARETE" style="display: bock;">
                            <strong>
                                {{$errors -> first('NUM_ARETE')}}
                            </strong>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Nombre:</label>
                            <input name="NOM_GANADO" placeholder="" id="NOM_GANADO" class="form-control border-dark" type="text" value="{{old('NOM_GANADO')}}"  minlength="2" maxlength="30" pattern="[A-Za-zÀ-ÿ ]{2,30}" title="Este campo solo puede contener letras y espacios">
                            @if ($errors->has('NOM_GANADO'))
                            <div id="NOM_GANADO-error" class="error text-danger pl-3" for="NOM_GANADO" style="display: bock;">
                                <strong>
                                    {{$errors -> first('NOM_GANADO')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;">*</span>Color:</label>
                            <input name="CLR_GANADO" placeholder="" id="CLR_GANADO" class="form-control border-dark"   pattern="[[A-Za-z ]+" title="Este campo solo acepta letras" type="text" value="{{old('CLR_GANADO')}}"  minlength="2" maxlength="30" pattern="[A-Za-zÀ-ÿ ]{2,30}" title="Este campo solo puede contener letras y espacios">
                            @if ($errors->has('CLR_GANADO'))
                            <div id="CLR_GANADO-error" class="error text-danger pl-3" for="CLR_GANADO" style="display: bock;">
                                <strong>
                                    {{$errors -> first('CLR_GANADO')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Sexo:</label>
                            <select id="SEX_GANADO" class="form-control border-dark" type="text" name="SEX_GANADO" value="{{old('SEX_GANADO')}}" autofocus>
                                <option value="" selected disabled>Seleccione el sexo del ganado</option>
                                <option value="MACHO" {{old('SEX_GANADO') ==  "MACHO" ? 'selected' : ' '}}>MACHO </option>
                                <option value="HEMBRA" {{old('SEX_GANADO') ==  "HEMBRA"? 'selected' : ' '}}>HEMBRA </option>
                            </select>
                            @if ($errors->has('SEX_GANADO'))
                            <div id="SEX_GANADO-error" class="error text-danger pl-3" for="SEX_GANADO" style="display: bock;">
                                <strong>
                                    {{$errors -> first('SEX_GANADO')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label><span style="color: red;"></span>Peso(kg):</label>
                            <input name="PES_ACTUAL" placeholder="" id="PES_ACTUAL" class="form-control border-dark" type="number" step="0.01" value="{{old('PES_ACTUAL')}}">
                            @if ($errors->has('PES_ACTUAL'))
                            <div id="PES_ACTUAL-error" class="error text-danger pl-3" for="PES_ACTUAL" style="display: bock;">
                                <strong>
                                    {{$errors -> first('PES_ACTUAL')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"> </span>Fierro:</label>
                            <input name="FIE_GANADO" placeholder="" id="FIE_GANADO" class="form-control border-dark" type="text" value="{{old('FIE_GANADO')}}" onkeyup="javascript:this.value=this.value.toUpperCase();"  maxlength="2">
                            @if ($errors->has('FIE_GANADO'))
                            <div id="FIE_GANADO-error" class="error text-danger pl-3" for="FIE_GANADO" style="display: bock;">
                                <strong>
                                    {{$errors -> first('FIE_GANADO')}}
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
                            <input name="FEC_NACIMIENTO" placeholder="" id="FEC_NACIMIENTO" class="form-control border-dark" id="fecha" type='date' min="2015-01-01" max="{{date('Y-m-d');}}" value="{{old('FEC_NACIMIENTO')}}">
                            @if ($errors->has('FEC_NACIMIENTO'))
                            <div id="FEC_NACIMIENTO-error" class="error text-danger pl-3" for="FEC_NACIMIENTO" style="display: bock;">
                                <strong>
                                    {{$errors -> first('FEC_NACIMIENTO')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">

                            @livewire('buscador-razas')
                        </div>

                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            @livewire('buscador-estados')
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Lugar:</label>
                            <select name="COD_LUGAR" class="form-control border-dark" value="{{old('COD_LUGAR')}}">
                                <option value="" selected disabled>Seleccione un Lugar</option>
                                @foreach ($datos["lugares"] as $lugar)
                                <option value="{{$lugar->COD_LUGAR}}" {{ old('COD_LUGAR') == $lugar->COD_LUGAR  ? 'selected' : '' }}>{{$lugar->DIR_LUGAR}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('COD_LUGAR'))
                            <div id="COD_LUGAR-error" class="error text-danger pl-3" for="COD_LUGAR" style="display: bock;">
                                <strong>
                                    {{$errors -> first('COD_LUGAR')}}
                                </strong>
                            </div>
                            @endif
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            @livewire('buscador-prenadas-esperma')
                        </div>
                    </div>
                    
                </div>


                <div class="row">
                    <div class="col-sm-6 col-xs-12 mb-2">
                        <a href="{{ route('nacimientos_esperma.index') }}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
<strong>Copyright &copy; 2022<a href="#">UNAH</a>.</strong> Todos los derechos reservados
<div class="float-right d-none d-sm-inline-block">

</div>

@stop
@livewireScripts
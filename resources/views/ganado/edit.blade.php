@extends('adminlte::page')

@section('title', 'Editar Ganado')
@CAN('EDITAR_GANADO')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 700px;">Editar Ganado</h3>


    </div>
</div>
@stop

@section('content')

<!-- general form elements -->
<div class="container-fluid col-md-11">

    <div class="card card-info">
        <div class="card-header">

        </div>

        <form action=" {{ url('ganado', $ganado->COD_REGISTRO_GANADO) }} " method="post">
            @csrf()
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label><span style="color: red;"></span>Código Registro</label>
                            <input name="COD_GANADO" placeholder="" id="COD_GANADO" class="form-control border-dark" type="text" value="{{ $ganado->COD_REGISTRO_GANADO }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label><span style="color: red;"> </span>Número de Arete</label>
                            <input id="NUM_ARETE" class="form-control border-dark" placeholder="Ingrese el número de arete" type="text" value="{{ $ganado->NUM_ARETE }}" name="NUM_ARETE" :value="old('NUM_ARETE')" autofocus>

                            @if (session('NUM_ARETE'))
                        <div id="NUM_ARETE-error" class="error text-danger pl-3" for="NUM_ARETE" style="display: bock;">
                            <strong>
                                {{session('NUM_ARETE') }}
                            </strong>
                        </div>
                        @endif
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Nombre:</label>
                            <input id="nombre_ganado" class="form-control border-dark capitalize" type="text" name="nombre_ganado" value="{{ $ganado->NOM_GANADO }}" autofocus>

                            @if ($errors->has('nombre_ganado'))
                            <div id="nombre_ganado-error" class="error text-danger pl-3" for="nombre_ganado" style="display: bock;">
                                <strong>
                                    {{$errors -> first('nombre_ganado')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label><span style="color: red;">*</span>Color:</label>
                            <input id="color_ganado" class="form-control border-dark" placeholder="Ingrese el color_ganado del ganado..." type="text" name="color_ganado" value="{{ $ganado->CLR_GANADO }}" autofocus>

                            @if ($errors->has('color_ganado'))
                            <div id="color_ganado-error" class="error text-danger pl-3" for="color_ganado" style="display: bock;">
                                <strong>
                                    {{$errors -> first('color')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            @livewire('buscador-razas',['codigo_raza'=>$ganado->COD_RAZA,'detalle'=>$ganado->RAZ_GANADO])
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Sexo:</label>
                            <select id="sexo_ganado" class="form-control border-dark" type="text" name="sexo_ganado" value="{{ $ganado->SEX_GANADO }}" autofocus>
                                <option selected disabled> Seleccione un sexo </option>
                                <option value="MACHO" {{ $ganado->SEX_GANADO== "MACHO"  ? 'selected' : '' }}>MACHO</option>
                                <option value="HEMBRA" {{ $ganado->SEX_GANADO== "HEMBRA"  ? 'selected' : '' }}>HEMBRA</option>
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
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            @livewire('buscador-editar-estados',['codigo_estado'=>$ganado->COD_ESTADO,'detalle'=>$ganado->DET_ESTADO])

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label><span style="color: red;"> </span>LUGAR:</label>
                            <select class="form-control border-dark" name="lugar" id="lugar" class="form-control border-dark" type="text" :value="old('lugar')">
                                <option value="" selected disabled> {{ $ganado->DIR_LUGAR }}</option>
                                @foreach ($datos['lugares'] as $lugar)
                                <option value="{{ $lugar->COD_LUGAR }}" @if (old('lugar')==$lugar->COD_LUGAR || $lugar->COD_LUGAR == $ganado->COD_LUGAR) selected @endif>
                                    {{ $lugar->DIR_LUGAR }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('lugar'))
                            <div id="lugar-error" class="error text-danger pl-3" for="lugar" style="display: bock;">
                                <strong>
                                    {{ $errors->first('lugar') }}
                                </strong>
                            </div>
                            @endif
                        </div>



                    </div>

                    <div class="col-3">
                        <div class="form-group">

                            <label><span style="color: red;"></span>PESO (kg):</label>
                            <input id="peso" class="form-control border-dark" placeholder="Ingrese el peso actual del ganado en kg..." type="text" name="peso" value="{{ $ganado->PES_ACTUAL }}" :value="old('peso')" autofocus>
                            @if ($errors->has('peso'))
                            <div id="peso-error" class="error text-danger pl-3" for="peso" style="display: bock;">
                                <strong>
                                    {{ $errors->first('peso') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-3">

                        <div class="form-group">

                            <label><span style="color: red;"></span>FIERRO</label>
                            <input id="fierro" class="form-control border-dark trasnformacion1" placeholder="Ingrese el fierro del ganado" type="text" name="fierro" :value="old('fierro')" autofocus value="{{ $ganado->FIE_GANADO }}">
                            @if ($errors->has('fierro'))
                            <div id="fierro-error" class="error text-danger pl-3" for="fierro" style="display: bock;">
                                <strong>
                                    {{ $errors->first('fierro') }}
                                </strong>
                            </div>
                            @endif
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 ">
                        <a href="{{ route('ganado.index') }}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                        </a>
                    </div>

                    <div class="col-sm-6">
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


@livewireScripts
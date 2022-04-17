<!-- Universidad Nacional Autónoma de Honduras (UNAH)
Facultad de Ciencias Económicas, Administrativas y Contables Departamento de Informática Administrativa
Analisis, Programacion y Evaluacion de Sistemas
Primer Período 2022

Equipo:
Jennifer Azucena Claros Flores..........(jeniclaros028@gmail.com)
Nancy Gicela Dominguez Cruz.............(cruzgicela0503@gmail.com)			 
Jeffry Joseph Aguilar Corrales..........(jeffryaguilaraguilarcorrales@gmail.com)			
Carlos Ramón Funes Silva................(Carlosramon.funessilva@gmail.com)			
Nisi Farid Sanchéz......................(farid.sanchez26@gmail.com)				
Heber Noel Espinoza Alvarado............(ever2526v5@gmail.com)				
					
===============================================================================
Catedrático:
Lic. Lester Josué Fiallos Peralta 
Lic. Lester Josué Fiallos Peralta 
Lic. Karla Melisa Garcia Pineda


===============================================================================
Programa:          Rancho Peralta 
Pantalla:          Editar Vaca Preñada
Fecha:             02/02/2022
Programador:       Jennifer Claros
descripción:       Pantalla que permite editar datos de las vacas preñadas por medio de embrión -->


@extends('adminlte::page')

@section('title', 'Editar Vaca Preñada')
@can('EDITAR_PRENADAS EMBRION')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Editar Vaca Preñada por Embrión</h3>


    </div>
</div>
@stop

@section('content')
<div class="container-fluid col-md-10">

    <div class="card card-info">
        <div class="card-header">

        </div>
        @foreach($vacasprenadasesembriones as $vacaprenadaembrion)
        <form action="{{url('vaca_prenada', $vacaprenadaembrion->COD_PRENADA_EMBRION)}}" method="post" role="form">
            @csrf()
            @method('PUT')
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Código Vaca Preñada</label>
                            <input name="COD_VACA_PRENADA" value="{{$vacaprenadaembrion->COD_PRENADA_EMBRION}}" placeholder="" id="COD_VACA_PRENADA" class="form-control" type="text" disabled>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>Fecha Parto</label>
                            <input name="FEC_PARIR" placeholder="" class="form-control" min="2015-01-01" max="{{date('Y-m-d');}}" type="date" value="{{$fecha}}">
                            @if ($errors->has('FEC_PARIR'))
                            <div id="FEC_PARIR-error" class="error text-danger pl-3" for="FEC_PARIR" style="display: bock;">
                                <strong>
                                    {{ $errors->first('FEC_PARIR') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                  
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label> <span style="color: red;"> * </span>Estado de la vaca</label>
                            <select name="IND_PRENADA" class="form-control" id="IND_PRENADA" value="{{old('IND_PRENADA')}}">
                                <option selected disabled> Seleccione un estado</option>
                                <option value="ABORTÓ" {{ $vacaprenadaembrion->IND_PRENADA== "ABORTÓ"  ? 'selected' : '' }}>ABORTÓ</option>
                                <option value="NO ABORTÓ" {{ $vacaprenadaembrion->IND_PRENADA== "NO ABORTÓ"  ? 'selected' : '' }}>NO ABORTÓ</option>
                            </select>
                            @if ($errors->has('IND_PRENADA'))
                            <div id="IND_PRENADA-error" class="error text-danger pl-3" for="IND_PRENADA" style="display: bock;">
                                <strong>
                                    {{ $errors->first('IND_PRENADA') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Observación</label>
                            <textarea class="form-control" id="OBS_VACAP" rows="2" name="OBS_VACAP" placeholder="">{{$vacaprenadaembrion->OBS_VACAP}} </textarea>
                            @if ($errors->has('OBS_VACAP'))
                            <div id="OBS_VACAP-error" class="error text-danger pl-3" for="OBS_VACAP" style="display: bock;">
                                <strong>
                                    {{ $errors->first('OBS_VACAP') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-12 mb-2">
                        <a href="{{route('vaca_prenada.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
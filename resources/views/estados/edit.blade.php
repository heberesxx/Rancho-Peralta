<!--
Universidad Nacional Autónoma de Honduras (UNAH)
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
Pantalla:            Editar Estado
Fecha:             01/03/2022
Programador:       Heber Espinoza
descripción:       Pantalla que permite  Editar  un estado 



-->
@extends('adminlte::page')

@section('title', 'Editar Estado')
@CAN('EDITAR_ESTADOS GANADO')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 > Editar Estado</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>
@stop

@section('content')

<div class="card card-info">
    <div class="card-header">
       
    </div>
    <style type="text/css">
        .transformacion1 {
            text-transform: uppercase;
        }
    </style>
    <form action="{{route('estados.update',$estado->COD_ESTADO)}}" method="post">
        @csrf()
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label><span style="color: red;"> </span>Código Estado</label>
                        <input name="COD_ESTADO" placeholder="" id="COD_ESTADO" class="form-control border-dark" disabled type="text" value="{{($estado->COD_ESTADO)}}">
                        @if ($errors->has('COD_ESTADO'))
                        <div id="COD_ESTADO-error" class="error text-danger pl-3" for="COD_ESTADO" style="display: bock;">
                            <strong>
                                {{ $errors->first('COD_ESTADO') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label><span style="color: red;"> </span>Estado</label>
                        <input name="DET_ESTADO" style="text-transform: uppercase;" placeholder="" id="DET_ESTADO" class="form-control border-dark" type="text" maxlength="5
                        30" minlength="2" title="Este campo solo permite letras,30 carácteres como máximo y 2 como mínimo" value="{{($estado->DET_ESTADO)}}" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return /[A-Z, ]/i.test(event.key)">
                        @if ($errors->has('DET_ESTADO'))
                        <div id="DET_ESTADO-error" class="error text-danger pl-3" for="DET_ESTADO" style="display: bock;">
                            <strong>
                                {{ $errors->first('DET_ESTADO') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><span style="color: red;"> </span>Descripción del Estado</label>
                        <textarea id="descripcion_estado" class="form-control border-dark " rows="2" type="text" name="descripcion_estado" maxlength="150" title="Este campo solo acepta 150 carácteres como máximo" value="" autofocus>{{$estado->DESCRIPCION_ESTADO}}</textarea>
                        @if ($errors->has('descripcion_estado'))
                        <div id="descripcion_estado-error" class="error text-danger pl-3" for="descripcion_estado" style="display: bock;">
                            <strong>
                                {{ $errors->first('descripcion_estado') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group has-primary">
                        <label><span style="color: red;"></span> Status</label>
                        <select name="STATUS" id="STATUS" class="custom-select  border-dark" value="{{$estado->STATUS}}">
                            <option selected disabled> Seleccione un estado</option>
                            <option value="ACTIVO" {{ $estado->STATUS== "ACTIVO"  ? 'selected' : '' }}>ACTIVO</option>
                            <option value="INACTIVO" {{ $estado->STATUS== "INACTIVO"  ? 'selected' : '' }}>INACTIVO</option>

                            @if ($errors->has('STATUS'))
                            <div id="STATUS-error" class="error text-danger pl-3" for="STATUS" style="display: bock;">
                                <strong>
                                    {{$errors -> first('STATUS')}}
                                </strong>
                            </div>
                            @endif
                        </select>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xs-12 mb-2">
                    <a href="{{route('estados.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
@stop
@else
@section('content')
<div class="error-page">
    <h2 class="headline text-warning"> 403</h2>
    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! página no encontrada.</h3>
        <p>
            No podemos mostrarle esta página porque no tiene permisos, si desea acceder consulte al administrador de seguridad.
        </p>

    </div>

</div>
@stop
@endcan


@section('footer')
<strong>Copyright &copy; 2022<a href="#">UNAH</a>.</strong> Todos los derechos reservados
<div class="float-right d-none d-sm-inline-block">

</div>

@stop
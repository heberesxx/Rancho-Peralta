
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
Pantalla:            Editar Raza
Fecha:             01/03/2022
Programador:       Heber Espinoza
descripción:       Pantalla que permite  Editar  una raza 



-->
@extends('adminlte::page')

@section('title', 'Editar Raza')
@CAN('EDITAR_RAZAS')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 > Editar Raza</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>
@stop

@section('content')
<style type="text/css">
    .transformacion1 {
        text-transform: uppercase;
    }
</style>
<div class="card card-info">
    <div class="card-header">
       
    </div>

    <form action="{{route('razas.update',$raza->COD_RAZA)}}" method="post">
        @csrf()
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label><span style="color: red;"> </span>Código Raza</label>
                        <input name="COD_RAZA" placeholder="" id="COD_RAZA" class="form-control border-dark" disabled type="text" value="{{($raza->COD_RAZA)}}" onkeyup="javascript:this.value=this.value.toUpperCase();" onkeydown="return /[A-Z, ]/i.test(event.key)">
                        @if ($errors->has('COD_RAZA'))
                        <div id="COD_RAZA-error" class="error text-danger pl-3" for="COD_RAZA" style="display: bock;">
                            <strong>
                                {{ $errors->first('COD_RAZA') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label><span style="color: red;"> </span>Nombre Raza</label>
                        <input name="NOM_RAZA" placeholder="" id="NOM_RAZA" class="form-control border-dark"   maxlength="150" minlength="2" title="Este campo solo permite letras,30 carácteres como máximo y 2 como mínimo" type="text" value="{{($raza->NOM_RAZA)}}" onkeydown="return /[A-Z, ]/i.test(event.key)">
                        @if ($errors->has('NOM_RAZA'))
                        <div id="NOM_RAZA-error" class="error text-danger pl-3" for="NOM_RAZA" style="display: bock;">
                            <strong>
                                {{ $errors->first('NOM_RAZA') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label><span style="color: red;"> </span>Descripcion Raza</label>
                        <textarea name="DET_RAZA" id="DET_RAZA" rows="2" class="form-control border-dark " type="text" value="{{$raza->DET_RAZA}}">{{$raza->DET_RAZA}}</textarea>
                        @if ($errors->has('DET_RAZA'))
                        <div id="DET_RAZA-error" class="error text-danger pl-3" for="DET_RAZA" style="display: bock;">
                            <strong>
                                {{ $errors->first('detalle_raza') }}
                            </strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-3">

                    <div class="form-group">
                        <label><span style="color: red;"></span> Status Raza</label>

                        <select name="IND_RAZA" id="IND_RAZA" class="custom-select  border-dark" value="{{$raza->IND_RAZA}}">
                            <option selected disabled> Seleccione un estado</option>
                            <option value="ACTIVO" {{ $raza->IND_RAZA== "ACTIVO"  ? 'selected' : '' }}>ACTIVO</option>
                            <option value="INACTIVO" {{ $raza->IND_RAZA== "INACTIVO"  ? 'selected' : '' }}>INACTIVO</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xs-12 mb-2">
                    <a href="{{route('razas.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
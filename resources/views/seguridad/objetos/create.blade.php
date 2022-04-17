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
Pantalla:          Crear Objeto
Fecha:             25/02/2022
Programador:       Heber Espinoza
descripción:       Pantalla que permite  crear un Objeto. 



-->
@extends('adminlte::page')

@section('title', 'Crear Objeto')
@can('INSERTAR_OBJETOS')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1> Registro de Objeto</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Datos Generales</h3>

    </div>
    <form action="{{route('objetos.store')}}" method="post">
        @csrf
        <div class="card-body sm-12">
            <h6><span style="color: black;"> * Campos obligatorios </span></h6>
        </div>
        <div class="card-body row md-12">
            <div class="col-sm-6">
                <div class="form-group has-primary">
                    <label for="objeto"><span style="color: red;"> *</span>Nombre del Objeto:</label>
                    <input id="objeto" class="form-control border-dark" placeholder="Ingrese el nombre del objeto..." type="text" name="objeto" :value="old('objeto')" maxlength="50" minlength="2" title="Este campo solo permite letras,50 carácteres como máximo y 2 como mínimo" onkeyup="javascript:this.value=this.value.toUpperCase();"  autofocus>

                    @if ($errors->has('objeto'))
                    <div id="objeto-error" class="error text-danger pl-3" for="objeto" style="display: bock;">
                        <strong>
                            {{$errors -> first('objeto')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group has-primary">
                    <label for="Descripcion">Descripción del Objeto:</label>
                    <textarea id="Descripcion" class="form-control border-dark" placeholder="Ingrese el nombre del Descripcion..." type="text"  rows="2" name="Descripcion" :value="old('Descripcion')" autofocus maxlength="255">{{old('Descripcion')}}</textarea>

                    @if ($errors->has('Descripcion'))
                    <div id="Descripcion-error" class="error text-danger pl-3" for="Descripcion" style="display: bock;">
                        <strong>
                            {{$errors -> first('Descripcion')}}
                        </strong>
                    </div>
                    @endif

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12 mb-2">
                <a href="{{route('objetos.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                </a>
            </div>

            <div class="col-sm-6 col-xs-12 mb-2">
                <button type="submit" class="btn btn-success w-100">Guardar <i class="fas fa-check-circle ml-2"></i>
                </button>
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
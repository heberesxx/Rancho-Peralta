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
Pantalla:          Editar Objeto
Fecha:             25/02/2022
Programador:       Heber Espinoza
descripción:       Pantalla que permite  Editar  un Objeto.



-->
@extends('adminlte::page')

@section('title', 'Editar Objeto')
@can('EDITAR_OBJETOS')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 700px;">Editar Objeto</h3>


    </div>
</div>
@stop

@section('content')
<div class="container-fluid col-md-9">

    <div class="card card-info">
        <div class="card-header">

        </div>
        <form action="{{route('objetos.update',$objeto->id)}}" method="post">
            @csrf
            <!-- Token secreto para validar el request -->
            @method('PUT')
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="objeto">Nombre del Objeto:</label>
                            <input id="objeto" class="form-control border-dark" placeholder="Ingrese el nombre del objeto..." type="text" name="objeto" value="{{$objeto->objeto}}" autofocus>

                            @if ($errors->has('objeto'))
                            <div id="objeto-error" class="error text-danger pl-3" for="objeto" style="display: bock;">
                                <strong>
                                    {{$errors -> first('objeto')}}
                                </strong>
                            </div>
                            @endif

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Descripcion">Descripción del Objeto:</label>
                            <input id="Descripcion" class="form-control border-dark" placeholder="Ingrese el nombre del Descripcion..." type="text" name="Descripcion" value="{{$objeto->Descripcion}}" autofocus>

                            @if ($errors->has('Descripcion'))
                            <div id="Descripcion-error" class="error text-danger pl-3" for="Descripcion" style="display: bock;">
                                <strong>
                                    {{$errors -> first('Descripcion')}}
                                </strong>
                            </div>
                            @endif

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Status objeto</label>
                            <select name="status" id="status" class="custom-select  border-dark" value="{{$objeto->status}}">
                                <option selected disabled> Seleccione un estado</option>
                                <option value="ACTIVO" {{ $objeto->status== "ACTIVO"  ? 'selected' : '' }}>ACTIVO</option>
                                <option value="INACTIVO" {{ $objeto->status== "INACTIVO"  ? 'selected' : '' }}>INACTIVO</option>

                                @if ($errors->has('status'))
                                <div id="status-error" class="error text-danger pl-3" for="status" style="display: bock;">
                                    <strong>
                                        {{$errors -> first('status')}}
                                    </strong>
                                </div>
                                @endif
                            </select>

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
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
Pantalla:          Registrar Transferencia Embrión
Fecha:             01/02/2022
Programador:       Heber Espinoza
descripción:       Pantalla que permite registrar una transferencia de embrión.



-->
@extends('adminlte::page')
@can('INSERTAR_TRANSFERENCIAS EMBRION')
@section('title', 'Registrar Transferencia Embrión')

@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Nueva Transferencia de Embrión</h3>


    </div>
</div>


@stop

@section('content')
<div class="container-fluid col-md-9">

    <div class="card card-info">


        <div class="card-header">
            <h3 class="card-title">Datos de la Transferencia</h3>
        </div>
        <form action="{{route('transembriones.store')}}" method="post">
            @csrf()
            <div class="card-body">
                <h6><span style="color: red;"> *</span> Campos obligatorios </h6>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">

                            @livewire('buscador-embriones')


                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">

                            @livewire('vacas-sincronizadas')


                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Estado</label>
                            <select name="IND_TRANS_EMBRION" class="form-control" id="IND_TRANS_ESPERMA" disabled>
                                <option value="EN PROCESO" selected disabled>EN PROCESO</option>
                            </select>
                        </div>

                    </div>



                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-12 mb-2">
                        <a href="{{route('transembriones.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xs-12 mb-2">
                        <button type="submit" class="btn btn-success w-100">Guardar <i class="fas fa-check-circle ml-2"></i>
                        </button>
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
@livewireScripts
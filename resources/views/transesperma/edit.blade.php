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
Pantalla:          Editar Transferencia
Fecha:             03/02/2022
Programador:       Heber Espinoza
descripción:       Pantalla que permite editar a una transferencia de esperma.



-->
@extends('adminlte::page')

@section('title', 'Editar Transferencia')
@can('EDITAR_TRANSFERENCIAS ESPERMA')
@section('content_header')

<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Editar Transferencia de Esperma</h3>


    </div>
</div>

@stop

@section('content')

<div class="container-fluid col-md-8">

    <div class="card card-info">
        <div class="card-header">

        </div>
        @foreach($transespermas as $transesperma)
        <form action="{{url('transesperma', $transesperma->COD_TRANS_ESPERMA)}}" method="post" role="form">
            @csrf()
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><span style="color: red;"> * </span>CÓDIGO TRANSFERENCIA </label>
                            <input name="COD_TRANS_ESPERMA" value="{{$transesperma->COD_TRANS_ESPERMA}}" placeholder="" id="COD_TRANS_ESPERMA" class="form-control" type="text" disabled> <br />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Estado de la transferencia</label>
                            <select name="IND_TRANS_ESPERMA" class="form-control" id="IND_TRANS_ESPERMA" value="{{$transesperma->IND_FECUNDACION}}">
                                <option selected disabled> Seleccione un estado</option>
                                <option value="EN PROCESO" {{ $transesperma->IND_FECUNDACION== "EN PROCESO"  ? 'selected' : '' }}>EN PROCESO</option>
                                <option value="FECUNDÓ" {{ $transesperma->IND_FECUNDACION== "FECUNDÓ"  ? 'selected' : '' }}>FECUNDÓ</option>
                                <option value="NO FECUNDÓ" {{ $transesperma->IND_FECUNDACION== "NO FECUNDÓ"  ? 'selected' : '' }}>NO FECUNDÓ</option>
                            </select>

                            @if ($errors->has('IND_TRANS_ESPERMA'))
                            <div id="IND_TRANS_ESPERMA-error" class="error text-danger pl-3" for="IND_TRANS_ESPERMA" style="display: bock;">
                                <strong>
                                    {{$errors -> first('IND_TRANS_ESPERMA')}}
                                </strong>
                            </div>
                            @endif

                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-12 mb-2">
                        <a href="{{route('transesperma.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
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
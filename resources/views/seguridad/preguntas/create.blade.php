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
Pantalla:          Crear Pregunta
Fecha:             25/02/2022
Programador:       Heber Espinoza
descripción:       Pantalla que permite  crear un Pregunta. 



-->
@extends('adminlte::page')

@section('title', 'Crear Pregunta')
@CAN('INSERTAR_PREGUNTAS')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 450px;">Nuevo Registro de Preguntas de Seguridad</h3>


    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">

@stop
<style type="text/css">
    .transformacion2 {
        text-transform: capitalize;
    }
</style>
@section('content')
<div class="container-fluid col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Datos </h3>

        </div>

        <form action="{{route('preguntas.store')}}" method="post" role="form">
            @csrf()


            <div class="card-body">
                <h6><span style="color: rgb(20, 20, 20);"> * Campos obligatorios </span></h6>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name"><span style="color: red;"> *</span>Nombre:</label>
                            <input id="pregunta" name="pregunta" class="form-control border-dark" placeholder="Ingrese la pregunta..." type="text" pregunta="pregunta" :value="old('pregunta')" minlength="10" maxlength="255" onkeyup="javascript:this.value=this.value.toUpperCase();"  autofocus>

                            @if ($errors->has('pregunta'))
                            <div id="pregunta-error" class="error text-danger pl-3" for="pregunta" style="display: bock;">
                                <strong>
                                    {{$errors -> first('pregunta')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{route('preguntas.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                        </a>
                    </div>

                    <div class="col-lg-6">
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
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
Pantalla:          Backup
Fecha:             25/02/2022
Programador:       Heber Espinoza
descripción:       Pantalla que permite  crear Backup de la base de datos. 



-->
@extends('adminlte::page')

@section('title', 'Backup')
@CAN('VER_BACKUP')
@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1></h1>
    </div>
    <div class="col-sm-6">

    </div>
  </div>
</div><!-- /.container-fluid -->
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success text-center mt-2 " role="alert">
  <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
  <strong>{{session('info')}}</strong>
</div>
@endif
<div class="container-fluid">
  <div class="row">
    <!-- /.col (left) -->
    <div class="col-md-4">
      <div class="card card-primary">


        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <h4 class="text-blue h4" style="text-align: center;">COPIA DE SEGURIDAD</h4>
              <p style="font-size: 20px;">Respalde su base de datos ante cualquier situación.</p>
              <p style="font-size: 18px;">Los respaldos se ubican en: <strong>C:\xampp\htdocs\Proyecto_RanchoPeralta\respaldos</strong> </p>
              <img src="https://es.seaicons.com/wp-content/uploads/2015/09/download-database-icon.png" />
            </div> <br>

          </div><br>

          <form method="" id="frmnuevo" name="frmnuevo" action="/backup/create" class="needs-validation" novalidate>


            <button type="submit" id="btnAgregarnuevo" class="btn btn-info " style="width:100%" data-dismiss="modal">Generar Backup <i class="fa fa-database" aria-hidden="true"></i></button>

          </form>
        </div>
        <!-- /.form group -->

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
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

<strong>Copyright &copy; 2022 <a href="#">UNAH</a>.</strong> Todos los derechos reservados.
<div class="float-right d-none d-sm-inline-block">
  <b>Version</b> 1.0.0
</div>

@stop
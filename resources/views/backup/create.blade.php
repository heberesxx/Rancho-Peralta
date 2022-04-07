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
       

        <div class="card-body" > 

          <form method="" id="frmnuevo" name="frmnuevo" action="/backup/create" class="needs-validation" novalidate>
           
          
              <button type="submit" id="btnAgregarnuevo" class="btn btn-info " style="width:100%" data-dismiss="modal">Generar Backup <i class="fa fa-database"  aria-hidden="true"></i></button> 
            </div>
          </form>
          <!-- /.form group -->

          <!-- /.card-body -->
        </div> 
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    
    

@stop
@else
@section('content')
<div class="content-wrapper">
    <div class="error-page">
        <h2 class="headline text-warning"> 403</h2>
        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! página no encontrada.</h3>
            <p>
               No podemos mostrarle esta página porque no tiene permisos, si desea acceder consulte  al administrador de seguridad.
            </p>

        </div>

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
@extends('adminlte::page')

@section('title', 'Backup')

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
    <div class="alert alert-success alert-dismissible mt-2 text-dark" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <strong>{{session('info')}}</strong>
    </div>
    @endif
<div class="container-fluid">
  <div class="row">
    <!-- /.col (left) -->
    <div class="col-md-4">
      <div class="card card-primary">
        <div class="card-header">
        <strong>
              <h4 style="text-align: center;"><i>Crear Backup</i></h4>
            </strong>
        </div>

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
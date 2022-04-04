@extends('adminlte::page')

@section('title', 'Restore')

@section('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Restarurar la Base de Datos</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
</section>
   
@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- /.col (left) -->
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
        <strong>
              <h4 style="text-align: center;"><i>Restaurar Datos</i></h4>
            </strong>
        </div>

        <div class="card-body">

          <form method="" id="frmnuevo" name="frmnuevo" action="/restore/{id}" class="needs-validation" novalidate>
         
            <div class="form-group">
                        <label>Seleccionar Archivo:</label>
                        <select  class="form-control select2bs4" style="width: 100%;" name="restore" id="restore" size="5">
                          <?php
                           $ruta="C:\\xampp\\htdocs\\respaldos\\";
                            if(is_dir($ruta)){
                                if($aux=opendir($ruta)){
                                    while(($archivo = readdir($aux)) !== false){
                                        if($archivo!="."&&$archivo!=".."){
                                            $nombrearchivo=str_replace(".sql", "", $archivo);
                                            $nombrearchivo=str_replace("-", ":", $nombrearchivo);
                                            $ruta_completa=$ruta.$archivo;
                                            if(is_dir($ruta_completa)){
                                            }else{
                                                echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
                                            }
                                        }
                                    }
                                    closedir($aux);
                                }
                            }else{
                                echo $ruta." No es ruta válida";
                            }
                          ?>
                        </select>
                      </div>
            </div>
            <div class="modal-footer">
              <a href="" class="btn btn-danger">Cancelar</a>
              <button type="submit" id="btnAgregarnuevo" class="btn btn-success float-right" data-dismiss="modal">Aceptar</button>
            </div>
          </form>
          <!-- /.form group -->

          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('realizado') == 'ok')
<script>
  Swal.fire(
    'Realizado!',
    'La copia de seguridad se restauró con éxito.',
    'success'
  )
</script>
@endif

    <script type="text/javascript">
      const $select = document.querySelector("#restore");
      const tamano=$select.options.length;
      const limite=tamano-11;
      const limpiar = () => {
        for (let i = limite; i >= 0; i--) {
          $select.remove(i);
        }
      };
      limpiar();

    </script>
@extends('adminlte::page')

@section('title', 'Restore')
@CAN('VER_RESTORE')
@section('content_header')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Restaurar la Base de Datos</h1>
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
      <div class="card card-info">


        <div class="card-body">

          <form method="" id="frmnuevo" name="frmnuevo" action="/restore/{id}" class="needs-validation" novalidate>

            <div class="form-group">
              <label>Seleccionar Archivo:</label>
              <select class="form-control select2bs4" style="width: 100%;" name="restore" id="restore" size="5">
                <?php
                $ruta = "C:\\xampp\\htdocs\\respaldos\\";
                if (is_dir($ruta)) {
                  if ($aux = opendir($ruta)) {
                    while (($archivo = readdir($aux)) !== false) {
                      if ($archivo != "." && $archivo != "..") {
                        ($nombrearchivo = str_replace(".sql", "", $archivo));
                        $nombrearchivo = str_replace("-", ":", $nombrearchivo);
                        $ruta_completa = $ruta . $archivo;
                        if (is_dir($ruta_completa)) {
                        } else {
                          echo '<option value="' . $ruta_completa . '">' . $nombrearchivo . '</option>';
                        }
                      }
                    }
                    closedir($aux);
                  }
                } else {
                  echo $ruta . " No es ruta válida";
                }
                ?>
              </select>
            </div>
            <div class="row">


              <button style="width: 100%; float:right" type="submit" id="btnAgregarnuevo" class="btn btn-primary float-right" data-dismiss="modal">Restaurar</button>
            </div>

        </div>

        </form>
        <!-- /.form group -->

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
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
        No podemos mostrarle esta página porque no tiene permisos, si desea acceder consulte al administrador de seguridad.
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
  const tamano = $select.options.length;
  const limite = tamano - 11;
  const limpiar = () => {
    for (let i = limite; i >= 0; i--) {
      $select.remove(i);
    }
  };
  limpiar();
</script>
@extends('adminlte::page')

@section('title', 'Producción de Leche')
@can('VER_PRODUCCION LECHE')
@section('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="center">Producción de Leche</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
</section>

@stop

@section('content')

<!--------------------------------- Formulario con datos iniciales de compra --------------------------------------------------->

<div class="container-fluid">
    @if (session('info'))
    <div class="alert alert-success text-center" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                @can('INSERTAR_PRODUCCION LECHE')
                <div class="card-header">

                    <div class="box-header">

                        <a href="{{route('produccion_leche.create')}}" class="btn btn-info">
                            <span class="mr-2">Registrar Producción </span> <i class="fas fa-plus-square"></i>
                        </a>

                    </div>

                </div>
                @ENDCAN
                <div class="card-body">

                    <table id="TB" class="table table-bordered table-hover US">
                        <thead style="background-color: #e1e2f6;">
                            <tr>
                                <th class="text-center">Registro</th>
                                <th class="text-center">Vaca</th>
                                <th class="text-center">Fecha de Ordeño</th>
                                <th class="text-center">Día de Lactancia </th>
                                <th class="text-center">Producción (lts) </th>
                                <th class="text-center">Observaciones </th>
                                @can('EDITAR_PRODUCCION LECHE')
                                <th class="text-center">Editar</th>
                                @ENDCAN
                                @can('ELIMINAR_PRODUCCION LECHE')
                                <th class="text-center">Eliminar</th>
                                @ENDCAN
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produccion_leches as $produccion_leche)
                            <tr>
                                <td class="text-center" style="width: 10%">{{ $produccion_leche->COD_REGISTRO_LECHE }}</td>
                                <td class="text-center">{{ $produccion_leche->NOM_GANADO}}</td>
                                <td class="text-center">{{\Carbon\Carbon::parse($produccion_leche->FEC_ORDENIO)->format('d/m/Y')}}</td>
                                <td class="text-center"  style="width: 10%">{{ $produccion_leche->DIA_LACTANCIA }}</td>
                                <td class="text-center"  style="width: 10%">{{ $produccion_leche->PRD_LITROS }}</td>
                                <td class="text-center">{{ $produccion_leche->OBS_REGISTRO }}</td>
                                @can('EDITAR_PRODUCCION LECHE')
                                <td class="text-center">
                                    <a class="btn btn-warning" href="{{ url('produccion_leche/' . $produccion_leche->COD_REGISTRO_LECHE . '/edit')}}">Editar</a>
                                </td>
                                @ENDCAN
                                @can('ELIMINAR_PRODUCCION LECHE')
                                <td class="text-center">
                                    <!-- boton de eliminar -->
                                    <button type="submit" class="btn btn-danger" form="delete_{{$produccion_leche->COD_REGISTRO_LECHE}}" onclick="return confirm('¿Desea eliminar el registro permanentemente?')">

                                        Eliminar

                                    </button>

                                    <form action="{{route('produccion_leche.destroy', $produccion_leche->COD_REGISTRO_LECHE)}}" id="delete_{{$produccion_leche->COD_REGISTRO_LECHE}}" method="post" enctype="multipart/form-data" hidden>
                                        @csrf()
                                        @method('DELETE')
                                    </form>
                                    <!-- ----- -->
                                </td>
                                @ENDCAN
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@else
@section('content')
<div class="content-wrapper">
    <div class="error-page">
        <h2 class="headline text-warning"> 403</h2>
        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! página no encontrada.</h3>
            <p>
                No podemos mostrar esta página porque no tienes permisos, si deseas ingresar pide permisos al administrador.
            </p>

        </div>

    </div>
</div>
@stop
@endcan

@section('footer')
<strong>Copyright &copy; 2022<a href="#">UNAH</a>.</strong> Todos los derechos reservados
<div class="float-right d-none d-sm-inline-block">
   
</div>

@stop

@section('css')
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset ('vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
 
@stop

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>


<script>
  $(document).ready(function() {
    $('#TB').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      },
      "autoWidth": false,
  "responsive": true,
            
      dom: '<"pt-2 row" <"col-xl mt-2"l><"col-xl text-center"B><"col-xl text-right mt-2 "f>> <"row"rti<"col"><p>>',
      buttons: [

        {
          extend: 'print',
          text: 'Imprimir',
          className: 'btn btn-secondary glyphicon glyphicon-duplicate'
        },
        {
          extend: 'excel',
          className: 'btn btn-success glyphicon glyphicon-duplicate'
        }
      ]
    });
  });
</script>
</script>
@stop
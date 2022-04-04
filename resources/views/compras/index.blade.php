@extends('adminlte::page')

@section('title', 'Compra')
@section('content_header')
@can('VER_LOTES GANADO')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detalles de las compras de ganado.</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
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
            @can('INSERTAR_LOTES GANADO')
                <div class="card-header">
                    <div class="box-header">

                       
                        <a href="{{route('lotescompras.index')}}"   class="btn btn-info "> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;
                            <span class="mr-2">Página principal de compras</span> 
                        </a>
                        <a href="{{route('compras.pdf')}}" class="btn btn-danger glyphicon glyphicon-duplicate " style="margin-left :29%;">
                            <span class="mr-2">PDF</span>
                        </a>

                    </div>
                </div>
                @ENDCAN
                <div>
                    <div class="card-body">
                        <div class="box-header">

                            <table id="TB" class="table table-bordered table-hover US">
                                <thead style="background-color: #e1e2f6;">
                                    <tr>
                                        <th class="text-center">Lote</th>
                                        <th class="text-center">Fecha de Compra</th>
                                        <th class="text-center">Proveedor</th>
                                        <th class="text-center">Raza</th>
                                        <th class="text-center">Nombre Ganado</th>
                                        <th class="text-center">Precio (L)</th>
                                        <th class="text-center">Estado Ganado</th>
                                        <th class="text-center">Lugar</th>
                                       
                                       
                                        @can('ELIMINAR_LOTES GANADO')
                                        <th class="text-center">Eliminar</th>
                                        @ENDCAN

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($compras as $compras)
                                    <tr>
                                        <td class="text-center">{{$compras->COD_COMPRA_GANADO }}</td>
                                        <td class="text-center">{{\Carbon\Carbon::parse( $compras->FEC_COMPRA)->format('d/m/Y') }}</td>
                                        <td class="text-center">{{ $compras->PROVEEDOR}}</td>
                                        <td class="text-center">{{ $compras->RAZA}}</td>
                                        <td class="text-center">{{ $compras->NOM_GANADO }}</td>
                                        <td style="text-align: right;">{{ $compras->PRE_GANADO }}</td>
                                        <td class="text-center">{{ $compras->DET_ESTADO }}</td>
                                        <td class="text-center">{{ $compras->DIR_LUGAR }}</td>
                                       
                                        
                                        @can('ELIMINAR_LOTES GANADO')
                                        <td class="text-center">
                                            <form method="post" action="{{url('compras', $compras->COD_COMPRA_GANADO)}}">
                                                @csrf()
                                                @method('DELETE')
                                                <input class="btn btn-danger" type="submit" value="Eliminar" />
                                            </form>
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
      "bSort": false,
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
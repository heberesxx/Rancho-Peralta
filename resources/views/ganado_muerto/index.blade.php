@extends('adminlte::page')

@section('title', 'Registrar Ganado')

@section('content_header')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ganado Muerto</h1>
            </div>
   
        </div>
    </div>
</section>

@stop

@section('content')

<div class="container-fluid">
    @if (session('info'))
    <div class="alert alert-success text-center" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    @if (session('edit'))
    <div class="alert alert-warning text-center" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <strong>{{session('edit')}}</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                
                <div class="card-header">
                
                    <div class="box-header">


                        <a  class="btn btn-danger center" style="margin-left: 480px;">
                            <span class="mr-2">PDF</span> 
                        </a>
                        

                    </div>
                  
                </div>
                
                <div class="card-body">

                    <table id="TB" class="table table-bordered table-hover US display nowrap" cellspacing="0" width="100%" ">
                        <thead style="background-color: #e1e2f6;">
                            <tr>
                                <th class="text-center">Registro</th>
                                <th  class="text-center">Fecha Muerte</th>
                                <th  class="text-center"> Arete </th>
                                <th  class="text-center"> Nombre</th>
                                <th  class="text-center"> Color </th>
                                <th  class="text-center">Lugar </th>
                                <th  class="text-center">Peso (kg)</th>
                                <th  class="text-center">Raza</th>
                                <th  class="text-center">Sexo</th>
                                <th  class="text-center">Etapa Productiva</th>
                                <th  class="text-center">Causa</th>
                             
                                
                              
                                <th  class="text-center" style="width: 10%">Editar</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ganados_muerto as $ganado)
                            <tr>
                                <td class="text-center">{{ $ganado->COD_MUERTE }}</td>
                                <td class="text-center">{{\Carbon\Carbon::parse( $ganado->FEC_REGISTRO_MUERTE)->format('d/m/Y') }}</td>
                                <td class="text-center">{{ $ganado->NUM_ARETE }}</td>
                                <td class="text-center">{{ $ganado->NOM_GANADO }}</td>
                                <td class="text-center">{{ $ganado->CLR_GANADO }}</td>
                                <td class="text-center">{{ $ganado->DIR_LUGAR }}</td>
                                <td class="text-center">{{ $ganado->PES_ACTUAL }}</td>
                                <td class="text-center">{{ $ganado->RAZ_GANADO }}</td>
                                <td class="text-center">{{ $ganado->SEX_GANADO }}</td>
                                <td class="text-center">{{ $ganado->ETA_PRODUCTIVA }}</td>
                                <td class="text-center">{{ $ganado->CAUSA }}</td>
                               
                                
                                <td class="text-center" style="width: 10%;"><a class="btn btn-warning" href=" {{ url('ganado_muerto/' .$ganado->COD_MUERTE . '/edit') }}">Editar</a></td>
                                
                                </td>

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
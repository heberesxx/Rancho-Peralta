@extends('adminlte::page')

@section('title', 'Tablas Transaccionales')
@CAN('VER_GANADO')
@section('content_header')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tablas transaccionales Ganado</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('ganado.index') }}">Retornar a la página principal de Ganado</a></li>

                </ol>
            </div>
        </div>
    </div>
</section>

@stop

@section('content')
<div class="container-fluid">
    @if (session('info'))
    <div class="alert alert-success alert-dismissible mt-2 text-center" role="alert">
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

    <div class="modal-body row col-md-12">
        <div class="col-6">
            <div class="card">

                <div class="card-header">

                    <div class="box-header">

                        <a href="{{route('estados.create')}}" class="btn btn-info">
                            <span class="mr-2">Agregar estado</span> <i class="fas fa-plus-square"></i>
                        </a>

                    </div>

                </div>

                <div class="card-body">

                    <table id="TB" class="table table-bordered table-hover US">
                        <thead style="background-color: #e1e2f6;">
                            <tr>
                                <th class="text-center" style="width: 15%">Código</th>
                                <th class="text-center"> Estado </th>
                                <th class="text-center"> Descripción </th>

                                <th class="" style="width: 10%">Editar</th>


                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($datos["estados"] as $estado)
                            <tr>
                                <td class="text-center">{{ $estado->COD_ESTADO }}</td>
                                <td>{{ $estado->DET_ESTADO }}</td>
                                <td>{{ $estado->DESCRIPCION_ESTADO}}</td>

                                <td style="width: 10%;"><a class="btn btn-warning" href=" {{ url('estados/' . $estado->COD_ESTADO . '/edit') }}"> Editar</a></td>

                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">

                    <div class="box-header">

                        <a href="{{route('lugares.create')}}" class="btn btn-info">
                            <span class="mr-2">Agregar Lugar</span> <i class="fas fa-plus-square"></i>
                        </a>

                    </div>

                </div>

                <div class="card-body">

                    <table id="Lugares" class="table table-bordered table-hover US">
                        <thead style="background-color: #e1e2f6;">
                            <tr>
                                <th class="text-center">Código</th>
                                <th class=""> Lugar </th>
                                <th class=""> Dirección exacta </th>
                                <th class="" style="width: 10%">Editar</th>
                              


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos["lugares"] as $lugar)
                            <tr>
                                <td class="text-center">{{ $lugar->COD_LUGAR }}</td>
                                <td>{{ $lugar->DIR_LUGAR }}</td>
                                <td>{{ $lugar->UBI_EXACTA}}</td>
                             


                                <td style="width: 10%;"><a class="btn btn-warning" href=" {{ url('lugares/' . $lugar->COD_LUGAR . '/edit') }}">Editar</a></td>

                               
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

        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#Lugares').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },

            "autoWidth": false,
            "responsive": true,

        });
    });
</script>
</script>
@stop
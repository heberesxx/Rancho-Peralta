@extends('adminlte::page')

@section('title', 'Status Ganado')
@CAN('VER_ESTADOS GANADO')
@section('content_header')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Estados del Ganado</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
</section>
@stop

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
   
    @if (session('edit'))
    <div class="alert alert-warning text-center" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <strong>{{session('edit')}}</strong>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                @CAN('INSERTAR_ESTADOS GANADO')
                <div class="card-header">

                    <div class="box-header">

                        <a href="{{route('estados.create')}}" class="btn btn-info ">
                            <span class="mr-2">Agregar Estado</span> <i class="fas fa-plus-square"></i>
                        </a>
                        <a href="{{route('estados.pdf')}}" class="btn btn-danger center" style=" margin-left: 36%;">
                            <span class="mr-2">PDF</span>
                        </a>

                    </div>

                </div>
                @ENDCAN

                <div class="card-body">

                    <table id="TB" class="table table-bordered table-hover US">
                        <thead style="background-color: #e1e2f6;">
                            <tr>
                                <th class="text-center" style="width: 15%">Código</th>
                                <th class="text-center"> Estado </th>
                                <th class="text-center"> Descripción </th>
                                <th class="text-center"> Status </th>
                                @CAN('EDITAR_ESTADOS GANADO')
                                <th class="text-center" style="width: 10%">Editar</th>
                                @ENDCAN
                                <!-- <th class="text-center" style="width: 10%">Eliminar</th> -->


                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($estados as $estado)
                            <tr>
                                <td class="text-center" class="text-center">{{ $estado->COD_ESTADO }}</td>
                                <td class="text-center" >{{ $estado->DET_ESTADO }}</td>
                                <td class="text-center" >{{ $estado->DESCRIPCION_ESTADO}}</td>
                                <td class="text-center" >{{ $estado->STATUS}}</td>
                                @CAN('EDITAR_ESTADOS GANADO')
                                <td class="text-center"  style="width: 10%;"><a class="btn btn-warning" href="{{ route('estados.edit', $estado->COD_ESTADO) }}"> Editar</a></td>
                                @ENDCAN
                                <!-- <form action="{{route('estados.destroy', $estado->COD_ESTADO)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td class="text-center" ><button type="submit" class=" btn btn-danger btn-sm ">Eliminar</button> </td>
                                </form> -->
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
@include('sweetalert::alert')
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
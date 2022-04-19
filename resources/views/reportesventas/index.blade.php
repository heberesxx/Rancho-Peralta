@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Nuevo Reporte de Ventas</h3>


    </div>
</div>

@stop

@section('content')
<div class="container-fluid ">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Fechas para Generar Reportes</h3>
                    </div>
                    <form accion="{{url('reportesventas')}}" method="POST" role="form">
                        @csrf()
                        <div class="card-body md-6">
                            <h6><span style="color: rgb(20, 20, 20);"> * Campos obligatorios </span></h6>
                            <div class="row">


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><span style="color: red;"> * </span>Desde:</label>
                                        <input class="form-control" name="inicio" placeholder="" type='date'>
                                        @if ($errors->has('inicio'))
                                        <div id="inicio-error" class="error text-danger pl-3" for="inicio" style="display: bock;">
                                            <strong>
                                                {{ $errors->first('inicio') }}
                                            </strong>
                                        </div>
                                        @endif
                                    </div>


                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Hasta:</label>
                                        <input class="form-control" name="final" placeholder="" type='date'>
                                        @if ($errors->has('final'))
                                        <div id="final-error" class="error text-danger pl-3" for="final" style="display: bock;">
                                            <strong>
                                                {{ $errors->first('final') }}
                                            </strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-block btn-primary btn-block" data-toggle="modal" data-target="">Generar</button>

                                </div>
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
                                </div>
                                <div class="col-lg-2">

                                    <form accion="{{url('reportesventas')}}" method="post">
                                        @csrf()
                                        <button type="submit" class="btn btn-block btn-danger btn-block" data-toggle="modal" data-target="">PDF
                                        </button>
                                    </form>
                                </div>

                            </div> </br>

                        </div>

                </div>
                </form>

            </div>
        </div>

        <div class="card-body">




        </div></br>

        <table id="TB" class="table table-bordered table-hover US">

            <thead style="background-color: #e1e2f6;">

                <tr>

                    <th class="text-center">Lote</th>
                    <th class="text-center">Fecha Venta</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Nom. Ganado</th>

                </tr>

            </thead>
            <tbody>

                @foreach($venta[0] as $dato)
                <tr>

                    <td class="text-center">{{ $dato->LOTE}}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($dato->FEC_VENTA)->format('d/m/Y')}}</td>
                    <td class="text-center">{{ $dato->CLIENTE}}</td>
                    <td class="text-center">{{ $dato->PRECIO}}</td>
                    <td class="text-center">{{ $dato->NOMBRE}}</td>

                </tr>


                @endforeach

            </tbody>

        </table>
    </div>

</div>
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
            buttons: [{
                    extend: 'print',
                    text: 'Imprimir',
                    className: 'btn btn-secondary glyphicon glyphicon-duplicate',
                    exportOptions: {
                        columns: "th:not(:last-child)",
                    },
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
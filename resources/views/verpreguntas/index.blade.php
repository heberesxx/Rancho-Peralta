@extends('adminlte::page')

@section('title', 'Preguntas y Respuestas')

@section('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Preguntas y Respuestas </h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
</section>

@stop

@section('content')


<!---------------------------------- Tabla orden de trabajo ----------------------------------------------------->

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


                <div>
                    <div class="card-body">
                        <table id="TB" class="table table-bordered table-hover US">
                            <thead style="background-color: #e1e2f6;">
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Pregunta</th>
                                    <th class="text-center">Respuesta</th>
                                    <th class="text-center" style="width:auto;">Editar</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach($respuestas as $respuesta)
                                <tr>
                                    <td class="text-center">{{$respuesta->id}}</td>
                                    <td class="text-center">{{$respuesta->pregunta}}</td>
                                    <td class="text-center">{{$respuesta->respuesta}}</td>
                                    <td class="text-center" style="width:auto;"><a class="btn btn-warning" data-toggle="modal" data-target="#EditarRespuesta{{$respuesta->id_respuesta}}">Editar</a></td>
                                    <div class="modal fade" rol="dialog" id="EditarRespuesta{{$respuesta->id_respuesta}}">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h3 class="">Editar Respuesta</h3>
                                                </div>
                                                <div class="modal-body row col-12">
                                                    <form action="{{route('verpreguntas.update',$respuesta->id_respuesta)}}" method="post">
                                                        @csrf()
                                                        @method('PUT')
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label><span style="color: red;"></span>Respuesta:</label>
                                                                        <input id="respuesta" class="form-control border-dark capitalize" type="text" name="respuesta" value="{{ $respuesta->respuesta }}" pattern="[A-Z]+" title="Las respuestas solo pueden ser en Mayúsculas sin espacios" autofocus>
                                                                        @if ($errors->has('respuesta'))
                                                                        <div id="respuesta-error" class="error text-danger pl-3" for="respuesta" style="display: bock;">
                                                                            <strong>
                                                                                {{$errors -> first('respuesta')}}
                                                                            </strong>
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row">

                                                    
                                                                <div class="col-6">
                                                                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
                                                                </div>
                                                                <div class="col-6">
                                                                    <button type="submit" class="btn btn-block btn-primary btn-block" data-toggle="modal" data-target="">Actualizar</button>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach

                            </tbody>
                        </table>

                    </div>


                    <br />
                </div>
            </div>
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
            "autoWidth": false,
            "responsive": true,


        });
    });
</script>
</script>
@stop
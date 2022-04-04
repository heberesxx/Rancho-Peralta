@extends('adminlte::page')

@section('title', 'Perfil de Usuario')
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Perfil de Usuario</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>
<link rel="stylessheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
@stop

@section('content')

<div class="container-fluid ">
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
    <div class="col">
        <div class="row">

            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Usuario</h3>
                    </div>
                    <div class="card-body md-6">
                        @foreach($perfils as $perfil)
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><span style="color: red;"></span>Nombre</label>
                                    <input class="form-control border-dark" placeholder="FEC_COMPRA" name="FEC_COMPRA" id="FEC_COMPRA" type="text" value="{{ $perfil->name}}" max="{{ date('Y-m-d') }}" disabled>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><span style="color: red;"></span>Username</label>
                                    <input class="form-control border-dark" placeholder="FEC_COMPRA" name="FEC_COMPRA" id="FEC_COMPRA" type="text" value="{{ $perfil->username}}" max="{{ date('Y-m-d') }}" disabled>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><span style="color: red;"></span>Correo</label>
                                    <input class="form-control border-dark" placeholder="FEC_COMPRA" name="FEC_COMPRA" id="FEC_COMPRA" type="text" value="{{ $perfil->email}}" max="{{ date('Y-m-d') }}" disabled>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><span style="color: red;"></span>Rol</label>
                                    <input class="form-control border-dark" placeholder="FEC_COMPRA" name="FEC_COMPRA" id="FEC_COMPRA" type="text" value="{{ $perfil->rol}}" max="{{ date('Y-m-d') }}" disabled>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><span style="color: red;"></span>Fecha de Vencimiento</label>
                                    <input class="form-control border-dark" placeholder="FEC_COMPRA" name="FEC_COMPRA" id="FEC_COMPRA" type="date" value="{{ $perfil->fecha_vencimiento}}" max="{{ date('Y-m-d') }}" disabled>

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <a style="width: 475%;" class="btn btn-warning" data-toggle="modal" data-target="#EditarUsuario{{$perfil->id}}">Editar</a>
                                    <div class="modal fade" rol="dialog" id="EditarUsuario{{$perfil->id}}">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h3 class="">Editar Usuario</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('perfil.update',$perfil->id)}}" method="post">
                                                        @csrf()
                                                        @method('PUT')
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label><span style="color: red;"></span>Nombre:</label>
                                                                        <input id="name" class="form-control border-dark capitalize" type="text" name="name" value="{{ $perfil->name }}" autofocus>

                                                                        @if ($errors->has('name'))
                                                                        <div id="name-error" class="error text-danger pl-3" for="name" style="display: bock;">
                                                                            <strong>
                                                                                {{$errors -> first('name')}}
                                                                            </strong>
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label><span style="color: red;"></span>Correo:</label>
                                                                        <input id="email" class="form-control border-dark capitalize" type="email" name="email" value="{{ $perfil->email}}" autofocus>

                                                                        @if ($errors->has('email'))
                                                                        <div id="email-error" class="error text-danger pl-3" for="email" style="display: bock;">
                                                                            <strong>
                                                                                {{$errors -> first('email')}}
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
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
                <div class="row">





                    <div class="col-md-12">
                        <div class="card card-info">

                            <div class="card-header">
                                <h3 class="card-title">Mis Preguntas de Seguridad</h3>
                            </div>
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
                    </div>


                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Cambiar Contraseña</h3>
                    </div>

                    <div class="card-body md-6">

                        <form action="{{url('update_password')}}" method="post">
                            @csrf


                            <div class="row">


                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <label for="passwor">Contraseña Actual</label>
                                        <div class="input-group-prepend">
                                            <input required id="current_password" class="form-control" placeholder="Ingrese su contraseña actual" type="password" name="current_password" maxlength="30" value="{{old('current_password')}}" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="position: static; right:25px; transform:(0,-50%); top:38%; cursor:pointer;">
                                                <i class="fa fa-eye" style="font-size: 20px;" aria-hidden="true" id="ojo1" onclick="Function()"></i>
                                            </span>

                                        </div>
                                    </div>


                                </div>
                                @if (session('current_password'))

                                <div id="password-error" class="error text-danger pl-3" for="current_password" style="display: bock;">
                                    <strong class="errores">
                                        {{session('current_password')}}
                                    </strong>
                                </div>
                                @endif

                                <div class="col-lg-12">


                                    <label for="password">Nueva Contraseña</label>
                                    <div class="form-group">
                                        <div class="input-group-prepend">
                                            <input required id="password" class="form-control" placeholder="Ingrese su nueva contraseña" type="password" name="password" maxlength="30" value="{{old('password')}}" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="position: static; right:25px; transform:(0,-50%); top:38%; cursor:pointer;">
                                                <i class="fa fa-eye" style="font-size: 20px;" aria-hidden="true" id="eye" onclick="toggle()"></i>
                                            </span>
                                        </div>

                                    </div>
                                    @if ($errors->has('password'))

                                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: bock;">
                                        <strong class="errores">
                                            {{$errors -> first('password')}}
                                        </strong>
                                    </div>
                                    @endif
                                    @if (session('igual_anterior'))

                                    <div id="password-error" class="error text-danger pl-3" for="igual_anterior" style="display: bock;">
                                        <strong class="errores">
                                            {{session('igual_anterior')}}
                                        </strong>
                                    </div>
                                    @endif

                                </div>


                                <div class="col-lg-12">
                                    <label for="usuario">Confirmar Contraseña:</label>
                                    <div class="form-group">
                                        <div class="input-group-prepend">
                                            <x-jet-input required id="password_confirmation" class="form-control" placeholder="Confirme su contraseña" type="password" name="password_confirmation" maxlength="30" value="{{old('password')}}" onpaste="return false" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="position: static; right:25px; transform:(0,-50%); top:38%; cursor:pointer;">
                                                <i class="fa fa-eye" style="font-size: 20px;" aria-hidden="true" id="ojo" onclick="myFunction()"></i>
                                            </span>

                                        </div>

                                    </div>

                                </div>


                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center ">
                                    <button type="submit" class="btn btn-success" style="width: 500px;">Guardar</button>
                                </div>
                            </div></br>





                        </form>








                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/validaciones.js') }}" defer></script>
<script>
    var state = false;

    function toggle() {
        if (state) {
            document.getElementById("password").setAttribute("type", "password");
            document.getElementById("eye").style.color = '#7a797e';
            state = false;
        } else {
            document.getElementById("password").setAttribute("type", "text");
            document.getElementById("eye").style.color = '#5887ef';
            state = true;
        }
    }
</script>
<script>
    function myFunction() {
        if (state) {
            document.getElementById("password_confirmation").setAttribute("type", "password");
            document.getElementById("ojo").style.color = '#7a797e';
            state = false;
        } else {
            document.getElementById("password_confirmation").setAttribute("type", "text");
            document.getElementById("ojo").style.color = '#5887ef';
            state = true;
        }
    }
</script>
<script>
    function Function() {
        if (state) {
            document.getElementById("current_password").setAttribute("type", "password");
            document.getElementById("ojo1").style.color = '#7a797e';
            state = false;
        } else {
            document.getElementById("current_password").setAttribute("type", "text");
            document.getElementById("ojo1").style.color = '#5887ef';
            state = true;
        }
    }
</script>

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
 @extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 700px;">Editar Usuario</h3>


    </div>
</div>
@stop

@section('content')
<div class="container-fluid col-md-8">

    <div class="card card-info">
        <div class="card-header">

        </div>

        <form action="{{route('usuarios.update',$usuario->id)}}" method="post">
            @csrf()
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><span style="color: red;"> *</span>Nombre</label>
                            <input id="name" class="form-control border-dark" placeholder="Ingrese su name..." type="text" name="name" value="{{ $usuario->name }}"  autofocus>

                            @if ($errors->has('name'))
                            <div id="name-error" class="error text-danger pl-3" for="name" style="display: bock;">
                                <strong>
                                    {{$errors -> first('name')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label><span style="color: red;"> *</span>Usuario</label>
                            <input id="username" class="form-control border-dark" placeholder="Ingrese su primer apellido..." type="text" name="username" value="{{ $usuario->username }}" pattern="[A-Z0-9]{3,30}"   title="Entre 3 y 30 carácteres en mayúsculas, sin espacios ni caracteres especiales" autofocus>

                            @if ($errors->has('username'))
                            <div id="username-error" class="error text-danger pl-3" for="username" style="display: bock;">
                                <strong>
                                    {{$errors -> first('username')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label><span style="color: red;">*</span>Email</label>
                            <input id="email" type="email" class="form-control border-dark" placeholder="Ingrese su número de identificación..." type="text" name="email" value="{{ $usuario->email }}" autofocus>

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
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Fecha de Vencimiento</label>
                            <input name="fecha_vencimiento" placeholder="" id="fecha_vencimiento" class="form-control" type='date' min="1900-01-01" value="{{ $usuario->fecha_vencimiento }}" max="">
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label><span style="color: red;"></span>Rol</label>
                            <select name="roles" id="roles" class="custom-select">

                                @foreach($usuario->getRoleNames() as $rolNombre)
                                @foreach ($roles as $rol)
                                @if($rolNombre==$rol->name)
                                <option value={{$rol->id}}>{{$rol->name}}</option>
                                @endif
                                @endforeach
                                @endforeach
                                @foreach ($roles as $rol)
                                @foreach($usuario->getRoleNames() as $rolNombre)
                                @if($rolNombre!=$rol->name)
                                <option value={{$rol->id}}>{{$rol->name}}</option>
                                @endif
                                @endforeach
                                @endforeach
                            </select>
                        </div>

                    </div>

                </div>

                
            </div>
            <div class="row">
                    <div class="col-sm-6 col-xs-12 mb-2">
                        <a href="{{route('usuarios.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                        </a>
                    </div>


                    <div class="col-sm-6 col-xs-12 mb-2">
                        <button type="submit" class="btn btn-success w-100">Guardar <i class="fas fa-check-circle ml-2"></i>
                        </button>
                    </div>
                </div>
        </form>
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
                No podemos mostrar esta página porque no tienes permisos, si deseas ingresar pide permisos al administrador.
            </p>

        </div>

    </div>
</div>
@stop


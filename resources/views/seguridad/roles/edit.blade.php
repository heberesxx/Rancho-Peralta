@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Editar Rol</h1>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>
@stop

@section('content')
@can('EDITAR_ROLES')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Nombre y permisos </h3>

    </div>

    <form action="{{route('roles.update',$rol->id)}}" method="post" role="form">
        @csrf()
        @method("PUT")
        <div class="modal-body row col-md-12">
            <div class="col-sm-4">
                <div class="form-group has-primary">
                    <label for="name">Nombre:</label>
                    <input id="name" class="form-control border-dark" placeholder="Ingrese el nombre del rol..." type="text" name="name" value="{{$rol->name}}" autofocus>

                    @if ($errors->has('name'))
                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: bock;">
                        <strong>
                            {{$errors -> first('name')}}
                        </strong>
                    </div>
                    @endif
                </div></br>
                </br>
                <div class="col-sm-12 col-xs-6 mb-2">
                    <a href="{{route('roles.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                    </a>
                </div></br>
                </br>

                <div class="col-sm-12 col-xs-6 mb-2">
                    <button type="submit" class="btn btn-success w-100">Guardar <i class="fas fa-check-circle ml-2"></i>
                    </button>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="table table-responsive">
                    <p class="text-center">
                        <th>Listado de Permisos</th>
                    </p>
                    <table id="TB" class="table table-striped table-bordered table-condensed table-hover" cellspacing="0" cellpadding="0" width="100%">
                        <thead style="background-color: #e1e2f6;" class="text-center">
                            <tr>
                            <th>N°</th>
                                <th>Pantalla</th>
                                <th>Ver</th>
                                <th>Crear</th>
                                <th>Editar</th>
                                <th>Eliminar</th>

                            </tr>
                        </thead>
                        
                        <tbody class="text-center">
                        @php $i=1;@endphp
                            @foreach ( $objetos as $objeto )

                            @php
                            $ver="VER_".$objeto->objeto;
                            $existe_ver="null";

                            $editar="EDITAR_".$objeto->objeto;
                            $existe_editar="null";

                            $insertar="INSERTAR_".$objeto->objeto;
                            $existe_insertar="null";

                            $eliminar="ELIMINAR_".$objeto->objeto;
                            $existe_eliminar="null";

                            foreach($nombres as $nombre){
                            if($ver==$nombre){
                            $existe_ver="checked";
                            }

                            if($editar==$nombre){
                            $existe_editar="checked";
                            }

                            if($insertar==$nombre){
                            $existe_insertar="checked";
                            }

                            if($eliminar==$nombre){
                            $existe_eliminar="checked";
                            }
                            }

                            @endphp

                            @php $checked="checked"; $null="null" @endphp
                            <tr>
                            <td>{{$i}}</td>
                                <td>{{$objeto->objeto}}</td>
                                <td> <input type="checkbox" name="permissions[]" value="VER_{{$objeto->objeto}}" {{$existe_ver}}></td>
                                <td> <input type="checkbox" name="permissions[]" value="INSERTAR_{{$objeto->objeto}}" {{$existe_insertar}}></td>
                                <td> <input type="checkbox" name="permissions[]" value="EDITAR_{{$objeto->objeto}}" {{$existe_editar}}></td>
                                <td> <input type="checkbox" name="permissions[]" value="ELIMINAR_{{$objeto->objeto}}" {{$existe_eliminar}}></td>

                            </tr>
                            @php $i++;@endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </form>
</div>
@else
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
@endcan
@stop

@section('footer')

    <strong>Copyright &copy; 2022<a href="#"> Rancho Peralta</a>.</strong> Todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
       
    </div>

@stop



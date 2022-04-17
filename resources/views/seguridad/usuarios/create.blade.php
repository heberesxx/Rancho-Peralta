<!--
Universidad Nacional Autónoma de Honduras (UNAH)
Facultad de Ciencias Económicas, Administrativas y Contables Departamento de Informática Administrativa
Analisis, Programacion y Evaluacion de Sistemas
Primer Período 2022

Equipo:
Jennifer Azucena Claros Flores..........(jeniclaros028@gmail.com)
Nancy Gicela Dominguez Cruz.............(cruzgicela0503@gmail.com)			 
Jeffry Joseph Aguilar Corrales..........(jeffryaguilaraguilarcorrales@gmail.com)			
Carlos Ramón Funes Silva................(Carlosramon.funessilva@gmail.com)			
Nisi Farid Sanchéz......................(farid.sanchez26@gmail.com)				
Heber Noel Espinoza Alvarado............(ever2526v5@gmail.com)				
					




===============================================================================
Catedrático:
Lic. Lester Josué Fiallos Peralta 
Lic. Lester Josué Fiallos Peralta 
Lic. Karla Melisa Garcia Pineda


===============================================================================
Programa:          Rancho Peralta
Pantalla:            Crear Usuario
Fecha:             25/02/2022
Programador:       Heber Espinoza
descripción:       Pantalla que permite  crear un Usuario. 



-->
@extends('adminlte::page')

@section('title', 'Crear Usuario')
@can('INSERTAR_USUARIOS')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 550px;">Nuevo Registro de Usuario</h3>


    </div>
</div>



@stop
<style type="text/css">
    .transformacion1 {
        text-transform: uppercase;
    }
</style>
<style type="text/css">
    .transformacion1 {
        text-transform: uppercase;
    }
</style>
<style type="text/css">
    .transformacion2 {
        text-transform: capitalize;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
@section('content')
<div class="container-fluid col-md-8">

    <div class="card card-info">


        <div class="card-header">
            <h3 class="card-title">Datos Generales</h3>
        </div>


        <form action="{{route('usuarios.store')}}" method="post">
            @csrf()

            <div class="card-body">
                <h6><span style="color: rgb(20, 20, 20);"> *  </span>Campos  obligatorios</h6>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><span style="color: red;"> *</span>Nombre</label>
                            <input id="name" class="form-control border-dark transformacion2 " placeholder="Ingrese el Nombre..." type="text" name="name" value="{{old('name')}}"  autofocus>

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
                            <input id="username" class="form-control border-dark " placeholder="Ingrese el nombre de usuario..." type="text" name="username" value="{{old('username')}}"  onkeyup="javascript:this.value=this.value.toUpperCase();"  pattern="[A-Z0-9]{4,30}"   title="Entre 4 y 30 carácteres en mayúsculas, sin espacios ni caracteres especiales" maxlength="30" minlength="4" autofocus>

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

                            <label> <span style="color: red;">*</span> Email</label> <i class="fa fa-envelope" style="margin-left: 10px;"></i>

                            <input id="email" type="" class="form-control border-dark" placeholder="Ingrese email del usuario..." type="email" name="email" value="{{old('email')}}"  autofocus>

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
                            <label><span style="color: red;"></span> Fecha de Creación</label>
                            <input name="fecha_vencimiento" placeholder="" id="fecha_vencimiento" class="form-control" type='date' value="{{date('Y-m-d');}}" disabled>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;">*</span> Fecha de Vencimiento</label>
                            <input name="fecha_vencimiento" placeholder="" id="fecha_vencimiento" class="form-control" type='date' min="{{date('Y-m-d');}}" max="">
                            @if ($errors->has('fecha_vencimiento'))
                            <div id="fecha_vencimiento-error" class="error text-danger pl-3" for="fecha_vencimiento" style="display: bock;">
                                <strong>
                                    {{$errors -> first('fecha_vencimiento')}}
                                </strong>
                            </div>
                            @endif
                            
                        </div>
                        
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label><span style="color: red;">*</span>Rol</label> <i class="fa fa-chalkboard-user" style="margin-left: 10px;"></i>
                            <select name="roles" id="roles" class="custom-select">
                                <option value="" selected disabled>Seleccione el Rol</option>

                                @foreach ($roles as $rol)
                                <option value={{$rol->id}}>{{$rol->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('roles'))
                            <div id="roles-error" class="error text-danger pl-3" for="roles" style="display: bock;">
                                <strong>
                                    {{$errors -> first('roles')}}
                                </strong>
                            </div>
                            @endif
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
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");
        if (x.type === 'password') {
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        } else {
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
</script>
@stop
@else
@section('content')
<div class="error-page">
    <h2 class="headline text-warning"> 403</h2>
    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! página no encontrada.</h3>
        <p>
            No podemos mostrarle esta página porque no tiene permisos, si desea acceder consulte al administrador de seguridad.
        </p>

    </div>

</div>
@stop
@endcan

@section('footer')
<strong>Copyright &copy; 2022<a href="#">UNAH</a>.</strong> Todos los derechos reservados
<div class="float-right d-none d-sm-inline-block">

</div>

@stop
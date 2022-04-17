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
Pantalla:          Editar Cliente
Fecha:             01/02/2022
Programador:       Heber Espinoza
descripción:       Pantalla que permite editar a un cliente



-->
@extends('adminlte::page')

@section('title', 'Editar Cliente')
@can('EDITAR_CLIENTES')
@section('content_header')
<div class="container-fluid">
    <div class="row">

        <h3 class="text-center" style="margin-left: 700px;">Editar Cliente</h3>


    </div>
</div>
@stop
<style type="text/css">
    .transformacion1 {
        text-transform: capitalize;
    }

    .transformacion2 {
        text-transform: uppercase;
    }

    .transformacion3 {
        text-transform: lowercase;
    }
</style>
@section('content')

<div class="container-fluid col-md-11">

    <div class="card card-info">
        <div class="card-header">
           
        </div>
        @foreach( $personas as $persona)
        <form action="{{url('clientes', $persona->COD_CLIENTE)}}" method="post">
            @csrf()
            @method('PUT')
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Código Cliente</label>
                            <input type="text" name="COD_CLIENTE" class="form-control" id="COD_CLIENTE" disabled value="{{$persona->COD_CLIENTE}}">
                        </div>
                    </div>

                    <div class="col-lg-2">

                        <div class="form-group">
                            <label><span style="color: red;"></span> Estado Comercial</label>

                            <select name="IND_COMERCIAL" id="IND_COMERCIAL" class="custom-select  border-dark" value="{{$persona->IND_COMERCIAL}}">
                                <option selected disabled> Seleccione un estado</option>
                                <option value="ACTIVO" {{ $persona->IND_COMERCIAL== "ACTIVO"  ? 'selected' : '' }}>ACTIVO</option>
                                <option value="INACTIVO" {{ $persona->IND_COMERCIAL== "INACTIVO"  ? 'selected' : '' }}>INACTIVO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"> </span>Nombres</label>
                            <input id="primer_nombre" class="form-control border-dark transformacion1" placeholder="nombres del cliente" type="text" name="primer_nombre" value="{{$persona->PRI_NOMBRE}}" minlength="2" maxlength="50" pattern="[A-Za-zÀ-ÿ ]{2,50}" title="Este campo solo puede contener letras y espacios" autofocus>

                            @if ($errors->has('primer_nombre'))
                            <div id="primer_nombre-error" class="error text-danger pl-3" for="primer_nombre" style="display: bock;">
                                <strong>
                                    {{ $errors->first('primer_nombre') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"> </span> Apellidos</label>
                            <input id="primer_apellido" class="form-control border-dark transformacion1" placeholder="apellidos del cliente" type="text" name="primer_apellido" value="{{$persona->PRI_APELLIDO}}" minlength="2" maxlength="50" pattern="[A-Za-zÀ-ÿ ]{2,50}" title="Este campo solo puede contener letras y espacios" autofocus>

                            @if ($errors->has('primer_apellido'))
                            <div id="primer_apellido-error" class="error text-danger pl-3" for="primer_apellido" style="display: bock;">
                                <strong>
                                    {{ $errors->first('primer_apellido') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label> <span style="color: red;"> </span> DNI Cliente</label> 
                            <input id="ID_CLIENTE" class="form-control border-dark " placeholder="ID del Cliente, sin Guiones" «nbsp» type="" name="ID_CLIENTE" value="{{$persona->ID_CLIENTE}}"   maxlength="15" minlength="13" title="Máximo 15 dígitos, mínimos 13. Solo números, sin espacios ni guíones"   onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autofocus>
                            @if ($errors->has('ID_CLIENTE'))
                            <div id="ID_CLIENTE-error" class="error text-danger pl-3" for="ID_CLIENTE" style="display: bock;">
                                <strong>
                                    {{ $errors->first('ID_CLIENTE') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Sexo</label>
                            <select name="sexo_cliente" id="sexo_cliente" class="custom-select  border-dark" value="{{$persona->SEX_CLIENTE}}">
                                <option selected disabled> Seleccione un estado</option>
                                <option value="M" {{ $persona->SEX_CLIENTE== "M"  ? 'selected' : '' }}>M</option>
                                <option value="F" {{ $persona->SEX_CLIENTE== "F"  ? 'selected' : '' }}>F</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Fecha de Nacimiento</label>
                            <input name="fecha_nacimiento" placeholder="" id="fecha_nacimiento" class="form-control datepicker" type='date'  value="{{$fecha}}" max="{{ date('Y-m-d') }}">

                            @if ($errors->has('fecha_nacimiento'))
                            <div id="fecha_nacimiento-error" class="error text-danger pl-3" for="fecha_nacimiento" style="display: bock;">
                                <strong>
                                    {{ $errors->first('fecha_nacimiento') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label><span style="color: red;"></span>Núm Área</label>
                            <input id="numero_area" class="form-control border-dark" placeholder="Número Área del Cliente" maxlength="4"  type="text" name="numero_area" value="{{$persona->NUM_AREA}}" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autofocus>

                            @if ($errors->has('numero_area'))
                            <div id="numero_area-error" class="error text-danger pl-3" for="numero_area" style="display: bock;">
                                <strong>
                                    {{ $errors->first('numero_area') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"></span> Celular</label>
                            <input id="NUM_CELULAR" class="form-control border-dark" placeholder="Número de Celular del Cliente" type="text" name="NUM_CELULAR" minlength="7" maxlength="10"  value="{{($persona->NUM_CELULAR)}}" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" autofocus>

                            @if ($errors->has('NUM_CELULAR'))
                            <div id="NUM_CELULAR-error" class="error text-danger pl-3" for="NUM_CELULAR" style="display: bock;">
                                <strong>
                                    {{ $errors->first('NUM_CELULAR') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><span style="color: red;"></span>Teléfono</label> 
                            <input id="numero_telefono" class="form-control border-dark" placeholder="Número de Teléfono del Cliente"  type="text" name="numero_telefono" minlength="7" maxlength="10"   value="{{($persona->NUM_TELEFONO)}}" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"autofocus>
                            @if ($errors->has('numero_telefono'))
                            <div id="numero_telefono-error" class="error text-danger pl-3" for="numero_telefono" style="display: bock;">
                                <strong>
                                    {{$errors -> first('numero_telefono')}}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4">

                        <div class="form-group">
                            <label><span style="color: red;"></span> Detalle de la Dirección</label>
                            <textarea name="direccion" id="direccion" rows="3" class="form-control border-dark" id="direccion" class="form-control border-dark" placeholder="Ingrese dirección del cliente" type="text" name="direccion">{{$persona->DET_DIRECCION}}</textarea>
                            @if ($errors->has('direccion'))
                            <div id="direccion-error" class="error text-danger pl-3" for="direccion" style="display: bock;">
                                <strong>
                                    {{ $errors->first('direccion') }}
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-sm-6 col-xs-12 mb-2">
                        <a href="{{route('clientes.index')}}" class="btn btn-danger w-100">Cancelar <i class="fa fa-times-circle ml-2"></i>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xs-12 mb-2">
                        <button type="submit" class="btn btn-success w-100">Guardar <i class="fas fa-check-circle ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>


        </form>
        @endforeach
    </div>

</div>

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
<div>

    <div class="modal fade" id="modalCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self data-backdrop="static">
        <div class="modal-dialog " role="document" height="50%">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title-center text-center" id="exampleModalLabel">BUSCAR CLIENTE
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                </div>
                <div class="px-2">
                    <x-jet-label for="acabado_movimiento" value="{{ __('Buscar:') }}" />
                    <x-jet-input wire:model="buscador" id="buscador" class="form-control text-left" type="text" placeholder="Ingrese el nombre del cliente a buscar" />
                    <br>
                    <table class="table table-sm table-bordered table-condensed table-hover">
                        <thead id="buscar_producto" class="thead-dark">
                            <tr>
                                <th style="width: 10px;">Seleccionar</th>
                                <th>Nombre Cliente</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($clientes as $cliente)
                            <tr>
                                <td class="text-center"  style="width: 10px;"><input wire:model="selected_cliente" name="COD_CLIENTE" type="radio" value="{{$cliente->COD_CLIENTE}}" /></td>
                                <td>{{$cliente->PRI_NOMBRE.' '.$cliente->PRI_APELLIDO}}</td>

                            </tr>

                            @endforeach



                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <p>Mostrando registros del {{$clientes->firstItem()}} al {{$clientes->lastItem()}} de
                            {{$clientes->total()}} registros.
                        </p>
                        {{$clientes->links()}}
                    </div>
                </div>
                <div class="modal-footer text-center">

                    <button wire:click="seleccionar" wire:ignore.self type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        Seleccionar
                    </button>


                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label><span style="color: red;">*</span>Cliente:</label>
        <div class="input-group-prepend">
            <input id="COD_CLIENTE" class="form-control border-dark" hidden placeholder="Ingrese la cantidad comprada..." type="text" name="COD_CLIENTE" value="{{$selected_cliente}}" autofocus>
 
            <input id="nombre_cliente" class="form-control border-dark" placeholder="Busque en cliente activo..." type="text" name="nombre_cliente" value="{{$nombre}}" value="{{old('nombre_cliente')}}" onkeypress="return false" autofocus>
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalCliente"> <i class="fas fa-search"></i></button>
        </div>
        @if ($errors->has('nombre_cliente'))
        <div id="nombre_cliente-error" class="error text-danger pl-3" for="nombre_cliente" style="display: bock;">
            <strong>
                {{ $errors->first('nombre_cliente') }}
            </strong>
        </div>
        @endif
    </div>
</div>
@livewireScripts

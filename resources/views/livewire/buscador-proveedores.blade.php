<div>

    <div class="modal fade" id="modalProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self data-backdrop="static">
        <div class="modal-dialog " role="document" height="50%">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title-center text-center" id="exampleModalLabel">BUSCAR PROVEEDOR
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                </div>
                <div class="px-2">
                    <x-jet-label for="acabado_movimiento" value="{{ __('Buscar:') }}" />
                    <x-jet-input wire:model="buscador" id="buscador" class="form-control text-left" type="text" placeholder="Ingrese el nombre del proveedor a buscar" />
                    <br>
                    <table class="table table-sm table-bordered table-condensed table-hover">
                        <thead id="buscar_producto" class="thead-dark">
                            <tr>
                                <th>Seleccionar</th>
                                <th>Nombre Proveedor</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($proveedores as $proveedor)
                            <tr>
                                <td class="text-center"><input wire:model="selected_proveedor" name="COD_PROVEEDOR" type="radio" value="{{$proveedor->COD_PROVEEDOR}}" /></td>
                                <td>{{$proveedor->PRI_NOMBRE.' '.$proveedor->PRI_APELLIDO}}</td>

                            </tr>

                            @endforeach



                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <p>Mostrando registros del {{$proveedores->firstItem()}} al {{$proveedores->lastItem()}} de
                            {{$proveedores->total()}} registros.
                        </p>
                        {{$proveedores->links()}}
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
        <label><span style="color: red;">*</span>Proveedor:</label>
        <div class="input-group-prepend">
            <input id="COD_PROVEEDOR" class="form-control border-dark" hidden placeholder="Ingrese la cantidad comprada..." type="text" name="COD_PROVEEDOR" value="{{$selected_proveedor}}" autofocus>
           @php $vendedor = $nombre; @endphp
            <input id="nombre_proveedor" class="form-control border-dark" placeholder="Busque en proveedor activo..." type="text" name="nombre_proveedor" value="{{$vendedor}}" value="{{old('$vendedor')}}" onkeypress="return false" autofocus>
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalProveedor"> <i class="fas fa-search"></i></button>
        </div>
        @if ($errors->has('nombre_proveedor'))
        <div id="nombre_proveedor-error" class="error text-danger pl-3" for="nombre_proveedor" style="display: bock;">
            <strong>
                {{ $errors->first('nombre_proveedor') }}
            </strong>
        </div>
        @endif
    </div>
</div>
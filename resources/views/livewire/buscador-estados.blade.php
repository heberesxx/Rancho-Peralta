<div>

    <div class="modal fade" id="modalEstados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self data-backdrop="static">
        <div class="modal-dialog " role="document" height="50%">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title-center text-center" id="exampleModalLabel">BUSCAR ESTADO
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                </div>
                <div class="px-2">
                    <x-jet-label for="acabado_movimiento" value="{{ __('Buscar:') }}" />
                    <x-jet-input wire:model="buscador" id="buscador" class="form-control text-left" type="text" placeholder="Ingrese el nombre del estado a buscar" />
                    <br>
                    <table class="table table-sm table-bordered table-condensed table-hover">
                        <thead id="buscar_producto" class="thead-dark">
                            <tr>
                                <th style="width: 10px;">Seleccionar</th>
                                <th>Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($estados as $estado)
                            <tr>
                                <td class="text-center" style="width: 10px;"><input wire:model="selected_estado" name="COD_ESTADO" type="radio" value="{{$estado->COD_ESTADO}}" /></td>
                                <td>{{$estado->DET_ESTADO}}</td>

                            </tr>

                            @endforeach



                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <p>Mostrando registros del {{$estados->firstItem()}} al {{$estados->lastItem()}} de
                            {{$estados->total()}} registros.
                        </p>
                        {{$estados->links()}}
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
        <label><span style="color: red;">*</span>Estado:</label>
        <div class="input-group-prepend">
            @php
            if($codigo_estado){
            $selected_estado=$codigo_estado;
            $nombre=$detalle;
            }
            @endphp
            <input id="COD_ESTADO" class="form-control border-dark" hidden placeholder="Ingrese la cantidad comprada..." type="text" name="COD_ESTADO" value="{{$selected_estado}}" autofocus>

            <input id="status" class="form-control border-dark" placeholder="Busque un estado..." type="text" name="status" value="{{$nombre}}" :value="{{old('status')}}" onkeypress="return false" autofocus>&nbsp;
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalEstados"> <i class="fas fa-search"></i></button>
        </div>
        @if ($errors->has('status'))
        <div id="status-error" class="error text-danger pl-3" for="status" style="display: bock;">
            <strong>
                {{ $errors->first('status') }}
            </strong>
        </div>
        @endif
    </div>

</div>
@livewireScripts
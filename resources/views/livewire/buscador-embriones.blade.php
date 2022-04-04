<div>

    <div class="modal fade" id="modalEmbrion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self data-backdrop="static">
        <div class="modal-dialog " role="document" height="50%">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title-center text-center" id="exampleModalLabel">BUSCAR EMBRIÓN
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                </div>
                <div class="px-2">
                    <x-jet-label for="acabado_movimiento" value="{{ __('Buscar:') }}" />
                    <x-jet-input wire:model="buscador" id="buscador" class="form-control text-left" type="text" placeholder="Ingrese el embrión a buscar" /> </br>
                  
                    <table class="table table-sm table-bordered table-condensed table-hover">
                        <thead id="buscar_producto" class="thead-dark">
                            <tr>
                                <th style="width: 10px;">Seleccionar</th>
                                <th>Datos del embrión</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($embriones as $embrion)
                            <tr>
                                <td class="text-center"  style="width: 10px;"><input wire:model="selected_embrion" name="COD_EMBRION" type="radio" value="{{$embrion->COD_EMBRION}}" /></td>
                                <td>{{'Embrión N°: '. $embrion->COD_EMBRION.' Raza  Donadora: '.$embrion->RAZ_VACA_DONADORA .' Raza  donador: '.$embrion->RAZ_TORO_DONADOR}}</td>

                            </tr>

                            @endforeach



                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <p>Mostrando registros del {{$embriones->firstItem()}} al {{$embriones->lastItem()}} de
                            {{$embriones->total()}} registros.
                        </p>
                        {{$embriones->links()}}
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
        <label><span style="color: red;">*</span>Embrión:</label>
        <div class="input-group-prepend">
            <input id="COD_EMBRION" class="form-control border-dark" hidden placeholder="Ingrese la cantidad comprada..." type="text" name="COD_EMBRION" value="{{$selected_embrion}}" autofocus>
 
            <input id="detalle_embrion" class="form-control border-dark" placeholder="Busque un embrión disponible..." type="text" name="detalle_embrion" value="{{$nombre}}" value="{{old('detalle_embrion')}}" onkeypress="return false" autofocus>&nbsp;
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalEmbrion"> <i class="fas fa-search"></i></button>
        </div>
        @if ($errors->has('detalle_embrion'))
        <div id="detalle_embrion-error" class="error text-danger pl-3" for="detalle_embrion" style="display: bock;">
            <strong>
                {{ $errors->first('detalle_embrion') }}
            </strong>
        </div>
        @endif
    </div>
</div>
@livewireScripts


<div>

    <div class="modal fade" id="modalEsperma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self data-backdrop="static">
        <div class="modal-dialog " role="document" height="50%">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title-center text-center" id="exampleModalLabel">BUSCAR ESPERMA
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                </div>
                <div class="px-2">
                    <x-jet-label for="acabado_movimiento" value="{{ __('Buscar:') }}" />
                    <x-jet-input wire:model="buscador" id="buscador" class="form-control text-left" type="text" placeholder="Ingrese la pajilla a buscar" /> </br>
                  
                    <table class="table table-sm table-bordered table-condensed table-hover">
                        <thead id="buscar_producto" class="thead-dark">
                            <tr>
                                <th style="width: 10px;">Seleccionar</th>
                                <th>Datos del esperma</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($espermas as $esperma)
                            <tr>
                                <td class="text-center"  style="width: 10px;"><input wire:model="selected_esperma" name="COD_ESPERMA" type="radio" value="{{$esperma->COD_ESPERMA}}" /></td>
                                <td>{{'Número de pajilla : '. $esperma->NUM_PAJILLA. ' Raza del toro donador: '.$esperma->RAZ_TORO_DONADOR}}</td>

                            </tr>

                            @endforeach



                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <p>Mostrando registros del {{$espermas->firstItem()}} al {{$espermas->lastItem()}} de
                            {{$espermas->total()}} registros.
                        </p>
                        {{$espermas->links()}}
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
        <label><span style="color: red;">*</span>Esperma:</label>
        <div class="input-group-prepend">
            <input id="NUM_PAJILLA" class="form-control border-dark" hidden placeholder="Ingrese la cantidad comprada..." type="text" name="NUM_PAJILLA" value="{{$selected_esperma}}" autofocus>
 
            <input id="detalle_esperma" class="form-control border-dark" placeholder="Busque un esperma disponible..." type="text" name="detalle_esperma" value="{{$nombre}}" value="{{old('detalle_esperma')}}" onkeypress="return false" autofocus>&nbsp;
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalEsperma"> <i class="fas fa-search"></i></button>
        </div>
        @if ($errors->has('detalle_esperma'))
        <div id="detalle_esperma-error" class="error text-danger pl-3" for="detalle_esperma" style="display: bock;">
            <strong>
                {{ $errors->first('detalle_esperma') }}
            </strong>
        </div>
        @endif
    </div>
</div>
@livewireScripts

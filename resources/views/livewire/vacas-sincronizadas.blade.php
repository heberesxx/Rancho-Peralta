<div>

    <div class="modal fade" id="modalVaca" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self data-backdrop="static">
        <div class="modal-dialog " role="document" height="50%">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title-center text-center" id="exampleModalLabel">BUSCAR VACA SINCRONIZADA
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                </div>
                <div class="px-2">
                    <x-jet-label for="acabado_movimiento" value="{{ __('Buscar:') }}" />
                    <x-jet-input wire:model="buscador" id="buscador" class="form-control text-left" type="text" placeholder="Ingrese la vaca sincronizada a buscar" /></br>

                    <table class="table table-sm table-bordered table-condensed table-hover">
                        <thead id="buscar_producto" class="thead-dark">
                            <tr>
                                <th style="width: 10px;">Seleccionar</th>
                                <th>Datos de la vaca</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($vacass as $vaca)
                            <tr>
                                <td class="text-center" style="width: 10px;"><input wire:model="selected_vacas" name="COD_REGISTRO_GANADO" type="radio" value="{{$vaca->COD_REGISTRO_GANADO}}" /></td>
                                <td>{{ 'Nombre: '.$vaca->NOM_GANADO.', Raza: '.$vaca->NOM_RAZA.', Arete #: '.$vaca->NUM_ARETE.', Lugar: '.$vaca->DIR_LUGAR}}</td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        
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
        <label><span style="color: red;">*</span>Vaca a Fecundar:</label>
        <div class="input-group-prepend">
            <input id="COD_REGISTRO_GANADO" class="form-control border-dark" hidden placeholder="Ingrese la cantidad comprada..." type="text" name="COD_REGISTRO_GANADO" value="{{$selected_vacas}}" autofocus>

            <input id="vaca-sincronizada" class="form-control border-dark" placeholder="Busque la vaca..." type="text" name="vaca-sincronizada" value="{{$nombre}}" value="{{old('vaca-sincronizada')}}" onkeypress="return false" autofocus>&nbsp;
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalVaca"> <i class="fas fa-search"></i></button>
        </div>
        @if ($errors->has('vaca-sincronizada'))
        <div id="vaca-sincronizada-error" class="error text-danger pl-3" for="vaca-sincronizada" style="display: bock;">
            <strong>
                {{ $errors->first('vaca-sincronizada') }}
            </strong>
        </div>
        @endif
    </div>
</div>
@livewireScripts
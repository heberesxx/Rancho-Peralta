<div>

    <div class="modal fade" id="modalVacape" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self data-backdrop="static">
        <div class="modal-dialog " role="document" height="50%">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title-center text-center" id="exampleModalLabel">Buscar Vaca Recien Parida
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                </div>
                <div class="px-2">
                    <x-jet-label for="acabado_movimiento" value="{{ __('Buscar:') }}" />
                    <x-jet-input wire:model="buscador" id="buscador" class="form-control text-left" type="text" placeholder="Ingrese la vaca preñada a buscar" /></br>
                  
                    <table class="table table-sm table-bordered table-condensed table-hover">
                        <thead id="buscar_producto" class="thead-dark">
                            <tr>
                                <th style="width: 10px;">Seleccionar</th>
                                <th>Datos de la vaca</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($vacaspe as $vacaspem)
                            <tr>
                                <td class="text-center"  style="width: 10px;"><input wire:model="selected_vacaspmonta" name="COD_PRENADA_MONTA" type="radio" value="{{$vacaspem->COD_PRENADA_MONTA}}" /></td>
                                <td>{{ 'Nombre: '.$vacaspem->NOM_GANADO. ', Arete N°: '.$vacaspem->NUM_ARETE}}</td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                 
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
        <label><span style="color: red;">*</span>Vaca Parió:</label>
        <div class="input-group-prepend">
            <input id="COD_PRENADA_MONTA" class="form-control border-dark" hidden placeholder="Ingrese la cantidad comprada..." type="text" name="COD_PRENADA_MONTA" value="{{$selected_vacaspmonta}}" autofocus>
 
            <input id="vaca-prenada" class="form-control border-dark" placeholder="Busque la vaca que lo parió..." type="text" name="vaca-prenada" value="{{$nombre}}" value="{{old('vaca-prenada')}}" onkeypress="return false" autofocus> &nbsp;
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalVacape"> <i class="fas fa-search"></i></button>
        </div>
        @if ($errors->has('vaca-prenada'))
        <div id="vaca-prenada-error" class="error text-danger pl-3" for="vaca-prenada" style="display: bock;">
            <strong>
                {{ $errors->first('vaca-prenada') }}
            </strong>
        </div>
        @endif
    </div>
</div>
@livewireScripts




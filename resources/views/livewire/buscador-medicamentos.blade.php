<div>

    <div class="modal fade" id="modalMedicamentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self data-backdrop="static">
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
                    <x-jet-input wire:model="buscador" id="buscador" class="form-control text-left" type="text" placeholder="Ingrese el nombre del medicamento a buscar" />
                    <br>
                    <table class="table table-sm table-bordered table-condensed table-hover">
                        <thead id="buscar_producto" class="thead-dark">
                            <tr>
                                <th style="width: 10px;">Seleccionar</th>
                                <th>Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($medicamentos as $medicamento)
                            <tr>
                                <td class="text-center"  style="width: 10px;"><input wire:model="selected_medicamento" name="COD_MEDICAMENTO" type="radio" value="{{$medicamento->COD_MEDICAMENTO}}" /></td>
                                <td>{{$medicamento->NOM_MEDICAMENTO}}</td>

                            </tr>

                            @endforeach



                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <p>Mostrando registros del {{$medicamentos->firstItem()}} al {{$medicamentos->lastItem()}} de
                            {{$medicamentos->total()}} registros.
                        </p>
                        {{$medicamentos->links()}}
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
        <label><span style="color: red;">*</span>Medicamento:</label>
        <div class="input-group-prepend">
            <input id="COD_MEDICAMENTO" class="form-control border-dark" hidden placeholder="Ingrese la cantidad comprada..." type="text" name="COD_MEDICAMENTO" value="{{$selected_medicamento}}" autofocus>&nbsp;
 
            <input id="nombre_medicamento" class="form-control border-dark" placeholder="Busque un medicamento..." type="text" name="nombre_medicamento" value="{{$nombre}}" value="{{old('nombre_medicamento')}}" onkeypress="return false" autofocus>&nbsp;
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalMedicamentos"> <i class="fas fa-search"></i></button>
        </div>
        @if ($errors->has('nombre_medicamento'))
        <div id="nombre_medicamento-error" class="error text-danger pl-3" for="nombre_medicamento" style="display: bock;">
            <strong>
                {{ $errors->first('nombre_medicamento') }}
            </strong>
        </div>
        @endif
    </div>
</div>
@livewireScripts


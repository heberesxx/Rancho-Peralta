<div>

    <div class="modal fade" id="modalRazas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self data-backdrop="static">
        <div class="modal-dialog " role="document" height="50%">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title-center text-center" id="exampleModalLabel">BUSCAR RAZA
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                </div>
                <div class="px-2">
                    <x-jet-label for="acabado_movimiento" value="{{ __('Buscar:') }}" />
                    <x-jet-input wire:model="buscador" id="buscador" class="form-control text-left" type="text" placeholder="Ingrese el nombre dela raza a buscar" />
                    <br>
                    <table class="table table-sm table-bordered table-condensed table-hover">
                        <thead id="buscar_producto" class="thead-dark">
                            <tr>
                                <th style="width: 10px;">Seleccionar</th>
                                <th>Nombre Raza</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($razas as $raza)
                            <tr>
                                <td class="text-center" style="width: 10px;"><input wire:model="selected_raza" name="COD_RAZA" type="radio" value="{{$raza->COD_RAZA}}" /></td>
                                <td>{{$raza->NOM_RAZA}}</td>

                            </tr>

                            @endforeach



                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <p>Mostrando registros del {{$razas->firstItem()}} al {{$razas->lastItem()}} de
                            {{$razas->total()}} registros.
                        </p>
                        {{$razas->links()}}
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
        <label><span style="color: red;">*</span>Raza:</label>
        <div class="input-group-prepend">
            @php
            if($codigo_raza){
            $selected_raza=$codigo_raza;
            $nombre=$detalle;
            }
            @endphp
            <input id="COD_RAZA" class="form-control border-dark" hidden placeholder="Ingrese la cantidad comprada..." type="text" name="COD_RAZA" value="{{$selected_raza}}" autofocus>

            <input id="nombre_raza" class="form-control border-dark" placeholder="Busque una raza activa..." type="text" name="nombre_raza" value="{{$nombre}}" value="{{old('nombre_raza')}}" onkeypress="return false" autofocus>&nbsp;
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalRazas"> <i class="fas fa-search"></i></button> 
        </div>
        @if ($errors->has('nombre_raza'))
        <div id="nombre_raza-error" class="error text-danger pl-3" for="nombre_raza" style="display: bock;">
            <strong>
                {{ $errors->first('nombre_raza') }}
            </strong>
        </div>
        @endif
    </div>
</div>
@livewireScripts
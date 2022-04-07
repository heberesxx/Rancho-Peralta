<div>

    <div class="modal fade" id="modalVentaG" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self data-backdrop="static">
        <div class="modal-dialog modal-lg"  role="document" height="50%">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title-center text-center" id="exampleModalLabel">BUSCAR GANADO
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                </div>
                <div class="px-2">
                    <x-jet-label for="acabado_movimiento" value="{{ __('Buscar:') }}" />
                    <x-jet-input wire:model="buscador" id="buscador" class="form-control text-left" type="text" placeholder="Ingrese el nombre de la vaca a vender" />
                    <br>
                   
                    <table class="table table-sm table-bordered table-condensed table-hover">
                        <thead id="buscar_producto" class="thead-dark">
                            <tr>

                                <th style="width: 10px;">Seleccionar</th>
                                <th>Nombre GANADO</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($ganados as $ganado)
                            <tr>

                                <td class="text-center" style="width: 10px;"><input wire:model="selected_ganadoventa" name="COD_REGISTRO_GANADO" type="radio" value="{{$ganado->COD_REGISTRO_GANADO}}" /></td>
                                <td>{{ 'Nombre: '.$ganado->NOM_GANADO.' , Arete: '.$ganado->NUM_ARETE.', Raza: '.$ganado->RAZ_GANADO.' Peso: '.$ganado->PES_ACTUAL.' kg'.', Lugar: '.$ganado->DIR_LUGAR.', Estado: '.$ganado->DET_ESTADO}}</td>

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
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label><span style="color: red;">*</span>Ganado:</label></br>
                <div class="input-group-prepend">

                    <input id="COD_REGISTRO_GANADO" class="form-control border-dark" hidden placeholder="Ingrese la cantidad comprada..." type="text" name="COD_REGISTRO_GANADO" value="{{$selected_ganadoventa}}" autofocus>

                    <input id="nombre_ganado" class="form-control border-dark" placeholder="Busque el ganado a vender..." type="text" name="nombre_ganado" value="{{$nombre}}" value="{{old('nombre_ganado')}}" onkeypress="return false" autofocus>

                    <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalVentaG"> <i class="fas fa-search"></i></button>
                </div> </br>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group">
                <label></span>Arete:</label>
                <input id="nombre_ganado" class="form-control border-dark" type="text" name="nombre_ganado" value="{{$arete}}" value="{{old('nombre_ganado')}}" onkeypress="return false" disabled autofocus>

            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label></span>Peso:</label>
                <input id="nombre_ganado" class="form-control border-dark" type="text" name="nombre_ganado" value="{{$peso}}" value="{{old('nombre_ganado')}}" onkeypress="return false" disabled autofocus>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label></span>Color:</label>
                <input id="nombre_ganado" class="form-control border-dark" type="text" name="nombre_ganado" value="{{$color}}" value="{{old('nombre_ganado')}}" onkeypress="return false" disabled autofocus>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="form-group">
                <label></span>Sexo:</label>
                <input id="nombre_ganado" class="form-control border-dark" type="text" name="nombre_ganado" value="{{$sexo}}" value="{{old('nombre_ganado')}}" onkeypress="return false" disabled autofocus>
            </div>
        </div>

        @if ($errors->has('nombre_ganado'))
        <div id="nombre_ganado-error" class="error text-danger pl-3" for="nombre_ganado" style="display: bock;">
            <strong>
                {{ $errors->first('nombre_ganado') }}
            </strong>
        </div>
        @endif
    </div>
</div>

@livewireScripts
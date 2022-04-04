<div>

    <div class="modal fade" id="modalPreguntas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self data-backdrop="static">
        <div class="modal-dialog " role="document" height="50%">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="modal-title-center text-center" id="exampleModalLabel">BUSCAR PREGUNTA
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
                                <th>Pregunta</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($preguntas as $pregunta)
                            <tr>
                                <td class="text-center"  style="width: 10px;"><input wire:model="selected_pregunta" name="id" type="radio" value="{{$pregunta->id}}" /></td>
                                <td>{{$preguntas->pregunta}}</td>

                            </tr>

                            @endforeach



                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <p>Mostrando registros del {{$preguntas->firstItem()}} al {{$preguntas->lastItem()}} de
                            {{$preguntas->total()}} registros.
                        </p>
                        {{$preguntas->links()}}
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
            <input id="id" class="form-control border-dark" hidden placeholder="Ingrese la cantidad comprada..." type="text" name="id" value="{{$selected_pregunta}}" autofocus>
 
            <input id="pregunta" class="form-control border-dark" placeholder="Busque un medicamento..." type="text" name="pregunta" value="{{$nombre}}" value="{{old('pregunta')}}" onkeypress="return false" autofocus>
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modalPreguntas"> <i class="fas fa-search"></i></button>
        </div>
        @if ($errors->has('pregunta'))
        <div id="pregunta-error" class="error text-danger pl-3" for="pregunta" style="display: bock;">
            <strong>
                {{ $errors->first('pregunta') }}
            </strong>
        </div>
        @endif
    </div>
</div>
@livewireScripts


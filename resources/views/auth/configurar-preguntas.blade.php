<div>
    <x-guest-layout>
        <x-jet-authentication-card>
            <div class="card-body">
            <style type="text/css">
                    .transformacion1 {
                        text-transform: uppercase;
                    }
                </style>
                <form action="{{url("/configurar-pregunta")}}" method="get">
                    <x-slot name="logo">
                        <x-jet-authentication-card-logo />
                    </x-slot>
                    @if (session('pregunta'))
                    <div class="alert alert-warning text-center" role="alert">
                        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                        <strong>{{session('pregunta')}}</strong>
                    </div>
                    @endif

                    <h5 class="text text-center;">Configure sus preguntas de seguridad para
                        restablecer su contraseña en el futuro.
                    </h5>


                    <div>

                        <x-jet-label for="email" value="{{ __('Pregunta:') }}" />
                        <select name="pregunta" class=" w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input" required>
                            <option value="">--SELECCIONE--</option>
                            @foreach ($preguntas as $pregunta)
                            <option value={{$pregunta->id}}>¿{{$pregunta->pregunta}}?</option>
                            @endforeach
                        </select>
                        <span class="text-xs text-red-700" id="passwordHelp">


                        </span>
                    </div>
                    </br>
                    <div>
                        <x-jet-label for="respuesta" value="{{ __('Respuesta') }}" />
                        <x-jet-input id="respuesta" class="block mt-1 w-full" type="text" name="respuesta" :value="old('respuesta')"  style="text-transform: uppercase;"  required autofocus pattern="[A-Z ]{2,254}" title="Las respuestas solo pueden ser en Mayúsculas" />
                        </br>
                       

                    </div></br>


                    <div class="d-flex justify-content-center align-items-baseline">


                        <!-- <button class="inline-flex items-center h-8
                    px-4 m-2 text-bg text-gray-100 transition-colors
                    duration-150 bg-gray-700 rounded-lg
                    focus:shadow-outline hover:bg-gray-800" type="submit" >Guardar</button> -->
                        <x-jet-button style="background-color: #2F76DB; background:#2F76DB ; width: 100%; border-color:#2F76DB;">
                            Guardar
                        </x-jet-button>
                    </div>



                </form>
            </div>
        </x-jet-authentication-card>
    </x-guest-layout>
</div>
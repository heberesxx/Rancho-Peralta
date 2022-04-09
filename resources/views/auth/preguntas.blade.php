<div>
    <x-guest-layout>
        <x-jet-authentication-card>
            <div class="card-body">
                <style type="text/css">
                    .transformacion1 {
                        text-transform: uppercase;
                    }
                </style>
                <x-slot name="logo">
                    <x-jet-authentication-card-logo />
                </x-slot>
                @if (session('bloqueado'))
                <div>
                    <span class="error text-lg text-yellow-400"> {{session('bloqueado')}}</span>
                    <br>
                    <a href="{{url('login')}}" class="inline-flex items-center h-8
                    px-4 m-2 text-bg text-gray-100 transition-colors
                    duration-150 bg-red-700 rounded-lg
                    focus:shadow-outline hover:bg-red-800" type="submit"> Salir</a>
                </div>
                @else


                <h5 class="text text-center">Responde a una de tus preguntas de seguridad para
                    restablecer tu contraseña.
                </h5></br>


                <div>
                    <form action="{{url('verificar_pregunta')}}" method="GET">
                        <input type="hidden" name="usuario" value="{{$usuario}}">
                        <x-jet-label for="email" value="{{ __('Pregunta:') }}" />
                        <select name="pregunta" class=" w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input">
                            <option value="">--SELECCIONE--</option>
                            @foreach ($preguntas as $pregunta)
                            <option value={{$pregunta->id}}>¿{{$pregunta->pregunta}}?</option>
                            @endforeach
                        </select>
                        <span class="text-xs text-red-700" id="passwordHelp">


                        </span>
                </div>
                <br>
                <div>
                    <x-jet-label for="respuesta" value="{{ __('Respuesta') }}" />
                    <x-jet-input wire:model="respuesta" id="respuesta" class="block mt-1 w-full" type="text" name="respuesta" style="text-transform: uppercase;" :value="old('respuesta')" pattern="[A-Z ]{2,191}" title="Las respuestas tienen que estar en mayúsculas" maxlength="191" required autofocus />

                    @if (session('mensaje'))
                    <div>
                        <span class="text text-danger"> {{session('mensaje')}}</span>
                    </div>
                    @endif


                </div>
                <br>

                <div class="row">

                    <div class="col-lg-6">
                        <a class="btn btn-default btn-flat w-100 " style="background-color: #D9D7C7; width: 40%;" href="{{ route('login') }}">

                            CANCELAR
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <x-jet-button style="background-color: #2F76DB; background:#2F76DB ; width: 50%; border-color:#2F76DB;" class="w-100">
                            ACEPTAR
                        </x-jet-button>
                    </div>

                </div>
                @endif

                </form>
            </div>

        </x-jet-authentication-card>
    </x-guest-layout>
</div>
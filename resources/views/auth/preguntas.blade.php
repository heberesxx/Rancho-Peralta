<div>
    <x-guest-layout>
        <x-jet-authentication-card>
            <div class="card-body">
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
                    <x-jet-input wire:model="respuesta" id="respuesta" class="block mt-1 w-full" type="text" name="respuesta" :value="old('respuesta')" pattern="[A-Z ]{2,191}" maxlength="191" required autofocus />

                    @if (session('mensaje'))
                    <div>
                        <span class="text text-danger"> {{session('mensaje')}}</span>
                    </div>
                    @endif


                </div>
                <br>

                <div class="mb-0">
                    <div class="d-flex justify-content-end">
                        <div>
                            <a class="btn btn-default btn-flat float-right " style="background-color: #D9D7C7;" href="{{ route('login') }}">
                                
                                CANCELAR 
                            </a>&nbsp; &nbsp; &nbsp;
                            <x-jet-button style="background-color: #2F76DB; background:#2F76DB ; width: 260px; border-color:#2F76DB;">
                                Restablecer Contraseña
                            </x-jet-button>
                        </div>

                    </div>
                </div>
                @endif

                </form>
            </div>

        </x-jet-authentication-card>
    </x-guest-layout>
</div>
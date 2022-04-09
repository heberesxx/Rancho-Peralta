<div>
    <x-guest-layout>
        <x-jet-authentication-card>
            <div class="card-body">
                <form action="{{ url('metodo') }}" method="get">
                    <!-- action="/answers" method="POST">-->

                    <x-slot name="logo">
                        <x-jet-authentication-card-logo />
                    </x-slot>
                    <h5 class="text text-success text-center">¿Olvidaste tu Contraseña?</h5>


                    <div class="col">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="block">
                                    <x-jet-label for="usuario" class="text-xl" value="{{ __('Usuario:') }}" />
                                    <x-jet-input id="usuario" class="block mt-1 w-full" type="text" name="usuario" value="{{old('usuario')}}" maxlength="30" pattern="[A-Z0-9]{3,30}" title="Entre 3 y 30 carácteres en mayúsculas, sin espacios ni caracteres especiales" required autofocus />
                                    @if (session('mensaje'))
                                    <div>
                                        <span class="error text-lg text-yellow-400"> **{{ session('mensaje') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div></br>
                        <div class="row">


                            <br>
                            <x-jet-label class="text-xl" for="forgot-password" value="{{ __('Método:') }}" />
                            <br>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="metodo" type="radio" value="preguntas" required /> Preguntas de
                                    Seguridad
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="metodo" type="radio" value="email" required /> Email
                                    <br>
                                </div>

                            </div>

                        </div> </br>

                        @if (session()->has('message'))

                        <div role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                Advertencia
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                {{ session('message') }}
                            </div>
                        </div>

                        @endif

                        <div class="row">

                            <div class="col-lg-6">
                                <a class="btn btn-default btn-flat w-100 " style="background-color: #D9D7C7; width: 40%;" href="{{ route('login') }}">

                                    CANCELAR
                                </a>
                            </div>
                            <div  class="col-lg-6">
                                <x-jet-button style="background-color: #2F76DB; background:#2F76DB ; width: 50%; border-color:#2F76DB;" class="w-100">
                                    ACEPTAR
                                </x-jet-button>
                            </div>

                        </div>
                    </div>



                </form>
            </div>
        </x-jet-authentication-card>
    </x-guest-layout>
</div>
<x-guest-layout>
    <x-jet-authentication-card>
        <div class="card-body">
            <link rel="stylessheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
            <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>

            <x-jet-validation-errors class="mb-4" />
            <h5 class="text text-secondary text-center">Cambiar Contraseña</h5>

            <form method="GET" action="{{ url('update-password') }}">

                <input type="hidden" name="usuario" value="{{$usuario}}">
                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" pattern="[A-Za-z0-9!?%$#-]{8,30}" title="Debe contener al menos una mayúscula, minusculas, números y caracteres entre 8 y 30 carácteres" required autocomplete="new-password" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="position: static; right:25px; transform:(0,-50%); top:38%; cursor:pointer;">
                        <i class="fa fa-eye" style="font-size: 20px;" aria-hidden="true" id="eye" onclick="toggle()"></i>
                    </span>
                    <!-- Show password icon -->
                </div>
               

                <div class="mt-4">
                    <x-jet-label id="password" for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />

                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" pattern="[A-Za-z0-9!?%$#-]{8,30}" title="Debe contener al menos una mayúscula, minusculas, números y caracteres entre 8 y 30 carácteres" required autocomplete="new-password" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="position: static; right:25px; transform:(0,-50%); top:38%; cursor:pointer;">
                        <i class="fa fa-eye" style="font-size: 20px;" aria-hidden="true" id="ojo" onclick="myFunction()"></i>
                    </span>
                </div>
                @if (session('mensaje'))
                <div>
                    <strong><span class="text text-danger"> {{session('mensaje')}}</span></strong>
                </div>
                @endif
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
            </form>
        </div>
        <script>
            var state = false;

            function toggle() {
                if (state) {
                    document.getElementById("password").setAttribute("type", "password");
                    document.getElementById("eye").style.color = '#7a797e';
                    state = false;
                } else {
                    document.getElementById("password").setAttribute("type", "text");
                    document.getElementById("eye").style.color = '#5887ef';
                    state = true;
                }
            }
        </script>
        <script>
            var estado = false;

            function myFunction() {
                if (estado) {
                    document.getElementById("password_confirmation").setAttribute("type", "password");
                    document.getElementById("ojo").style.color = '#7a797e';
                    estado = false;
                } else {
                    document.getElementById("password_confirmation").setAttribute("type", "text");
                    document.getElementById("ojo").style.color = '#5887ef';
                    estado = true;
                }
            }
        </script>
    </x-jet-authentication-card>
</x-guest-layout>
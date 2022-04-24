
<x-guest-layout>
    <x-jet-authentication-card>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">

        <div class="card-body" style="float: right;">
            <link rel="stylessheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
            <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>

            <x-jet-validation-errors class="mb-3 rounded-0" />


            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <strong>
                        <x-jet-label value="{{ __('Usuario') }}" />
                    </strong>

                    <x-jet-input class="{{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" :value="old('username')" onkeyup="javascript:this.value=this.value.toUpperCase();" pattern="[A-Z0-9]{4,30}" title="Entre 4 y 30 carácteres en mayúsculas, sin espacios ni caracteres especiales" maxlength="30" minlength="4" required />

                    
                </div>

                <div class="mb-3" x-data="{show: false}">
                    <strong>
                        <x-jet-label value="{{ __('Contraseña') }}" />
                    </strong>

                    <input style="position: static;" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" :type="show  ? 'text': 'password'" min="8" name="password" id="password" pattern="[A-Za-z0-9!?%$&*#-]{8,30}" title="Debe contener al menos una mayúscula, minusculas, números y caracteres entre 8 y 30 carácteres" required autocomplete="current-password" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="position: static; right:25px; transform:(0,-50%); top:38%; cursor:pointer;">
                        <i class="fa fa-eye" style="font-size: 20px;" aria-hidden="true" id="eye" onclick="toggle()"></i>
                    </span>
                    <!-- Show password icon -->


                </div>

                <div class="mb-3">
                    <div class="custom-control custom-checkbox">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <label class="custom-control-label" for="remember_me">
                            {{ __('Recordar Usuario') }}
                        </label>
                    </div>
                </div>

                <div class="mb-1">
                    <div class="d-flex justify-content-center align-items-baseline">


                        <x-jet-button style="background-color: #2F76DB; background:#2F76DB ; width: 150px; border-color:#2F76DB;">
                            {{ __('Ingresar') }}
                        </x-jet-button>
                    </div>
                </div></br>

                <div class="mb-1">
                    <div class="d-flex justify-content-center align-items-baseline">

                        @if (Route::has('password.request'))
                        <a class="btn btn-default btn-flat float-right " style="background-color: #D9D7C7;" href="{{route('olvido_pass')}}">
                            <strong>{{ __('¿Olvidaste tu Contraseña?') }} </strong>
                        </a>
                        @endif

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
    </x-jet-authentication-card>
</x-guest-layout>
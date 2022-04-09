<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">
        <link rel="stylessheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
            <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">

            <x-jet-validation-errors class="mb-3" />

            <form method="POST" action="/reset-password">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-3">
                    <x-jet-label value="{{ __('Email') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Password') }}" />

                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" required autocomplete="new-password"  id="password"/>
                    <x-jet-input-error for="password"></x-jet-input-error> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="position: static; right:25px; transform:(0,-50%); top:38%; cursor:pointer;">
                        <i class="fa fa-eye" style="font-size: 20px;" aria-hidden="true" id="eye" onclick="toggle()"></i>
                    </span>
                </div> 

                <div class="mb-3">
                    <x-jet-label value="{{ __('Confirm Password') }}" />

                    <x-jet-input class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" name="password_confirmation" required autocomplete="new-password" id="password_confirmation" />
                    <x-jet-input-error for="password_confirmation"></x-jet-input-error>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="position: static; right:25px; transform:(0,-50%); top:38%; cursor:pointer;">
                        <i class="fa fa-eye" style="font-size: 20px;" aria-hidden="true" id="ojo" onclick="myFunction()"></i>
                    </span>
                </div>



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
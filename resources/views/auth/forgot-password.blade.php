<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">

            <div class="mb-3">
                <h5 class="text-success text-center">¿Olvidaste tu contraseña?</h5>
                <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Ingresa tu dirección de correo electrónico para enviarte en enlace de restablecimiento.</p>
            </div>

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <x-jet-validation-errors class="mb-3" />

            <form method="POST" action="/forgot-password">
                @csrf

                <div class="mb-3">
                    <x-jet-label value="Email" />
                    <x-jet-input type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <a class="btn btn-default btn-flat w-100 " style="background-color: #D9D7C7; width: 40%;" href="{{ route('login') }}">

                            CANCELAR
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <x-jet-button style="background-color: #2F76DB; background:#2F76DB ; width: 50%; border-color:#2F76DB;" class="w-100">
                            ENVIAR
                        </x-jet-button>
                    </div>

                </div>





            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="card-body">

            <div class="mb-3">
                {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.') }}
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

                <div class="mb-0">
                    <div class="d-flex justify-content-end">
                        <div>
                            <a class="btn btn-default btn-flat float-right " style="background-color: #D9D7C7;" href="{{ route('login') }}">
                               
                                CANCELAR
                            </a> &nbsp; &nbsp; &nbsp;
                            <x-jet-button style="background-color: #2F76DB; background:#2F76DB ; width: 250px; border-color:#2F76DB;">
                                {{ __('Enviar enlace al correo') }}
                            </x-jet-button>
                        </div>
                    </div>
                </div>





            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
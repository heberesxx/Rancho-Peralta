<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div id="mayusculas" class="error  pl-3" for="password" style="display: bock; width: 100%;
    text-align: center;"> <br>
            <br>
            @if(Auth::user()->primera_vez)


            <strong class="errores">
                <h6>Es la primera vez que accedes al sistema, </h6>
                <h6>favor cambiar tu contraseña.</h4>
            </strong>
            @endif
        </div>

        <link rel="stylessheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">


        <div class="card-body">

            <form action="{{url('update_password')}}" method="post">
                @csrf


                <div class="row">
                    <div class="p-2">
                        <div class="form-group">

                            @if ($actualizada)
                            <div class="alert alert-success input-group-prepend" role="alert">
                                Se ha cambiado su contraseña, <a href="{{url('/')}}" class="alert-link">entrar al sistema.</a>.
                            </div>

                            @endif
                        </div>
                    </div>
                    <div class="p-2">

                        <div class="form-group">
                            <label for="passwor">Contraseña Actual</label>
                            <div class="input-group-prepend">
                                <x-jet-input required id="current_password" class="form-control" placeholder="Ingrese la contraseña actual" type="password" name="current_password" maxlength="30" value="{{old('current_password')}}" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="position: static; right:25px; transform:(0,-50%); top:38%; cursor:pointer;">
                                    <i class="fa fa-eye" style="font-size: 20px;" aria-hidden="true" id="ojo1" onclick="Function()"></i>
                                </span>

                            </div>
                        </div>


                    </div>
                    @if (session('current_password'))

                    <div id="password-error" class="error text-danger pl-3" for="current_password" style="display: bock;">
                        <strong class="errores">
                            {{session('current_password')}}
                        </strong>
                    </div>
                    @endif

                    <div class="p-2">


                        <label for="password">Nueva Contraseña</label>
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <x-jet-input required id="password" class="form-control" placeholder="Ingrese la nueva contraseña" type="password" name="password" maxlength="30" value="{{old('password')}}" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="position: static; right:25px; transform:(0,-50%); top:38%; cursor:pointer;">
                                    <i class="fa fa-eye" style="font-size: 20px;" aria-hidden="true" id="eye" onclick="toggle()"></i>
                                </span>
                            </div>

                        </div>
                        @if ($errors->has('password'))

                        <div id="password-error" class="error text-danger pl-3" for="password" style="display: bock;">
                            <strong class="errores">
                                {{$errors -> first('password')}}
                            </strong>
                        </div>
                        @endif
                        @if (session('igual_anterior'))

                        <div id="password-error" class="error text-danger pl-3" for="igual_anterior" style="display: bock;">
                            <strong class="errores">
                                {{session('igual_anterior')}}
                            </strong>
                        </div>
                        @endif

                    </div>


                    <div class="p-2">
                        <label for="usuario">Confirmar Contraseña:</label>
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <x-jet-input required id="password_confirmation" class="form-control" placeholder="Confirmar contraseña" type="password" name="password_confirmation" maxlength="30" value="{{old('password')}}" onpaste="return false" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="position: static; right:25px; transform:(0,-50%); top:38%; cursor:pointer;">
                                    <i class="fa fa-eye" style="font-size: 20px;" aria-hidden="true" id="ojo" onclick="myFunction()"></i>
                                </span>

                            </div>

                        </div>

                    </div>


                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-center ">
                        <button type="submit" class="btn btn-success" style="width: 500px;">Guardar</button>
                    </div>
                </div></br>
                <div class="col-12">
                    <div class="d-flex justify-content-center ">
                        <a type="button" class="btn btn-danger" style="width: 500px;" href="{{url('/')}}">Cancelar</a>
                    </div>
                </div>

        </div>


        </form>

      




    </x-jet-authentication-card>

</x-guest-layout>
<script src="{{ asset('js/validaciones.js') }}" defer></script>
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
    function myFunction(){
        if (state) {
            document.getElementById("password_confirmation").setAttribute("type", "password");
            document.getElementById("ojo").style.color = '#7a797e';
            state = false;
        } else {
            document.getElementById("password_confirmation").setAttribute("type", "text");
            document.getElementById("ojo").style.color = '#5887ef';
            state = true;
        }
    }
</script>
<script>
    function Function(){
        if (state) {
            document.getElementById("current_password").setAttribute("type", "password");
            document.getElementById("ojo1").style.color = '#7a797e';
            state = false;
        } else {
            document.getElementById("current_password").setAttribute("type", "text");
            document.getElementById("ojo1").style.color = '#5887ef';
            state = true;
        }
    }
</script>
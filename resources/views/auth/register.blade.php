<!doctype html>
<html lang="es">
<head>
    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/signup.css')}}">
    <link rel="shortcut icon" href="{{asset('images/lofiIcon.png')}}" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=AkayaKanadaka' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
<div class="container">
                    <form method="POST" action="{{ route('register') }}" id ="registro" class= "col-10 col-sm-10 col-md-8 col-lg-6 col-xl-6 p-5 border-dark g-3">
                        <h1 class="text-center mb-4" id="titulo">Registro de Usuario</h1>
                        @csrf

                        <div id="separacionDatos" class="d-flex justify-content-center align-items-center col-8 flex-wrap">

                            <input id="usuario" type="text" class="col-5 datos form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre" value="{{ old('name') }}"  autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div id="seccionUsuario" class="d-flex justify-content-center align-items-center col-8 mt-3 flex-wrap">

                                <input id="email" type="email" class="col-5 datos form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div id="seccionContra" class="d-flex justify-content-center align-items-end col-8 mt-3 flex-wrap">

                            <div class="col-5" id="divContra">

                                    <input id="contraseña" type="password" class="datos form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña"  autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback w-100" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                            </div>

                            <div class="col-5 offset-1" id="divContra">

                                <input id="repContraseña" type="password" class="col-12 datos form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirmar Contraseña"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback w-100" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>

                        <button type="submit" id="registrar">
                            Registrarse
                        </button>

                        <a href="{{ route('login') }}" class="mt-3 link font">¿Ya tienes una cuenta?</a>

                    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>
</html>

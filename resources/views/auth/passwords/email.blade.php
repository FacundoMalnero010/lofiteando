<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" width=device-width, initial-scale=1.0>
        <link rel="shortcut icon" href="{{asset('images/lofiIcon.png')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('css/resetPassword.css')}}" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>{{env('APP_NAME')}}</title>
    </head>
    <body class="text-center">
        <main class="form-signin col-12 h-75 d-flex justify-content-center align-items-center">
            <div class="d-flex justify-content-center align-items-center col-3" id="contenedor">
                <form method="POST" action="{{ route('reestablecer') }}" id="form" class="d-flex justify-content-center align-items-center flex-column">
                    @csrf
                    <h1 class="mb-5">Restablecé tu contraseña</h1>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror w-75" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    <button class="w-75 btn btn-lg mt-5" type="submit" id="boton">Enviar</button>
                </form>
            </div>
        </main>
    </body>
</html>

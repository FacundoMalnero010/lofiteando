<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" width=device-width, initial-scale=1.0>
    <link rel="shortcut icon" href="{{asset('images/lofiIcon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/resetPassword.css')}}" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="{{asset('js/cambiarPassword.js')}}"></script>
    <title>{{env('APP_NAME')}}</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" id="todoElForm">
                <div class="card-header d-flex justify-content-center align-items-center">
                    <h3>Reestablecer Contraseña</h3>
                </div>

                <div class="card-body d-flex justify-content-center align-items-center" id="contenedorForm">
                    <form method="POST" action="{{ route('reestablecerPassword') }}" class="d-flex align-items-centre justify-content-centre flex-column col-8 needs-validation" novalidate>
                        @method('PATCH')
                        @csrf

                        <div class="row mb-3 d-flex justify-content-center align-items-center">
                            <div class="col-md-10">

                                <input id="password" type="password" class="form-control col-12" name="password" required autocomplete="new-password"
                                       placeholder="Nueva Contraseña">

                                <div class="invalid-feedback">
                                    La contraseña no puede estar vacía
                                </div>

                            </div>
                        </div>

                        <div class="row mb-0 d-flex justify-content-center align-items-center">
                            <div class="col-md-8 d-flex justify-content-center align-items-center">
                                <button type="submit" id="boton" class="btn">
                                    Resetear Contraseña
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

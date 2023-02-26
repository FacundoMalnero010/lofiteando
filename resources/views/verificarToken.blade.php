<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lofiteando</title>
    <link rel="shortcut icon" href="{{asset('images/lofiIcon.png')}}" type="image">
    <link rel="stylesheet" href={{asset('css/verificarToken.css')}}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    <div class="col-12 d-flex justify-content-center align-items-center h-100" id="fondo">
        <div class="col-4 h-50 d-flex justify-content-center align-items-center" id="containerForm">
            <form method="POST" action="{{route('confirmarPassword')}}" class="col-10 h-100 d-flex justify-content-center align-items-center flex-column">
                @csrf

                <h2><b>Reestablecer contraseña lofitera</b></h2>

                <input class="form-control mt-5" placeholder="Token" name="token" id="token">

                <button type="submit" class="mt-5 btn btn-success">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>

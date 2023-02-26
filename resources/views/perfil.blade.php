<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lofiteando</title>
    <link rel="shortcut icon" href="{{asset('images/lofiIcon.png')}}" type="image">
    <!--<link rel="stylesheet" href={{asset('css/perfil.css')}}>-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>

<div class="col-12 h-100 d-flex align-items-center" id="fondo">
    <a href="{{ route('home') }}" class="align-self-baseline mt-3 offset-1 col-1" id="casita">
        <img src="{{asset('images/home.png')}}" id="fotoCasita" class="col-6">
    </a>
    <form method="POST" id="form" action="{{ route('modificarPerfil') }}" class= "col-6 offset-1 p-5 border-dark g-3 d-flex justify-content-center align-items-center flex-column">
        <h1 class="text-center mb-4" id="titulo">Editá tu Usuario</h1>
        @csrf
        @method('PATCH')

        <div id="separacionDatos" class="d-flex justify-content-center align-items-center col-6 mt-3">

            <input id="usuario" type="text" class="col-5 mb-4 datos form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre" value="{{Auth::user()->name}}"  autocomplete="name" autofocus>

        </div>

        <div id="seccionUsuario" class="d-flex justify-content-center align-items-center col-6 mt-3">

            <input id="email" type="email" class="col-5 datos form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{Auth::user()->email}}"  autocomplete="email">

        </div>

        <button type="submit" id="cambios" class="mt-5 btn">
            Confirmar cambios
        </button>

    </form>
</div>
</body>
</html>

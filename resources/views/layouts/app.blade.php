<!doctype html>
<html lang="es">
<head>
    <title>{{env('APP_NAME')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('images/lofiIcon.png')}}" type="image">
    <link rel="stylesheet" href="{{asset('css/index.css')}}" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=AkayaKanadaka' rel='stylesheet'>
</head>
<body>

<div id="container">
    <div id="login" class="d-flex w-100 justify-content-end mr-5 mt-2">
        <button type="submit" class="logueo" onclick="location.href='{{route('register')}}'">Sign up</button>
        <button type="submit" class="logueo ml-1" onclick="location.href='{{route('login')}}'">Sign in</button>
    </div>
    <div id="logo">
        <img src="{{asset('images/logo1.jpg')}}" alt="logo" id="imagenLogo">
    </div>
    <div id="caracteristicas" class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8">
        <h1 class="caracteristica" id="carac1">Tu ambiente para distraerte/concentrarte</h1>
        <h1 class="caracteristica" id="carac2">Relax and chill</h1>
        <h1 class="caracteristica" id="carac3">Tu espacio seguro</h1>
        <h1 class="caracteristica" id="carac4">Las mejores playlists</h1>
    </div>
</div>


</body>
</html>

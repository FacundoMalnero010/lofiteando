<!doctype html>
<html lang="es">
<head>
    <title>{{env('APP_NAME')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('images/lofiIcon.png')}}" type="image">
    <!--<link rel="stylesheet" href="{{asset('css/index.css')}}" type="text/css">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=AkayaKanadaka' rel='stylesheet'>
</head>
<body>

<style>

    html,body{
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    #logo{
        min-height: 12%;
        width: 100%;
    }

    #container{
        width: 100%;
        height: 100%;
        background-image: url('../../../public/images/fondo.jpeg');
        filter: brightness(70%);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    @media(min-width:600px){
        #imagenLogo{
            width: 8%;
            border-radius: 50%;
            margin-left: 5%;
            filter: brightness(120%);
        }
    }

    @media(max-width:600px){
        #imagenLogo{
            visibility: hidden;
        }
    }

    #caracteristicas{
        display: flex;
        flex-direction: column;
        color: rgb(57, 44, 97);
    }

    @media(max-width:1200px){
        .caracteristica{
            margin-top: 10%;
            color: aliceblue;
            width: fit-content;
            font-family: 'Akaya Kanadaka';
        }
    }

    @media(min-width:1200px){
        .caracteristica{
            margin-top: 8%;
            color: aliceblue;
            width: fit-content;
            font-family: 'Akaya Kanadaka';
        }
    }

    @media(max-width:600px){
        .caracteristica{
            margin-top: 17%;
            color: aliceblue;
            width: fit-content;
            font-family: 'Akaya Kanadaka';
        }
    }

    #carac2,#carac4{
        align-self: flex-end;
    }

    #login{
        padding: 1%;
        max-height: 8%;
    }

    .logueo{
        border: 0;
        background-color: rgba(104, 100, 224, 0.4);
        border-radius: 10%;
        height: 40px;
        width: 100px;
        margin-left: 1%;
    }

    .logueo:hover{
        background-color: rgba(115, 112, 237, 0.8);
        height: 50px;
        width: 120px;
    }

    h1:hover{
        color: #77537F;
        -webkit-text-stroke: 1px aliceblue;
        font-size: 50px;
    }


</style>

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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" width=device-width, initial-scale=1.0>
    <link rel="shortcut icon" href="{{asset('images/lofiIcon.png')}}" type="image/x-icon">
    <!--<link rel="stylesheet" href="{{asset('css/login.css')}}" type="text/css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>{{env('APP_NAME')}}</title>
</head>

<body>

<style>

    html,body{
        width: 100%;
        height: 100%;
    }

    #container{
        width: 100%;
        height: 100%;
        background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRBFhLRAhpZ7sVBad26En2MgM4kspyjnTT4BA&usqp=CAU');
        filter: brightness(90%);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @media only screen and (min-width: 700px){
        #login{
            background-color: rgba(83,97,212,60%);
            border-radius: 6%;
        }
    }

    @media only screen and (max-width: 700px){ /*Esto también*/
        #login{
            background-color: rgba(83,97,212,60%);
            border-radius: 6%;
            height: 70%;
        }
    }

    #titulo{
        font-size: 60px;
        -webkit-text-stroke-color: whitesmoke;
        -webkit-text-stroke-width: 1px;
    }

    .font{
        font-size: 120%;
    }

    #email{
        background-color: rgba(217, 217, 217, 0.6);
        border: none;
    }

    #password{
        background-color: rgba(217, 217, 217, 0.6);
        border: none;
    }

    #ingreso{
        background-color: rgba(217, 217, 217, 0.6);
        border: none;
        color: black;
    }

    #ingreso:hover{
        background-color: rgba(65, 65, 65, 0.6);
        color: azure;
        transition: 0.75s ease-in-out;
    }

    .link{
        text-decoration: none;
        color: black;
    }

    .link:hover{
        text-decoration: none;
        color: white;
    }


</style>

<div id="container">
    <section class="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3" id="login">
        <div class="row justify-content-center">
            <h1 class="mt-5" id="titulo">Lofiteando</h1>
        </div>

        <div class="col-10 offset-1 justify-content-center">
            <form method="POST" action="{{ route('login') }}" class="mt-5">
                @csrf
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror font" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mt-4 font" placeholder="Contraseña" name="password" autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <button type="submit" id="ingreso" name="loguear" class="btn btn-primary col-6 mt-5 mb-4 offset-3 font">Ingresar</button>

                @if (Route::has('password.request'))
                    <div class="row justify-content-center">
                        <a class="link font" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                @endif

                <div class="row justify-content-center mb-4">
                    <a class="link font" href="{{route('register')}}"> Crear una cuenta </a>
                </div>
            </form>
        </div>
    </section>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</html>

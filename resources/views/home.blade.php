<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lofiteando</title>
    <link rel="shortcut icon" href="{{asset('images/lofiIcon.png')}}" type="image">
    <link href='https://fonts.googleapis.com/css?family=Akaya Kanadaka' rel='stylesheet'>
    <link rel="stylesheet" href={{asset('css/principal.css')}}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src={{asset('js/principal.js')}}></script>
</head>
<body onload="reloj()">
<video src="{{asset('videos/videoDia.mp4')}}" id="video" autoplay loop muted type="video/mp4"></video>
<div id="container" class="d-flex w-100">
    <div id="relojYCrono" class="row w-1oo d-flex justify-content-center align-items-center offset-1">
        <div id="reloj" class="col-3 mt-1">
            <p id="numeroReloj" class="col ml-5">00:00</p>
        </div>
        <div id="crono" class="col-2 offset-5 d-flex flex-row justify-content-center align-items-center">
            <div class="form-check form-switch col-3 offset-6">
                <input class="form-check-input" type="checkbox" id="fondoPantalla" onclick="cambiarFondo()">
            </div>
            <p id="numeroCrono" class="ml-4 mt-2 offset-2">00:00</p>
            <img src="{{asset('images/reloj-de-arena.png')}}" alt="comenzarCrono" id="imagenCrono" class="col-2" onclick="aparecerCrono()">
            <button id="botonCrono" class="btn btn-success" onclick="cronoFuncionando ? detenerCrono() : iniciarCrono()">Iniciar</button>
            <img src="{{asset('images/x.png')}}" id="cerrarCrono" class="ml-3" onclick="esconderCrono()">
        </div>
        <div class="dropdown col-1 offset-1" style="display: inline">
            <button class="btn btn-secondary dropdown-toggle" type="submit" data-bs-toggle="dropdown" aria-expanded="false" id="botonLogout">
                {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('editarPerfil') }}">Perfil</a></li>
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()">{{ __('Logout') }}</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="col-12 h-100 d-flex justify-content-around flex-wrap">
    <div class="col-3 d-flex align-items-center flex-column" id="to-do-list">
        <h2 class="mt-4 mb-3" id="tituloToDoList">TO-DO LIST</h2>

        @foreach($renglones as $renglon)
            <div class="d-flex justify-content-start offset-1 align-items-center col-12" id="contenedorRenglon">
                <form class="col-8 contenedorTareas d-flex justify-content-start align-self-baseline h-100" method="POST" action="{{ route('cumplirTarea') }}">
                    @method('PATCH')
                    @csrf

                    <input type="hidden" name="id" value="{{$renglon->id_renglon}}">

                    @if($renglon->cumplido == 0)
                        <button type="submit" class="text-decoration-none text-dark mt-3 bg-transparent border-0 align-self-end">
                            <img src="{{asset('images/cumplirTarea.png')}}" width="40px">
                        </button>
                    @endif

                    <textarea name="contenido" form="formConfirmarEdicion" class="renglon completos bbdd mt-3 col-9 h-50" maxlength="100" @if($renglon->cumplido != 2) disabled @endif style="
                        color: whitesmoke;
                        text-decoration: {{$renglon->cumplido != 1 ? 'none' : 'line-through'}};
                        text-decoration-color: black;
                        text-decoration-thickness: 2px;
                    ">{{ $renglon->contenido }}</textarea>
                </form>
                @if($renglon->cumplido == 0)
                    <form class="col-1 contenedorEditarTarea align-self-baseline d-flex align-items-baseline ml-5" method="POST" action="{{ route('editarTarea') }}">
                        @method('PATCH')
                        @csrf

                        <input type="hidden" name="id" value="{{$renglon->id_renglon}}">

                        <button type="submit" class="text-decoration-none text-dark bg-transparent border-0 align-self-baseline">
                            <img src="{{asset('images/lapizEditar.png')}}" width="30px">
                        </button>
                    </form>
                @endif

                @if($renglon->cumplido == 2)
                    <form class="col-1 contenedorActualizarTarea d-flex align-items-center justify-content-center" method="POST" action="{{ route('actualizarRenglon') }}" id="formConfirmarEdicion" name="formConfirmarEdicion">
                        @method('PATCH')
                        @csrf

                        <input type="hidden" name="id" value="{{$renglon->id_renglon}}">

                        <button type="submit" class="btn btn-success col-12 d-flex justify-content-center align-items-center">
                            <img src="{{asset('images/guardar.png')}}" width="30px">
                        </button>
                    </form>
                @endif

                <form class="col-1 contenedorEliminarTarea align-self-baseline d-flex align-items-baseline" method="POST" action="{{ route('eliminarTarea') }}">
                    @method('DELETE')
                    @csrf

                    <input type="hidden" name="id" value="{{$renglon->id_renglon}}">

                    <button type="submit" class="text-decoration-none text-dark bg-transparent border-0 align-self-baseline">
                        <img src="{{asset('images/cruzEliminar.png')}}" width="30px">
                    </button>
                </form>
            </div>
            @if(Session::has('error'))
                <span class="error text-danger">{{ Session::get('error') }}</span>
            @endif
        @endforeach

        @if(count($renglones) < 5)
            <textarea class="renglon mt-3 col-8" form="formCrearRenglon" name="contenido" maxlength="100"></textarea>
            <a href="javascript:void(0)" class="boton mt-3" onclick="document.getElementById('formCrearRenglon').submit()">Guardar</a>
        @endif
    </div>
    <div class=" col-3 d-flex justify-content-center align-items-center">
        <iframe
            width="600" height="500" src="https://www.youtube.com/embed/jfKfPfyJRdk" title="lofi hip hop radio - beats to relax/study to" frameborder="0" allow="accelerometer;
            autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" id="videoLofi" allowfullscreen>
        </iframe>
    </div>
    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/0vvXsWCC9xrXsKd4FyS8kM?utm_source=generator&theme=0" width="40%" height="80" frameBorder="0"
            allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy" id="reproductorSpotify">
    </iframe>
</div>

<form method="POST" style="display:none" action="{{ route('crearRenglon') }}" class="d-none" id="formCrearRenglon">
    @csrf
</form>

<form id="perfil-form" style="display:none" action="{{ route('editarPerfil') }}" method="POST" class="d-none">
    @csrf
</form>

<form id="logout-form" style="display:none" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<!--<script src="https://sdk.scdn.co/spotify-player.js"></script>
<script>
    window.onSpotifyWebPlaybackSDKReady = async () => {
        let authToken = 'BQBRrkZOLlMubklHmcfAhre4c1oGVBaL3wqQgfBSIUxRD48BMUO6Zr4I1aXvPMGyaevDo85rNHUSFW_YOCM3JiAZDnoezK8AQtf7JEEzU7Uk7hl6YhscHUYBiIZfN0LKsY_1gzYoxhoD_T6XEihgx7w0TAHu3ojIHQEvCH5mBr7LQQt47TMR3tDZviW9Vr47VWgyDg0';
        let client_id = '1f1e4d391dbb4e768547441d2b4942a3';
        let client_secret = '7fc46ced302f4d889ed0f3854aa685c7';

        const player = new Spotify.Player({
            name: 'Mi reproductor de Spotify',
            getOAuthToken: cb => {
                cb(authToken);
            },
        });

        const playlist = 'spotify:playlist:0vvXsWCC9xrXsKd4FyS8kM';

        function reproducir() {
            player.play(playlist);
        }
    };
</script>-->

</body>
</html>

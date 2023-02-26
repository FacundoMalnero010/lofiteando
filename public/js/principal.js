let minutosCrono = 0;
let segundosCrono = 0;
let cronoFuncionando = false;
let clicksReproducir = 0;

function aparecerCrono(){
    document.getElementById('numeroCrono').style.visibility = 'visible';
    document.getElementById('botonCrono').style.visibility = 'visible';
    document.getElementById('imagenCrono').style.visibility = 'hidden';
    document.getElementById('cerrarCrono').style.visibility = 'visible';
    document.getElementById('numeroCrono').innerHTML = '00:00';
}

function esconderCrono(){
    document.getElementById('numeroCrono').style.visibility = 'hidden';
    document.getElementById('botonCrono').style.visibility = 'hidden';
    document.getElementById('imagenCrono').style.visibility = 'visible';
    document.getElementById('cerrarCrono').style.visibility = 'hidden';
    document.getElementById('botonCrono').innerHTML = 'Iniciar';
    document.getElementById('botonCrono').className = 'btn btn-outline-success';
    detenerCrono();
}

let intervaloCrono;

function iniciarCrono(){
    document.getElementById('botonCrono').innerHTML = 'Detener';
    document.getElementById('botonCrono').className = 'btn btn-danger';
    cronoFuncionando = true;
    intervaloCrono = setInterval(aumentarCrono,1000);
}

function aumentarCrono(){
    if(segundosCrono < 59){
        segundosCrono++;
    }
    else{
        segundosCrono = 0;
        minutosCrono++;
    }

    if(minutosCrono === 0){
        if(segundosCrono < 10){
            document.getElementById('numeroCrono').innerHTML = '00:0'+segundosCrono;
        }
        else{
            document.getElementById('numeroCrono').innerHTML = '00:'+segundosCrono;
        }
    }
    else{
        if(minutosCrono < 10){
            if(segundosCrono < 10){
                document.getElementById('numeroCrono').innerHTML = '0'+minutosCrono+':0'+segundosCrono;
            }
            else{
                document.getElementById('numeroCrono').innerHTML = '0'+minutosCrono+':'+segundosCrono;
            }
        }
        else{
            if(segundosCrono < 10){
                document.getElementById('numeroCrono').innerHTML = minutosCrono+':0'+segundosCrono;
            }
            else{
                document.getElementById('numeroCrono').innerHTML = minutosCrono+':'+segundosCrono;
            }
        }
    }
}

function detenerCrono(){
    document.getElementById('botonCrono').className = 'btn btn-success';
    document.getElementById('botonCrono').innerHTML = 'Iniciar';
    clearInterval(intervaloCrono);
    minutosCrono = 0;
    segundosCrono = 0;
    document.getElementById('numeroCrono').innerHTML = '00:00';
    cronoFuncionando = false;
}

function reloj(){
    let tiempoActual = new Date();
    let hora = tiempoActual.getHours();
    let minutos = tiempoActual.getMinutes();
    let horario;

    if(minutos < 10){
        horario = hora+':0'+minutos;
    }
    else{
        horario = hora+':'+minutos;
    }

    document.getElementById('numeroReloj').innerHTML = horario;

    setTimeout(reloj, 1000);
}

function cambiarFondo(){
    console.log(document.getElementById('video').src);
    if(document.getElementById('fondoPantalla').checked){
        document.getElementById('video').src = '../videos/videoNoche.mp4';
    }
    else{
        document.getElementById('video').src = '../videos/videoDia.mp4';
    }
}

function cambiarBotonReproducir(){ //Revisar
    if(clicksReproducir % 2 === 0){
        document.getElementById('botonReproducir').src = '{{asset("images/botonReproducir.png")}}';
        clicksReproducir++;
    }
    else{
        document.getElementById('botonReproducir').src = '{{asset("images/botonPausa.png")}}';
        clicksReproducir++;
    }
    console.log(document.getElementById('botonReproducir').src);
}

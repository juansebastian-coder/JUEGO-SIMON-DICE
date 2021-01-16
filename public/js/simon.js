var keys = [];
var letrasSeleccionadas = [];
var niveles = [];
var puntaje = 0;
var indicardorNivel = 1;
var play = false;

//obtengo todos los botones del teclado
keys = document.getElementsByClassName("key");

document.addEventListener("keydown", function (tecla) {
    let contain = null;
    for (let index = 0; index < keys.length; index++) {
        if (keys[index].dataset.key == tecla.keyCode) {
            contain = keys[index];
        }
    }
    if (play == true && contain) {
        seleccionarTecla(contain);
    }
});

//  genero 10 niveles
function generarRandomNivel() {
    letrasSeleccionadas = [];
    niveles = [];
    indicardorNivel = 1;
    puntaje = 0;
    play = true;

    document.getElementById("registrar").style.display = "none";
    document.getElementById("nivel").innerHTML =
        "<h6> Nivel :" + indicardorNivel + "</h6>";
    document.getElementById("puntaje").innerHTML =
        "<h6> Puntaje :" + puntaje + "</h6>";

    for (let index = 0; index < keys.length; index++) {
        keys[index].classList.remove("active", "fail");
    }

    for (let index = 0; index < 4; index++) {
        niveles[index] = keys[getRandomArbitrary(25)];
        console.log(niveles[index]);
    }

    setTimeout(() => {
        pintarTeclado(0);
    }, 1000);
}

 function seleccionarTecla(e) {
    //  verificar cuantas teclas puso bien el usuario
    let contador = 0;
    if (play) {
        letrasSeleccionadas.push(e);
        e.classList.add("active");
        setTimeout(function () {
             e.classList.remove("active");
            if (letrasSeleccionadas.length == indicardorNivel) {
                for (
                    let index = 0;
                    index < letrasSeleccionadas.length;
                    index++
                ) {
                    if (
                        letrasSeleccionadas[index].dataset.key ==
                        niveles[index].dataset.key
                    ) {
                        contador++;
                    } 
                }

                if (contador == indicardorNivel) {
                    letrasSeleccionadas = [];
                    indicardorNivel++;
                    puntaje += 10;

                    var level = indicardorNivel;

                    document.getElementById("nivel").innerHTML =
                        "<h6> Nivel :" + indicardorNivel + "</h6>";
                    document.getElementById("puntaje").innerHTML =
                        "<h6> Puntaje :" + puntaje + "</h6>";

                    for (let index = 0; index < indicardorNivel; index++) {
                        setTimeout(() => {
                            pintarTeclado(index);
                        }, 2000); 
                    }
                } else {
                    finishFailPlay();
                    alert("HAS PERDIDO, VUELVE A INTENTARLO 😢");
                }

                if (indicardorNivel == 5) {
                    finishSuccessPlay();
                    alert("Felicidades has ganado 😃");
                }
            } else if (letrasSeleccionadas.length > indicardorNivel) {
                finishFailPlay();
                console.log("aqui");
                alert("HAS PERDIDO, VUELVE A INTENTARLO 😢");
            }
        }, 1500);
    }
}

// cambio el valor del background
 function pintarTeclado(index) {
    niveles[index].classList.add("active", "success");
         setTimeout(function () {
        niveles[index].classList.remove("active", "success");
    }, 2000);
}

// Retorna un número aleatorio entre min (incluido) y max (excluido)
function getRandomArbitrary(max) {
    return Math.round(Math.random() * max);
}

function setFailColor(iterator) {
    keys[iterator].classList.add("active", "fail");
}

function setSuccessColor(iterator) {
    keys[iterator].classList.add("active", "success");
}

function finishFailPlay() {
    play = false;
    for (let iterator = 0; iterator < keys.length; iterator++) {
        setFailColor(iterator);
    }
    letrasSeleccionadas = [];
    document.getElementById("registrar").style.display = "block";
}

function finishSuccessPlay() {
    play = false;
    for (let iterator = 0; iterator < keys.length; iterator++) {
        setSuccessColor(iterator);
    }
    letrasSeleccionadas = [];
    document.getElementById("registrar").style.display = "block";
}

function showModal() {
    document.getElementById("exampleModal").style.display = "block";
}

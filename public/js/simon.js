var keys = [];
var selectedLetters = [];
var levels = [];
var punctuation = 0;
var LevelIndicator = 1;
var play = false;
//obtengo todos los botones del teclado
keys = document.getElementsByClassName("key");




//  estoy a la escucha de cualquier tecla para agregar
//  su valor a la secuencia del usuario
document.addEventListener("keydown", function (tecla) {

    let contain = null;

    for (let index = 0; index < keys.length; index++) {
        if (keys[index].dataset.key == tecla.keyCode) {
            contain = keys[index];
        }
    }
    if (play == true && contain) {
        selecttKey(contain);
    }
});



//  genero 10 niveles, o secuencias aleatorias
function generateRandomLevel() {

    selectedLetters = [];
    levels = [];
    LevelIndicator = 1;
    punctuation = 0;
    play = true;
    document.getElementById('name').value = null;

     document.getElementById("list-punctutation").innerHTML = '';


    document.getElementById("register").style.display = "none";
    document.getElementById("div-level").innerHTML =
        "<h6> Nivel :" + LevelIndicator + "</h6>";
    document.getElementById("div-punctuation").innerHTML =
        "<h6> Puntaje :" + punctuation + "</h6>";

    for (let index = 0; index < keys.length; index++) {
        keys[index].classList.remove("active", "fail");
    }

    for (let index = 0; index < 10; index++) {
        levels[index] = keys[getRandomArbitrary(25)];
        //console.log(levels[index]);
    }

    setTimeout(() => {
        paintKeyboard(0);
    }, 1000);
}

function selecttKey(e) {

    //  verificar cuantas teclas puso bien el usuario
    let contador = 0;

    if (play) {
        selectedLetters.push(e);
        e.classList.add("active");
        setTimeout(() => {
            e.classList.remove("active");
            if (selectedLetters.length == LevelIndicator) {
                for (
                    let index = 0;
                    index < selectedLetters.length;
                    index++
                ) {
                    if (
                        selectedLetters[index].dataset.key ==
                        levels[index].dataset.key
                    ) {
                        contador++;
                    }
                }

                if (contador == LevelIndicator) {
                    selectedLetters = [];
                    LevelIndicator++;
                    punctuation += 10;


                    document.getElementById("div-level").innerHTML =
                        LevelIndicator == 11 ?
                            "<h6> Nivel :" + 10 + "</h6>" : "<h6> Nivel :"+ LevelIndicator + "</h6>" ;
                    document.getElementById("div-punctuation").innerHTML =
                        "<h6> Puntaje :" + punctuation + "</h6>";
                    var timeSet = 2000;
                    for (let index = 0; index < LevelIndicator; index++) {
                        setTimeout(() => {
                            paintKeyboard(index);
                        }, timeSet);
                        timeSet += 1200
                    }



                } else {
                    finishFailPlay();
                    alert("HAS PERDIDO, VUELVE A INTENTARLO 😢");
                }

                if (LevelIndicator == 11) {
                    finishSuccessPlay();
                    alert("Felicidades has ganado 😃");
                }
            } else if (selectedLetters.length > LevelIndicator) {
                finishFailPlay();
                console.log("aqui");
                alert("HAS PERDIDO, VUELVE A INTENTARLO 😢");
            }
        }, 1000);
    }
}


// pinta los botones del teclado en pantalla
function paintKeyboard(index) {
    levels[index].classList.add("active", "success");
    setTimeout(() => {
        levels[index].classList.remove("active", "success");
    }, 900);
}


// Retorna un número aleatorio entre min (incluido) y max (excluido)
function getRandomArbitrary(max) {
    return Math.round(Math.random() * max);
}


// se agrega clase fail , color rojo que idica fallo
function setFailColor(iterator) {
    keys[iterator].classList.add("active", "fail");
}



// se agrega clase success , color verde que idica exito
function setSuccessColor(iterator) {
    keys[iterator].classList.add("active", "success");
}


//  finaliza el proceso de manera fallida
function finishFailPlay() {
    play = false;
    for (let iterator = 0; iterator < keys.length; iterator++) {
        setFailColor(iterator);
    }
    selectedLetters = [];
    document.getElementById("register").style.display = "block";
}


//  finaliza el proceso de manera exitosa
function finishSuccessPlay() {
    play = false;
    for (let iterator = 0; iterator < keys.length; iterator++) {
        setSuccessColor(iterator);
    }
    selectedLetters = [];
    document.getElementById("register").style.display = "block";
}


//abre la modal de registro de datos
function showModal() {

    document.getElementById("punctuation").value = punctuation;
    document.getElementById("level").value = LevelIndicator - 1;
    document.getElementById("exampleModal").style.display = "block";
}
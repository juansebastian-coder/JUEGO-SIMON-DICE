<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/simon.css">
    <title>SIMON DICE</title>
</head>

<body>
    <div class="keyboard">

        <strong class="text-center mt-5">
            <h1 class="mb-4">BIENVENIDO A SIMON DICE</h1>
            <div id="div-level"></div>
            <div id="div-punctuation"></div>
        </strong>
        <div class="d-flex justify-content-center">
            <div class="row w-75  ">
                <button class=" col-12 mb-3 btn btn-info  w-50" onclick="generateRandomLevel()">EMPEZAR JUEGO</button>
                <div id="register" class=" col-12 btn btn-warning w-50 text-white" onclick="showModal()">
                    REGISTRA TUS RESULTADOS
                </div>
            </div>
        </div>

        <div class="row">
            <div class="key" onclick="selecttKey(this)" data-key="81">q</div>
            <div class="key" onclick="selecttKey(this)" data-key="87">w</div>
            <div class="key" onclick="selecttKey(this)" data-key="69">e</div>
            <div class="key" onclick="selecttKey(this)" data-key="82">r</div>
            <div class="key" onclick="selecttKey(this)" data-key="84">t</div>
            <div class="key" onclick="selecttKey(this)" data-key="89">y</div>
            <div class="key" onclick="selecttKey(this)" data-key="85">u</div>
            <div class="key" onclick="selecttKey(this)" data-key="73">i</div>
            <div class="key" onclick="selecttKey(this)" data-key="79">o</div>
            <div class="key" onclick="selecttKey(this)" data-key="80">p</div>
        </div>

        <div class="row">
            <div class="key" onclick="selecttKey(this)" data-key="65">a</div>
            <div class="key" onclick="selecttKey(this)" data-key="83">s</div>
            <div class="key" onclick="selecttKey(this)" data-key="68">d</div>
            <div class="key" onclick="selecttKey(this)" data-key="70">f</div>
            <div class="key" onclick="selecttKey(this)" data-key="71">g</div>
            <div class="key" onclick="selecttKey(this)" data-key="72">h</div>
            <div class="key" onclick="selecttKey(this)" data-key="74">j</div>
            <div class="key" onclick="selecttKey(this)" data-key="75">k</div>
            <div class="key" onclick="selecttKey(this)" data-key="76">l</div>
        </div>

        <div class="row last">
            <div class="key" onclick="selecttKey(this)" data-key="90">z</div>
            <div class="key" onclick="selecttKey(this)" data-key="88">x</div>
            <div class="key" onclick="selecttKey(this)" data-key="67">c</div>
            <div class="key" onclick="selecttKey(this)" data-key="86">v</div>
            <div class="key" onclick="selecttKey(this)" data-key="66">b</div>
            <div class="key" onclick="selecttKey(this)" data-key="78">n</div>
            <div class="key" onclick="selecttKey(this)" data-key="77">m</div>
        </div>
    </div>


    <div>

        @include('modal')

        <div id="list-punctutation" class="mt-5">

        </div>

    </div>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="\js\simon.js"></script>


</body>

</html>


<!-- <style>

    @keyframes anim{
    0% {color: rgb(255, 255, 94);} /*Amarillo*/
   25% {color: rgb(61, 255, 213);} /*Naranja*/
   50% {color: rgb(83, 255, 141);} /*Negro*/
   75% {color: rgb(255, 255, 94);} /*Otra vez naranja*/
  100% {color: rgb(61, 255, 213);} /*Otra vez amarillo*/
}
h1 {
  animation-name: anim;
  animation-duration: 5s;
  animation-iteration-count: infinite;
}
</style> -->
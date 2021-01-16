<!-- Modal -->
<div style="display: none;" class="modal" id="exampleModal" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Guardar Resultado</h5>
                <button type="button" class="close" onclick="hideModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <label class="text-black" for="name">Nombre Participante</label>
                    <input type="text" id="name" class="form-control" placeholder="Ingresa tu nombre">
                    <input type="hidden" id="token" value="{{csrf_token()}}">

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="hideModal()" >Cerrar</button>
                <button type="submit" required class="btn btn-primary" onclick="registrar() ">Guardar</button>
            </div>
        </div>
    </div>
</div>



<script>
    function registrar() {
        if(document.getElementById('name').value!='' &&
        document.getElementById('name').value!=null){

       
        fetch("{{url('/register-game')}}", {
            headers: {
                'X-CSRF-TOKEN': document.getElementById('token').getAttribute('value'),
                'Content-Type': 'application/json'
            },
            method: 'POST',
            body: JSON.stringify({
                name: document.getElementById('name').value,
                punctuation: puntaje,
                level: indicardorNivel,
            })
        })
            .then(function (response) {
                if (response.ok) {
                    return response.text()
                } else {
                    throw "Error en la llamada Ajax";
                }

            })
            .then(function (texto) {
                console.log(texto);
                hideModal();
                document.getElementById('list-punctutation').innerHTML= texto;
                window.location.href = '#list-punctutation';
             })
            .catch(function (err) {
                console.log(err);
                hideModal();
            });

         }else{
             alert('TÚ NOMBRE ES NECESARIO PARA EL REGISTRO 😊');
         }
    }



    function hideModal(){
             document.getElementById('exampleModal').style.display = 'none'
            
    }
</script>



<style>
    .text-black {
        color: black;
        font-weight: bold;

    }
</style>
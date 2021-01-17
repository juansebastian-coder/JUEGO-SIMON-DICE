<div style="display: none" class="modal" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="exampleModalLabel">
                    Guardar Resultado
                </h5>
                <button type="button" class="close" onclick="hideModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="text-black" for="name"
                            >Nombre Participante</label
                        >
                        <input
                            type="text"
                            id="name"
                            class="form-control"
                            placeholder="Ingresa tu nombre"
                        />
                        <input
                            type="hidden"
                            id="token"
                            value="{{ csrf_token() }}"
                        />
                    </div>
                    <div class="form-group">
                        <label class="text-black" for="punctuation"
                            >Puntaje</label
                        >
                        <input
                            type="text"
                            id="punctuation"
                            class="form-control"
                            disabled
                        />
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="level"
                            >Niveles Acertados</label
                        >
                        <input
                            type="text"
                            id="level"
                            class="form-control"
                            disabled
                        />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    onclick="hideModal()"
                >
                    Cerrar
                </button>
                <button
                    type="submit"
                    required
                    class="btn btn-primary"
                    onclick="register() "
                >
                    Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function register() {
        // envio hecho con Fetch, registra los datos del cliente, puntaje y nivel
        if (
            document.getElementById("name").value != "" &&
            document.getElementById("name").value != null
        ) {
            fetch("{{url('/register-game')}}", {
                headers: {
                    "X-CSRF-TOKEN": document
                        .getElementById("token")
                        .getAttribute("value"),
                    "Content-Type": "application/json",
                },
                method: "POST",
                body: JSON.stringify({
                    name: document.getElementById("name").value,
                    punctuation: punctuation,
                    level: LevelIndicator - 1,
                }),
            })
                .then(function (response) {
                    if (response.ok) {
                        return response.text();
                    } else {
                        throw "Error en la llamada Ajax";
                    }
                })
                .then(function (data) {
                    hideModal();
                    document.getElementById(
                        "list-punctutation"
                    ).innerHTML = data;
                    window.location.href = "#list-punctutation";
                })
                .catch(function (err) {
                    console.log(err);
                    hideModal();
                });
        } else {
            alert("TÚ NOMBRE ES NECESARIO PARA EL REGISTRO 😊");
        }
    }

    //  cierra la modal
    function hideModal() {
        document.getElementById("exampleModal").style.display = "none";
    }
</script>

<style>
    .text-black {
        color: black;
        font-weight: bold;
    }
</style>

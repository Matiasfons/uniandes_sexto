<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card w-100">
                <h5 class="card-title fw-semibold mb-4">Lista de Profesores</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_profesores" onclick="generar()">
                        Nuevo Profesor
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombre</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Materia</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Salario</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Escuela</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_profesores">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_profesores" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_profesores">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Profesores</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ID_profesor" id="ID_profesor">
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" onfocusout="profesores_repetida();" required class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
                        <div class="alert alert-danger d-none" role="alert" id="errorPredio">
                        </div>
                        <div class="alert alert-danger d-none" role="alert" id="ProfesoresRepetida">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Materia">Materia</label>
                        <input type="text" required class="form-control" id="Materia" name="Materia" placeholder="Materia">
                    </div>
                    <div class="form-group">
                        <label for="Salario">Salario</label>
                        <input type="text" oninput="soloNumeros(event);" required class="form-control" id="Salario" name="Salario" placeholder="Salario">
                    </div>

                    <div class="form-group">
                        <label for="ID_escuela">Escuelas</label>
                        <select name="ID_escuela" id="ID_escuela" class="form-control">
                        </select>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once('../html/script2.php') ?>
<script src="./profesores.controller.js"></script>
<script src="./profesores.model.js"></script>
<script>
    function soloNumeros(event) {
        // Obtener el valor actual del campo
        var valorCampo = event.target.value;

        // Reemplazar cualquier carácter que no sea un número con una cadena vacía
        var nuevoValor = valorCampo.replace(/[^0-9]/g, '');

        // Actualizar el valor del campo con el nuevo valor
        event.target.value = nuevoValor;

        // Llamar a otras funciones, como algoritmo_cedula y cedula_repetida, si es necesario
        algoritmo_cedula();
        cedula_repetida();
    }
</script>
<!--Solo letras al ingresar los nombres y apellidos-->
<script>
    function soloLetras(event) {
        // Obtener el valor actual del campo
        var valorCampo = event.target.value;

        // Reemplazar cualquier carácter que no sea una letra con una cadena vacía
        var nuevoValor = valorCampo.replace(/[^a-zA-Z]/g, '');

        // Actualizar el valor del campo con el nuevo valor
        event.target.value = nuevoValor;
    }
</script>

<script>
    async function generar() {
        const select = document.getElementById("ID_escuela");
        select.innerHTML = "";

        var response = await fetch("../../Controllers/escuelas.controller.php?op=todos", {
            method: "GET"
        });
        var decodeData = await response.json();
        let listOfShools = decodeData;
        const options = [];
        listOfShools.forEach(element => {
            options.push({
                value: element.ID_escuela,
                text: element.Nombre
            }, );
        });


        for (const option of options) {
            const newOption = document.createElement("option");
            newOption.value = option.value;
            newOption.textContent = option.text;
            select.appendChild(newOption);
        }
    }
</script>

</script>
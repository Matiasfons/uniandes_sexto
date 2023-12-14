<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card w-100">
                <h5 class="card-title fw-semibold mb-4">Lista de Escuelas</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_escuelas">
                        Nueva Escuela
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
                                    <h6 class="fw-semibold mb-0">Ciudad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nivel_educativo</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_escuela">

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
<div class="modal fade" id="Modal_escuelas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_escuela">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Escuelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ID_escuela" id="ID_escuela">
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" onfocusout="escuela_repetida();" required class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
                        <div class="alert alert-danger d-none" role="alert" id="errorPredio">
                        </div>
                        <div class="alert alert-danger d-none" role="alert" id="EscuelaRepetida">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Ciudad">Ciudad</label>
                        <input type="text" required class="form-control" id="Ciudad" name="Ciudad" placeholder="Ciudad">
                    </div>

                    <div class="form-group">
                        <label for="Nivel_educativo">Nivel_educativo</label>
                        <select name="Nivel_educativo" id="Nivel_educativo" class="form-control">
                            <option value="EducacionInicial">Educación inicial</option>
                            <option value="EducacionPrimaria">Educación primaria</option>
                            <option value="EducacionSecundaria">Educación secundaria</option>
                            <option value="EducacionSuperior">Educación Superior</option>

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
<script src="./escuelas.model.js"></script>
<script src="./escuelas.controllers.js"></script>


</script>
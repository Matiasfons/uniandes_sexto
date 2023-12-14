<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card w-100">
                <h5 class="card-title fw-semibold mb-4">Lista de Casas</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_casas">
                        Nueva Casa
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Propietario</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Valor</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Direccion</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Ciudad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Telefono</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Estado</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Identificador</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_casas">

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
<div class="modal fade" id="Modal_casas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_casas">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Casas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="CasaId" id="CasaId">

                    <div class="form-group">
                        <label for="Propietario">Propietario</label>
                        <input type="text" required class="form-control" id="Propietario" name="Propietario" placeholder="Propietario">
                    </div>
                    <div class="form-group">
                        <label for="Valor">Valor</label>
                        <input type="text" required class="form-control" id="Valor" name="Valor" placeholder="Valor">
                    </div>
                    <div class="form-group">
                        <label for="Direccion">Direccion</label>
                        <input type="text" required class="form-control" id="Direccion" name="Direccion" placeholder="Direccion">
                    </div>
                    <div class="form-group">
                        <label for="Ciudad">Ciudad</label>
                        <input type="text" required class="form-control" id="Ciudad" name="Ciudad" placeholder="Ciudad">
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Telefono</label>
                        <input type="text" required class="form-control" id="Telefono" name="Telefono" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <label for="Estado">Estado</label>
                        <select name="Estado" id="Estado" class="form-control">
                            <option value="Natural">Natural</option>
                            <option value="Juridico">Juridico</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Identeificador">Identificador del Predio</label>
                        <input type="text" onfocusout="predio_repetida();" required class="form-control" id="Identeificador" name="Identeificador" placeholder="Identeificador">
                        <div class="alert alert-danger d-none" role="alert" id="errorPredio">
                        </div>
                        <div class="alert alert-danger d-none" role="alert" id="PredioaRepetida">
                        </div>
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
<script src="casas.model.js"></script>
<script src="casa.controllers.js"></script>


</script>
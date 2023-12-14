
class EscuelaModel {
    constructor(
        ID_escuela,
        Nombre,
        Ciudad,
        Nivel_educativo,
        data,
        Ruta

    ) {
        this.ID_escuela = ID_escuela;
        this.Nombre = Nombre;
        this.Ciudad = Ciudad;
        this.Nivel_educativo = Nivel_educativo;
        this.data = data;
        this.Ruta = Ruta;


    }
    uno() {
        var ID_escuela = this.ID_escuela;
        console.log(ID_escuela);
        $.post(
            "../../Controllers/escuelas.controller.php?op=uno",
            { ID_escuela: ID_escuela },
            (res) => {
                console.log(res);
                res = JSON.parse(res);
                $("#ID_escuela").val(res.ID_escuela);
                $("#Nombre").val(res.Nombre);
                $("#Ciudad").val(res.Ciudad);
                $("#Nivel_educativo").val(res.Nivel_educativo);
            }
        );
        $("#Modal_escuelas").modal("show");
    }
    todos() {

        var html = "";
        $.get("../../Controllers/escuelas.controller.php?op=" + this.Ruta, (res) => {
            res = JSON.parse(res);
            $.each(res, (index, valor) => {
                var fondo;
                if (valor.Nivel_educativo == "EducacionInicial") fondo = "bg-primary"

                else if (valor.Nivel_educativo == "EducacionPrimaria") fondo = "bg-info"
                else if (valor.Nivel_educativo == "EducacionSecundaria") fondo = "bg-primary"
                else if (valor.Nivel_educativo == "EducacionSuperior") fondo = "bg-info"

                html += `<tr>
                      <td>${index + 1}</td>
                      <td>${valor.Nombre}</td>
                      <td>${valor.Ciudad}</td>
                      <td><div class="d-flex align-items-center gap-2">
                      <span class="badge ${fondo} rounded-3 fw-semibold">${valor.Nivel_educativo}</span>
                  </div></td>    
                  <td>
                  <button class='btn btn-success' onclick='editar(${valor.ID_escuela
                    })'>Editar</button>
                  <button class='btn btn-danger' onclick='eliminar(${valor.ID_escuela
                    })'>Eliminar</button>
                  <button class='btn btn-info' onclick='ver(${valor.ID_escuela
                    })'>Ver</button>
                  </td></tr>
                      `;
            });
            $("#tabla_escuela").html(html);
        });
    }

    insertar() {
        var dato = new FormData();
        dato = this.data;
        $.ajax({
            url: "../../Controllers/escuelas.controller.php?op=insertar",
            type: "POST",
            data: dato,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if (res === "ok") {
                    Swal.fire("Escuela", "Escuela Registrada", "success");
                    todos_controlador();
                } else {
                    Swal.fire("Error", res, "error");
                }
            }
        });
        this.limpia_Cajas();
    }

    escuela_repetida() {
        var Nombre = this.Nombre;

        $.post("../../Controllers/escuelas.controller.php?op=escuela_repetida", { Nombre: Nombre }, (res) => {
            res = JSON.parse(res);
            if (parseInt(res.escuela_repetida) > 0) {
                $('#EscuelaRepetida').removeClass('d-none');
                $('#EscuelaRepetida').html('La Escuela que intenta registrar, ya exite en la base de datos');
                $('button').prop('disabled', true);
            } else {
                $('#EscuelaRepetida').addClass('d-none');
                $('button').prop('disabled', false);
            }

        })
    }

    editar() {
        var dato = new FormData();
        dato = this.data;
        $.ajax({
            url: "../../Controllers/escuelas.controller.php?op=actualizar",
            type: "POST",
            data: dato,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if (res === "ok") {
                    Swal.fire("Escuela", "Escuela Actualizada", "success");
                    todos_controlador();
                } else {
                    Swal.fire("Error", res, "error");
                }
            },
        });
        this.limpia_Cajas();
    }
    eliminar() {
        var ID_escuela = this.ID_escuela;

        Swal.fire({
            title: "Escuelas",
            text: "Esta seguro de eliminar la escuela?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Eliminar",
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(
                    "../../Controllers/escuelas.controller.php?op=eliminar",
                    { ID_escuela: ID_escuela },
                    (res) => {
                        console.log(res);

                        res = JSON.parse(res);
                        if (res === "ok") {
                            Swal.fire("Escuela", "Escuela Eliminada", "success");
                            todos_controlador();
                        } else {
                            Swal.fire("Error", res, "error");
                        }
                    }
                );
            }
        });

        this.limpia_Cajas();
    }

    limpia_Cajas() {
        document.getElementById("Nombre").value = "";
        document.getElementById("Ciudad").value = "";
        document.getElementById("Nivel_educativo").value = "";
        $("#Modal_escuelas").modal("hide");
    }
}

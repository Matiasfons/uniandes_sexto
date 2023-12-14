
class ProfesoresModel {
    constructor(
        ID_profesor,
        ID_escuela,
        Nombre,
        Materia,
        Salario,
        data,
        Ruta

    ) {
        this.ID_profesor = ID_profesor;
        this.ID_escuela = ID_escuela;
        this.Nombre = Nombre;
        this.Materia = Materia;
        this.Salario = Salario;
        this.data = data;
        this.Ruta = Ruta;


    }
    uno() {
        var ID_profesor = this.ID_profesor;
        console.log(ID_profesor);
        $.post(
            "../../Controllers/profesores.controller.php?op=uno",
            { ID_profesor: ID_profesor },
            (res) => {
                console.log(res);
                res = JSON.parse(res);
                $("#ID_profesor").val(res.ID_profesor);
                $("#ID_escuela").val(res.ID_escuela);
                $("#Nombre").val(res.Nombre);
                $("#Materia").val(res.Materia);
                $("#Salario").val(res.Salario);
               

            }
        );
        $("#Modal_profesores").modal("show");
    }
    async todos() {
        var response = await this.getInfoSchool();
        var decodeData = await response.json();
        let listOfShools = decodeData;
        var html = "";
        $.get("../../Controllers/profesores.controller.php?op=" + this.Ruta, (res) => {
            res = JSON.parse(res);

            $.each(res, (index, valor) => {

                html += `<tr>
                      <td>${index + 1}</td>
                      <td>${valor.Nombre}</td>
                      <td>${valor.Materia}</td>
                      <td>${valor.Salario}</td>
                      <td>${this.generateName(listOfShools, valor.ID_escuela)}</td>

                    
                  <td>
                  <button class='btn btn-success' onclick='editar(${valor.ID_profesor
                    })'>Editar</button>
                  <button class='btn btn-danger' onclick='eliminar(${valor.ID_profesor
                    })'>Eliminar</button>
                  <button class='btn btn-info' onclick='ver(${valor.ID_profesor
                    })'>Ver</button>
                  </td></tr>
                      `;
            });
            $("#tabla_profesores").html(html);
        });
    }

    generateName(list, id) {
        let name = list.find(item => item.ID_escuela == id);
        return name.Nombre;

    }
    async getInfoSchool() {

        var response = await fetch("../../Controllers/escuelas.controller.php?op=todos", { method: "GET" });
        return response;

    }

    insertar() {
        var dato = new FormData();
        dato = this.data;
        $.ajax({
            url: "../../Controllers/profesores.controller.php?op=insertar",
            type: "POST",
            data: dato,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if (res === "ok") {
                    Swal.fire("Profesores", "Profesor Registrado", "success");
                    todos_controlador();
                } else {
                    Swal.fire("Error", res, "error");
                }
            }
        });
        this.limpia_Cajas();
    }

    profesores_repetida() {
        var Nombre = this.Nombre;

        $.post("../../Controllers/profesores.controller.php?op=profesores_repetida", { Nombre: Nombre }, (res) => {
            res = JSON.parse(res);
            if (parseInt(res.profesores_repetida) > 0) {
                $('#ProfesoresRepetida').removeClass('d-none');
                $('#ProfesoresRepetida').html('El profesor que intenta registrar, ya exite en la base de datos');
                $('button').prop('disabled', true);
            } else {
                $('#ProfesoresRepetida').addClass('d-none');
                $('button').prop('disabled', false);
            }

        })
    }

    editar() {
        var dato = new FormData();
        dato = this.data;
        $.ajax({
            url: "../../Controllers/profesores.controller.php?op=actualizar",
            type: "POST",
            data: dato,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if (res === "ok") {
                    Swal.fire("Profesores", "Profesor Actualizado", "success");
                    todos_controlador();
                } else {
                    Swal.fire("Error", res, "error");
                }
            },
        });
        this.limpia_Cajas();
    }
    eliminar() {
        var ID_profesor = this.ID_profesor;

        Swal.fire({
            title: "Profesores",
            text: "Esta seguro de eliminar el profesor?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Eliminar",
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(
                    "../../Controllers/profesores.controller.php?op=eliminar",
                    { ID_profesor: ID_profesor },
                    (res) => {
                        console.log(res);

                        res = JSON.parse(res);
                        if (res === "ok") {
                            Swal.fire("Profesor", "Profesor Eliminado", "success");
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
        document.getElementById("Materia").value = "";
        document.getElementById("Salario").value = "";
        document.getElementById("ID_escuela").value = "";

        $("#Modal_profesores").modal("hide");
    }
}


class Casas_Model {
    constructor(
      CasaId,
      Propietario,
      Valor,
      Direccion,
      Ciudad,
      Telefono,
      Estado,
      PredioId,
      data,
      Ruta
    ) {
      this.CasaId = CasaId;
      this.Propietario = Propietario;
      this.Valor = Valor;
      this.PredioId = PredioId;
      this.Telefono = Telefono;
      this.Direccion = Direccion;
      this.Ciudad = Ciudad;
      this.Estado = Estado;
      this.data = data;
      this.Ruta = Ruta;
    }
    todos() {
      
      var html = "";
      $.get("../../Controllers/casas.controller.php?op=" + this.Ruta, (res) => {
        res = JSON.parse(res);
        $.each(res, (index, valor) => {
          var fondo;
          if (valor.Estado == "Natural") fondo = "bg-primary"
  
          else if (valor.Estado == "Juridico") fondo = "bg-info"
          html += `<tr>
                  <td>${index + 1}</td>
                  <td>${valor.Propietario}</td>
                  <td>${valor.Valor}</td>
                  <td>${valor.Direccion}</td>
                  <td>${valor.Ciudad}</td>
                  <td>${valor.Telefono}</td>
                  <td><div class="d-flex align-items-center gap-2">
                  <span class="badge ${fondo} rounded-3 fw-semibold">${valor.Estado}</span>
              </div></td>
              <td>${valor.PredioId}</td>
  
              <td>
              <button class='btn btn-success' onclick='editar(${valor.CasaId
            })'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${valor.CasaId
            })'>Eliminar</button>
              <button class='btn btn-info' onclick='ver(${valor.CasaId
            })'>Ver</button>
              </td></tr>
                  `;
        });
        $("#tabla_casas").html(html);
      });
    }
  
    insertar() {
      var dato = new FormData();
      dato = this.data;
      $.ajax({
        url: "../../Controllers/casas.controller.php?op=insertar",
        type: "POST",
        data: dato,
        contentType: false,
        processData: false,
        success: function (res) {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("casas", "Casa Registrada", "success");
            todos_controlador();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      });
      this.limpia_Cajas();
    }
  
    predio_repetida() {
      var PredioId = this.PredioId;
     
      $.post("../../Controllers/casas.controller.php?op=predio_repetida", { PredioId: PredioId }, (res) => {
        res = JSON.parse(res);
        if (parseInt(res.predio_repetida) > 0) {
          $('#PredioaRepetida').removeClass('d-none');
          $('#PredioaRepetida').html('El predio que intenta registrar, ya exite en la base de datos');
          $('button').prop('disabled', true);
        } else {
          $('#PredioaRepetida').addClass('d-none');
          $('button').prop('disabled', false);
        }
  
      })
    }
  
    verifica_correo() {
      var Correo = this.Correo;
      $.post("../../Controllers/usuario.controller.php?op=verifica_correo", { Correo: Correo }, (res) => {
        res = JSON.parse(res);
        if (parseInt(res.cedula_repetida) > 0) {
          $('#CorreoRepetido').removeClass('d-none');
          $('#CorreoRepetido').html('El correo ingresado, ya exite en la base de datos');
          $('button').prop('disabled', true);
        } else {
          $('#CorreoRepetido').addClass('d-none');
          $('button').prop('disabled', false);
        }
      })
    }
  
    limpia_Cajas() {
      document.getElementById("Propietario").value = "";
      document.getElementById("Valor").value = "";
      document.getElementById("Direccion").value = "";
      document.getElementById("Ciudad").value = "";
      document.getElementById("Telefono").value = "";
      document.getElementById("Identeificador").value = "";
      document.getElementById("Estado").value = "";
      $("#Modal_usuario").modal("hide");
    }
  }
  
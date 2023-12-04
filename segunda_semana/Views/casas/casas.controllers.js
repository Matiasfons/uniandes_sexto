//archivo de donde llamar al procedimiento
//controlador

function init() {
    $("#form_casas").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$().ready(() => {
    console.log("llego");
    todos_controlador();
});

var todos_controlador = () => {

    var todos = new Casas_Model(
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        'todos',
    )
    todos.todos();
}

var guardaryeditar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#form_casas")[0]);
    var casas = new Casas_Model(
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        formData,
        'insertar',
    )
    casas.insertar();
}



var predio_repetida = () => {
    var identificador = $('#Identeificador').val();
    var casas = new Casas_Model(
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        identificador,
        "",
        'predio_repetida',
    )
    casas.predio_repetida();
}
var verifica_correo = () => {
    var Correo = $('#Correo').val();
    var usuarios = new Usuarios_Model('', '', '', '', '', Correo, '', '', 'verifica_correo');
    usuarios.verifica_correo();
}

var verifica_contrasenias = () => {
    var Contrasenia = $('#Contrasenia').val();
    var Contrasenia2 = $('#Contrasenia2').val();
    if (Contrasenia == Contrasenia2) {
        $('#errorContrasenia').addClass('d-none');
        $('button').prop('disabled', false);
    } else {
        $('#errorContrasenia').removeClass('d-none');
        $('#errorContrasenia').html('Las contraseñas no coinciden');
        $('button').prop('disabled', true);
    }

}

    ; init();

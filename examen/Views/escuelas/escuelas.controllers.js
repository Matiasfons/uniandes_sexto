//archivo de donde llamar al procedimiento
//controlador

function init() {
    $("#form_escuela").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$().ready(() => {
    console.log("llego");
    todos_controlador();
});

var todos_controlador = () => {

    var todos = new EscuelaModel(
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
    var formData = new FormData($("#form_escuela")[0]);
    console.log($("#form_escuela")[0]);
    var ID_escuela = document.getElementById("ID_escuela").value
    if (ID_escuela > 0) {
        var escuelas = new EscuelaModel(

            '',
            '',
            '',
            '',
            formData,
            'editar',
        )
        escuelas.editar();
    } else {
        var escuelas = new EscuelaModel(

            '',
            '',
            '',
            '',
            formData,
            'insertar',
        );
        escuelas.insertar();
    }
}


var editar = (ID_escuela) => {
    var uno = new EscuelaModel(
        ID_escuela,
        '',
        '',
        '',
        '',
        'uno',
    )
    uno.uno();
};
var escuela_repetida = () => {
    var identificador = $('#Nombre').val();
    var escuelas = new EscuelaModel(
        '',
        identificador,

        '',
        "",
        "",
        'escuela_repetida',
    )
    escuelas.escuela_repetida();
}
var eliminar = (ID_escuela) => {
    var eliminar = new EscuelaModel(
        ID_escuela,
        '',
        '',
        '',
        '',
        'eliminar',
    )
    eliminar.eliminar();
}


    ; init();

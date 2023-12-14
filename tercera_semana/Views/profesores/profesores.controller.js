//archivo de donde llamar al procedimiento
//controlador

function init() {
    $("#form_profesores").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$().ready(() => {
    console.log("llego");
    todos_controlador();
});

var todos_controlador = () => {

    var todos = new ProfesoresModel(
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
    var formData = new FormData($("#form_profesores")[0]);
    var ID_profesor = document.getElementById("ID_profesor").value
    console.log($("#form_profesores")[0]);
    if (ID_profesor > 0) {
        var profesores = new ProfesoresModel(

            '',
            '',
            '',
            '',
            '',
            formData,
            'editar',
        )
        profesores.editar();
    } else {
        var profesores = new ProfesoresModel(

            '',
            '',
            '',
            '',
            '',
            formData,
            'insertar',
        );
        profesores.insertar();
    }
}



var editar = (ID_profesor) => {
    var uno = new ProfesoresModel(
        ID_profesor,
        '',
        '',
        '',
        '',
        '',
        'uno',
    )
    uno.uno();
};
var profesores_repetida = () => {
    var identificador = $('#Nombre').val();
    var profesores = new ProfesoresModel(
        '',
        "",
        identificador,
        '',
        "",
        "",
        'profesores_repetida',
    )
    profesores.profesores_repetida();
}
var eliminar = (ID_profesor) => {
    var eliminar = new ProfesoresModel(
        ID_profesor,
        "",
        '',
        '',
        '',
        '',
        'eliminar',
    )
    eliminar.eliminar();
}


    ; init();

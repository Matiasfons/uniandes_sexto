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

    var CasaId = document.getElementById("CasaId").value
    console.log(CasaId);
    if (CasaId > 0) {
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
            'editar',
        )
        casas.editar();
    } else {
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
        );
        casas.insertar();
    }
}


var editar = (CasaId) => {
    var uno = new Casas_Model(
        CasaId,
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        'uno',
    )
    uno.uno();
};
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
var eliminar=(CasaId)=>{
    var eliminar = new Casas_Model(
        CasaId,
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        'eliminar',
    )
    eliminar.eliminar();
}


    ; init();

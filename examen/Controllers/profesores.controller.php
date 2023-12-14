<?php
require_once('../Models/cls_profesores.model.php');
$usuarios = new Clase_Profesores;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $usuarios->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case 'infoShool':
        // $datos = array(); //defino un arreglo
        // $datos = $usuarios->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        // while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
        //     $todos[] = $fila;
        // }
        echo json_encode("hola"); //devuelvo el arreglo en formato json
        break;


    case "uno":
        $ID_profesor = $_POST["ID_profesor"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $usuarios->uno($ID_profesor); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $ID_escuela = $_POST["ID_escuela"];
        $Nombre = $_POST["Nombre"];
        $Materia = $_POST["Materia"];
        $Salario = $_POST["Salario"];


        $datos = array(); //defino un arreglo
        $datos = $usuarios->insertar($ID_escuela, $Nombre, $Materia, $Salario); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ID_profesor = $_POST["ID_profesor"];
        $ID_escuela = $_POST["ID_escuela"];
        $Nombre = $_POST["Nombre"];
        $Materia = $_POST["Materia"];
        $Salario = $_POST["Salario"];


        $datos = array(); //defino un arreglo
        $datos = $usuarios->actualizar($ID_profesor, $ID_escuela, $Nombre, $Materia, $Salario); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $ID_profesor = $_POST["ID_profesor"];
        $datos = array(); //defino un arreglo
        $datos = $usuarios->eliminar($ID_profesor); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar_contrasenia':
        $UsuarioId = $_POST["UsuarioId"];
        $Contrasenia = $_POST["Contrasenia"];
        $datos = array(); //defino un arreglo
        $datos = $usuarios->actualizar_contrasenia($UsuarioId, $Contrasenia); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos);
        break;

    case "profesores_repetida":
        $Nombre = $_POST["Nombre"];

        $datos = array(); //defino un arreglo
        $datos = $usuarios->profesores_repetida($Nombre); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
}

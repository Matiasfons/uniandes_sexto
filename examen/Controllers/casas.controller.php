<?php
require_once('../Models/cls_casas.model.php');
$usuarios = new Clase_Casas;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $usuarios->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $CasaId = $_POST["CasaId"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $usuarios->uno($CasaId); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $Propietario = $_POST["Propietario"];
        $Valor = $_POST["Valor"];
        $Direccion = $_POST["Direccion"];
        $Ciudad = $_POST["Ciudad"];
        $Telefono = $_POST["Telefono"];
        $Estado = $_POST["Estado"];
        $Identeificador = $_POST["Identeificador"];

        $datos = array(); //defino un arreglo
        $datos = $usuarios->insertar($Propietario, $Valor, $Direccion, $Ciudad, $Telefono, $Estado,  $Identeificador); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $CasaId = $_POST["CasaId"];
        $Propietario = $_POST["Propietario"];
        $Valor = $_POST["Valor"];
        $Direccion = $_POST["Direccion"];
        $Ciudad = $_POST["Ciudad"];
        $Telefono = $_POST["Telefono"];
        $Estado = $_POST["Estado"];
        $Identeificador = $_POST["Identeificador"];

        $datos = array(); //defino un arreglo
        $datos = $usuarios->actualizar($CasaId, $Propietario, $Valor, $Direccion, $Ciudad, $Telefono, $Estado, $Identeificador); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $CasaId = $_POST["CasaId"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $usuarios->eliminar($CasaId); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar_contrasenia':
        $UsuarioId = $_POST["UsuarioId"];
        $Contrasenia = $_POST["Contrasenia"];
        $datos = array(); //defino un arreglo
        $datos = $usuarios->actualizar_contrasenia($UsuarioId, $Contrasenia); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos);
        break;
    case 'login':
        $correo = $_POST["correo"];
        $contrasenia = $_POST["contrasenia"];
        if (empty($correo) || empty($contrasenia)) {
            header("Location:../login.php?op=1"); //llenar datos vacios
            exit();
        }
        try {
            $datos = array(); //defino un arreglo
            $datos = $usuarios->login($correo, $contrasenia); // almano en el arreglo la información de la base de datos
            $respuesta = mysqli_fetch_assoc($datos); // declaro una variable "respuesta" para usar los valores que trae
            if (is_array($respuesta) and count($respuesta) > 0) {  // comparar si la variable "respuesta" tiene datos y es un arreglo
                //poner variables de session controlar accessos
                //$respuesta -> trae toda la información del usuario
                session_start();
                if ($contrasenia == $respuesta["Contrasenia"]) {  //comparar la contraseña de la base con la contraseña que ingreso el usuario
                    $_SESSION['Nombres']  = $respuesta["Nombres"];
                    $_SESSION['Apellidos'] = $respuesta["Apellidos"];
                    $_SESSION['Correo']    = $respuesta["Correo"];
                    $_SESSION['Rol']       = $respuesta["Rol"];
                    $_SESSION['UsuarioId'] = $respuesta["UsuarioId"];
                    header("Location:../views/index.php");
                } else {
                    header("Location:../login.php?op=2"); //el usuario o la contraseña son incorrectos
                    exit();
                }
            } else {
                header("Location:../login.php?op=2"); //el usuario o la contraseña son incorrectos
                exit();
            }
        } catch (\Throwable $th) {
            echo json_encode($th->getMessage());
            header("Location:../login.php?op=3"); // no se que error escribir  es para capturar un error de codigo
        }
        break;
    case "predio_repetida":
        $PredioId = $_POST["PredioId"];
      
        $datos = array(); //defino un arreglo
        $datos = $usuarios->predio_repetida($PredioId); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case "verifica_correo":
        $Correo = $_POST["Correo"];
        $datos = array(); //defino un arreglo
        $datos = $usuarios->verifica_correo($Correo); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
}

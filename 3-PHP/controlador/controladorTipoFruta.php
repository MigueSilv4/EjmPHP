<?php
    include_once("../modelo/conexion.php");
    $objetoConexion = new conexion();
    $conexion = $objetoConexion->conectar();

    include_once("../modelo/tipoFruta.php");

    $opcion = $_POST["vEnviar"];
    $idTipoFruta = $_POST["vIdTipoFruta"];
    $descripcionTipoF = $_POST["vDescripcionTipoF"];
    // print_r($_POST["vIdCliente"]);
    // exit;
    $objetoTipoFruta = new tipoFruta ($conexion, $idTipoFruta, $descripcionTipoF);

    switch ($opcion) {
        case 'Ingresar':
            $objetoTipoFruta->insertar();
            $mensaje = "Ingresado";
            break;

        case 'Modificar':
            $objetoTipoFruta->modificar();
            $mensaje = "Modificado";
            break;

        case 'Eliminar':
            $objetoTipoFruta->eliminar();
            $mensaje = "Eliminado";
            break;
        
    }

    $objetoConexion->desconectar($conexion);
    header("location:../vista/formularioFruta.php?msj=$mensaje");
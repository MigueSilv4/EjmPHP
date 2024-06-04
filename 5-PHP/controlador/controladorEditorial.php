<?php
    include_once("../modelo/conexion.php");
    $objetoConexion = new conexion();
    $conexion = $objetoConexion->conectar();

    include_once("../modelo/editorial.php");

    $opcion = $_POST["vEnviar"];
    $idEditorial = $_POST["vIdEditorial"];
    $nombreEditorial = $_POST["vNombreEditorial"];
    $ciudadEditorial = $_POST["vCiudadEditorial"];
        // print_r($_POST["vIdEditorial"]);
    // exit;
    $objetoEditorial = new Editorial ($conexion, $idEditorial, $nombreEditorial, $ciudadEditorial);

    switch ($opcion) {
        case 'Ingresar':
            $objetoEditorial->insertar();
            $mensaje = "Ingresado";
            break;

        case 'Modificar':
            $objetoEditorial->modificar();
            $mensaje = "Modificado";
            break;

        case 'Eliminar':
            $objetoEditorial->eliminar();
            $mensaje = "Eliminado";
            break;
        
    }

    $objetoConexion->desconectar($conexion);
    header("location:../vista/formularioEditorial.php?msj=$mensaje");
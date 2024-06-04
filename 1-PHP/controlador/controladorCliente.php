<?php
    include_once("../modelo/conexion.php");
    $objetoConexion = new conexion();
    $conexion = $objetoConexion->conectar();

    include_once("../modelo/cliente.php");

    $opcion = $_POST["vEnviar"];
    $idCliente = $_POST["vIdCliente"];
    $nombreCliente = $_POST["vNombreCliente"];
    $documentoCliente = $_POST["vDocumentoCliente"];
    $correoCliente = $_POST["vCorreoCliente"];
    // print_r($_POST["vIdCliente"]);
    // exit;
    $objetoCliente = new Cliente($conexion, $idCliente, $nombreCliente, $documentoCliente, $correoCliente);

    switch ($opcion) {
        case 'Ingresar':
            $objetoCliente->insertar();
            $mensaje = "Ingresado";
            break;

        case 'Modificar':
            $objetoCliente->modificar();
            $mensaje = "Modificado";
            break;

        case 'Eliminar':
            $objetoCliente->eliminar();
            $mensaje = "Eliminado";
            break;
        
    }

    $objetoConexion->desconectar($conexion);
    header("location:../vista/formularioCliente.php?msj=$mensaje");
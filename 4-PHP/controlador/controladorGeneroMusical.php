<?php
    include_once("../modelo/conexion.php");
    $objetoConexion = new conexion();
    $conexion = $objetoConexion->conectar();

    include_once("../modelo/generoMusical.php");

    $opcion = $_POST["vEnviar"];
    $idGenero = $_POST["vIdGenero"];
    $descripcionGenero = $_POST["vDescripcionGenero"];
        // print_r($_POST["vIdGenero"]);
    // exit;
    $objetoGenero = new GeneroMusical ($conexion, $idGenero, $descripcionGenero);

    switch ($opcion) {
        case 'Ingresar':
            $objetoGenero->insertar();
            $mensaje = "Ingresado";
            break;

        case 'Modificar':
            $objetoGenero->modificar();
            $mensaje = "Modificado";
            break;

        case 'Eliminar':
            $objetoGenero->eliminar();
            $mensaje = "Eliminado";
            break;
        
    }

    $objetoConexion->desconectar($conexion);
    header("location:../vista/formularioGeneroMusical.php?msj=$mensaje");
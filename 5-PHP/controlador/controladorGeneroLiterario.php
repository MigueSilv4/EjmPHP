<?php
    include_once("../modelo/conexion.php");
    $objetoConexion = new conexion();
    $conexion = $objetoConexion->conectar();

    include_once("../modelo/generoLiterario.php");

    $opcion = $_POST["vEnviar"];
    $idGeneroLit = $_POST["vIdGeneroLit"];
    $descripcionGeneroLit = $_POST["vDescripcionGeneroLit"];
        // print_r($_POST["vIdGeneroLit"]);
    // exit;
    $objetoGeneroLit = new GeneroLiterario ($conexion, $idGeneroLit, $descripcionGeneroLit);

    switch ($opcion) {
        case 'Ingresar':
            $objetoGeneroLit->insertar();
            $mensaje = "Ingresado";
            break;

        case 'Modificar':
            $objetoGeneroLit->modificar();
            $mensaje = "Modificado";
            break;

        case 'Eliminar':
            $objetoGeneroLit->eliminar();
            $mensaje = "Eliminado";
            break;
        
    }

    $objetoConexion->desconectar($conexion);
    header("location:../vista/formularioGeneroLiterario.php?msj=$mensaje");
<?php
    include_once("../modelo/conexion.php");
    $objetoConexion = new conexion();
    $conexion = $objetoConexion->conectar();

    include_once("../modelo/cancion.php");

    $opcion = $_POST["vEnviar"];
    $idCancion = $_POST["vIdCancion"];
    $nombreCancion = $_POST["vNombreCancion"];
    $duracionCancion = $_POST["vDuracionCancion"];
    $idArtista = $_POST["vIdArtista"];
    $idGenero = $_POST["vIdGenero"];
    // print_r($_POST["vIdGenero"]);
    // exit;
    $objetoCancion = new Cancion ($conexion, $idCancion, $nombreCancion, $duracionCancion, $idArtista, $idGenero);

    switch ($opcion) {
        case 'Ingresar':
            $objetoCancion->insertar();
            $mensaje = "Ingresado";
            break;

        case 'Modificar':
            $objetoCancion->modificar();
            $mensaje = "Modificado";
            break;

        case 'Eliminar':
            $objetoCancion->eliminar();
            $mensaje = "Eliminado";
            break;
        
    }

    $objetoConexion->desconectar($conexion);
    header("location:../vista/formularioCancion.php?msj=$mensaje");
<?php
    include_once("../modelo/conexion.php");
    $objetoConexion = new conexion();
    $conexion = $objetoConexion->conectar();

    include_once("../modelo/artista.php");

    $opcion = $_POST["vEnviar"];
    $idArtista = $_POST["vIdArtista"];
    $nombreArtista = $_POST["vNombreArtista"];
    $nacionalidadArtista = $_POST["vNacionalidadArtista"];
        // print_r($_POST["vIdArtista"]);
    // exit;
    $objetoArtista = new Artista ($conexion, $idArtista, $nombreArtista, $nacionalidadArtista);

    switch ($opcion) {
        case 'Ingresar':
            $objetoArtista->insertar();
            $mensaje = "Ingresado";
            break;

        case 'Modificar':
            $objetoArtista->modificar();
            $mensaje = "Modificado";
            break;

        case 'Eliminar':
            $objetoArtista->eliminar();
            $mensaje = "Eliminado";
            break;
        
    }

    $objetoConexion->desconectar($conexion);
    header("location:../vista/formularioArtista.php?msj=$mensaje");
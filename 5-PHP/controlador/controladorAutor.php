<?php
    include_once("../modelo/conexion.php");
    $objetoConexion = new conexion();
    $conexion = $objetoConexion->conectar();

    include_once("../modelo/autor.php");

    $opcion = $_POST["vEnviar"];
    $idAutor = $_POST["vIdAutor"];
    $nombreAutor = $_POST["vNombreAutor"];
    $nacionalidadAutor = $_POST["vNacionalidadAutor"];
        // print_r($_POST["vIdAutor"]);
    // exit;
    $objetoAutor = new Autor ($conexion, $idAutor, $nombreAutor, $nacionalidadAutor);

    switch ($opcion) {
        case 'Ingresar':
            $objetoAutor->insertar();
            $mensaje = "Ingresado";
            break;

        case 'Modificar':
            $objetoAutor->modificar();
            $mensaje = "Modificado";
            break;

        case 'Eliminar':
            $objetoAutor->eliminar();
            $mensaje = "Eliminado";
            break;
        
    }

    $objetoConexion->desconectar($conexion);
    header("location:../vista/formularioAutor.php?msj=$mensaje");
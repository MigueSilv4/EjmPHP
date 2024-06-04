<?php
    include_once("../modelo/conexion.php");
    $objetoConexion = new conexion();
    $conexion = $objetoConexion->conectar();

    include_once("../modelo/libro.php");

    $opcion = $_POST["vEnviar"];
    $idLibro = $_POST["vIdLibro"];
    $tituloLibro = $_POST["vTituloLibro"];
    $paginasLibro = $_POST["vPaginasLibro"];
    $idAutor = $_POST["vIdAutor"];
    $idGeneroLit = $_POST["vIdGeneroLit"];
    $idEditorial = $_POST["vIdEditorial"];
    // print_r($_POST["vIdLibro"]);
    // exit;
    $objetoLibro = new Libro ($conexion, $idLibro, $tituloLibro, $paginasLibro, $idAutor, $idGeneroLit, $idEditorial);

    switch ($opcion) {
        case 'Ingresar':
            $objetoLibro->insertar();
            $mensaje = "Ingresado";
            break;

        case 'Modificar':
            $objetoLibro->modificar();
            $mensaje = "Modificado";
            break;

        case 'Eliminar':
            $objetoLibro->eliminar();
            $mensaje = "Eliminado";
            break;
        
    }

    $objetoConexion->desconectar($conexion);
    header("location:../vista/formularioLibro.php?msj=$mensaje");
<?php
    include_once("../modelo/conexion.php");
    $objetoConexion = new conexion();
    $conexion = $objetoConexion->conectar();

    include_once("../modelo/fruta.php");

    $opcion = $_POST["vEnviar"];
    $idFruta = $_POST["vIdFruta"];
    $nombreFruta = $_POST["vNombreFruta"];
    $idTipoFruta = $_POST["vIdTipoFruta"];
    $pesoFruta = $_POST["vPesoFruta"];
    $colorFruta = $_POST["vColorFruta"];
    // print_r($_POST["vIdFruta"]);
    // exit;
    $objetoFruta = new Fruta ($conexion, $idFruta, $nombreFruta, $idTipoFruta, $pesoFruta, $colorFruta);

    switch ($opcion) {
        case 'Ingresar':
            $objetoFruta->insertar();
            $mensaje = "Ingresado";
            break;

        case 'Modificar':
            $objetoFruta->modificar();
            $mensaje = "Modificado";
            break;

        case 'Eliminar':
            $objetoFruta->eliminar();
            $mensaje = "Eliminado";
            break;
        
    }

    $objetoConexion->desconectar($conexion);
    header("location:../vista/formularioFruta.php?msj=$mensaje");
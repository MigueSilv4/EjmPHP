<?php
include_once("../modelo/conexion.php");
$objetoConexion = new conexion();
$conexion = $objetoConexion->conectar();

include_once("../modelo/estudiante.php");
$opcion = $_POST["vEnviar"]; 
$idEstudiante = $_POST["vIdEstudiante"];
$nombreEstudiante = $_POST["vNombreEstudiante"];
$direccionEstudiante = $_POST["vDireccionEstudiante"];
$documentoEstudiante = $_POST["vDocumentoEstudiante"];
$fNacimientoEstudiante = $_POST["vfNacimientoEstudiante"];
$emailEstudiante = $_POST["vEmailEstudiante"];

$objetoEstudiante = new estudiante($conexion, $idEstudiante, 
$nombreEstudiante, $direccionEstudiante, $documentoEstudiante, $fNacimientoEstudiante, $emailEstudiante);


switch ($opcion) {
    case 'Ingresar':
        $objetoEstudiante->insertar();
        $mensaje = "Ingresado";
        break;

    case "Modificar":
        $objetoEstudiante->modificar();
        // print_r($opcion);
        // exit;
        $mensaje = "Modificado";
        break;

    case "Eliminar":
        $objetoEstudiante->eliminar();
        $mensaje = "Eliminado";
}

$objetoConexion->desconectar($conexion);
header("location:../vista/formularioEstudiante.php?msj=$mensaje");



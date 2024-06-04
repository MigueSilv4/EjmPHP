<?php
class conexion
{
    function conectar()
    {
        $conexion = mysqli_connect("localhost", "root", "", "libro") or die(mysqli_connect_error());
        mysqli_query($conexion, "SET NAMES 'utf8'");
        return $conexion;
    }
    function desconectar($conexion)
    {
        // mysqli_close($conexion);
    }
}

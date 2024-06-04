<?php
class conexion
{
    function conectar()
    {
        $conexion = mysqli_connect("localhost", "root", "", "album") or die(mysqli_connect_error());
        mysqli_query($conexion, "SET NAMES 'utf8'");
        return $conexion;
    }
    function desconectar($conexion)
    {
         mysqli_close($conexion);
         // close estaba comentado antes de ultimo cambio
    }
}

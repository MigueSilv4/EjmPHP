<?php

class TipoFruta 
{
    private $_conexion;
    private $_idTipoFruta;
    private $_descripcionTipoF;

    function __construct($conexion,$idTipoFruta, $descripcionTipoF)
    {
        $this->_conexion = $conexion;
        $this->_idTipoFruta = $idTipoFruta;
        $this->_descripcionTipoF = $descripcionTipoF;
    }

    function __get($k)
    {
        return $this->$k;
    }

    function __set($k, $v)
    {
        $this->$k = $v;

    }

    function insertar ()
    {
        $inserccion = mysqli_query($this->_conexion, "INSERT INTO tipoFruta (idTipoFruta, descripcionTipoF)
        VALUES (NULL, '$this->_descripcionTipoF')");

        return $inserccion;

    }


    function modificar()
    {
        $modificacion = mysqli_query($this->_conexion, "UPDATE tipoFruta SET descripcionTipoF = '$this->_descripcionTipoF' WHERE IdTipoFruta = '$this->_idTipoFruta'");
        return $modificacion;
    }

    function eliminar()
    {
        $eliminacion = mysqli_query($this->_conexion, "DELETE FROM tipoFruta WHERE idTipoFruta = $this->_idTipoFruta");
        return $eliminacion;
    }

    function listar()
    {
        $listado = mysqli_query($this->_conexion, "SELECT * FROM tipoFruta ORDER BY idTipoFruta");
        return $listado;
    }

}

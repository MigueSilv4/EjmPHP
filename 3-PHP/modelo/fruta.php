<?php

class Fruta
{
    private $_conexion;
    private $_idFruta;
    private $_nombreFruta;
    private $_idTipoFruta;
    private $_pesoFruta;
    private $_colorFruta;



    function __construct($conexion, $idFruta, $nombreFruta, $idTipoFruta, $pesoFruta, $colorFruta)
    {
        $this->_conexion = $conexion;
        $this->_idFruta = $idFruta;
        $this->_nombreFruta = $nombreFruta;
        $this->_idTipoFruta = $idTipoFruta;
        $this->_pesoFruta = $pesoFruta;
        $this->_colorFruta = $colorFruta;
    }

    function __get($k){
        return $this->$k;
    }

    function __set($k, $v) {
        $this->$k = $v;

    }

    function insertar()
    {
        $sql = "INSERT INTO fruta (idFruta, nombreFruta, pesoFruta, colorFruta, idTipoFruta)
        VALUES (NULL, '$this->_nombreFruta', '$this->_pesoFruta', '$this->_colorFruta', '$this->_idTipoFruta')";
        $insercion = mysqli_query($this->_conexion,$sql );
        return $insercion;
    }

    function modificar()
    {
        $sql = "UPDATE fruta SET nombreFruta = '$this->_nombreFruta', 
        pesoFruta = '$this->_pesoFruta', colorFruta = '$this->_colorFruta', idTipoFruta = '$this->_idTipoFruta' WHERE idFruta = $this->_idFruta ";
        $modificacion = mysqli_query($this->_conexion, $sql);
     
        return $modificacion;
    }


    function eliminar ()
    {
        $eliminacion = mysqli_query($this->_conexion, "DELETE FROM fruta WHERE idFruta = $this->_idFruta");
        return $eliminacion;
    }

    function listar()
    {
        $listado = mysqli_query($this->_conexion, "SELECT * FROM fruta ORDER BY idFruta");
        return $listado;
    }
}

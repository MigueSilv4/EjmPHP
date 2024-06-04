<?php

class Cancion
{
    private $_conexion;
    private $_idCancion;
    private $_nombreCancion;
    private $_duracionCancion;
    private $_idArtista;
    private $_idGenero;



    function __construct($conexion, $idCancion, $nombreCancion, $duracionCancion, $idArtista, $idGenero)
    {
        $this->_conexion = $conexion;
        $this->_idCancion= $idCancion;
        $this->_nombreCancion = $nombreCancion;
        $this->_duracionCancion = $duracionCancion;
        $this->_idArtista = $idArtista;
        $this->_idGenero = $idGenero;
    }

    function __get($k){
        return $this->$k;
    }

    function __set($k, $v) {
        $this->$k = $v;

    }

    function insertar()
    {
        $sql = "INSERT INTO cancion (idCancion, nombreCancion, duracionCancion, idArtista, idGenero)
        VALUES (NULL, '$this->_nombreCancion', '$this->_duracionCancion', '$this->_idArtista', '$this->_idGenero')";
        $insercion = mysqli_query($this->_conexion,$sql );
        return $insercion;
    }

    function modificar()
    {
        $sql = "UPDATE cancion SET nombreCancion = '$this->_nombreCancion', 
        duracionCancion = '$this->_duracionCancion', idArtista = '$this->_idArtista', idGenero = '$this->_idGenero' WHERE idCancion = $this->_idCancion ";
        $modificacion = mysqli_query($this->_conexion, $sql);
     
        return $modificacion;
    }


    function eliminar ()
    {
        $eliminacion = mysqli_query($this->_conexion, "DELETE FROM Cancion WHERE idCancion = $this->_idCancion");
        return $eliminacion;
    }

    function listar()
    {
        $listado = mysqli_query($this->_conexion, "SELECT * FROM Cancion ORDER BY idCancion");
        return $listado;
    }
}

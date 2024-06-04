<?php

class GeneroMusical
{
    private $_conexion;
    private $_idGenero;
    private $_descripcionGenero;
    


    function __construct($conexion, $idGenero, $descripcionGenero)
    {
        $this->_conexion = $conexion;
        $this->_idGenero = $idGenero;
        $this->_descripcionGenero = $descripcionGenero;
        
    }

    function __get($k){
        return $this->$k;
    }

    function __set($k, $v) {
        $this->$k = $v;

    }

    function insertar()
    {
        $sql = "INSERT INTO GeneroMusical (idGenero, descripcionGenero)
        VALUES (NULL, '$this->_descripcionGenero')";
        $insercion = mysqli_query($this->_conexion,$sql );
        return $insercion;
    }

    function modificar()
    {
        $sql = "UPDATE GeneroMusical SET descripcionGenero = '$this->_descripcionGenero' WHERE idGenero = $this->_idGenero ";
        $modificacion = mysqli_query($this->_conexion, $sql);
     
        return $modificacion;
    }


    function eliminar ()
    {
        $eliminacion = mysqli_query($this->_conexion, "DELETE FROM GeneroMusical WHERE idGenero = $this->_idGenero");
        return $eliminacion;
    }

    function listar()
    {
        $listado = mysqli_query($this->_conexion, "SELECT * FROM GeneroMusical ORDER BY idGenero");
        return $listado;
    }
}

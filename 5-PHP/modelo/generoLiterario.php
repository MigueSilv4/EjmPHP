<?php

class GeneroLiterario
{
    private $_conexion;
    private $_idGeneroLit;
    private $_descripcionGeneroLit;
    


    function __construct($conexion, $idGeneroLit, $descripcionGeneroLit)
    {
        $this->_conexion = $conexion;
        $this->_idGeneroLit = $idGeneroLit;
        $this->_descripcionGeneroLit = $descripcionGeneroLit;
        
    }

    function __get($k){
        return $this->$k;
    }

    function __set($k, $v) {
        $this->$k = $v;

    }

    function insertar()
    {
        $sql = "INSERT INTO GeneroLiterario (idGeneroLit, descripcionGeneroLit)
        VALUES (NULL, '$this->_descripcionGeneroLit')";
        $insercion = mysqli_query($this->_conexion,$sql );
        return $insercion;
    }

    function modificar()
    {
        $sql = "UPDATE GeneroLiterario SET descripcionGeneroLit = '$this->_descripcionGeneroLit' WHERE idGeneroLit = $this->_idGeneroLit ";
        $modificacion = mysqli_query($this->_conexion, $sql);
     
        return $modificacion;
    }


    function eliminar ()
    {
        $eliminacion = mysqli_query($this->_conexion, "DELETE FROM GeneroLiterario WHERE idGeneroLit = $this->_idGeneroLit");
        return $eliminacion;
    }

    function listar()
    {
        $listado = mysqli_query($this->_conexion, "SELECT * FROM GeneroLiterario ORDER BY idGeneroLit");
        return $listado;
    }
}

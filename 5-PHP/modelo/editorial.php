<?php

class Editorial
{
    private $_conexion;
    private $_idEditorial;
    private $_nombreEditorial;
    private $_ciudadEditorial;


    function __construct($conexion, $idEditorial, $nombreEditorial, $ciudadEditorial)
    {
        $this->_conexion = $conexion;
        $this->_idEditorial = $idEditorial;
        $this->_nombreEditorial = $nombreEditorial;
        $this->_ciudadEditorial = $ciudadEditorial;
    }

    function __get($k){
        return $this->$k;
    }

    function __set($k, $v) {
        $this->$k = $v;

    }

    function insertar()
    {
        $sql = "INSERT INTO Editorial (idEditorial, nombreEditorial, ciudadEditorial)
        VALUES (NULL, '$this->_nombreEditorial', '$this->_ciudadEditorial')";
        $insercion = mysqli_query($this->_conexion,$sql );
        return $insercion;
    }

    function modificar()
    {
        $sql = "UPDATE Editorial SET nombreEditorial = '$this->_nombreEditorial', 
        ciudadEditorial = '$this->_ciudadEditorial' WHERE idEditorial = $this->_idEditorial ";
        $modificacion = mysqli_query($this->_conexion, $sql);
     
        return $modificacion;
    }


    function eliminar ()
    {
        $eliminacion = mysqli_query($this->_conexion, "DELETE FROM Editorial WHERE idEditorial = $this->_idEditorial");
        return $eliminacion;
    }

    function listar()
    {
        $listado = mysqli_query($this->_conexion, "SELECT * FROM Editorial ORDER BY idEditorial");
        return $listado;
    }
}

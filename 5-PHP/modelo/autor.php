<?php

class Autor
{
    private $_conexion;
    private $_idAutor;
    private $_nombreAutor;
    private $_nacionalidadAutor;


    function __construct($conexion, $idAutor, $nombreAutor, $nacionalidadAutor)
    {
        $this->_conexion = $conexion;
        $this->_idAutor = $idAutor;
        $this->_nombreAutor = $nombreAutor;
        $this->_nacionalidadAutor = $nacionalidadAutor;
    }

    function __get($k){
        return $this->$k;
    }

    function __set($k, $v) {
        $this->$k = $v;

    }

    function insertar()
    {
        $sql = "INSERT INTO Autor (idAutor, nombreAutor, nacionalidadAutor)
        VALUES (NULL, '$this->_nombreAutor', '$this->_nacionalidadAutor')";
        $insercion = mysqli_query($this->_conexion,$sql );
        return $insercion;
    }

    function modificar()
    {
        $sql = "UPDATE Autor SET nombreAutor = '$this->_nombreAutor', 
        nacionalidadAutor = '$this->_nacionalidadAutor' WHERE idAutor = $this->_idAutor ";
        $modificacion = mysqli_query($this->_conexion, $sql);
     
        return $modificacion;
    }


    function eliminar ()
    {
        $eliminacion = mysqli_query($this->_conexion, "DELETE FROM Autor WHERE idAutor = $this->_idAutor");
        return $eliminacion;
    }

    function listar()
    {
        $listado = mysqli_query($this->_conexion, "SELECT * FROM Autor ORDER BY idAutor");
        return $listado;
    }
}

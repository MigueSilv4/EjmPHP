<?php

class Libro
{
    private $_conexion;
    private $_idLibro;
    private $_tituloLibro;
    private $_paginasLibro;
    private $_idAutor;
    private $_idGeneroLit;
    private $_idEditorial;



    function __construct($conexion, $idLibro, $tituloLibro, $paginasLibro, $idAutor, $idGeneroLit, $idEditorial)
    {
        $this->_conexion = $conexion;
        $this->_idLibro= $idLibro;
        $this->_tituloLibro = $tituloLibro;
        $this->_paginasLibro = $paginasLibro;
        $this->_idAutor = $idAutor;
        $this->_idGeneroLit = $idGeneroLit;
        $this->_idEditorial = $idEditorial;
    }

    function __get($k){
        return $this->$k;
    }

    function __set($k, $v) {
        $this->$k = $v;

    }

    function insertar()
    {
        $sql = "INSERT INTO libro (idLibro, tituloLibro, paginasLibro, idAutor, idGeneroLit, idEditorial)
        VALUES (NULL, '$this->_tituloLibro', '$this->_paginasLibro', '$this->_idAutor', '$this->_idGeneroLit', '$this->_idEditorial')";
        $insercion = mysqli_query($this->_conexion,$sql );
        return $insercion;
    }

    function modificar()
    {
        $sql = "UPDATE libro SET tituloLibro = '$this->_tituloLibro', 
        paginasLibro = '$this->_paginasLibro', idAutor = '$this->_idAutor', idGeneroLit = '$this->_idGeneroLit', idEditorial = '$this->_idEditorial' WHERE idLibro = $this->_idLibro";
        $modificacion = mysqli_query($this->_conexion, $sql);
     
        return $modificacion;
    }


    function eliminar ()
    {
        $eliminacion = mysqli_query($this->_conexion, "DELETE FROM libro WHERE idLibro = $this->_idLibro");
        return $eliminacion;
    }

    function listar()
    {
        $listado = mysqli_query($this->_conexion, "SELECT * FROM libro ORDER BY idLibro");
        return $listado;
    }
}

<?php

class Artista 
{
    private $_conexion;
    private $_idArtista;
    private $_nombreArtista;
    private $_nacionalidadArtista;


    function __construct($conexion, $idArtista, $nombreArtista, $nacionalidadArtista)
    {
        $this->_conexion = $conexion;
        $this->_idArtista = $idArtista;
        $this->_nombreArtista = $nombreArtista;
        $this->_nacionalidadArtista = $nacionalidadArtista;
    }

    function __get($k){
        return $this->$k;
    }

    function __set($k, $v) {
        $this->$k = $v;

    }

    function insertar()
    {
        $sql = "INSERT INTO Artista (idArtista, nombreArtista, nacionalidadArtista)
        VALUES (NULL, '$this->_nombreArtista', '$this->_nacionalidadArtista')";
        $insercion = mysqli_query($this->_conexion,$sql );
        return $insercion;
    }

    function modificar()
    {
        $sql = "UPDATE Artista SET nombreArtista = '$this->_nombreArtista', 
        nacionalidadArtista = '$this->_nacionalidadArtista' WHERE idArtista = $this->_idArtista ";
        $modificacion = mysqli_query($this->_conexion, $sql);
     
        return $modificacion;
    }


    function eliminar ()
    {
        $eliminacion = mysqli_query($this->_conexion, "DELETE FROM Artista WHERE idArtista = $this->_idArtista");
        return $eliminacion;
    }

    function listar()
    {
        $listado = mysqli_query($this->_conexion, "SELECT * FROM Artista ORDER BY idArtista");
        return $listado;
    }
}

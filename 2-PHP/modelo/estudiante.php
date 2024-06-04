<?php
class Estudiante
{
    private $_conexion;
    private $_idEstudiante;
    private $_nombreEstudiante;
    private $_direccionEstudiante;
    private $_documentoEstudiante;
    private $_fNacimientoEstudiante;
    private $_emailEstudiante;

    function __construct($conexion, $idEstudiante, $nombreEstudiante, $direccionEstudiante, $documentoEstudiante, $fNacimientoEstudiante, $emailEstudiante)
    {
        $this->_conexion = $conexion;
        $this->_idEstudiante = $idEstudiante;
        $this->_nombreEstudiante = $nombreEstudiante;
        $this->_direccionEstudiante = $direccionEstudiante;
        $this->_documentoEstudiante = $documentoEstudiante;
        $this->_fNacimientoEstudiante = $fNacimientoEstudiante;
        $this->_emailEstudiante = $emailEstudiante;
    }
    function __get($k)
    {
        return $this->$k;
    }
    function __set($k, $v)
    {
        return $this->$k = $v;
    }

    function insertar()
    {
        $insercion = mysqli_query($this->_conexion, "INSERT INTO estudiante (idEstudiante, nombreEstudiante, direccionEstudiante, documentoEstudiante, fNacimientoEstudiante, emailEstudiante )
            VALUES (NULL, '$this->_nombreEstudiante', '$this->_direccionEstudiante', '$this->_documentoEstudiante', '$this->_fNacimientoEstudiante', '$this->_emailEstudiante')") or
            die(mysqli_error($this->_conexion));

        return $insercion;
    }

    function modificar()
    {
        $modificacion = mysqli_query($this->_conexion, "UPDATE estudiante SET nombreEstudiante = '$this->_nombreEstudiante', direccionEstudiante = '$this->_direccionEstudiante',
             documentoEstudiante = '$this->_documentoEstudiante', fNacimientoEstudiante = '$this->_fNacimientoEstudiante', emailEstudiante = '$this->_emailEstudiante' 
             WHERE idEstudiante = '$this->_idEstudiante'") or die(mysqli_error($this->_conexion));
             return $modificacion;
    }

    function eliminar()
    { 
        $eliminacion = mysqli_query($this->_conexion, "DELETE FROM estudiante WHERE idEstudiante = $this->_idEstudiante") or 
        die(mysqli_error($this->_conexion));
        return $eliminacion;
    }

    function listar()
    {
        $listado = mysqli_query($this->_conexion, "SELECT * FROM estudiante ORDER BY idEstudiante") or 
        die(mysqli_error($this->_conexion));
        return $listado;
    }

}

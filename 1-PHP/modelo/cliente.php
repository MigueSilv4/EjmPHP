<?php
class cliente
{

    private $_conexion;
    private $_idCliente;
    private $_nombreCliente;
    private $_documentoCliente;
    private $_correoCliente;
    private $_paginacion = 10;



    function __construct($conexion, $idCliente, $nombreCliente, $documentoCliente, $correoCliente)
    {
        $this->_conexion = $conexion;
        $this->_idCliente = $idCliente;
        $this->_nombreCliente = $nombreCliente;
        $this->_documentoCliente = $documentoCliente;
        $this->_correoCliente = $correoCliente;
    }

    function __get($k)
    {
        return $this->$k;
    }

    function __set($k, $v)
    {
        $this->$k = $v;
    }

    function insertar()
    {
        $insercion = mysqli_query($this->_conexion, "INSERT INTO Cliente (idCliente, nombreCliente, documentoCliente, correoCliente)
        VALUES (NULL, '$this->_nombreCliente', '$this->_documentoCliente', '$this->_correoCliente')");
        // // $auditoria = mysqli_query($this->_conexion, "INSERT INTO 
        // -- Auditoria (idAuditoria, detalleAuditoria, idUsuarioAuditoria, fechaAuditoria)
        // -- VALUES (NULL, 'Inserto ".static::class.",".$_SESSION['idUsuario'].",'CURDATE()')");
        return $insercion;
    }

    function modificar()
    {

        $modificacion = mysqli_query($this->_conexion, "UPDATE Cliente SET nombreCliente='$this->_nombreCliente', documentoCliente = '$this->_documentoCliente',
        correoCliente = '$this->_correoCliente' WHERE idCliente = $this->_idCliente");


        // $auditoria = mysqli_query($this->_conexion, "INSERT INTO 
        // -- Auditoria (idAuditoria, detalleAuditoria, idUsuarioAuditoria, fechaAuditoria)
        // -- VALUES (NULL, 'Inserto ".static::class.",".$_SESSION['idUsuario'].",'CURDATE()')");
        return $modificacion;
    }

    function eliminar()
    {

        $eliminacion = mysqli_query($this->_conexion, "DELETE FROM Cliente WHERE idCliente = $this->_idCliente");
        // $auditoria = mysqli_query ($this->_conexion, "INSERT INTO
        // Auditoria (idAuditoria, detalleAuditoria, idUsuarioAuditoria, fechaAuditoria)
        // VALUES (NULL, 'Inserto ".static::class.",".$_SESSION['idUsuario'].", 'CURDATE()')");
        return $eliminacion;
    }

    function cantidadPaginas()
    {
        $cantidadBloques = mysqli_query(
            $this->_conexion,
            "SELECT CEIL(COUNT (idCliente)/$this->_paginacion) AS cantidad FROM Cliente"
        )
            or die(mysqli_error($this->_conexion));
        $unRegistro = mysqli_fetch_array($cantidadBloques);
        return $unRegistro['cantidad'];
    }

    function listar($pagina)
    {
        if ($pagina <= 0) {
            $listado = mysqli_query($this->_conexion, "SELECT * FROM Cliente ORDER BY idCliente") or
                die(mysqli_error($this->_conexion));
            return $listado;
        } else {
            $paginacionMax = $pagina * $this->_paginacion;
            $paginacionMin = $paginacionMax - $this->_paginacion;
            $listado = mysqli_query($this->_conexion, "SELECT * FROM Cliente ORDER BY idCliente LIMIT 
            $paginacionMin, $paginacionMax") or die(mysqli_error($this->_conexion));
            return $listado;
        }
    }
}

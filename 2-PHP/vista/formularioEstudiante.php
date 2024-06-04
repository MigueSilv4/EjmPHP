<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario Estudiante</title>
</head>
<body>
    <center>
        <header>
            <h1> FORMULARIO ESTUDIANTE</h1>
        </header>
        <table>
            <tbody>
                <tr>
                    <th scope="col">Nombre Esudiante</th>
                    <th scope="col">Direccion Estudiante</th>
                    <th scope="col">Documento Estudiante</th>
                    <th scope="col">Fecha Nacimiento</th>
                    <th scope="col">Email Estudiante</th>
                </tr>

                <?php
                include_once("../modelo/conexion.php");
                $objetoConexion = new conexion();
                $conexion = $objetoConexion -> conectar();

                include_once("../modelo/estudiante.php");
                $objetoEstudiante = new Estudiante($conexion, 0, 'nombre', 'direccion', 'documento', 'fNacimiento', 'email', );
                $listaEstudiantes = $objetoEstudiante->listar();

                while ($unRegistro = mysqli_fetch_array($listaEstudiantes)){
                    echo '<tr><form id="vModificarEstudiante"' . $unRegistro["idEstudiante"] . ' action="../controlador/controladorEstudiante.php"
                    method="post">';
                        echo '<td><input type = "hidden" name="vIdEstudiante" value ="' . $unRegistro['idEstudiante'] . '">';
                        echo '    <input type = "text" name="vNombreEstudiante" value ="' . $unRegistro['nombreEstudiante'] . '"></td>';
                        echo '<td><input type = "text" name="vDireccionEstudiante" value ="' . $unRegistro['direccionEstudiante'] . '"></td>';
                        echo '<td><input type = "number" name="vDocumentoEstudiante" value ="' . $unRegistro['documentoEstudiante'] . '"></td>';
                        echo '<td><input type = "date" name="vfNacimientoEstudiante" value ="' . $unRegistro['fNacimientoEstudiante'] . '"></td>';
                        echo '<td><input type = "email" name="vEmailEstudiante" value ="' . $unRegistro['emailEstudiante'] . '"></td>';
                        echo '<td><button type="submit" name="vEnviar" value = "Modificar">MODIFICAR</button>
                          <button type="submit" name="vEnviar" value = "Eliminar">ELIMINAR</button></td>';
                        echo '</form></tr>';
                    }
                ?>

                <tr>
                    <form id="vIngresarEstudiante" action="../controlador/controladorEstudiante.php" method = "post">
                        <td> <input type="hidden" name = "vIdEstudiante" value="0">
                        <input type="text" name = "vNombreEstudiante"></td>
                        <td><input type="text" name = "vDireccionEstudiante"></td>
                        <td><input type="number" name = "vDocumentoEstudiante"></td>
                        <td><input type="date" name = "vfNacimientoEstudiante"></td>
                        <td><input type="email" name = "vEmailEstudiante"></td>
                        <td><button type="submit" name="vEnviar" value="Ingresar">Ingresar</button>
                            <button type="reset" name="vEnviar" value="Limpiar"> Limpiar</button>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
        <?php
        mysqli_free_result($listaEstudiantes);
        $objetoConexion->desconectar($conexion);
        ?>

      
    </center>
    
</body>
</html>
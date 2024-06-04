<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario Editorial</title>
</head>

<body>
    <center>
        <header>
            <h1> FORMULARIO EDITORIAL </h1>
        </header>
        <table>
            <tbody>
                <tr>
                    <th scope="col">ID Editorial</th>
                    <th scope="col">Nombre Editorial</th>
                    <th scope="col">Ciudad Editorial</th>
                    <th scope="col">Acciones</th>

                </tr>

                <?php

                include("../modelo/conexion.php");
                 $objetoConexion = new conexion();
                 $conexion = $objetoConexion->conectar();

                include("../modelo/Editorial.php");
                $objetoEditorial = new Editorial ($conexion, 0, 'nombre', 'ciudad');
                $listaEditoriales = $objetoEditorial->listar();

                while ($unRegistro = mysqli_fetch_array($listaEditoriales)) {
                    echo '<tr><form id="vModificarEditorial"' . $unRegistro["idEditorial"] . ' action="../controlador/controladorEditorial.php"
                    method="post">';
                    echo '<td><input type = "number" name="vIdEditorial" value ="' . $unRegistro['idEditorial'] . '"></td>';
                    echo '<td> <input type = "text" name="vNombreEditorial" value ="' . $unRegistro['nombreEditorial'] . '"></td>';
                    echo '<td><input type = "text" name="vCiudadEditorial" value ="' . $unRegistro['ciudadEditorial'] . '"></td>';
                    echo '<td><button type="submit" name="vEnviar" value = "Modificar">Modificar</button>
                               <button type="submit" name="vEnviar" value = "Eliminar">Eliminar</button></td>';
                    echo '</form></tr>';
                }
                ?>

                <tr>
                    <form id="vIngresarEditorial" action="../controlador/controladorEditorial.php" method="post">
                        <td><input type="number" name="vIdEditorial" value="0"></td>
                        <td><input type="text" name="vNombreEditorial"></td>
                        <td><input type="text" name="vCiudadEditorial"></td>
                        <td><button type="submit" name="vEnviar" value="Ingresar">Ingresar</button>
                            <button type="reset" name="vEnviar" value="Limpiar"> Limpiar</button>
                        </td>

                    </form>
                </tr>

            </tbody>
        </table>
        <?php
        mysqli_free_result($listaEditoriales);
        $objetoConexion->desconectar($conexion);
        ?>
    </center>

</body>

</html>
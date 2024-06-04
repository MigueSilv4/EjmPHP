<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario Autor</title>
</head>

<body>
    <center>
        <header>
            <h1> FORMULARIO AUTOR </h1>
        </header>
        <table>
            <tbody>
                <tr>
                    <th scope="col">ID Autor</th>
                    <th scope="col">Nombre Autor</th>
                    <th scope="col">Nacionalidad Autor</th>
                    <th scope="col">Acciones</th>

                </tr>

                <?php

                include("../modelo/conexion.php");
                 $objetoConexion = new conexion();
                 $conexion = $objetoConexion->conectar();

                include("../modelo/autor.php");
                $objetoAutor = new Autor ($conexion, 0, 'nombre', 'nacionalidad');
                $listaAutores = $objetoAutor->listar();

                while ($unRegistro = mysqli_fetch_array($listaAutores)) {
                    echo '<tr><form id="vModificarAutor"' . $unRegistro["idAutor"] . ' action="../controlador/controladorAutor.php"
                    method="post">';
                    echo '<td><input type = "number" name="vIdAutor" value ="' . $unRegistro['idAutor'] . '"></td>';
                    echo '<td> <input type = "text" name="vNombreAutor" value ="' . $unRegistro['nombreAutor'] . '"></td>';
                    echo '<td><input type = "text" name="vNacionalidadAutor" value ="' . $unRegistro['nacionalidadAutor'] . '"></td>';
                    echo '<td><button type="submit" name="vEnviar" value = "Modificar">Modificar</button>
                               <button type="submit" name="vEnviar" value = "Eliminar">Eliminar</button></td>';
                    echo '</form></tr>';
                }
                ?>

                <tr>
                    <form id="vIngresarAutor" action="../controlador/controladorAutor.php" method="post">
                        <td><input type="number" name="vIdAutor" value="0"></td>
                        <td><input type="text" name="vNombreAutor"></td>
                        <td><input type="text" name="vNacionalidadAutor"></td>
                        <td><button type="submit" name="vEnviar" value="Ingresar">Ingresar</button>
                            <button type="reset" name="vEnviar" value="Limpiar"> Limpiar</button>
                        </td>

                    </form>
                </tr>

            </tbody>
        </table>
        <?php
        mysqli_free_result($listaAutores);
        $objetoConexion->desconectar($conexion);
        ?>
    </center>

</body>

</html>
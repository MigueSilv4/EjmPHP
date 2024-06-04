<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario Genero Musical</title>
</head>

<body>
    <center>
        <header>
            <h1> FORMULARIO GENERO MUSICAL</h1>
        </header>
        <table>
            <tbody>
                <tr>
                    <th scope="col">ID Genero Musical</th>
                    <th scope="col">Descripcion Genero</th>


                </tr>
                <?php

                 include("../modelo/conexion.php");
                 $objetoConexion = new conexion();
                 $conexion = $objetoConexion->conectar();

                include("../modelo/generoMusical.php");
                $objetoGenero = new GeneroMusical ($conexion, 0, 'descripcion');
                $listaGeneros= $objetoGenero->listar();

                while ($unRegistro = mysqli_fetch_array($listaGeneros)) {
                    echo '<tr><form id="vModificarGenero"' . $unRegistro["idGenero"] . ' action="../controlador/controladorGeneroMusical.php"
                    method="post">';
                    echo '<td><input type = "number" name="vIdGenero" value ="' . $unRegistro['idGenero'] . '"></td>';
                    echo '<td><input type = "text" name="vDescripcionGenero" value ="' . $unRegistro['descripcionGenero'] . '"></td>';
                    echo '<td><button type="submit" name="vEnviar" value = "Modificar">Modificar</button>
                  <button type="submit" name="vEnviar" value = "Eliminar">Eliminar</button></td>';
                    echo '</form></tr>';
                }
                ?>

                <tr>
                    <form id="vIngresarGenero" action="../controlador/controladorGeneroMusical.php" method="post">
                        <td><input type="number" name="vIdGenero" value="0"></td>
                        <td><input type="text" name="vDescripcionGenero"></td>
                        <td><button type="submit" name="vEnviar" value="Ingresar">Ingresar</button>
                            <button type="reset" name="vEnviar" value="Limpiar"> Limpiar</button>
                        </td>

                    </form>
                </tr>

            </tbody>
        </table>
        <?php
        mysqli_free_result($listaGeneros);
        $objetoConexion->desconectar($conexion);
        ?>
    </center>

</body>

</html>
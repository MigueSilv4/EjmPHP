<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario Genero Literario</title>
</head>

<body>
    <center>
        <header>
            <h1> FORMULARIO GENERO LITERARIO</h1>
        </header>
        <table>
            <tbody>
                <tr>
                    <th scope="col">ID Genero Literario</th>
                    <th scope="col">Genero Literario</th>


                </tr>
                <?php

                 include("../modelo/conexion.php");
                 $objetoConexion = new conexion();
                 $conexion = $objetoConexion->conectar();

                include("../modelo/generoLiterario.php");
                $objetoGeneroLit = new GeneroLiterario ($conexion, 0, 'descripcionGeneroLit');
                $listaGenerosLit= $objetoGeneroLit->listar();

                while ($unRegistro = mysqli_fetch_array($listaGenerosLit)) {
                    echo '<tr><form id="vModificarGeneroLit"' . $unRegistro["idGeneroLit"] . ' action="../controlador/controladorGeneroLiterario.php"
                    method="post">';
                    echo '<td><input type = "number" name="vIdGeneroLit" value ="' . $unRegistro['idGeneroLit'] . '"></td>';
                    echo '<td><input type = "text" name="vDescripcionGeneroLit" value ="' . $unRegistro['descripcionGeneroLit'] . '"></td>';
                    echo '<td><button type="submit" name="vEnviar" value = "Modificar">Modificar</button>
                  <button type="submit" name="vEnviar" value = "Eliminar">Eliminar</button></td>';
                    echo '</form></tr>';
                }
                ?>

                <tr>
                    <form id="vIngresarGenero" action="../controlador/controladorGeneroLiterario.php" method="post">
                        <td><input type="number" name="vIdGeneroLit" value="0"></td>
                        <td><input type="text" name="vDescripcionGeneroLit"></td>
                        <td><button type="submit" name="vEnviar" value="Ingresar">Ingresar</button>
                            <button type="reset" name="vEnviar" value="Limpiar"> Limpiar</button>
                        </td>

                    </form>
                </tr>

            </tbody>
        </table>
        <?php
        mysqli_free_result($listaGenerosLit);
        $objetoConexion->desconectar($conexion);
        ?>
    </center>

</body>

</html>
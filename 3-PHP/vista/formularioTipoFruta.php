<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario Tipo Fruta</title>
</head>

<body>
    <center>
        <header>
            <!-- <h1> FORMULARIO TIPO FRUTA</h1> -->
        </header>
        <table>
            <tbody>
                <tr>
                    <th scope="col">Descripcion Tipo Fruta</th>
                </tr>
                <?php

                // include("../modelo/conexion.php");
                // $objetoConexion = new conexion();
                // $conexion = $objetoConexion->conectar();

                include("../modelo/tipoFruta.php");
                $objetoTipoFruta = new tipoFruta($conexion, 0, 'descripcion');
                $listaTipoFrutas = $objetoTipoFruta->listar();

                while ($unRegistro = mysqli_fetch_array($listaTipoFrutas)) {
                    echo '<tr><form id="vModificarTipoFruta"' . $unRegistro["idTipoFruta"] . ' action="../controlador/controladorTipoFruta.php"
                    method="post">';
                    echo '<td><input type = "hidden" name="vIdTipoFruta" value ="' . $unRegistro['idTipoFruta'] . '">';
                    echo '    <input type = "text" name="vDescripcionTipoF" value ="' . $unRegistro['descripcionTipoF'] . '"></td>';
                    echo '<td><button type="submit" name="vEnviar" value = "Modificar">Modificar</button>
                  <button type="submit" name="vEnviar" value = "Eliminar">Eliminar</button></td>';
                    echo '</form></tr>';
                }
                ?>

                <tr>
                    <form id="vIngresarTipoFruta" action="../controlador/controladorTipoFruta.php" method="post">
                        <td><input type="hidden" name="vIdTipoFruta" value="0">
                            <input type="text" name="vDescripcionTipoF"></td>
                        <td><button type="submit" name="vEnviar" value="Ingresar">Ingresar</button>
                            <button type="reset" name="vEnviar" value="Limpiar"> Limpiar</button>
                        </td>

                    </form>
                </tr>

            </tbody>
        </table>
        <?php
        mysqli_free_result($listaTipoFrutas);
        $objetoConexion->desconectar($conexion);
        ?>
    </center>

</body>

</html>
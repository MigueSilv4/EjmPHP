<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario Artista</title>
</head>

<body>
    <center>
        <header>
            <h1> FORMULARIO ARTISTA </h1>
        </header>
        <table>
            <tbody>
                <tr>
                    <th scope="col">ID Artista</th>
                    <th scope="col">Nombre Artista</th>
                    <th scope="col">Nacionalidad Artista</th>
                    <th scope="col">Acciones</th>

                </tr>

                <?php

                include("../modelo/conexion.php");
                 $objetoConexion = new conexion();
                 $conexion = $objetoConexion->conectar();

                include("../modelo/artista.php");
                $objetoArtista = new Artista ($conexion, 0, 'nombre', 'nacionalidad');
                $listaArtistas = $objetoArtista->listar();

                while ($unRegistro = mysqli_fetch_array($listaArtistas)) {
                    echo '<tr><form id="vModificarArtista"' . $unRegistro["idArtista"] . ' action="../controlador/controladorArtista.php"
                    method="post">';
                    echo '<td><input type = "number" name="vIdArtista" value ="' . $unRegistro['idArtista'] . '"></td>';
                    echo '<td> <input type = "text" name="vNombreArtista" value ="' . $unRegistro['nombreArtista'] . '"></td>';
                    echo '<td><input type = "text" name="vNacionalidadArtista" value ="' . $unRegistro['nacionalidadArtista'] . '"></td>';
                    echo '<td><button type="submit" name="vEnviar" value = "Modificar">Modificar</button>
                               <button type="submit" name="vEnviar" value = "Eliminar">Eliminar</button></td>';
                    echo '</form></tr>';
                }
                ?>

                <tr>
                    <form id="vIngresarArtista" action="../controlador/controladorArtista.php" method="post">
                        <td><input type="number" name="vIdArtista" value="0"></td>
                        <td><input type="text" name="vNombreArtista"></td>
                        <td><input type="text" name="vNacionalidadArtista"></td>
                        <td><button type="submit" name="vEnviar" value="Ingresar">Ingresar</button>
                            <button type="reset" name="vEnviar" value="Limpiar"> Limpiar</button>
                        </td>

                    </form>
                </tr>

            </tbody>
        </table>
        <?php
        mysqli_free_result($listaArtistas);
        $objetoConexion->desconectar($conexion);
        ?>
    </center>

</body>

</html>
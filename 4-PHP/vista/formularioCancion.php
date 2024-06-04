<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario Cancion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        center {
            margin-top: 50px;
        }

        header {
            background-color: #000;
            color: white;
            padding: 20px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #000;
            color: white;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        form input[type="text"],
        form input[type="number"] {
            width: 150px;
            padding: 5px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        form button[type="submit"],
        form button[type="reset"] {
            padding: 5px 10px;
            margin: 5px;
            border: none;
            border-radius: 3px;
            background-color: #000;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <center>
        <header>
            <h1>FORMULARIO CANCION</h1>
        </header>
        <table>
            <tbody>
                <tr>
                    <th>Nombre Cancion</th>
                    <th>Duracion Aprox (MIN)</th>
                    <th>ID Artista</th>
                    <th>ID Genero</th>
                    <th>Acciones</th>
                </tr>
                <?php
                include("../modelo/conexion.php");
                $objetoConexion = new conexion();
                $conexion = $objetoConexion->conectar();

                include("../modelo/cancion.php");
                $objetoCancion = new Cancion ($conexion, 0, 'nombre', 'duracion', 'idArtista', 'idGenero');
                $listaCanciones = $objetoCancion->listar();
                while ($unRegistro = mysqli_fetch_array($listaCanciones)) {
                    echo '<tr><form id="vModificarCancion' . $unRegistro["idCancion"] . '" action="../controlador/controladorCancion.php" method="post">';
                    echo '<td><input type="hidden" name="vIdCancion" value="' . $unRegistro['idCancion'] . '"><input type="text" name="vNombreCancion" value="' . $unRegistro['nombreCancion'] . '"></td>';
                    echo '<td><input type="number" name="vDuracionCancion" value="' . $unRegistro['duracionCancion'] . '"></td>';
                    echo '<td><input type="number" name="vIdArtista" value="' . $unRegistro['idArtista'] . '"></td>';
                    echo '<td><input type="number" name="vIdGenero" value="' . $unRegistro['idGenero'] . '"></td>';
                    echo '<td><button type="submit" name="vEnviar" value="Modificar">Modificar</button>
                    <button type="submit" name="vEnviar" value="Eliminar">Eliminar</button></td>';
                    echo '</form></tr>';
                }
                // mysqli_free_result($listaCanciones);
                // $objetoConexion->desconectar($conexion);
                ?>
                <tr>

                    <form id="vIngresarCancion" action="../controlador/controladorCancion.php" method="post">
                        <td><input type="hidden" name="vIdCancion" value="0"><input type="text" name="vNombreCancion"></td>
                        <td><input type="number" name="vDuracionCancion"></td>
                        <td><input type="number" name="vIdArtista"></td>
                        <td><input type="number" name="vIdGenero"></td>
                        <td><button type="submit" name="vEnviar" value="Ingresar">Ingresar</button>
                        <button type="reset" name="vEnviar" value="Limpiar">Limpiar</button></td>
                    </form>                   
                </tr>
            </tbody>
                  
        </table>
        <!-- <?php include_once "../vista/formulario.php"; ?> -->
        

        <?php   mysqli_free_result($listaCanciones);
                 $objetoConexion->desconectar($conexion);?>

        

    </center>
</body>

</html>

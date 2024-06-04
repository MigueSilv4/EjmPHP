<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario Fruta</title>
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
            background-color: #4CAF50;
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
            background-color: #4CAF50;
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
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <center>
        <header>
            <h1>FORMULARIO FRUTA</h1>
        </header>
        <table>
            <tbody>
                <tr>
                    <th>Nombre Fruta</th>
                    <th>Tipo Fruta</th>
                    <th>Peso Fruta (GRAMOS)</th>
                    <th>Color Fruta</th>
                    <th>Acciones</th>
                </tr>
                <?php
                include("../modelo/conexion.php");
                $objetoConexion = new conexion();
                $conexion = $objetoConexion->conectar();

                include("../modelo/fruta.php");
                $objetoFruta = new fruta($conexion, 0, 'nombre', 'tipo', 'peso', 'color');
                $listaFrutas = $objetoFruta->listar();
                while ($unRegistro = mysqli_fetch_array($listaFrutas)) {
                    echo '<tr><form id="vModificarFruta' . $unRegistro["idFruta"] . '" action="../controlador/controladorFruta.php" method="post">';
                    echo '<td><input type="hidden" name="vIdFruta" value="' . $unRegistro['idFruta'] . '"><input type="text" name="vNombreFruta" value="' . $unRegistro['nombreFruta'] . '"></td>';
                    echo '<td><input type="number" name="vIdTipoFruta" value="' . $unRegistro['idTipoFruta'] . '"></td>';
                    echo '<td><input type="number" name="vPesoFruta" value="' . $unRegistro['pesoFruta'] . '"></td>';
                    echo '<td><input type="text" name="vColorFruta" value="' . $unRegistro['colorFruta'] . '"></td>';
                    echo '<td><button type="submit" name="vEnviar" value="Modificar">Modificar</button>
                    <button type="submit" name="vEnviar" value="Eliminar">Eliminar</button></td>';
                    echo '</form></tr>';
                }
                // mysqli_free_result($listaFrutas);
                // $objetoConexion->desconectar($conexion);
                ?>
                <tr>

                    <form id="vIngresarFruta" action="../controlador/controladorFruta.php" method="post">
                        <td><input type="hidden" name="vIdFruta" value="0"><input type="text" name="vNombreFruta"></td>
                        <td><input type="number" name="vIdTipoFruta"></td>
                        <td><input type="number" name="vPesoFruta"></td>
                        <td><input type="text" name="vColorFruta"></td>
                        <td><button type="submit" name="vEnviar" value="Ingresar">Ingresar</button>
                        <button type="reset" name="vEnviar" value="Limpiar">Limpiar</button></td>
                    </form>                   
                </tr>
            </tbody>
                  
        </table>
        <?php include_once "../vista/formularioTipoFruta.php"; ?>
        

        <?php   mysqli_free_result($listaFrutas);
                 $objetoConexion->desconectar($conexion);?>

        

    </center>
</body>

</html>

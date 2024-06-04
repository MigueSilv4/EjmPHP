<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario Libro</title>
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
            background-color: #68BEB2;
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
            background-color: #68BEB2;
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
            background-color: #FB3B41;
            /* color: white; */
            cursor: pointer;
        }
    </style>
</head>

<body>
    <center>
        <header>
            <h1>FORMULARIO LIBRO</h1>
        </header>
        <table>
            <tbody>
                <tr>
                    <th>Titulo Libro</th>
                    <th>Paginas Libro</th>
                    <th>ID Autor</th>
                    <th>ID Genero Literario</th>
                    <th>ID Editorial</th>
                    <th>Acciones</th>
                </tr>
                <?php
                include("../modelo/conexion.php");
                $objetoConexion = new conexion();
                $conexion = $objetoConexion->conectar();

                include("../modelo/libro.php");
                $objetoLibro = new Libro ($conexion, 0, 'nombre', 'paginas', 'idAutor', 'idGeneroLit', 'idEditorial');
                $listaLibros = $objetoLibro->listar();
                while ($unRegistro = mysqli_fetch_array($listaLibros)) {
                    echo '<tr><form id="vModificarLibro' . $unRegistro["idLibro"] . '" action="../controlador/controladorLibro.php" method="post">';
                    echo '<td><input type="hidden" name="vIdLibro" value="' . $unRegistro['idLibro'] . '"><input type="text" name="vTituloLibro" value="' . $unRegistro['tituloLibro'] . '"></td>';
                    echo '<td><input type="number" name="vPaginasLibro" value="' . $unRegistro['paginasLibro'] . '"></td>';
                    echo '<td><input type="number" name="vIdAutor" value="' . $unRegistro['idAutor'] . '"></td>';
                    echo '<td><input type="number" name="vIdGeneroLit" value="' . $unRegistro['idGeneroLit'] . '"></td>';
                    echo '<td><input type="number" name="vIdEditorial" value="' . $unRegistro['idEditorial'] . '"></td>';
                    echo '<td><button type="submit" name="vEnviar" value="Modificar">Modificar</button>
                    <button type="submit" name="vEnviar" value="Eliminar">Eliminar</button></td>';
                    echo '</form></tr>';
                }
                // mysqli_free_result($listaLibros);
                // $objetoConexion->desconectar($conexion);
                ?>
                <tr>

                    <form id="vIngresarLibro" action="../controlador/controladorLibro.php" method="post">
                        <td><input type="hidden" name="vIdLibro" value="0"><input type="text" name="vTituloLibro"></td>
                        <td><input type="number" name="vPaginasLibro"></td>
                        <td><input type="number" name="vIdAutor"></td>
                        <td><input type="number" name="vIdGeneroLit"></td>
                        <td><input type="number" name="vIdEditorial"></td>
                        <td><button type="submit" name="vEnviar" value="Ingresar">Ingresar</button>
                        <button type="reset" name="vEnviar" value="Limpiar">Limpiar</button></td>
                    </form>                   
                </tr>
            </tbody>
                  
        </table>
        <!-- <?php include_once "../vista/formulario.php"; ?> -->
        

        <?php   mysqli_free_result($listaLibros);
                 $objetoConexion->desconectar($conexion);?>

        

    </center>
</body>

</html>

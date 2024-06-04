<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario Cliente</title>
</head>

<body>
    <center>
    <header>
       
        <h1> FORMULARIO CLIENTE</h1>
        
        
    </header>
    <table>

        <tbody>
            <tr>
                <th scope="col"> Nombre Cliente</th>
                <th scope="col"> Documento Cliente</th>
                <th scope="col"> Email Cliente</th>
                <th scope="col"> </th>
            </tr>
          

            <?php


            include_once("../modelo/conexion.php");
            $objetoConexion = new conexion();
            $conexion = $objetoConexion->conectar();

            include_once("../modelo/cliente.php");
            $objetoCliente = new cliente($conexion, 0, 'nombre', 'documento', 'correo');
            $listaClientes = $objetoCliente->listar(0);
           
            while ($unResgistro = mysqli_fetch_array($listaClientes)) {
                echo '<tr><form id="vModificarCliente"' . $unResgistro["idCliente"] . ' action="../controlador/controladorCliente.php"
            method="post">';
                echo '<td><input type = "hidden" name="vIdCliente" value ="' . $unResgistro['idCliente'] . '">';
                echo '    <input type = "text" name="vNombreCliente" value ="' . $unResgistro['nombreCliente'] . '"></td>';
                echo '<td><input type = "number" name="vDocumentoCliente" value ="' . $unResgistro['documentoCliente'] . '"></td>';
                echo '<td><input type = "email" name="vCorreoCliente" value ="' . $unResgistro['correoCliente'] . '"></td>';
                echo '<td><button type="submit" name="vEnviar" value = "Modificar">Modificar--------</button>
                  <button type="submit" name="vEnviar" value = "Eliminar">Eliminar----------</button></td>';
                echo '</form></tr>';
            }
            ?>

            <tr>
                <form id="vIngresarCliente" action="../controlador/controladorCliente.php" method="post">
                    <td><input type="hidden" name="vIdCliente" value="0">
                        <input type="text" name="vNombreCliente"></td>
                    <td><input type="number" name="vDocumentoCliente"></td>
                    <td><input type="email" name="vCorreoCliente"></td>
                    <td><button type="submit" name="vEnviar" value="Ingresar">Ingresar</button>
                        <button type="reset" name="vEnviar" value="Limpiar"> Limpiar</button>
                    </td>

                </form>
            </tr>
        </tbody>
    </table>
    <?php
    mysqli_free_result($listaClientes);
    $objetoConexion->desconectar($conexion);
    ?>
    </center> 
</body>

</html>
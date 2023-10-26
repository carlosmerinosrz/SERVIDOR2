<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitas de Jesuitas</title>
    <style>
        body{
            font-family: arial;
        }
        table{
            border: 2px solid black;
            border-collapse: collapse;
            margin: auto;
        }
        tr, td, th{
            border: 2px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
        require 'configdb.php';

        $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BBDD);
        if (!$conexion) {
            die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
        }

        $sql = "SELECT v.idVisita, j.nombre AS nombre_jesuita, l.lugar, v.fechaHora
                FROM visita v
                JOIN jesuita j ON v.idJesuita = j.idJesuita
                JOIN lugar l ON v.ip = l.ip;";
        $resultado = mysqli_query($conexion, $sql);
    ?>
    <table>
        <tr>
            <th>ID Visita</th>
            <th>Nombre Jesuita</th>
            <th>Lugar</th>
            <th>Fecha y Hora</th>
        </tr>
        <?php
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<tr>";
                    echo "<td>" . $fila['idVisita'] . "</td>";
                    echo "<td>" . $fila['nombre_jesuita'] . "</td>";
                    echo "<td>" . $fila['lugar'] . "</td>";
                    echo "<td>" . $fila['fechaHora'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <?php
        mysqli_close($conexion);
    ?>
</body>
</html>

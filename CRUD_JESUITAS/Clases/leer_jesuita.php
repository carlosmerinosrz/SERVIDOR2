
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require '../../configdb.php';
        $conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BBDD);
        
        $sql = "SELECT nombre, firma FROM jesuita;";
        $resultado = mysqli_query($conexion, $sql);
        echo "<table>";
                echo "<tr>";
                    echo "<th>NOMBRES</th>";
                    echo "<th>FIRMAS</th>";
                echo "</tr>";
            while ($fila = mysqli_fetch_array($resultado)){
                echo "<tr>";   
                    echo "<td>".$fila['nombre']."</td>";
                    echo "<td>".$fila['firma']."</td>";
                echo "</tr>";  
            }
        echo "</table>";
    ?>
</body>
</html>
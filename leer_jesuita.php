
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        $servidor = "localhost";
        $usuario = "root";
        $contraseña = "";
        $bbdd="bbdd_jesuitas";
        
        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $bbdd);
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
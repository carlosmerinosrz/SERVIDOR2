<?php
class Crear_jesuita
{
    private $conexion;

    public function __construct()
    {
        require '../../configdb.php';
        $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BBDD);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function crearJesuita($idJesuita, $nombre, $firma)
    {
        // Verificar si el ID del Jesuita ya existe en la base de datos
        $existeJesuita = "SELECT idJesuita FROM jesuita WHERE idJesuita = '$idJesuita'";
        $resultado = $this->conexion->query($existeJesuita);

        if ($resultado->num_rows > 0) {
            return "El ID del Jesuita ya existe.";
        }

        // Si el ID no existe
        $sql = "INSERT INTO jesuita (idJesuita, nombre, firma) VALUES ('$idJesuita', '$nombre', '$firma')";

        if ($this->conexion->query($sql) === TRUE) {
            return "Jesuita creado con éxito.";
        } else {
            return "Error al crear el jesuita: " . $this->conexion->error;
        }
    }

    public function cerrarConexion()
    {
        $this->conexion->close();
    }
}
?>

<?php
class CrudJesuita
{
    private $conexion;

    public function __construct()
    {
        $servidor = "localhost";
        $usuario = "root";
        $contrasena = ""; // Corregir la variable de la contraseña
        $bbdd = "bbdd_jesuitas";

        $this->conexion = new mysqli($servidor, $usuario, $contrasena, $bbdd);

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

// Procesar el formulario
if (isset($_POST['enviar'])) {
    $idJesuita = $_POST['idJesuita'];
    $nombre = $_POST['nombre'];
    $firma = $_POST['firma'];

    $crud = new CrudBiblioteca();
    $mensaje = $crud->crearJesuita($idJesuita, $nombre, $firma);
    $crud->cerrarConexion();
    echo $mensaje;
}
?>

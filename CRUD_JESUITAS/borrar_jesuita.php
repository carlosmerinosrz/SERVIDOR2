<?php
class CrudJesuita
{
    private $conexion;

    public function __construct()
    {
        $servidor = "localhost";
        $usuario = "root";
        $contraseña = "";
        $bbdd = "bbdd_jesuitas";

        $this->conexion = new mysqli($servidor, $usuario, $contraseña, $bbdd);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function borrarJesuita($idJesuita)
    {
        $sql = "DELETE FROM jesuita WHERE idJesuita = $idJesuita";

        if ($this->conexion->query($sql) === TRUE) {
            return "Jesuita eliminado con éxito.";
        } else {
            return "Error al eliminar el Jesuita: " . $this->conexion->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Reemplaza estos valores por los nombres de tus campos de formulario.
    $idJesuita = $_POST["idJesuita"];

    $crud = new CrudJesuita();

    $mensaje = $crud->borrarJesuita($idJesuita);

    echo $mensaje;
}
?>

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

    public function modifJesuita($idJesuita, $nuevoIdJesuita, $nuevoNombre, $firma)
    {
        // Crear una copia con el nuevo ID
        $sql = "INSERT INTO jesuita (idJesuita, nombre, firma) VALUES ($nuevoIdJesuita, '$nuevoNombre', '$firma')";
        
        if ($this->conexion->query($sql) === TRUE) {
            // Eliminar el registro original
            $sql = "DELETE FROM jesuita WHERE idJesuita=$idJesuita";
            if ($this->conexion->query($sql) === TRUE) {
                return "Jesuita actualizado con éxito.";
            } else {
                return "Error al actualizar el jesuita: " . $this->conexion->error;
            }
        } else {
            return "Error al actualizar el jesuita: " . $this->conexion->error;
        }
    }
}

// Procesar la solicitud POST del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $idJesuita = $_POST["idJesuita"];
    $nuevoIdJesuita = $_POST["nuevoIdJesuita"];
    $nuevoNombre = $_POST["nuevoNombre"];
    $nuevaFirma = $_POST["nuevaFirma"];

    // Crea una instancia de la clase CrudJesuita
    $crud = new CrudJesuita();

    // Llama a la función para modificar al jesuita
    $resultado = $crud->modifJesuita($idJesuita, $nuevoIdJesuita, $nuevoNombre, $nuevaFirma);

    // Muestra el resultado
    echo $resultado;
}
?>

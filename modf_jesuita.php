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

    public function modifJesuita($idJesuita, $nuevoNombre, $firma)
    {
        $sql = "UPDATE jesuita SET nombre='$nuevoNombre', firma='$firma' WHERE idJesuita=$idJesuita";

        if ($this->conexion->query($sql) === TRUE) {
            return "Jesuita actualizado con éxito.";
        } else {
            return "Error al actualizar el jesuita: " . $this->conexion->error;
        }
    }
}

// Procesar la solicitud POST del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $idJesuita = $_POST["idJesuita"];
    $nuevoNombre = $_POST["nuevoNombre"];
    $nuevaFirma = $_POST["nuevaFirma"];

    // Crea una instancia de la clase CrudBiblioteca
    $crud = new CrudBiblioteca();

    // Llama a la función para modificar al jesuita
    $resultado = $crud->modifJesuita($idJesuita, $nuevoNombre, $nuevaFirma);

    // Muestra el resultado
    echo $resultado;
}
?>

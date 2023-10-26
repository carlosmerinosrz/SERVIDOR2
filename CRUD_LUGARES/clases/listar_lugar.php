<?php
class CrudLugar
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

    public function modifLugar($ip, $nuevoLugar, $nuevaDescripcion)
    {
        // Actualizar el registro con el nuevo lugar y descripción
        $sql = "UPDATE lugar SET lugar = '$nuevoLugar', descripcion = '$nuevaDescripcion' WHERE ip = '$ip'";
        
        if ($this->conexion->query($sql) === TRUE) {
            return "Lugar actualizado con éxito.";
        } else {
            return "Error al actualizar el lugar: " . $this->conexion->error;
        }
    }
}

// Procesar la solicitud POST del formulario
if(isset($_POST['enviar'])) {
    $ip = $_POST["ip"];
    $nuevoLugar = $_POST["nuevoLugar"];
    $nuevaDescripcion = $_POST["nuevaDescripcion"];

    $crud = new CrudLugar();
    $resultado = $crud->modifLugar($ip, $nuevoLugar, $nuevaDescripcion);
    echo $resultado;
}
?>

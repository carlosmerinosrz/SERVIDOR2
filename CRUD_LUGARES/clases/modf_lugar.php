<?php
class Modif_lugar
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
?>

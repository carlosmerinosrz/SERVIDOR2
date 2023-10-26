<?php
class Borrar_jesuita
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
?>

<?php
    class Modf_jesuita{
        private $conexion;

        public function __construct()
        {
            require '../../configdb.php';
            $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BBDD);

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
?>

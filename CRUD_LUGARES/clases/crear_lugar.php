<?php
    class Crear_lugar{
        private $conexion;

        public function __construct(){
            require '../../configdb.php';
             $this->conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENIA, BBDD);
            if ($this->conexion -> connect_error) {
                die("Error de conexion: ". $this->conexion->connect_error);
            }
        }

        public function crearLugar($ip, $lugar, $descripcion){
            $consultarLugares = "SELECT * FROM `lugar` WHERE ip= '$ip'" ;
            $resultadoLugar = $this->conexion->query($consultarLugares);
            if($resultadoLugar->num_rows > 0)
                return "La ip de la ciudad ya existe";
            $sql = "INSERT INTO lugar(ip, lugar, descripcion) VALUES('$ip', '$lugar', '$descripcion'); ";
            echo $sql;
            if($this->conexion->query($sql)===TRUE){
                return "La ciudad se ha añadido correctamente";
            }
            else{
                return "No se ha añadido la ciudad." .$this->conexion->error;
            }  
        }
    }
?>
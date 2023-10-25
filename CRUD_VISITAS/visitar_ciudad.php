<?php
class CrudVisita
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

    public function visita($idJesuita, $ip)
    {
        // Utiliza comillas simples alrededor de $ip en la consulta SQL
        $sql = "INSERT INTO visita (idJesuita, ip, fechaHora) VALUES ($idJesuita, '$ip', NOW());";

        if ($this->conexion->query($sql) === TRUE) {
            return "Visita realizada con éxito.";
        } else {
            return "Error al visitar la ciudad: " . $this->conexion->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Reemplaza estos valores por los nombres de tus campos de formulario.
    $idJesuita = $_POST["idJesuita"];
    $ip = $_POST["ip"];

    $crud = new CrudVisita();

    $mensaje = $crud->visita($idJesuita, $ip);

    echo $mensaje;
}
?>

<?php
class CrudBiblioteca
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
            echo ("Error de conexión");
        }
    }

    public function leerJesuitas($nombre)
    {
        $sql = "SELECT * FROM `jesuita` WHERE nombre='$nombre'; ";
        echo $sql;
        $resultado = $this->conexion->query($sql);

        if($resultado ->num_rows> 0){
            $fila = $resultado ->/*fetch_row()*/fetch_row();
            foreach ($fila as $indice=> $conta) {
                echo "<p>".$conta."</p>";
            }      
        } else {
            echo "<p>NO SE HA ENCONTRADO</p>";
        }
    }
}

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $crud = new CrudBiblioteca();
    $crud->leerJesuitas($nombre);
}
?>

<?php
if (isset($_POST['enviar'])) {
    $enviar = $_POST['enviar'];
    switch ($enviar) {
        case 'Crear Lugar': // Debes coincidir con el valor del botón
            $ip = $_POST["ip"];
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            require '../clases/crear_lugar.php';
            $crud = new Crear_lugar();
            $mensaje = $crud->crearLugar($ip, $nombre, $descripcion);
            echo $mensaje;
            break;
        case 'Actualizar Lugar':
            $ip = $_POST["ip"];
            $nuevoLugar = $_POST["nuevoLugar"];
            $nuevaDescripcion = $_POST["nuevaDescripcion"];
            require '../Clases/actualizar_lugar.php';
            $crud = new Modif_lugar();
            $mensaje = $crud->modifLugar($ip, $nuevoLugar, $nuevaDescripcion);
            echo $mensaje;
            break;
        case 'Listar Lugares':
            $idJesuita = $_POST["idJesuita"];
            $nuevoIdJesuita = $_POST["nuevoIdJesuita"];
            $nuevoNombre = $_POST["nuevoNombre"];
            $nuevaFirma = $_POST["nuevaFirma"];
            require '../Clases/modf_jesuita.php';
            $crud = new Modf_jesuita();
            $resultado = $crud->modifJesuita($idJesuita, $nuevoIdJesuita, $nuevoNombre, $nuevaFirma);
            echo $resultado;
            break;
        default:
            echo "Acción no válida.";
            break;
    }
}
?>

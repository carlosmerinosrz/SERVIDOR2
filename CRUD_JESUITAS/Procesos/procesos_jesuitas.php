<?php
if (isset($_POST['enviar'])) {
    $enviar = $_POST['enviar'];
    switch ($enviar) {
        case 'Crear Jesuita': // Debes coincidir con el valor del botón
            $idJesuita = $_POST["idJesuita"];
            $nombre = $_POST["nombre"];
            $firma = $_POST["firma"];
            require '../Clases/crear_jesuita.php';
            $crud = new Crear_jesuita();
            $mensaje = $crud->crearJesuita($idJesuita, $nombre, $firma);
            echo $mensaje;
            break;
        case 'Borrar Jesuita':
            $idJesuita = $_POST["idJesuita"];
            require '../Clases/borrar_jesuita.php';
            $crud = new Borrar_jesuita();
            $mensaje = $crud->borrarJesuita($idJesuita);
            echo $mensaje;
            break;
        case 'Modificar Jesuita':
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

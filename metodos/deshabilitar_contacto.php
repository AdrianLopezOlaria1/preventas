<?php
if (isset($_POST['id'])) {

    $data_id = $_POST['id'];
    $id_values = explode(',', $data_id);
    $contactoId = $id_values[0];
    $usuarioId = $id_values[1];

    require_once('../config/conexion.php');

    // Crear una instancia 
    $conexion = new Conexion();

    $conn = $conexion->getConexion();

    require_once('../clases/Contacto.php');

    $contacto = new Contacto();

    $resultado = $contacto->deshabilitarContacto($conn, $contactoId, $usuarioId);

    if ($resultado === true) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode($resultado); 
    }

    $conn->close();
} else {

    echo json_encode(array('error' => 'No se recibió '));
}
?>
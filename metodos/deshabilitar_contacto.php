<?php
if (isset($_POST['id'])) {

    $contactoId = $_POST['id'];

    require_once('../config/conexion.php');

    // Crear una instancia 
    $conexion = new Conexion();

    $conn = $conexion->getConexion();

    require_once('../clases/Contacto.php');

    $contacto = new Contacto();

    $resultado = $contacto->deshabilitarContacto($conn, $contactoId);

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
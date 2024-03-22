<?php
if (isset($_POST['id'])) {
    $preventaId = $_POST['id'];

    require_once('../config/conexion.php');

    // Crear una instancia 
    $conexion = new Conexion();
    $conn = $conexion->getConexion();

    require_once('../clases/Preventa.php');

    $preventa = new Preventa();

    $resultado = $preventa->denegarPreventa($conn, $preventaId);

    if ($resultado === true) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode($resultado); 
    }

    $conn->close();
} else {
    echo json_encode(array('error' => 'No se recibió el ID de la preventa.'));
}

?>
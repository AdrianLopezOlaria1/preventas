<?php
if (isset($_POST['id'])) {

    $clienteId = $_POST['id'];

    require_once('../config/conexion.php');

    // Crear una instancia 
    $conexion = new Conexion();

    $conn = $conexion->getConexion();

    require_once('../clases/Cliente.php');

    $cliente = new Cliente();

    $resultado = $cliente->deshabilitarCliente($conn, $clienteId);

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
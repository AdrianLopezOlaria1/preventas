<?php
require_once '../clases/Contacto.php'; 
require_once '../config/conexion.php'; 

$id_cliente = isset($_GET['id_cliente']) ? $_GET['id_cliente'] : null;
$conexion = new Conexion();
$conn = $conexion->getConexion();
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$contacto = new Contacto();
if ($id_cliente !== null) {
    $contactos = $contacto->obtenerContactosPorCliente($conn, $id_cliente);
} else {
    $contactos = $contacto->obtenerContactos($conn);
}
echo json_encode($contactos);
$conn->close();
?>

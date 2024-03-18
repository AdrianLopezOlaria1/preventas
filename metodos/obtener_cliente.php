<?php
require_once '../clases/Cliente.php';

// Verificar si se proporcionó el ID del cliente
if (!isset($_GET['id'])) {
    http_response_code(400); // Bad request
    echo json_encode(array("error" => "No se proporcionó el ID del cliente."));
    exit;
}

// Obtener el ID del cliente desde la solicitud
$idCliente = $_GET['id'];

// Crear una instancia de la clase Cliente
$cliente = new Cliente();

// Obtener la conexión
$conexion = new Conexion();
$conn = $conexion->getConexion();

// Obtener los datos del cliente en formato JSON
$clienteJson = $cliente->obtenerClienteJson($conn, $idCliente);

// Devolver los datos del cliente como respuesta JSON
echo $clienteJson;
?>
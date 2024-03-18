<?php
// Incluir el archivo de conexión
include_once '../config/conexion.php';

// Verificar si se proporcionó el ID del cliente
if (!isset($_GET['id'])) {
    http_response_code(400); // Bad request
    echo json_encode(array("error" => "No se proporcionó el ID del cliente."));
    exit;
}

// Obtener el ID del cliente desde la solicitud
$idCliente = $_GET['id'];

// Crear una instancia de la clase de conexión
$conexion = new Conexion();
$mysqli = $conexion->getConexion();

// Consulta SQL para obtener el cliente específico según su ID
$sql = "SELECT nombre FROM clientes WHERE id = $idCliente";

// Ejecutar la consulta
$resultado = $mysqli->query($sql);

// Verificar si se encontró el cliente
if ($resultado->num_rows > 0) {
    // Obtener los datos del cliente
    $cliente = $resultado->fetch_assoc();
    // Devolver los datos del cliente como respuesta JSON
    echo json_encode($cliente);
} else {
    // No se encontró ningún cliente con el ID proporcionado
    http_response_code(404); // Not found
    echo json_encode(array("error" => "No se encontró ningún cliente con el ID proporcionado."));
}

// Cerrar la conexión
$mysqli->close();
?>

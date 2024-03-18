<?php
// Incluir el archivo de conexión a la base de datos


// Verificar si se recibió el ID del cliente
if (isset($_POST['id'])) {
    // Obtener el ID del cliente
    $clienteId = $_POST['id'];

    require_once('../config/conexion.php');

    $conexion = new Conexion();
    $conexion = $conexion->getConexion();

    // Escapar los datos para evitar inyección de SQL
    $clienteId = $conexion->real_escape_string($clienteId);

    // Construir la consulta SQL para deshabilitar el cliente
    $consulta = "UPDATE clientes SET status = 'D' WHERE id = $clienteId";

    // Ejecutar la consulta
    if ($conexion->query($consulta) === TRUE) {
        // Éxito: devolver una respuesta JSON indicando éxito
        echo json_encode(array('success' => true));
    } else {
        // Error: devolver una respuesta JSON indicando el error
        echo json_encode(array('error' => 'Error al deshabilitar el cliente: ' . $conexion->error));
    }
} else {
    // Si no se recibió el ID del cliente, devolver un error
    echo json_encode(array('error' => 'No se recibió el ID del cliente.'));
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

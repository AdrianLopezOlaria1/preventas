<?php
// Verificar si se recibieron los datos del formulario

if (isset($_POST['clienteId']) && isset($_POST['nombreCliente'])) {
    // Incluir el archivo de conexión a la base de datos
    require_once('../config/conexion.php');

    // Crear una instancia de la clase Conexion para obtener la conexión
    $conexion = new Conexion();
    $conexion = $conexion->getConexion();

    // Obtener los datos del formulario
    $clienteId = $_POST['clienteId'];
    $nombreCliente = $_POST['nombreCliente'];

    // Escapar los datos para evitar inyección de SQL
    $clienteId = $conexion->real_escape_string($clienteId);
    $nombreCliente = $conexion->real_escape_string($nombreCliente);

    // Obtener la fecha actual
    $fechaModificacion = date('Y-m-d H:i:s');

    // Construir la consulta SQL para actualizar el nombre del cliente, fecha de modificación y status
    $consulta = "UPDATE clientes SET nombre = '$nombreCliente', fecha_modificacion = '$fechaModificacion', status = 'M' WHERE id = '$clienteId'";

    // Ejecutar la consulta
    if ($conexion->query($consulta) === TRUE) {
        // Éxito: devolver una respuesta JSON indicando éxito
        echo json_encode(array('success' => true));
    } else {
        // Error: devolver una respuesta JSON indicando el error
        echo json_encode(array('error' => 'Error al actualizar el cliente: ' . $conexion->error));
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si no se recibieron los datos del formulario, devolver un error
    echo json_encode(array('error' => 'No se recibieron los datos del formulario.'));
}
?>

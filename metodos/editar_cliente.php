<?php
// Incluir el archivo que contiene la definición de la clase Conexion
require_once '../config/Conexion.php';

// Crear un array para almacenar la respuesta
$response = array();

// Verificar si se recibieron los datos del formulario
if (isset($_POST['clienteId']) && isset($_POST['nombreCliente'])) {
    require_once '../clases/Cliente.php';
    // Obtener los datos del formulario
    $clienteId = $_POST['clienteId'];
    $nombreCliente = $_POST['nombreCliente'];
    $idUser = $_POST['usuario_id'];
    
    // Crear una instancia de la clase Conexion para obtener la conexión
    $conexion = new Conexion();
    $conn = $conexion->getConexion();

    // Crear una instancia de la clase Cliente para editar el cliente
    $cliente = new Cliente();
    // Llamar al método editarCliente y pasarle la conexión
    $resultado = $cliente->editarCliente($conn, $clienteId, $nombreCliente, $idUser);

    // Verificar si hubo un error
    if ($resultado) {
        // Éxito: enviar mensaje de éxito
        $response['success'] = true;
        $response['message'] = "Cliente modificado exitosamente.";
    } else {
        // Error: enviar mensaje de error
        $response['error'] = "Ese nombre está en uso.";
    }
} else {
    // Si no se recibieron los datos del formulario, devolver un error
    $response['error'] = "No se recibieron los datos del formulario.";
}

// Devolver la respuesta como JSON
echo json_encode($response);
?>

<?php
// Incluir el archivo que contiene la definición de la clase Conexion
require_once '../config/Conexion.php';

// Crear un array para almacenar la respuesta
$response = array();

// Verificar si se recibieron los datos del formulario
if (isset($_POST['contactoId']) && isset($_POST['nombreContacto']) && isset($_POST['emailContacto']) && isset($_POST['telContacto'])) {
    require_once '../clases/Contacto.php';
    // Obtener los datos del formulario
    $contactoId = $_POST['contactoId'];
    $nombreContacto = $_POST['nombreContacto'];
    $emailContacto = $_POST['emailContacto'];
    $telContacto = $_POST['telContacto'];

    // Crear una instancia de la clase Conexion para obtener la conexión
    $conexion = new Conexion();
    $conn = $conexion->getConexion();

    // Crear una instancia de la clase Cliente para editar el cliente
    $contacto = new Contacto();
    // Llamar al método editarContacto y pasarle la conexión
    $resultado = $contacto->editarContacto($conn, $contactoId, $nombreContacto, $emailContacto, $telContacto);

    // Verificar si hubo un error
    if ($resultado) {
        // Éxito: enviar mensaje de éxito
        $response['success'] = true;
        $response['message'] = "Contacto modificado exitosamente.";
    } else {
        // Error: enviar mensaje de error
        $response['error'] = "Error al modificar.";
    }
} else {
    // Si no se recibieron los datos del formulario, devolver un error
    $response['error'] = "No se recibieron los datos del formulario.";
}

// Devolver la respuesta como JSON
echo json_encode($response);
?>
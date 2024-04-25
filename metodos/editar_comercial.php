<?php
// Incluir el archivo que contiene la definición de la clase Conexion
require_once '../config/Conexion.php';

// Crear un array para almacenar la respuesta
$response = array();

// Verificar si se recibieron los datos del formulario
if (isset($_POST['comercialId']) && isset($_POST['nombreComercial']) && isset($_POST['emailComercial'])) {
    require_once '../clases/Comercial.php';
    // Obtener los datos del formulario
    $comercialId = $_POST['comercialId'];
    $nombreComercial = $_POST['nombreComercial'];
    $emailComercial = $_POST['emailComercial'];
    $idUser = $_POST['id_usuario'];
    // Crear una instancia de la clase Conexion para obtener la conexión
    $conexion = new Conexion();
    $conn = $conexion->getConexion();

    // Crear una instancia de la clase Cliente para editar el cliente
    $comercial = new Comercial();
    // Llamar al método editarCliente y pasarle la conexión
    $resultado = $comercial->editarComercial($conn, $comercialId, $nombreComercial,  $emailComercial, $idUser);

    // Verificar si hubo un error
    if ($resultado) {
        // Éxito: enviar mensaje de éxito
        $response['success'] = true;
        $response['message'] = "Cliente modificado exitosamente.";
    } elseif(isset($_SESSION['error'])) {
        $response['error'] = "Debe poner un nombre";
     } else {
        // Error: enviar mensaje de error
        $response['error'] = "Ese email está en uso.";
    }
} else {
    // Si no se recibieron los datos del formulario, devolver un error
    $response['error'] = "No se recibieron los datos del formulario.";
}

// Devolver la respuesta como JSON
echo json_encode($response);
?>

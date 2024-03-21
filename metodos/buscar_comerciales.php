<?php
require_once '../clases/Comercial.php'; // Asegúrate de que el nombre del archivo sea 'Cliente.php'
require_once '../config/conexion.php'; // Asegúrate de que el nombre del archivo sea 'Conexion.php'

// Verificar si se ha recibido el término de búsqueda
if (isset($_GET['termino'])) {
    // Obtener el término de búsqueda desde la solicitud GET
    $termino = $_GET['termino'];

    // Crear una instancia de la clase Conexion
    $conexion = new Conexion();
    $conn = $conexion->getConexion();

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Crear una instancia de la clase Cliente
    $comerciales = new Comercial();

    // Llamar al método buscarClientes y pasarle el término de búsqueda y la conexión
    $comerciales = $comerciales->buscarComerciales($conn, $termino);

    // Devolver los clientes en formato JSON
    echo json_encode($comerciales);

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibe el término de búsqueda, devolver un mensaje de error
    echo json_encode(array('error' => 'No se ha proporcionado un término de búsqueda.'));
}
?>

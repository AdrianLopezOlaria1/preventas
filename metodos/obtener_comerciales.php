<?php
require_once '../clases/Comercial.php'; // Asegúrate de que el nombre del archivo sea 'Cliente.php'
require_once '../config/conexion.php'; // Asegúrate de que el nombre del archivo sea 'Conexion.php'

// Crear una instancia de la clase Conexion
$conexion = new Conexion();
$conn = $conexion->getConexion();

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear una instancia de la clase Cliente
$comercial = new Comercial();

// Llamar al método obtenerClientes y pasarle la conexión
$comerciales = $comercial->obtenerComercialesJson($conn);

// Devolver los clientes en formato JSON
echo json_encode($comerciales);

// Cerrar la conexión a la base de datos
$conn->close();
?>

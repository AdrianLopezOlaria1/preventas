<?php
require_once '../clases/Cliente.php'; // Asegúrate de que el nombre del archivo sea 'Cliente.php'
require_once '../config/conexion.php'; // Asegúrate de que el nombre del archivo sea 'Conexion.php'

// Crear una instancia de la clase Conexion
$conexion = new Conexion();
$conn = $conexion->getConexion();

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear una instancia de la clase Cliente
$cliente = new Cliente();

// Llamar al método obtenerClientes y pasarle la conexión
$clientes = $cliente->obtenerClientes($conn);

// Devolver los clientes en formato JSON
echo json_encode($clientes);

// Cerrar la conexión a la base de datos
$conn->close();
?>

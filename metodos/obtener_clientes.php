<?php
require_once '../config/conexion.php'; // Asegúrate de que el nombre del archivo sea 'Conexion.php'

// Crear una instancia de la clase Conexion
$conexion = new Conexion();
$conn = $conexion->getConexion();

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener la lista de clientes
$sql = "SELECT id, nombre, status FROM clientes";
$result = $conn->query($sql);

$clientes = array();

if ($result->num_rows > 0) {
    // Recorrer los resultados y guardar cada cliente en un array
    while($row = $result->fetch_assoc()) {
        $cliente = array(
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'status' => $row['status'],
        );
        $clientes[] = $cliente;
    }
}

// Devolver los clientes en formato JSON
echo json_encode($clientes);

// Cerrar la conexión a la base de datos
$conn->close();
?>

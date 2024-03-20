<?php
require_once '../clases/Contacto.php'; 
require_once '../config/conexion.php'; 

// Crear una instancia de la clase Conexion
$conexion = new Conexion();
$conn = $conexion->getConexion();

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear una instancia de la clase Contaxcto
$contacto = new Contacto();

// Llamar al método obtenerContactos y pasarle la conexión
$contactos = $contacto->obtenerContactos($conn);

// Devolver los contactos en formato JSON
echo json_encode($contactos);

// Cerrar la conexión a la base de datos
$conn->close();
?>
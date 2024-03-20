<?php
require_once '../clases/Contacto.php';

// Verificar si se proporcionó el ID del contacto
if (!isset($_GET['id'])) {
    http_response_code(400); // Bad request
    echo json_encode(array("error" => "No se proporcionó el ID del contacto."));
    exit;
}

// Obtener el ID del contacto desde la solicitud
$idContacto = $_GET['id'];

// Crear una instancia de la clase Contacto
$contacto = new Contacto();

// Obtener la conexión
$conexion = new Conexion();
$conn = $conexion->getConexion();

// Obtener los datos del contacto en formato JSON
$contactoJson = $contacto->obtenerContactoJson($conn, $idContacto);

// Devolver los datos del contacto como respuesta JSON
echo $contactoJson;
?>
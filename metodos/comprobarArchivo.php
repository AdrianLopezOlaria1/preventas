<?php
// Directorio donde se guardarán los archivos subidos
$targetDir = "uploads/";

// Ruta completa del archivo subido
$targetFile = $targetDir . basename($_FILES["file"]["name"]);

// Verifica si el archivo es un PDF
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if ($fileType != "pdf") {
    echo "Error: Solo se permiten archivos PDF.";
    exit;
}

// Mueve el archivo al directorio de destino
if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    echo "El archivo PDF se ha subido correctamente.";
} else {
    echo "Ha ocurrido un error al subir el archivo.";
}
?>

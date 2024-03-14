<?php
// Incluye el archivo Usuario.php
require_once 'clases/Usuario.php';
require_once 'config/conexion.php';

// Crea una instancia de la clase Usuario
$usuario = new Usuario();

// Llama al método logout para cerrar la sesión


if($usuario->logout()){
    header("Location: index.php?action=logout");
}else{
    echo "Error cerrando sesion";
}

exit;
?>
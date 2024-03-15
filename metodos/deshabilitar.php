<?php
// Requerir la clase Usuario
require_once 'clases/Usuario.php';
require_once 'config/conexion.php';


if (isset($_SESSION['usuario']['id'])) {
    // Obtener el ID del usuario de la sesión
    $usuario_id = $_SESSION['usuario']['id'];

    $usuario = new Usuario();

    $resultado = $usuario->deshabilitar($usuario_id);

    if ($resultado) {

        //echo "Cuenta deshabilitada correctamente";

        header("Location: index.php?action=cerrando");
    } else {
        // Mostrar un mensaje de error
        echo "Error al deshabilitar la cuenta";
    }
} else {
    // Mostrar un mensaje de error si el usuario no está autenticado
    echo "El usuario no está autenticado";
}
?>

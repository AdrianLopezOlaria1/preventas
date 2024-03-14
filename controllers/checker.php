<?php
// Inicializa la variable de sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: index.php");
    exit(); // Termina el script después de redirigir
}


?>

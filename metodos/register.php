<?php
    require "clases/Usuario.php";
    $usuario = new Usuario();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["password"])) {
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $usuario->registrar($nombre, $email, $password);
        }
    }
?>

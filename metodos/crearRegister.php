<?php
require_once "../clases/Usuario.php";

$usuario = new Usuario();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $resultado = $usuario->register($nombre, $email, $password);
        if ($resultado) {
            echo "Usuario registrado correctamente";
            header("location:../index.php?action=logeado");
        } else {
            echo "Error al registrar el usuario";
        }
    }else{
        echo "rellena todos los campos";
        header("location:index.php");
    }
}
?>
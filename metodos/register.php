<?php
    require "clases/Usuario.php";
    $usuario = new Usuario();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["password"])) {
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $check = $_POST["check"];
            
            if($usuario->registrar($nombre, $email, $password, $check)){
                header("location: index.php?action=register");
            }else{
                header("location: index.php?action=register");
            }            
        }
    }
?>
 

<?php
    require "clases/Usuario.php";
    $usuario = new Usuario();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["rol"])) {
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $rol = $_POST['rol'];
            
            if($usuario->registrar($nombre, $email, $password, $rol)){
                header("location: index.php?action=register");
            }else{
                header("location: index.php?action=register");
            }
                
            
        }
    }
?>

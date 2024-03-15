<?php
    require "clases/Usuario.php";

    $usuario = new Usuario();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            
            if($usuario->login($email, $password)){
                $_SESSION['error_login']="";
                header("Location: index.php?action=index");
            }else{
                header('Location: index.php');
            }
        }
    }
?>
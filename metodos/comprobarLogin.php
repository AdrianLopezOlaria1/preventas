<?php
require_once "../clases/Usuario.php";

$usuario = new Usuario();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $resultado = $usuario->login($email, $password);
        if($resultado){
            echo "usuario correcto";
        }else{
            echo "usuario incorrecto";
        }
    }
}
?>
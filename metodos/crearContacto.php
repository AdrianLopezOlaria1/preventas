<?php
    require "clases/Contacto.php";
    $contacto = new Contacto();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["tel"]) ) {
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $tel = $_POST["tel"];
            
            if($contacto->nuevo($nombre, $email, $tel)){
                header("location: index.php?action=formContacto");
            }else{
                header("location: index.php?action=formContacto");
            }            
        }
    }
?>
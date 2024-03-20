<?php
    require "clases/Comercial.php";
    $comercial = new Comercial();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["nombre"]) && isset($_POST["email"])) {
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            
            if($comercial->nuevo($nombre, $email)){
                header("location: index.php?action=formComercial");
            }else{
                header("location: index.php?action=formComercial");
            }            
        }
    }
?>
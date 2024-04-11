<?php
    require "clases/Comercial.php";
    $comercial = new Comercial();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["nombre"]) && isset($_POST["email"])) {
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            
            if($comercial->nuevo($nombre, $email)){
                echo "<script>alert('Comercial creado correctamente');</script>";                
                echo "<script>window.location.href = 'index.php?action=comercialList';</script>";
            }else{
                header("location: index.php?action=formComercial");
            }            
        }
    }
?>
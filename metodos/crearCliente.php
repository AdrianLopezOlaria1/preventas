<?php
    require "clases/Cliente.php";
    $cliente = new Cliente();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"];
            
            if($cliente->nuevo($nombre)){
                echo "<script>alert('Cliente creado correctamente');</script>";                
                echo "<script>window.location.href = 'index.php?action=clientList';</script>";
            }else{
                header("location: index.php?action=formCliente");
            }            
        }
    }
?>
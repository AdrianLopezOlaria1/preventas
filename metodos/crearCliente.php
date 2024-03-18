<?php
    require "clases/Cliente.php";
    $cliente = new Cliente();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["nombre"])) {
            $nombre = $_POST["nombre"];
            
            if($cliente->nuevo($nombre)){
                header("location: index.php?action=formCliente");
            }else{
                header("location: index.php?action=formCliente");
            }            
        }
    }
?>
<?php
    require "clases/Contacto.php";
    $contacto = new Contacto();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["id_cliente"]) && isset($_POST["nombre"]) && isset($_POST["email"])) {
            $id_cliente = (int)$_POST["id_cliente"];
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];

            
            $tel = isset($_POST["tel"]) ? $_POST["tel"] : "";

            if($contacto->nuevo($id_cliente, $nombre, $email, $tel)){
                echo "<script>alert('Contacto creado correctamente');</script>";                
                echo "<script>window.location.href = 'index.php?action=contactList';</script>";
            }else{
                header("location: index.php?action=formContacto");
            }            
        }
    }
?>
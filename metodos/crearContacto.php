<?php
    require "clases/Contacto.php";
    $contacto = new Contacto();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["id_cliente"]) && isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["tel"]) ) {
            $id_cliente = (int)$_POST["id_cliente"];
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $tel = $_POST["tel"];
            if($contacto->nuevo($id_cliente, $nombre, $email, $tel)){
                header("location: index.php?action=formContacto");
            }else{
                header("location: index.php?action=formContacto");
            }            
        }
    }
?>
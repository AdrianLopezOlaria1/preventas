<?php
    require "clases/Preventa.php";
    $preventa = new Preventa();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        
        if (isset($_POST["id_cliente"]) && isset($_POST["comercial"])
        && isset($_POST["id_tipo"]) && isset($_POST["fecha_reunion"]) && isset($_POST["acta_reunion"]) 
        && isset($_POST["id_usuario"]) && isset($_POST["horas_previstas"]) && isset($_POST["importe"])){

            $id_cliente = $_POST["id_cliente"];
            $id_contacto = $_POST["id_contacto"];
            $id_comercial = $_POST["comercial"];
            $id_tipo = $_POST["id_tipo"];
            $id_usuario = $_POST["id_usuario"];
            $fecha_reunion = $_POST["fecha_reunion"];
            $fecha_presentacion = $_POST["fecha_presentacion"];
            $acta_reunion = $_POST["acta_reunion"];
            $horas_previstas = $_POST["horas_previstas"];
            $importe = $_POST["importe"];
            $status = 'P';

            $file = $_FILES['archivo'];
            if($file['name'] != ''){
                $archivo = uniqid() . '_' . $file['name'];
                move_uploaded_file($file['tmp_name'], 'assets/files/'.$archivo);
            }
            
            
            
            if($preventa->crearPreventa($id_cliente, $id_contacto, $id_comercial, $id_tipo, $id_usuario,
            $fecha_reunion, $fecha_presentacion, $horas_previstas, $acta_reunion, $archivo, $importe, $status)){
                echo "<script>alert('Preventa creada correctamente');</script>";                
                echo "<script>window.location.href = 'index.php?action=preventas&pre';</script>";
            }else{
                header("location: index.php?action=formPreventa");
            }            
        }
    }
?>
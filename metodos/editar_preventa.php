<?php
    require "clases/Preventa.php";
    $preventa = new Preventa();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        
        if (isset($_POST["id_cliente"]) && isset($_POST["id_contacto"]) && isset($_POST["comercial"])
        && isset($_POST["id_tipo"]) && isset($_POST["fecha_reunion"]) && isset($_POST["acta_reunion"]) 
        && isset($_POST["horas_previstas"]) && isset($_POST["importe"]) && isset($_POST["estado"])
        && isset($_POST["id_usuario"])){

            $id = $_POST["id"];
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
            $status = $_POST["estado"];
            $archivo = $_POST["archivo"];
            
            if($preventa->editarPreventa($id, $id_cliente, $id_contacto, $id_comercial, $id_tipo, $id_usuario, $fecha_reunion,
            $fecha_presentacion, $horas_previstas, $acta_reunion, $importe, $status, $archivo)){
                header("location: index.php?action=formEditPreventa");
            }else{
                header("location: index.php?action=formEditPreventa");
            }            
        }
    }
?>
<?php
    require "clases/Preventa.php";
    if (isset($_GET['id'])) {
        $preventa_id = $_GET['id'];
        $preventa = new Preventa();
        if($preventa->aceptar($preventa_id)){
            header('Location: index.php?action=index');
        } else {
            header('Location: index.php?action=index');
        }                
    }
?>

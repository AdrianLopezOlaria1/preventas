<?php
require "clases/Preventa.php";

$preventa = new Preventa();

if (isset($_POST)) {

    if (isset($_POST["estado"])) {
        if($_POST['estado'] == ''){
            header("location: index.php?action=preventas");
        } else {
            $estado = $_POST['estado'];
            $preventasFiltradas = $preventa->filtrarPreventas($estado, null);
            if ($preventasFiltradas) {
                $_SESSION['preventasFiltradas'] = $preventasFiltradas;
                header("location: index.php?action=preventas"); 
            } else {
                $_SESSION['preventasFiltradas'] = $preventasFiltradas;
                header("location: index.php?action=preventas"); 
            }
        }        
    }

    if (isset($_POST["comercial"])) {
        if($_POST['comercial'] == ''){
            header("location: index.php?action=preventas");
        } else {
            $comercial = (int)$_POST['comercial'];
            $preventasFiltradas = $preventa->filtrarPreventas(null, $comercial);
            if ($preventasFiltradas) {
                $_SESSION['preventasFiltradas'] = $preventasFiltradas;
                header("location: index.php?action=preventas"); 
            } else {
                $_SESSION['preventasFiltradas'] = $preventasFiltradas;
                header("location: index.php?action=preventas"); 
            }
        }
    }
}
?>

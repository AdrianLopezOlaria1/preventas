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

    if (isset($_POST["fecha_inicio"]) && isset($_POST["fecha_fin"])) {
        $fechaInicio = date('Y-m-d', strtotime($_POST['fecha_inicio']));
        $fechaFin = date('Y-m-d', strtotime($_POST['fecha_fin']));
        if($fechaInicio > $fechaFin){
            $fecha_inicio = $fechaFin;
            $fecha_fin = $fechaInicio;
        } else {
            $fecha_inicio = $fechaInicio;
            $fecha_fin = $fechaFin;
        }
        $preventasFiltradas = $preventa->filtrarPreventas(null, null, $fecha_inicio, $fecha_fin);
        if ($preventasFiltradas) {
            $_SESSION['preventasFiltradas'] = $preventasFiltradas;
            header("location: index.php?action=preventas"); 
        } else {
            $_SESSION['preventasFiltradas'] = $preventasFiltradas;
            header("location: index.php?action=preventas"); 
        }
    }
}
?>

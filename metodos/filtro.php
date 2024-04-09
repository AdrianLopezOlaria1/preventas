<?php
require "clases/Preventa.php";

$preventa = new Preventa();

if (isset($_POST)) {
    $estado = isset($_POST["estado"]) && $_POST["estado"] !== "" ? $_POST["estado"] : null;
    $comercial = isset($_POST["comercial"]) && $_POST["comercial"] !== "" ? (int)$_POST["comercial"] : null;
    $usuario = isset($_POST["usuario"]) && $_POST["usuario"] !== "" ? (int)$_POST["usuario"] : null;
    $fecha_inicio = isset($_POST["fecha_inicio"]) && $_POST["fecha_inicio"] !== "" ? date('Y-m-d', strtotime($_POST['fecha_inicio'])) : null;
    $fecha_fin = isset($_POST["fecha_fin"]) && $_POST["fecha_fin"] !== "" ? date('Y-m-d', strtotime($_POST['fecha_fin'])) : null;

    $preventasFiltradas = $preventa->filtrarPreventas($estado, $comercial, $usuario, $fecha_inicio, $fecha_fin);

    if ($preventasFiltradas) {
        $_SESSION['preventasFiltradas'] = $preventasFiltradas;
        header("location: index.php?action=preventas"); 
    } else {
        $_SESSION['preventasFiltradas'] = $preventasFiltradas;
        header("location: index.php?action=preventas"); 
    }
}
?>

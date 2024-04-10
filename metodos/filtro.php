<?php
require "clases/Preventa.php";

$preventa = new Preventa();

if (isset($_POST)) {
    $estado = isset($_POST["estado"]) && $_POST["estado"] !== "" ? $_POST["estado"] : null; $_SESSION['estado'] = $estado;
    $comercial = isset($_POST["comercial"]) && $_POST["comercial"] !== "" ? (int)$_POST["comercial"] : null; $_SESSION['comercial'] = $comercial;
    $usuario = isset($_POST["usuario"]) && $_POST["usuario"] !== "" ? (int)$_POST["usuario"] : null; $_SESSION['usu'] = $usuario;
    $fecha_inicio = isset($_POST["fecha_inicio"]) && $_POST["fecha_inicio"] !== "" ? date('Y-m-d', strtotime($_POST['fecha_inicio'])) : null; $_SESSION['ini'] = $fecha_inicio;
    $fecha_fin = isset($_POST["fecha_fin"]) && $_POST["fecha_fin"] !== "" ? date('Y-m-d', strtotime($_POST['fecha_fin'])) : null; $_SESSION['fin'] = $fecha_fin;

    $preventasFiltradas = $preventa->filtrarPreventas($estado, $comercial, $usuario, $fecha_inicio, $fecha_fin);

    if ($preventasFiltradas) {
        $_SESSION['preventasFiltradas'] = $preventasFiltradas;
        header("location: index.php?action=preventas"); 
    } 
} 

?>

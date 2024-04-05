<?php
require "clases/Preventa.php";

$preventa = new Preventa();

if (isset($_POST)) {
  if (isset($_POST["estado"])) {
    $estado = $_POST['estado'];
    $preventasFiltradas = $preventa->filtrarPorEstados($estado);
    if ($preventasFiltradas) {
      $_SESSION['preventasFiltradas'] = $preventasFiltradas;
      header("location: index.php?action=preventas"); 
    } else {
      header("location: index.php?action=preventas"); 
    }
  }
}
?>

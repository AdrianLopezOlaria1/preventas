<?php

require_once '../clases/Usuario.php';

$usuario = new Usuario();

$totalUsuarios = $usuario->obtenerNumeroUsuarios();

echo $totalUsuarios;

?>

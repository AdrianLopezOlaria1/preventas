<?php

class Conexion {
    private $host = "atic.green"; // Cambia esto por tu host
    private $usuario = "preventa"; // Cambia esto por tu usuario de la base de datos
    private $contraseña = "4l2O*6r6j"; // Cambia esto por tu contraseña de la base de datos
    private $base_datos = "preventa"; // Cambia esto por el nombre de tu base de datos
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contraseña, $this->base_datos);

        if ($this->conexion->connect_error) {
            die("Error al conectar con la base de datos: " . $this->conexion->connect_error);
        }
    }

    public function getConexion() {
        return $this->conexion;
    }
}

// Crear una instancia de la conexión a la base de datos
$conexion = new Conexion();
?>
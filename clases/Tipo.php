<?php

if (!function_exists('Conexion')) {
    if (file_exists('../config/conexion.php')) {
        require_once '../config/conexion.php';
    } else {
        // Si no existe en el directorio anterior, intentar cargarlo desde la carpeta actual
        require_once 'config/conexion.php';
    }
}

    class Tipo {
        private $nombre;

        public function __construct($nombre = ""){
            $this->nombre = $nombre;
        }

        // Getter y Setter para Nombre
        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function obtenerTipos() {
            $tipos = array();
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $sql = "SELECT * FROM tipos_proyectos ORDER BY nombre ASC";
            $resultado = $mysqli->query($sql);
            if ($resultado) {
                while ($tipo = $resultado->fetch_assoc()) {
                    $tipos[] = $tipo;
                }
            }
            return $tipos;
        }

    }
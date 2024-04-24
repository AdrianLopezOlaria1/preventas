<?php

    if (!function_exists('Conexion')) {
        if (file_exists('../config/conexion.php')) {
            require_once '../config/conexion.php';
        } else {
            // Si no existe en el directorio anterior, intentar cargarlo desde la carpeta actual
            require_once 'config/conexion.php';
        }
    }

    class Actividad {
        private $descripcion;
        private $fecha;
        private $hora;

        public function getDescripcion() {
                return $this->descripcion;
        }

        public function setDescripcion($descripcion) {
                $this->descripcion = $descripcion;             
        }

        public function getFecha() {
                return $this->fecha;
        }

        public function setFecha($fecha) {
                $this->fecha = $fecha;              
        }

        public function getHora() {
                return $this->hora;
        }

        public function setHora($hora) {
                $this->hora = $hora;               
        }

        public function obtenerActividades() {
            $actividades = array();
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
    
            $sql = "SELECT * FROM actividades ORDER BY id DESC";
            $resultado = $mysqli->query($sql);
    
            if ($resultado) {
                while ($fila = $resultado->fetch_assoc()) {
                    $actividades[] = $fila;
                }
            }
            return $actividades;
        } 
    }

?>
<?php

    require_once 'config/conexion.php';

    class Cliente {
        private $nombre;
        private $status;
        private $fecha_alta;
        private $fecha_modificacion;
        private $fecha_baja;


        public function __construct($nombre = "", $status = "", $fecha_alta = "", $fecha_modificacion = "", $fecha_baja = "") {
            $this->nombre = $nombre;
            $this->status = $status;
            $this->fecha_alta = $fecha_alta;
            $this->fecha_modificacion = $fecha_modificacion;
            $this->fecha_baja = $fecha_baja;
        }

        // Getter y Setter para Nombre
        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        // Getter y Setter para Email
        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        // Getter y Setter para Password
        public function getFecha_alta() {
            return $this->fecha_alta;
        }

        public function setFecha_alta($fecha_alta) {
            $this->fecha_alta = $fecha_alta;
        }

        public function getFecha_modificacion() {
            return $this->fecha_modificacion;
        }

        public function setFecha_modificacion($fecha_modificacion) {
            $this->fecha_modificacion = $fecha_modificacion;
        }

        public function getFecha_baja() {
            return $this->fecha_baja;
        }

        public function setFecha_baja($fecha_baja) {
            $this->fecha_baja = $fecha_baja;
        }


        function validarDatos($nombre) {
            $error = array();
            if(!empty($nombre)){
                $nombre_validado = true;
            } else {
                $nombre_validado = false;
                $error['nombre'] = "Insert a valid name";
            }
/*             if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = "Insert a valid email address";
            } */
            return $error;
        }

    

        public function nuevo($nombre) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $error = $this->validarDatos($nombre);
            if(count($error) == 0){
                // Verificar si el correo electrónico ya existe en la base de datos
                $sql_check_name = "SELECT COUNT(*) as count FROM clientes WHERE email = '$email'";
                $result_check_name = mysqli_query($mysqli, $sql_check_email);
                $row = mysqli_fetch_assoc($result_check_name);
                if ($row['count'] > 0) {
                    $_SESSION['error']['email'] = "Error, this name is already registered";
                    return false;
                }
                // Insertar usuario en la base de datos

                $sql = "INSERT INTO clientes VALUES('$nombre', 'A', NOW(),
                 NULL, NULL);";
                $guardar = mysqli_query($mysqli, $sql);
                if($guardar) {
                    return true;
                } else {
                   return false;
                }
            } else {
                return false;
            }
        }    

        public function obtenerClientes() {
            $clientes = array();
    
            // Inicializar la conexión dentro del método
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
    
            // Ejecutar la consulta SQL para obtener todos los clientes
            $sql = "SELECT * FROM clientes";
            $resultado = $mysqli->query($sql);
    
            // Verificar si la consulta se ejecutó correctamente
            if ($resultado) {
                // Iterar sobre los resultados y almacenar cada cliente en un array
                while ($fila = $resultado->fetch_assoc()) {
                    $clientes[] = $fila;
                }
            }
    
            return $clientes;
        }
  
}


        


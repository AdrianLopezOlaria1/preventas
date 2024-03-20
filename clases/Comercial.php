<?php

if (!function_exists('Conexion')) {
    if (file_exists('../config/conexion.php')) {
        require_once '../config/conexion.php';
    } else {
        // Si no existe en el directorio anterior, intentar cargarlo desde la carpeta actual
        require_once 'config/conexion.php';
    }

}

    class Comercial {
        private $nombre;
        private $email;
        private $status;
        private $fecha_alta;
        private $fecha_modificacion;
        private $fecha_baja;


        public function __construct($nombre = "", $email = "", $status = "", $fecha_alta = "", $fecha_modificacion = "", $fecha_baja = "") {
            $this->nombre = $nombre;
            $this->email = $email;
            $this->status = $status;
            $this->fecha_alta = $fecha_alta;
            $this->fecha_modificacion = $fecha_modificacion;
            $this->fecha_baja = $fecha_baja;
        }
    
        // Getters
        public function getNombre() {
            return $this->nombre;
        }
    
        public function getEmail() {
            return $this->email;
        }
    
        public function getStatus() {
            return $this->status;
        }
    
        public function getFechaAlta() {
            return $this->fecha_alta;
        }
    
        public function getFechaModificacion() {
            return $this->fecha_modificacion;
        }
    
        public function getFechaBaja() {
            return $this->fecha_baja;
        }
    
        // Setters
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
    
        public function setEmail($email) {
            $this->email = $email;
        }
    
        public function setStatus($status) {
            $this->status = $status;
        }
    
        public function setFechaAlta($fecha_alta) {
            $this->fecha_alta = $fecha_alta;
        }
    
        public function setFechaModificacion($fecha_modificacion) {
            $this->fecha_modificacion = $fecha_modificacion;
        }
    
        public function setFechaBaja($fecha_baja) {
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
                // Verificar si el nombre ya existe en la base de datos
                $sql_check_name = "SELECT nombre FROM clientes WHERE nombre = '$nombre'";
                $result_check_name = mysqli_query($mysqli, $sql_check_name);
                $row = mysqli_fetch_assoc($result_check_name);
                if ($row) {
                    $_SESSION['error']['nombre'] = "Error, this name is already registered";
                    return $_SESSION['error'];
                }
                // Insertar Cliente en la base de datos
                $sql = "INSERT INTO clientes VALUES(NULL,'$nombre', 'A', NOW(),
                 NULL, NULL);";
                $guardar = mysqli_query($mysqli, $sql);
                if($guardar) {
                    $_SESSION['completado'] = "Client has been successfully completed!";
                } else {
                   return false;
                }
            } else {
                $_SESSION['error'] = $error;
                return $_SESSION['error'];
            }
        }    

        // public function obtenerComerciales() {
        //     $comerciales = array();
    
        //     $conexion = new Conexion();
        //     $mysqli = $conexion->getConexion();
    
        //     $sql = "SELECT * FROM comerciales";
        //     $resultado = $mysqli->query($sql);
    
        //     if ($resultado) {

        //         while ($fila = $resultado->fetch_assoc()) {
        //             $comerciales[] = $fila;
        //         }
        //     }
    
        //     return $clientes;
        // }

        function borrarErrores(){
            $borrado = false;
            if(isset($_SESSION['error'])){
                $_SESSION['error'] = null;
                $borrado = true;
            }      
            if(isset($_SESSION['completado'])){
                $_SESSION['completado'] = null;
                $borrado = true;  
            }
           
            return $borrado;
        }



        public function obtenerComercialesJson($conn) {
            $comerciales = array();
    
            $sql = "SELECT id, nombre, email, status FROM comerciales";
            $resultado = $conn->query($sql);
    
            if ($resultado) {

                while ($fila = $resultado->fetch_assoc()) {
                    $comerciales[] = $fila;
                }
            }
    
            return $comerciales;
        }



        public function obtenerClienteJson($conn, $idCliente) {

            $sql = "SELECT nombre FROM clientes WHERE id = $idCliente";
        
            $resultado = $conn->query($sql);
        
            if ($resultado->num_rows > 0) {

                $cliente = $resultado->fetch_assoc();

                return json_encode($cliente);
            } else {

                http_response_code(404); 
                return json_encode(array("error" => "No se encontró ningún cliente con el ID proporcionado."));
            }
        }


        public function editarCliente($conn, $idCliente, $nuevoNombre) {
            $idCliente = $conn->real_escape_string($idCliente);
            $nuevoNombre = $conn->real_escape_string($nuevoNombre);

            $sql = "SELECT nombre FROM clientes";
            $resultado = $conn->query($sql);
        
            if ($resultado) {
                $nombresClientes = array();

                while ($row = $resultado->fetch_assoc()) {
                    $nombresClientes[] = $row['nombre'];
                }
        
                if (in_array($nuevoNombre, $nombresClientes)) {

        
                    return false;
                }
            } else {
                return false;
            }
            
            $fechaModificacion = date('Y-m-d H:i:s');
        
            $consulta = "UPDATE clientes SET nombre = '$nuevoNombre', fecha_modificacion = '$fechaModificacion', status = 'M' WHERE id = '$idCliente'";
        
            if ($conn->query($consulta)) {
                return true;
            } else {
                return false;
            }
        }


        public function deshabilitarCliente($conn, $idCliente) {

            $idCliente = $conn->real_escape_string($idCliente);
            
            $consulta = "UPDATE clientes SET status = 'D' WHERE id = $idCliente";

            if ($conn->query($consulta) === TRUE) {

                return true;
            } else {

                return array('error' => 'Error al deshabilitar el cliente: ' . $conn->error);
            }
}
        
    
}
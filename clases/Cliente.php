<?php

if (!function_exists('Conexion')) {
    if (file_exists('../config/conexion.php')) {
        require_once '../config/conexion.php';
    } else {
        // Si no existe en el directorio anterior, intentar cargarlo desde la carpeta actual
        require_once 'config/conexion.php';
    }

}

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

        // Getter y Setter para fechas
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
            if(empty($nombre)){
                $error['nombre'] = "Debe insertar un nombre";
            } 
            return $error;
        }

    

        public function nuevo($nombre) {
            $result = false;
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $error = $this->validarDatos($nombre);
            if(count($error) == 0){
                // Verificar si el nombre ya existe en la base de datos
                $sql_check_name = "SELECT nombre FROM clientes WHERE nombre = '$nombre'";
                $result_check_name = mysqli_query($mysqli, $sql_check_name);
                $row = mysqli_fetch_assoc($result_check_name);
                if ($row) {
                    $_SESSION['error']['nombre'] = "Error, ese nombre ya esta en uso";                    
                } else {
                    $sql = "INSERT INTO clientes VALUES(NULL,'$nombre', 'A', NOW(),
                    NULL, NULL);";
                    $guardar = mysqli_query($mysqli, $sql);
                    if($guardar) {
                        $result = true;
                    }
                }             
            } else {
                $_SESSION['error'] = $error;                
            }
            return $result;
        }    

        public function obtenerClientes() {
            $clientes = array();
    
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
    
            $sql = "SELECT * FROM clientes ORDER BY nombre ASC";
            $resultado = $mysqli->query($sql);
    
            if ($resultado) {

                while ($fila = $resultado->fetch_assoc()) {
                    $clientes[] = $fila;
                }
            }
    
            return $clientes;
        }

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

        public function obtenerClientesJson($conn) {
            $clientes = array();
    
            $sql = "SELECT id, nombre, status FROM clientes";
            $resultado = $conn->query($sql);
    
            if ($resultado) {

                while ($fila = $resultado->fetch_assoc()) {
                    $clientes[] = $fila;
                }
            }
    
            return $clientes;
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
            
            $consulta = "UPDATE clientes SET status = 'D', fecha_baja = NOW() WHERE id = $idCliente";

            if ($conn->query($consulta) === TRUE) {

                return true;
            } else {

                return array('error' => 'Error al deshabilitar el cliente: ' . $conn->error);
            }
        }

        public function buscarClientes($conn, $termino) {
            $clientes = array();
        
            // Escapar el término de búsqueda para evitar inyección de SQL
            $termino = $conn->real_escape_string($termino);
        
            // Consulta SQL para buscar clientes que coincidan con el término de búsqueda en el nombre
            $sql = "SELECT * FROM clientes WHERE nombre LIKE '%$termino%'";
        
            // Ejecutar la consulta SQL
            $resultado = $conn->query($sql);
        
            // Verificar si se encontraron resultados
            if ($resultado) {
                // Iterar sobre los resultados y agregarlos al arreglo de clientes
                while ($fila = $resultado->fetch_assoc()) {
                    $clientes[] = $fila;
                }
            }
        
            // Devolver el arreglo de clientes encontrados
            return $clientes;
        }
        
        
  
}


        


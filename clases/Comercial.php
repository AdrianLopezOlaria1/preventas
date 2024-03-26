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


        function validarDatos($nombre, $email) {
            $error = array();
            if(empty($nombre)){
                $error['nombre'] = "Insert a valid name";
            }
        
            if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = "Insert a valid email address";
            }
        
            return $error;
        }

    

 

        public function obtenerComerciales() {
            $comerciales = array();
    
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
    
            $sql = "SELECT * FROM comerciales";
            $resultado = $mysqli->query($sql);
    
            if ($resultado) {

                while ($fila = $resultado->fetch_assoc()) {
                    $comerciales[] = $fila;
                }
            }
    
            return $comerciales;
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



        public function obtenerComercialJson($conn, $idComercial) {

            $sql = "SELECT nombre, email FROM comerciales WHERE id = $idComercial";
        
            $resultado = $conn->query($sql);
        
            if ($resultado->num_rows > 0) {

                $comercial = $resultado->fetch_assoc();

                return json_encode($comercial);
            } else {

                http_response_code(404); 
                return json_encode(array("error" => "No se encontró ningún cliente con el ID proporcionado."));
            }
        }

        public function editarComercial($conn, $idComercial, $nuevoNombre, $nuevoEmail) {
            $idComercial = $conn->real_escape_string($idComercial);
            
            // Verificar si el nuevo email ya existe en la base de datos antes de escaparlo
            if ($nuevoEmail !== "email") {
                $emailExistente = $this->valorExistente($conn, 'email', $nuevoEmail);
                if ($emailExistente) {
                    return false; // Si el email ya existe, retornar false
                }
            }
        
            // Escapar el nuevo nombre si se proporcionó
            $nuevoNombre = isset($nuevoNombre) ? "'" . $conn->real_escape_string($nuevoNombre) . "'" : "nombre";
        
            // Escapar el nuevo email si se proporcionó
            $nuevoEmail = isset($nuevoEmail) ? "'" . $conn->real_escape_string($nuevoEmail) . "'" : "email";
        
            $fechaModificacion = date('Y-m-d H:i:s');
            
            // Construir la consulta SQL para actualizar el registro
            $consulta = "UPDATE comerciales SET nombre = $nuevoNombre, email = $nuevoEmail, fecha_modificacion = NOW(), status = 'M' WHERE id = '$idComercial'";
        
            // Ejecutar la consulta SQL
            if ($conn->query($consulta)) {
                return true;
            } else {
                return false;
            }
        }
        
        
        
        
        function valorExistente($conn, $columna, $valor) {
            // Escapar el valor solo si se utilizará en la consulta SQL
            $valor = $conn->real_escape_string($valor);
        
            // Consultar si el valor existe en la columna especificada
            $sql = "SELECT $columna FROM comerciales WHERE $columna = '$valor'";
            $resultado = $conn->query($sql);
        
            if ($resultado) {
                // Devuelve true si el valor existe en la columna especificada
                return $resultado->num_rows > 0;
            } else {
                return false; // Error al consultar la base de datos
            }
        }
        
        
        public function nuevo($nombre, $email) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            
            // Validar los datos de entrada
            $error = $this->validarDatos($nombre, $email);
            if (count($error) > 0) {
                $_SESSION['error'] = $error;
                return $_SESSION['error'];
            }
            
            // Verificar si el nombre ya existe en la base de datos
            $emailExistente = $this->valorExistente($mysqli, 'email', $email);
            
            // Insertar Cliente en la base de datos si el nombre no existe
            if (!$emailExistente) {
                $sql = "INSERT INTO comerciales VALUES(NULL, '$nombre', '$email', 'A', NOW(), NULL, NULL)";
                $guardar = mysqli_query($mysqli, $sql);
                if ($guardar) {
                    $_SESSION['completado'] = "Commercial has been successfully created!";
                    return true;
                } else {
                    return false;
                }
            } else {
                $_SESSION['error']['email'] = "Error, this email is already registered";
                return $_SESSION['error'];
            }
        }
        


        public function deshabilitarComerial($conn, $idComercial) {

            $idComercial = $conn->real_escape_string($idComercial);
            
            $consulta = "UPDATE comerciales SET status = 'D', fecha_baja = NOW() WHERE id = $idComercial";

            if ($conn->query($consulta) === TRUE) {

                return true;
            } else {

                return array('error' => 'Error al deshabilitar el cliente: ' . $conn->error);
            }
}

            public function buscarComerciales($conn, $termino) {
                $comerciales = array();

                // Escapar el término de búsqueda para evitar inyección de SQL
                $termino = $conn->real_escape_string($termino);

                // Consulta SQL para buscar comerciales$comerciales que coincidan con el término de búsqueda en el nombre
                $sql = "SELECT * FROM comerciales WHERE nombre LIKE '%$termino%'";

                // Ejecutar la consulta SQL
                $resultado = $conn->query($sql);

                // Verificar si se encontraron resultados
                if ($resultado) {
                    // Iterar sobre los resultados y agregarlos al arreglo de comerciales$comerciales
                    while ($fila = $resultado->fetch_assoc()) {
                        $comerciales[] = $fila;
                    }
                }

                // Devolver el arreglo de comerciales$comerciales encontrados
                return $comerciales;
            }        
        
    
}      


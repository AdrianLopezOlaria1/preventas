<?php

    if (!function_exists('Conexion')) {
        if (file_exists('../config/conexion.php')) {
            require_once '../config/conexion.php';
        } else {
            // Si no existe en el directorio anterior, intentar cargarlo desde la carpeta actual
            require_once 'config/conexion.php';
        }

    }

    class Contacto {
        private $id_cliente;
        private $nombre;
        private $email;
        private $tel;
        private $fecha_alta;
        private $fecha_modificacion;
        private $fecha_baja;
        

        public function __construct($id_cliente = "", $nombre = "", $email = "", $tel = "", 
        $fecha_alta = "", $fecha_modificacion = "", $fecha_baja = "") {
            $this->id_cliente = $id_cliente;
            $this->nombre = $nombre;
            $this->email = $email;
            $this->tel = $tel;
            $this->fecha_alta = $fecha_alta;
            $this->fecha_modificacion = $fecha_modificacion;
            $this->fecha_baja = $fecha_baja;
        }

        // Getter y Setter para id_cliente
        public function getId_cliente() {
            return $this->id_cliente;
        }

        public function setId_cliente($id_cliente) {
            $this->id_cliente = $id_cliente;
        }

        // Getter y Setter para Nombre
        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        // Getter y Setter para Email
        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        // Getter y Setter para Tel
        public function getTel() {
            return $this->tel;
        }

        public function setTel($tel) {
            $this->tel = $tel;
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

        //funciones

        function validarDatos($id_cliente, $nombre, $email, $tel) {
            $error = array();
            if(empty($id_cliente)){
                $error['id_cliente'] = "Debes escoger un cliente";
            }
            if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)){
                $error['nombre'] = "Inserte un nombre válido";
            } 
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = "Inserte un email válido";
            }
            if($tel != ""){
                
                if( !is_numeric($tel)){
                    
                    $error['tel'] = "Inserte un número de teléfono correcto";
                }
            }
            return $error;
        }

        public function nuevo($id_cliente, $nombre, $email, $tel) {
            $result = false;
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            
            
            $error = $this->validarDatos($id_cliente, $nombre, $email, $tel);
            if(count($error) == 0){                
                $sql_check_email = "SELECT email FROM personas_contacto WHERE email = '$email'";
                $result_check_email = mysqli_query($mysqli, $sql_check_email);
                $row = mysqli_fetch_assoc($result_check_email);
                if ($row) {
                    $_SESSION['error']['email'] = "Error, el correo ya esta en uso";                    
                }                
                $sql = "INSERT INTO personas_contacto VALUES(NULL, $id_cliente, '$nombre', '$email', '$tel', 
                'A', NOW(), NULL, NULL);";
                $guardar = mysqli_query($mysqli, $sql);
                if($guardar) {
                    $result = true;
                }
            } else {
                $_SESSION['error'] = $error;               
            }

            return $result;
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

        public function obtenerContactos() {
            $contactos = array();

            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
    
            $sql = "SELECT * FROM personas_contacto ORDER BY nombre ASC";
            $resultado = $mysqli->query($sql);
    
            if ($resultado) {

                while ($fila = $resultado->fetch_assoc()) {
                    $contactos[] = $fila;
                }
            }
    
            return $contactos;
        }

        public function obtenerContactosPorCliente($conexion, $id_cliente) {
            $contactos = array();
            $sql = "SELECT * FROM personas_contacto WHERE id_cliente = $id_cliente";
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $contactos[] = $fila;
                }
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }

            return $contactos;
        }

        public function obtenerContactosJson($conn) {
            $contactos = array();
    
            $sql = "SELECT id, nombre, email, tel, status FROM personas_contacto";
            $resultado = $conn->query($sql);
    
            if ($resultado) {

                while ($fila = $resultado->fetch_assoc()) {
                    $contactos[] = $fila;
                }
            }
    
            return $contactos;
        }

        public function obtenerContactoJson($conn, $idContacto) {

            $sql = "SELECT nombre, email, tel FROM personas_contacto WHERE id = $idContacto";
        
            $resultado = $conn->query($sql);
        
            if ($resultado->num_rows > 0) {

                $contacto = $resultado->fetch_assoc();

                return json_encode($contacto);
            } else {

                http_response_code(404); 
                return json_encode(array("error" => "No se encontró ningún contacto con el ID proporcionado."));
            }
        }

        public function editarContacto($conn, $idContacto, $nuevoNombre, $nuevoEmail, $nuevoTel) {
            $idContacto = $conn->real_escape_string($idContacto);
            $nuevoNombre = $conn->real_escape_string($nuevoNombre);
            $nuevoEmail = $conn->real_escape_string($nuevoEmail);
            $nuevoTel = $conn->real_escape_string($nuevoTel);

            // Obtener el correo electrónico actual del contacto
            $sql_obtener_email_actual = "SELECT email FROM personas_contacto WHERE id = '$idContacto'";
            $result_obtener_email_actual = $conn->query($sql_obtener_email_actual);
            $row_obtener_email_actual = $result_obtener_email_actual->fetch_assoc();
            $email_actual = $row_obtener_email_actual['email'];

            // Verificar si el correo electrónico ha sido cambiado
            if ($email_actual != $nuevoEmail) {
                // Verificar si el nuevo correo electrónico ya está en uso
                $sql_check_email = "SELECT email FROM personas_contacto WHERE email = '$nuevoEmail'";
                $result_check_email = $conn->query($sql_check_email);
                if ($result_check_email->num_rows > 0) {
                    // El nuevo correo electrónico ya está en uso
                    return array('error' => 'El correo electrónico ya está en uso.');
                }
            }
            
            $fechaModificacion = date('Y-m-d H:i:s');
        
            $consulta = "UPDATE personas_contacto SET nombre = '$nuevoNombre', 
            email = '$nuevoEmail', tel = '$nuevoTel', fecha_modificacion = '$fechaModificacion', status = 'M' WHERE id = '$idContacto'";
        
            if ($conn->query($consulta)) {
                return true;
            } else {
                return false;
            }
        }

        public function deshabilitarContacto($conn, $idContacto) {

            $idContacto = $conn->real_escape_string($idContacto);
            
            $consulta = "UPDATE personas_contacto SET status = 'D', fecha_baja = NOW() WHERE id = $idContacto";

            if ($conn->query($consulta) === TRUE) {

                return true;
            } else {

                return array('error' => 'Error al deshabilitar el contacto: ' . $conn->error);
            }
        }

        public function buscarContacto($conn, $termino) {
            $contactos = array();
        
            // Escapar el término de búsqueda para evitar inyección de SQL
            $termino = $conn->real_escape_string($termino);
        
            // Consulta SQL para buscar clientes que coincidan con el término de búsqueda en el nombre
            $sql = "SELECT * FROM personas_contacto WHERE nombre LIKE '%$termino%'";
        
            // Ejecutar la consulta SQL
            $resultado = $conn->query($sql);
        
            // Verificar si se encontraron resultados
            if ($resultado) {
                // Iterar sobre los resultados y agregarlos al arreglo de clientes
                while ($fila = $resultado->fetch_assoc()) {
                    $contactos[] = $fila;
                }
            }
        
            // Devolver el arreglo de clientes encontrados
            return $contactos;
        }
    }


        


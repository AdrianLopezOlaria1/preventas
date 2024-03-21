<?php

    if (!function_exists('Conexion')) {
        if (file_exists('../config/conexion.php')) {
            require_once '../config/conexion.php';
        } else {
            // Si no existe en el directorio anterior, intentar cargarlo desde la carpeta actual
            require_once 'config/conexion.php';
        }
    }

    class Preventa {
        private $id_cliente;
        private $id_contacto;
        private $id_comercial;
        private $id_tipo;
        private $status;
        private $fecha_solicitud;
        private $fecha_accion;
        private $fecha_reunion;
        private $acta_reunion;
        private $horas_previstas;
        private $importe;
    
        public function __construct($id_cliente="", $id_contacto="", $id_comercial="", $id_tipo="", $status="", 
        $fecha_solicitud="", $fecha_accion="", $fecha_reunion="", $acta_reunion="", $horas_previstas="", $importe="") {
            $this->id_cliente = $id_cliente;
            $this->id_contacto = $id_contacto;
            $this->id_comercial = $id_comercial;
            $this->id_tipo = $id_tipo;
            $this->status = $status;
            $this->fecha_solicitud = $fecha_solicitud;
            $this->fecha_accion = $fecha_accion;
            $this->fecha_reunion = $fecha_reunion;
            $this->acta_reunion = $acta_reunion;
            $this->horas_previstas = $horas_previstas;
            $this->importe = $importe;
        }
    
        public function getIdCliente() {
            return $this->id_cliente;
        }    
        public function setIdCliente($id_cliente) {
            $this->id_cliente = $id_cliente;
        }    
        public function getIdContacto() {
            return $this->id_contacto;
        }    
        public function setIdContacto($id_contacto) {
            $this->id_contacto = $id_contacto;
        }    
        public function getIdComercial() {
            return $this->id_comercial;
        }    
        public function setIdComercial($id_comercial) {
            $this->id_comercial = $id_comercial;
        }    
        public function getIdTipo() {
            return $this->id_tipo;
        }    
        public function setIdTipo($id_tipo) {
            $this->id_tipo = $id_tipo;
        }    
        public function getStatus() {
            return $this->status;
        }    
        public function setStatus($status) {
            $this->status = $status;
        }    
        public function getFechaSolicitud() {
            return $this->fecha_solicitud;
        }    
        public function setFechaSolicitud($fecha_solicitud) {
            $this->fecha_solicitud = $fecha_solicitud;
        }    
        public function getFechaAccion() {
            return $this->fecha_accion;
        }    
        public function setFechaAccion($fecha_accion) {
            $this->fecha_accion = $fecha_accion;
        }    
        public function getFechaReunion() {
            return $this->fecha_reunion;
        }    
        public function setFechaReunion($fecha_reunion) {
            $this->fecha_reunion = $fecha_reunion;
        }    
        public function getActaReunion() {
            return $this->acta_reunion;
        }    
        public function setActaReunion($acta_reunion) {
            $this->acta_reunion = $acta_reunion;
        }    
        public function getHorasPrevistas() {
            return $this->horas_previstas;
        }    
        public function setHorasPrevistas($horas_previstas) {
            $this->horas_previstas = $horas_previstas;
        }    
        public function getImporte() {
            return $this->importe;
        }
        public function setImporte($importe) {
            $this->importe = $importe;
        }

        //funciones

        function validarDatos($id_cliente, $id_contacto, $id_comercial, $id_tipo, $fecha_reunion,
            $horas_previstas, $acta_reunion, $importe) {

            $error = array();
            if(empty($id_cliente)){
                $error['id_cliente'] = "Debes escojer un cliente";
            }
            if(empty($id_contacto)){
                $error['id_contacto'] = "Debes escoger un contacto";
            }
            if(empty($id_comercial)){
                $error['id_comercial'] = "Debes escoger un comercial";
            }
            if(empty($id_tipo)){
                $error['id_tipo'] = "Debes escoger un tipo de proyecto";
            }
            if(empty($fecha_reunion)){
                $error['fecha_reunion'] = "Debes escoger una fecha";
            }
            if(empty($horas_previstas) || !is_numeric($horas_previstas)){            
                $error['horas_previstas'] = "Debes insertar horas previstas en número";
            }
            if(empty($acta_reunion)){
                $error['acta_reunion'] = "Debes rellenar el acta de reunión";
            }
            if(empty($importe) || !is_numeric($importe)){
                $error['importe'] = "Debes poner importe en números";
            }

            return $error;
        }
    
        public function crearPreventa($id_cliente, $id_contacto, $id_comercial, $id_tipo, $fecha_reunion,
            $horas_previstas, $acta_reunion, $importe) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $error = $this->validarDatos($id_cliente, $id_contacto, $id_comercial, $id_tipo, $fecha_reunion,
            $horas_previstas, $acta_reunion, $importe);
            if(count($error) == 0){
                // Insertar precompra en la base de datos
                $sql = "INSERT INTO preventas VALUES(NULL, $id_cliente, $id_contacto, $id_comercial, $id_tipo, 'P',
                GETDATE(), NULL, $fecha_reunion, '$acta_reunion', $horas_previstas, $importe);";

                $guardar = mysqli_query($mysqli, $sql);
                if($guardar) {
                    $_SESSION['completado'] = "La preventa se ha generado correctamente!";
                } else {
                    $_SESSION['error']['general'] = "Error";
                }
            } else {
                $_SESSION['error'] = $error;
                return $_SESSION['error'];
            }
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
    
            $sql = "SELECT * FROM personas_contacto";
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
                    return array('error' => 'El correo electrónico ya está en uso por otro contacto.');
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


        public function obtenerPreventas() {
            // Array para almacenar los preventas$preventas de la base de datos
            $preventas = array();
        
            // Crear una instancia de la clase Conexion
            $conexion = new Conexion();
            // Obtener la conexión
            $mysqli = $conexion->getConexion();
        
            // Consulta SQL para obtener los preventas$preventas de la tabla precompras
            $sql = "SELECT id_cliente,id_comercial, id_tipo, status, fecha_solicitud, fecha_reunion,
             acta_reunion, horas_previstas, importe, status, id_contacto  FROM preventas";
        
            // Ejecutar la consulta
            $resultado = $mysqli->query($sql);
        
            // Verificar si se obtuvieron resultados
            if ($resultado) {
                // Recorrer los resultados y almacenarlos en el array $preventas
                while ($fila = $resultado->fetch_assoc()) {
                    $preventas[] = $fila;
                }
            } else {
                // Si hay un error en la consulta, mostrar el mensaje de error
                echo "Error en la consulta: " . $mysqli->error;
            }
        
            // Cerrar la conexión a la base de datos
            $mysqli->close();
        
            // Devolver los preventas$preventas obtenidos
            return $preventas;
        }
        
    
    }

        


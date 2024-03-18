<?php

    require_once 'config/conexion.php';

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

        function validarDatos($nombre, $email, $tel) {
            $error = array();
            if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                $nombre_validado = true;
            } else {
                $nombre_validado = false;
                $error['nombre'] = "Insert a valid name";
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = "Insert a valid email address";
            }
            if(empty($tel) || !is_numeric($tel)){
                $error['tel'] = "Insert a valid phone number";
            }
            return $error;
        }

        public function nuevo($id_cliente, $nombre, $email, $tel) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $error = $this->validarDatos($nombre, $email, $tel);
            if(count($error) == 0){
                // Verificar si el correo electrónico ya existe en la base de datos
                $sql_check_email = "SELECT email FROM usuarios WHERE email = '$email'";
                $result_check_email = mysqli_query($mysqli, $sql_check_email);
                $row = mysqli_fetch_assoc($result_check_email);
                if ($row) {
                    $_SESSION['error']['email'] = "Error, the email is already registered";
                    return $_SESSION['error'];
                }
                // Insertar contacto en la base de datos
                $sql = "INSERT INTO personas_contacto VALUES(NULL, $id_cliente, '$nombre', '$email', '$tel', 
                'A', NOW(), NULL, NULL);";
                $guardar = mysqli_query($mysqli, $sql);
                if($guardar) {
                    $_SESSION['completado'] = "The contact has been successfully created!";
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
}


        


<?php

    require_once 'config/conexion.php';

    class Usuario {
        private $nombre;
        private $email;
        private $password;

        public function __construct($nombre = "", $email = "", $password = "") {
            $this->nombre = $nombre;
            $this->email = $email;
            $this->password = $password;
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

        // Getter y Setter para Password
        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function logout(){
            //session_start();

            if(session_destroy()){
                return true;
            }else{
                return false;
            }
        }

        public function login($email, $password) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();

            $sql = "SELECT * FROM usuarios WHERE email = '$email';";
            $login = mysqli_query($mysqli, $sql);
    
            if($login && mysqli_num_rows($login) == 1){
                $usuario = mysqli_fetch_assoc($login);
                
                $verificar = password_verify($password, $usuario['password']);
        
                if($verificar){
                    

                    $_SESSION['usuario'] = $usuario;
                    header('Location: index.php?action=index');
                } else {
                    $_SESSION['error_login'] = 'Login incorrecto';
                    return $_SESSION['error_login'];
                }
            } else {
                $_SESSION['error_login'] = 'Login incorrecto';
                return $_SESSION['error_login'];
            }
        }

        function validarDatos($nombre, $email, $password) {
            $error = array();
            if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                $nombre_validado = true;
            } else {
                $nombre_validado = false;
                $error['nombre'] = "El nombre no es válido";
            }
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_validado = true;
            } else {
                $email_validado = false;
                $error['email'] = "El email no es válido";
            }
            if(!empty($password)){
                $password_validado = true;
            } else {
                $password_validado = false;
                $error['password'] = "La contraseña no puede estar vacía";
            }
            return $error;
        }

        public function registrar($nombre, $email, $password) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $error = $this->validarDatos($nombre, $email, $password);
            if(count($error) == 0){
                // Insertar usuario en la base de datos
                $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
                $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$email', '$password_segura');";
                $guardar = mysqli_query($mysqli, $sql);
        
                if($guardar) {
                    $_SESSION['completado'] = "El registro se ha completado con éxito";
                } else {
                    $_SESSION['error']['general'] = "Fallo al guardar usuario";
                }
            } else {
                $_SESSION['error'] = $error;
                return $_SESSION['error'];
            }
            header('Location: index.php?action=login');
        }
    }
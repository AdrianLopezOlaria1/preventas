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
            session_start();
            session_destroy();
            header('Location: ../index.php');
        }

        public function login($email, $password) {
            global $db;
    
            $email = mysqli_real_escape_string($db, $email);
            $password = mysqli_real_escape_string($db, $password);
    
            $sql = "SELECT * FROM usuarios WHERE email = '$email';";
            $login = mysqli_query($db, $sql);
    
            if($login && mysqli_num_rows($login) == 1){
                $usuario = mysqli_fetch_assoc($login);
                
                if(password_verify($password, $usuario['password'])){
                    $_SESSION['usuario'] = $usuario;
                } else {
                    $_SESSION['error_login'] = 'Login incorrecto';
                    return $_SESSION['error_login'];
                }
            } else {
                $_SESSION['error_login'] = 'Login incorrecto';
                return $_SESSION['error_login'];
            }
            header('Location: index.php');
        }
    }
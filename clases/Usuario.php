<?php

if (!function_exists('Conexion')) {
    if (file_exists('../config/conexion.php')) {
        require_once '../config/conexion.php';
    } else {
        // Si no existe en el directorio anterior, intentar cargarlo desde la carpeta actual
        require_once 'config/conexion.php';
    }

}

    class Usuario {
        private $nombre;
        private $email;
        private $password;
        private $skype;
        private $website;
        private $aboutus;

        public function __construct($nombre = "", $email = "", $password = "", $skype = "", $website = "", $aboutus = "") {
            $this->nombre = $nombre;
            $this->email = $email;
            $this->password = $password;
            $this->skype = $skype;
            $this->website = $website;
            $this->aboutus = $aboutus;
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

        public function getSkype() {
            return $this->skype;
        }

        public function setSkype($skype) {
            $this->skype = $skype;
        }

        public function getWebsite() {
            return $this->website;
        }

        public function setWebsite($website) {
            $this->website = $website;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
        }


        function validarDatos($nombre, $email, $password, $check = null) {
            $error = array();
            if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                $nombre_validado = true;
            } else {
                $nombre_validado = false;
                $error['nombre'] = "Inserte un nombre valido";
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = "Inserte un correo valido";
            }
            if(empty($password)){
                $error['password'] = "La contraseña no puede estar vacía";
            }
            if(!isset($check)){
                $error['check'] = "Debes aceptar los terminos y condiciones";
            }
            return $error;
        }

        public function login($email, $password) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $sql = "SELECT * FROM usuarios WHERE email = '$email';";
            $login = mysqli_query($mysqli, $sql);
    
            if($login && mysqli_num_rows($login) == 1){
                $usuario = mysqli_fetch_assoc($login);
                
                $verificar = password_verify($password, $usuario['password']);
        
                if($verificar && $usuario['status'] != 'D'){
                    //header('Location: index.php?action=logeado');

                    $_SESSION['usuario'] = $usuario;
                    header('Location: index.php?action=index');
                    return true;
                } else {
                    $_SESSION['error_login'] = 'El correo o la contraseña son incorrectos.';
                    return false;
                }
            } else {
                $_SESSION['error_login'] = 'El correo o la contraseña son incorrectos.';
                return false;
            }
        }

        public function registrar($nombre, $email, $password, $check) {
            $result = false;
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $error = $this->validarDatos($nombre, $email, $password, $check);
            if(count($error) == 0){
                // Verificar si el correo electrónico ya existe en la base de datos
                $sql_check_email = "SELECT COUNT(*) as count FROM usuarios WHERE email = '$email'";
                $result_check_email = mysqli_query($mysqli, $sql_check_email);
                $row = mysqli_fetch_assoc($result_check_email);
                if ($row['count'] > 0) {
                    $_SESSION['error']['email'] = "Error, ese correo ya esta en uso";                   
                }        
                $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
                $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$email', '$password_segura', 
                NULL, NULL, NULL, 'A', NOW(), NULL, NULL, 0);";
                $guardar = mysqli_query($mysqli, $sql);
                if($guardar) {
                    $result = true;
                } 
            } else {
                $_SESSION['error'] = $error;                
            }
            return $result;
        }    

        public function update($nombre, $email, $website, $skype, $new_password, $description, $password) {
            $res = false;
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $id_usuario = $_SESSION['usuario']['id'];
            if ($new_password) {
                $sql = "SELECT password FROM usuarios WHERE id = $id_usuario;";
                $result = mysqli_query($mysqli, $sql);        
                if ($result && mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $hashedPassword = $row['password'];                    
                    // Verificar si la contraseña actual coincide
                    if (password_verify($password, $hashedPassword)) {
                        // Contraseña actual coincide, proceder con la actualización de datos
                        // Validar los nuevos datos
                        $error = $this->validarDatos($nombre, $email, $new_password);        
                        if (count($error) == 0) {
                            //comprobar si email ya existe
                            $sql = "SELECT id, email FROM usuarios WHERE email = '$email';";
                            $result = mysqli_query($mysqli, $sql);
                            $user = mysqli_fetch_assoc($result);
                            if($user['id'] == $id_usuario || empty($user)){
                                // Hashear la nueva contraseña
                                $password_segura = password_hash($new_password, PASSWORD_BCRYPT, ['cost' => 4]);                                
                                // Actualizar los datos del usuario en la base de datos
                                $sql = "UPDATE usuarios SET nombre = '$nombre', email = '$email', password = '$password_segura', 
                                skype = '$skype', website = '$website', description = '$description', status = 'M', fecha_modificacion = NOW()
                                WHERE id = $id_usuario;";
                                $resultado = mysqli_query($mysqli, $sql);    
                                if ($resultado) {
                                    $_SESSION['usuario']['nombre'] = $nombre;
                                    $_SESSION['usuario']['email'] = $email;
                                    $_SESSION['usuario']['skype'] = $skype;
                                    $_SESSION['usuario']['website'] = $website;
                                    $_SESSION['usuario']['description'] = $description;            
                                    $res = true;
                                }
                            } else {
                                $_SESSION['error']['general'] = "Error, ese correo ya esta registrado";                               
                            }                            
                        } else {                           
                            $_SESSION['error'] = $error;                           
                        }
                    } else {
                        $_SESSION['error']['password'] = 'La contraseña actual no coincide';
                    }
                } 
            } else {
                // No se proporcionó una nueva contraseña, actualizar sin cambiar la contraseña
                //comprobar si email ya existe
                $sql = "SELECT id, email FROM usuarios WHERE email = '$email';";
                $result = mysqli_query($mysqli, $sql);
                $user = mysqli_fetch_assoc($result);
                if($user['id'] == $id_usuario || empty($user)){
                    $sql = "UPDATE usuarios SET nombre = '$nombre', email = '$email', skype = '$skype', 
                    website = '$website', description = '$description', status = 'M', fecha_modificacion = NOW()
                    WHERE id = $id_usuario;";
                    $resultado = mysqli_query($mysqli, $sql);            
                    if ($resultado) {
                        $_SESSION['usuario']['nombre'] = $nombre;
                        $_SESSION['usuario']['email'] = $email;
                        $_SESSION['usuario']['skype'] = $skype;
                        $_SESSION['usuario']['website'] = $website;
                        $_SESSION['usuario']['description'] = $description;
                        $res = true; 
                    } 
                } else {
                    $_SESSION['error']['general'] = "Error, ese correo ya esta registrado";                    
                }
            }
            return $res;
        }

        public function deshabilitar($usuario_id) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
        
            $sql = "UPDATE usuarios SET status = 'D', fecha_baja = NOW() WHERE id = $usuario_id";
        
            if ($mysqli->query($sql)) {
                return true;
            } else {
                return false;
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

        if(isset($_SESSION['error_login'])){
            $_SESSION['error_login'] = null;
            $borrado = true;      
        }
       
        return $borrado;
    }

    public function obtenerNumeroUsuarios() {
        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        // Obtener la conexión utilizando el método getConexion() de la instancia de Conexion
        $conn = $conexion->getConexion();
    
        $sql = "SELECT COUNT(*) as total_usuarios FROM usuarios";
        $resultado = $conn->query($sql);
    
        if ($resultado && $resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            return $fila['total_usuarios'];
        } else {
            return false; // Manejo de error si no se encuentran usuarios
        }
    }
    
    public function obtenerUsuarios() {
        $usuarios = array();
        $conexion = new Conexion();
        $mysqli = $conexion->getConexion();
        $sql = "SELECT * FROM usuarios ORDER BY nombre ASC";
        $resultado = $mysqli->query($sql);
        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $usuarios[] = $fila;
            }
        }
        return $usuarios;
    }
    
    
}


        


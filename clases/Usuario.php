<?php

    require_once 'config/conexion.php';

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


        function validarDatos($nombre, $email, $password) {
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
            if(empty($password)){
                $error['password'] = "The password can't be empty";
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
                } else {
                    $_SESSION['error_login'] = 'Invalid credentials, check email or password';
                    return $_SESSION['error_login'];
                }
            } else {
                $_SESSION['error_login'] = 'Invalid credentials, check email or password';
                return $_SESSION['error_login'];
            }
        }

        public function registrar($nombre, $email, $password) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $error = $this->validarDatos($nombre, $email, $password);
            if(count($error) == 0){
                // Verificar si el correo electrónico ya existe en la base de datos
                $sql_check_email = "SELECT COUNT(*) as count FROM usuarios WHERE email = '$email'";
                $result_check_email = mysqli_query($mysqli, $sql_check_email);
                $row = mysqli_fetch_assoc($result_check_email);
                if ($row['count'] > 0) {
                    $_SESSION['error']['email'] = "Error, this email is already registered";
                    return $_SESSION['error'];
                }
                // Insertar usuario en la base de datos
                $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
                $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$email', '$password_segura', 
                NULL, NULL, NULL, 'A', NOW(), NULL, NULL);";
                $guardar = mysqli_query($mysqli, $sql);
                if($guardar) {
                    $_SESSION['completado'] = "Sign up has been successfully completed!";
                } else {
                    $_SESSION['error']['general'] = "Error";
                }
            } else {
                $_SESSION['error'] = $error;
                return $_SESSION['error'];
            }
        }   

        public function update($nombre, $email, $website, $skype, $new_password, $description, $password) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();

        
            $id_usuario = $_SESSION['usuario']['id'];

        
            // Verificar si se proporcionó una nueva contraseña
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
            
                                    return true; // Actualización exitosa
                                } else {
                                    $_SESSION['error'] = $error;
                                    return false; // Error al actualizar
                                }
                            } else {
                                $_SESSION['error']['general'] = "Error, this email is already registered";
                                return false;
                            }
                            
                        } else {
                            // Datos inválidos
                            $_SESSION['error'] = $error;
                            return false;
                        }
                    } else {
                        // Contraseña actual no coincide
                        return false;
                    }
                } else {
                    // No se encontró al usuario o error en la consulta
                    return false;
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

                        return true; 
                    } else {
                        return false; 
                    }
                } else {
                    $_SESSION['error']['general'] = "Error, this email is already registered";
                    return false;
                }
            }
        }
    }
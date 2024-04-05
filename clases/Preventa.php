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
        private $id_usuario;
        private $status;
        private $fecha_solicitud;
        private $fecha_accion;
        private $fecha_reunion;
        private $fecha_presentacion;
        private $acta_reunion;
        private $archivo;
        private $horas_previstas;
        private $importe;
    
        public function __construct($id_cliente="", $id_contacto="", $id_comercial="", $id_tipo="", $id_usuario="",
        $status="", $fecha_solicitud="", $fecha_accion="", $fecha_reunion="", $fecha_presentacion="", $acta_reunion="",
        $archivo="", $horas_previstas="", $importe="") {
            $this->id_cliente = $id_cliente;
            $this->id_contacto = $id_contacto;
            $this->id_comercial = $id_comercial;
            $this->id_tipo = $id_tipo;
            $this->id_usuario = $id_usuario;
            $this->status = $status;
            $this->fecha_solicitud = $fecha_solicitud;
            $this->fecha_accion = $fecha_accion;
            $this->fecha_reunion = $fecha_reunion;
            $this->fecha_presentacion = $fecha_presentacion;
            $this->acta_reunion = $acta_reunion;
            $this->archivo = $archivo;
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
        public function getIdUsuario() {
            return $this->id_usuario;
        }    
        public function setIdUsuario($id_usuario) {
            $this->id_usuario = $id_usuario;
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

        public function validarDatos($id_cliente, $id_contacto, $id_comercial, $id_tipo, $id_usuario,
        $fecha_reunion, $horas_previstas, $acta_reunion, $importe, $status) {

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
            if(empty($id_usuario)){
                $error['id_usuario'] = "Debes escoger un usuario";
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
            if(empty($status)){
                $error['status'] = "Debes escojer un estado";
            }

            return $error;
        }
    
        public function crearPreventa($id_cliente, $id_contacto, $id_comercial, $id_tipo, $id_usuario,
        $fecha_reunion, $fecha_presentacion, $horas_previstas, $acta_reunion, $archivo, $importe, $status) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $error = $this->validarDatos($id_cliente, $id_contacto, $id_comercial, $id_tipo, $id_usuario,
            $fecha_reunion, $horas_previstas, $acta_reunion, $importe, $status);
            if(count($error) == 0){
                // Insertar precompra en la base de datos
                $sql = "INSERT INTO preventas VALUES(NULL, $id_cliente, $id_comercial, $id_tipo, NOW(), '$fecha_reunion', '$acta_reunion', $horas_previstas, $importe, '$status', NULL, $id_contacto, $id_usuario, '$fecha_presentacion', '$archivo');";


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

        public function borrarErrores(){
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

        public function obtenerPreventas() {
            // Array para almacenar los preventas$preventas de la base de datos
            $preventas = array();
        
            // Crear una instancia de la clase Conexion
            $conexion = new Conexion();
            // Obtener la conexión
            $mysqli = $conexion->getConexion();
        
            // Consulta SQL para obtener los preventas$preventas de la tabla precompras
            $sql = "SELECT pr.id, cl.nombre AS nomCli, com.nombre AS nomCom, cont.nombre AS nomCont, ti.nombre AS nomTi, us.nombre AS nomUs,
            pr.id_cliente, pr.id_comercial, pr.id_tipo, pr.id_usuario, pr.status, pr.fecha_solicitud, pr.fecha_reunion,
            pr.fecha_presentacion, pr.acta_reunion, pr.horas_previstas, pr.importe, pr.id_contacto, pr.archivo FROM preventas pr
            LEFT JOIN clientes cl ON cl.id = pr.id_cliente
            LEFT JOIN comerciales com ON com.id = pr.id_comercial
            LEFT JOIN personas_contacto cont ON cont.id = pr.id_contacto
            LEFT JOIN usuarios us ON us.id = pr.id_usuario
            LEFT JOIN tipos_proyectos ti ON ti.id = pr.id_tipo;";
        
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

        public function ultimasPreventas() {
            $preventas = array();      
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
        
            $sql = "SELECT pr.id, cl.nombre AS nomCli, com.nombre AS nomCom, cont.nombre AS nomCont, ti.nombre AS nomTi, us.nombre AS nomUs,
            pr.id_cliente, pr.id_comercial, pr.id_tipo, pr.id_usuario, pr.status, pr.fecha_solicitud, pr.fecha_reunion,
            pr.fecha_presentacion, pr.acta_reunion, pr.horas_previstas, pr.importe, pr.id_contacto, pr.archivo FROM preventas pr
            LEFT JOIN clientes cl ON cl.id = pr.id_cliente
            LEFT JOIN comerciales com ON com.id = pr.id_comercial
            LEFT JOIN personas_contacto cont ON cont.id = pr.id_contacto
            LEFT JOIN usuarios us ON us.id = pr.id_usuario
            LEFT JOIN tipos_proyectos ti ON ti.id = pr.id_tipo
            ORDER BY pr.fecha_solicitud DESC
            LIMIT 5;";

            $resultado = $mysqli->query($sql);
            if ($resultado) {
                while ($fila = $resultado->fetch_assoc()) {
                    $preventas[] = $fila;
                }
            } else {
                echo "Error en la consulta: " . $mysqli->error;
            }
            $mysqli->close();
 
            return $preventas;
        }



        public function contarPreventasPendientes() {
            // Obtener todas las preventas
            $preventas = $this->obtenerPreventas();
        
            // Filtrar solo las preventas pendientes
            $preventasPendientes = array_filter($preventas, function($preventa) {
                return $preventa['status'] == 'P'; //preventas pendientes en tu base de datos
            });
        
            // Contar las preventas pendientes
            $cantidadPendientes = count($preventasPendientes);
        
            // Devolver la cantidad de preventas pendientes
            return $cantidadPendientes;
        }

        public function contarPreventasRealizadaReunion() {
            // Obtener todas las preventas
            $preventas = $this->obtenerPreventas();
        
            // Filtrar solo las preventas pendientes
            $preventasRealizadaReunion = array_filter($preventas, function($preventa) {
                return $preventa['status'] == 'RP'; //preventas pendientes en tu base de datos
            });
        
            // Contar las preventas pendientes
            $cantidadRealizadaReunion = count($preventasRealizadaReunion);
        
            // Devolver la cantidad de preventas pendientes
            return $cantidadRealizadaReunion;
        }

        public function contarPreventasPendientesCierre() {
            // Obtener todas las preventas
            $preventas = $this->obtenerPreventas();
        
            // Filtrar solo las preventas pendientes
            $preventasPendientesCierre = array_filter($preventas, function($preventa) {
                return $preventa['status'] == 'PC'; //preventas pendientes en tu base de datos
            });
        
            // Contar las preventas pendientes
            $cantidadPendientesCierre = count($preventasPendientesCierre);
        
            // Devolver la cantidad de preventas pendientes
            return $cantidadPendientesCierre;
        }

        public function contarPreventasCerradaPerdida() {
            // Obtener todas las preventas
            $preventas = $this->obtenerPreventas();
        
            // Filtrar solo las preventas pendientes
            $preventasCerradaPerdida = array_filter($preventas, function($preventa) {
                return $preventa['status'] == 'CP'; //preventas pendientes en tu base de datos
            });
        
            // Contar las preventas pendientes
            $cantidadCerradaPerdida = count($preventasCerradaPerdida);
        
            // Devolver la cantidad de preventas pendientes
            return $cantidadCerradaPerdida;
        }

        public function contarPreventasGanadas() {
            // Obtener todas las preventas
            $preventas = $this->obtenerPreventas();
        
            // Filtrar solo las preventas pendientes
            $preventasGanadas = array_filter($preventas, function($preventa) {
                return $preventa['status'] == 'CG'; //preventas pendientes en tu base de datos
            });
        
            // Contar las preventas pendientes
            $cantidadGanadas = count($preventasGanadas);
        
            // Devolver la cantidad de preventas pendientes
            return $cantidadGanadas;
        }
        
        public function contarPreventasValoradas() {
            // Obtener todas las preventas
            $preventas = $this->obtenerPreventas();
        
            // Filtrar solo las preventas pendientes
            $preventasValoradas = array_filter($preventas, function($preventa) {
                return $preventa['status'] == 'RV'; //preventas pendientes en tu base de datos
            });
        
            // Contar las preventas pendientes
            $cantidadValoradas = count($preventasValoradas);
        
            // Devolver la cantidad de preventas pendientes
            return $cantidadValoradas;
        }
        
        public function conseguirPreventa($id){
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $sql = "SELECT pr.id, cl.nombre AS nomCli, com.nombre AS nomCom, cont.nombre AS nomCont, ti.nombre AS nomTi, us.nombre AS nomUs,
            pr.id_cliente, pr.id_comercial, pr.id_tipo, pr.id_usuario, pr.status, pr.fecha_solicitud, pr.fecha_reunion,
            pr.fecha_presentacion, pr.acta_reunion, pr.horas_previstas, pr.importe, pr.id_contacto, pr.archivo FROM preventas pr
            LEFT JOIN clientes cl ON cl.id = pr.id_cliente
            LEFT JOIN comerciales com ON com.id = pr.id_comercial
            LEFT JOIN personas_contacto cont ON cont.id = pr.id_contacto
            LEFT JOIN usuarios us ON us.id = pr.id_usuario
            LEFT JOIN tipos_proyectos ti ON ti.id = pr.id_tipo 
            WHERE pr.id = $id;";
            $preventa = mysqli_query($mysqli, $sql);
            $result = array();
            if($preventa && mysqli_num_rows($preventa) >= 1){
                $result = mysqli_fetch_assoc($preventa);
            }
    
            return $result;
        }

        public function editarPreventa($id, $id_cliente, $id_contacto, $id_comercial, $id_tipo, $id_usuario, $fecha_reunion,
        $fecha_presentacion, $horas_previstas, $acta_reunion, $importe, $status, $archivo) {

            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $error = $this->validarDatos($id_cliente, $id_contacto, $id_comercial, $id_tipo, $id_usuario,
            $fecha_reunion, $horas_previstas, $acta_reunion, $importe, $status);

            if(count($error) == 0){    
        
                $sql = "UPDATE preventas SET 
                    id_cliente = $id_cliente, 
                    id_comercial = $id_comercial, 
                    id_tipo = $id_tipo, 
                    id_usuario = $id_usuario,
                    fecha_reunion = '$fecha_reunion', 
                    fecha_presentacion = '$fecha_presentacion',
                    acta_reunion = '$acta_reunion', 
                    horas_previstas = $horas_previstas, 
                    importe = $importe,
                    status = '$status',
                    fecha_accion = NOW(),
                    id_contacto = $id_contacto,
                    archivo = '$archivo' 
                    WHERE id = $id;"; 

                $guardar = mysqli_query($mysqli, $sql);
                if($guardar) {
                    $_SESSION['completado'] = "La preventa se ha modificado correctamente!";
                } else {
                    $_SESSION['error']['general'] = "Error";
                }
            } else {
                $_SESSION['error'] = $error;
                return $_SESSION['error'];
            }
        }

        function obtenerNumeroPreventasPorMes($status, $mes) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            // Suponiendo que tu tabla de preventas se llama 'preventas'
 
            $query = "SELECT COUNT(*) as total 
            FROM preventas 
            WHERE status = '$status' AND MONTH(fecha_solicitud) = 
                CASE '$mes'
                    WHEN 'enero' THEN 1
                    WHEN 'febrero' THEN 2
                    WHEN 'marzo' THEN 3
                    WHEN 'abril' THEN 4
                    WHEN 'mayo' THEN 5
                    WHEN 'junio' THEN 6
                    WHEN 'julio' THEN 7
                    WHEN 'agosto' THEN 8
                    WHEN 'septiembre' THEN 9
                    WHEN 'octubre' THEN 10
                    WHEN 'noviembre' THEN 11
                    WHEN 'diciembre' THEN 12
                END";
            
            
            // Ejecutar la consulta
            $resultado = $mysqli->query($query);
            
            // Obtener el número de preventas
            $numero_preventas = 0;
            if ($fila = $resultado->fetch_assoc()) {
                $numero_preventas = $fila['total'];
            }
            
            // Cerrar la conexión y devolver el número de preventas
            $mysqli->close();
            return $numero_preventas;
        }

        function obtenerPreventasPorMes($mes) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $query = "SELECT COUNT(*) as total 
            FROM preventas 
            WHERE MONTH(fecha_solicitud) = 
                CASE '$mes'
                    WHEN 'Jan' THEN 1
                    WHEN 'Feb' THEN 2
                    WHEN 'Mar' THEN 3
                    WHEN 'Apr' THEN 4
                    WHEN 'May' THEN 5
                    WHEN 'Jun' THEN 6
                    WHEN 'Jul' THEN 7
                    WHEN 'Aug' THEN 8
                    WHEN 'Sep' THEN 9
                    WHEN 'Oct' THEN 10
                    WHEN 'Nov' THEN 11
                    WHEN 'Dec' THEN 12
                END";
            $resultado = $mysqli->query($query);
            $numero_preventas = 0;
            if ($fila = $resultado->fetch_assoc()) {
                $numero_preventas = $fila['total'];
            }
            $mysqli->close();
            return $numero_preventas;
        }

        public function filtrarPorEstados($status) {
            $conexion = new Conexion();
            $mysqli = $conexion->getConexion();
            $sql = "SELECT pr.id, cl.nombre AS nomCli, com.nombre AS nomCom, cont.nombre AS nomCont, ti.nombre AS nomTi, us.nombre AS nomUs,
                    pr.id_cliente, pr.id_comercial, pr.id_tipo, pr.id_usuario, pr.status, pr.fecha_solicitud, pr.fecha_reunion,
                    pr.fecha_presentacion, pr.acta_reunion, pr.horas_previstas, pr.importe, pr.id_contacto, pr.archivo FROM preventas pr
                    LEFT JOIN clientes cl ON cl.id = pr.id_cliente
                    LEFT JOIN comerciales com ON com.id = pr.id_comercial
                    LEFT JOIN personas_contacto cont ON cont.id = pr.id_contacto
                    LEFT JOIN usuarios us ON us.id = pr.id_usuario
                    LEFT JOIN tipos_proyectos ti ON ti.id = pr.id_tipo 
                    WHERE pr.status = '$status';";
            $preventa = mysqli_query($mysqli, $sql);
            $preventasFiltradas = array();
        
            if ($preventa && mysqli_num_rows($preventa) >= 1) {
                while ($fila = mysqli_fetch_assoc($preventa)) {
                    $preventasFiltradas[] = $fila;
                }
            }
            return $preventasFiltradas;
        }
        
        
    }

        


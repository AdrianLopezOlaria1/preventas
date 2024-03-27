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
                $sql = "INSERT INTO preventas VALUES(NULL, $id_cliente, $id_comercial, $id_tipo, NOW(), '$fecha_reunion', '$acta_reunion', $horas_previstas, $importe, 'P', NULL, $id_contacto);";


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
            $sql = "SELECT pr.id, cl.nombre AS nomCli, com.nombre AS nomCom, cont.nombre AS nomCont, ti.nombre AS nomTi,
            pr.id_cliente, pr.id_comercial, pr.id_tipo, pr.status, pr.fecha_solicitud, pr.fecha_reunion,
            pr.acta_reunion, pr.horas_previstas, pr.importe, pr.id_contacto  FROM preventas pr
            INNER JOIN clientes cl ON cl.id = pr.id_cliente
            INNER JOIN comerciales com ON com.id = pr.id_comercial
            INNER JOIN personas_contacto cont ON cont.id = pr.id_contacto
            INNER JOIN tipos_proyectos ti ON ti.id = pr.id_tipo;";
        
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
        
        

        
        
        
        

        function conseguirPreventa($id){

            $conexion = new Conexion();
            $sql = "SELECT * FROM preventas WHERE id = $id;";
            $preventa = mysqli_query($conexion, $sql);
            $result = array();
            if($preventa && mysqli_num_rows($preventa) >= 1){
                $result = mysqli_fetch_assoc($preventa);
            }
    
            return $preventa;
        }
    }

        


<?php

// Verificar si la clase Conexion no está definida
if (!class_exists('Conexion')) {
    // Intentar cargarla desde el directorio anterior o la carpeta actual
    if (file_exists('../config/conexion.php')) {
        require_once '../config/conexion.php';
    } else {
        require_once 'config/conexion.php';
    }
}

class Visita {
    // Atributos
    private $id;
    private $fecha;
    private $pagina;

    // Constructor
    public function __construct($id, $total_visitas) {
        $this->id = $id;
        $this->total_visitas = $total_visitas;
    }

    // Getter para el ID
    public function getId() {
        return $this->id;
    }

    // Getter para el total de visitas
    public function getTotalVisitas() {
        return $this->total_visitas;
    }

    // Setter para el total de visitas
    public function setTotalVisitas($total_visitas) {
        $this->total_visitas = $total_visitas;
    }

    // Función para incrementar el contador de visitas y devolver el nuevo total
    public function incrementarContadorVisitas() {
        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        // Obtener la conexión
        $mysqli = $conexion->getConexion();

        // Consulta SQL para incrementar el contador de visitas
        $sql = "UPDATE tabla_visitas SET total_visitas = total_visitas + 1 WHERE id = $this->id";

        // Ejecutar la consulta
        $resultado = $mysqli->query($sql);

        // Verificar si se ejecutó correctamente la consulta
        if ($resultado) {
            // Si se ejecutó correctamente, obtener el nuevo número total de visitas
            $this->total_visitas = $this->obtenerNumeroTotalVisitas();
            // Devolver el nuevo total de visitas
            return $this->total_visitas;
        } else {
            // Si hubo un error en la ejecución de la consulta, devolver -1 como indicador de error
            return -1;
        }

        // Cerrar la conexión
        $mysqli->close();
    }

    // Función para obtener el número total de visitas
    public function obtenerNumeroTotalVisitas() {
        // Crear una instancia de la clase Conexion
        $conexion = new Conexion();
        // Obtener la conexión
        $mysqli = $conexion->getConexion();

        // Consulta SQL para obtener el número total de visitas
        $sql = "SELECT total_visitas FROM contador_visitas WHERE id = $this->id";

        // Ejecutar la consulta
        $resultado = $mysqli->query($sql);

        // Verificar si se obtuvieron resultados
        if ($resultado && $resultado->num_rows > 0) {
            // Obtener el número total de visitas
            $fila = $resultado->fetch_assoc();
            $total_visitas = $fila['total_visitas'];
        } else {
            // Si no se obtuvieron resultados o hubo un error, establecer el total de visitas en 0
            $total_visitas = 0;
        }

        // Cerrar la conexión
        $mysqli->close();

        // Devolver el número total de visitas
        return $total_visitas;
    }
}

?>
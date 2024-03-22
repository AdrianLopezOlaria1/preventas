<?php
require_once '../clases/Vista.php';

// Suponiendo que tienes el ID de la vista
$id_vista = 1; // Cambia esto por el ID de la vista que corresponda

// Crear una instancia de la clase Vista con el ID de la vista
$vista = new Vista($id_vista, 0); // El segundo parámetro es el total de visitas inicial, puede ser cualquier número

// Llamar a la función para incrementar el contador de visitas y obtener el nuevo total
$nuevo_total_visitas = $vista->incrementarContadorVisitas();

// Verificar si se actualizó correctamente el contador de visitas
if ($nuevo_total_visitas !== -1) {
    // Si se actualizó correctamente, imprimir el nuevo total de visitas
    echo "El nuevo total de visitas es: $nuevo_total_visitas";
} else {
    // Si hubo un error al actualizar el contador de visitas, mostrar un mensaje de error
    echo "Error al incrementar el contador de visitas.";
}
?>

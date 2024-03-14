<?php
require_once 'clases/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $website  = $_POST["website"];
    $skype = $_POST["skype"];
    $password = $_POST["password"];
    $new_password = $_POST["re_password"];
    $description = $_POST["description"];


    $usuario = new Usuario();

   

    if (!empty($nombre) && !empty($email) && !empty($password)) {
        // Verificar si las contraseñas coinciden
        
            if ($password != $new_password) {

                if (!empty($new_password)) {
                    // Actualizar el perfil del usuario con la nueva contraseña
                    $updateResult = $usuario->update($nombre, $email, $website, $skype, $new_password, $description, $password);
                } else {
                    // Actualizar el perfil del usuario sin cambiar la contraseña
                    $updateResult = $usuario->update($nombre, $email, $website, $skype, null, $description, $password);
                }

                // Verificar si la actualización fue exitosa
                if ($updateResult) {
                    echo "<script>alert('Se han guardado tus cambios del perfil');</script>";
                    echo "<script>window.location.href = 'index.php?action=profile';</script>";

                } else {
                    echo "<script>alert('Ha surgido un problema al guardar los cambios');</script>";
                    echo "<script>window.location.href = 'index.php?action=profile';</script>";

                }
            } else {
                // Las contraseñas no coinciden
                echo "<script>alert('La nueva contraseña y la nueva no pueden ser iguales');</script>";
                echo "<script>window.location.href = 'index.php?action=profile';</script>";

            }

    } else {
        // Campos obligatorios faltantes
        echo "<script>alert('Por favor, rellena todos los campos importantes para actualizar tu perfil');</script>";
        echo "<script>window.location.href = 'index.php?action=profile';</script>";

    }
}
?>
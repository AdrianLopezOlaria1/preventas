<?php
// Inicia la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preventas</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">
        <script src="assets/js/config.js"></script>
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <script src="https://maps.googleapis.com/maps/api/js?key=TU_CLAVE_API&libraries=places"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>
    <?php
$action = isset($_GET["action"]) ? $_GET["action"] : "";

switch ($action) {
    case "register":
        include 'clases/Usuario.php';
        include 'form/formRegister.php';
        break;
    case "logout":
        
        include 'views/logout.php';
        break;
    case "formPreventa":
        include 'metodos/checker.php';
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'clases/Cliente.php';
        include 'clases/Contacto.php';
        include 'clases/Preventa.php';
        include 'clases/Tipo.php';
        include 'clases/Comercial.php';
        include 'form/formPreventa.php';
        break;
    case "formEditPreventa":
        include 'metodos/checker.php';
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'clases/Cliente.php';
        include 'clases/Contacto.php';
        include 'clases/Preventa.php';
        include 'clases/Tipo.php';
        include 'clases/Comercial.php';
        include 'form/formEditPreventa.php';
        break;
    case "index":
        include 'metodos/checker.php';
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'clases/Preventa.php';
        include 'views/indice.php';
        break;
    case "preventas":
        include 'metodos/checker.php';
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'clases/Preventa.php';
        include 'views/preventas.php';
        break;
    case "cerrando":
        include 'metodos/cerrarSesion.php';
        break;
    case "delete":
        include 'metodos/deshabilitar.php';
        break;
        
    case "profile":
        include 'metodos/checker.php';
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'views/profile.php';
        break;
    case "updateProfile":
        include 'metodos/checker.php';
        include 'metodos/updateProfile.php';
        break;
    case "support":
        include 'metodos/checker.php';
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'views/support.php';
        break;
    case "enviarLogin":
        include 'metodos/login.php';
        break;
    case "enviarPreventa":
        include 'metodos/preventa.php';
        break;
    case "enviarEditarPreventa":
        include 'metodos/editar_preventa.php';
        break;
    case "enviarRegister":
        include 'metodos/register.php';
        break;
    case "enviarCliente":
        include 'metodos/crearCliente.php';
        break;
    case "enviarComercial":
        include 'metodos/crearComercial.php';
        break;
    case "enviarContacto":
        include 'metodos/crearContacto.php';
        break;
    case "formCliente":
        include 'metodos/checker.php';
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'config/conexion.php';
        include 'clases/Cliente.php';
        include 'form/formCliente.php';
        break;
    case "formComercial":
        include 'metodos/checker.php';
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'config/conexion.php';
        include 'clases/Comercial.php';
        include 'form/formComercial.php';
        break;
    case "clientList":
        include 'metodos/checker.php';
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'config/conexion.php';
        include 'views/clientes.php';
        break;
    case "contactList":
         include 'metodos/checker.php';
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'config/conexion.php';
        include 'views/contactos.php';
        break;
    case "comercialList":
        include 'metodos/checker.php';
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'config/conexion.php';
        include 'views/comerciales.php';
        break;
    case "formContacto":
        include 'metodos/checker.php';
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'config/conexion.php';
        include 'clases/Contacto.php';
        include 'clases/Cliente.php';
        include 'form/formContacto.php';
        break;
    default:
        include 'clases/Usuario.php';
        include 'form/formLogin.php';
         break;
 }

?>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Daterangepicker js -->
    <script src="assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
    
    <!-- Apex Charts js -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

    <!-- Vector Map js -->
    <script src="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Dashboard App js -->
    


    <!-- App js -->
    <script src="assets/js/app.min.js"></script>


</body>
</html>
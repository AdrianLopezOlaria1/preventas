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

</head>
<body>
    <?php
$action = isset($_GET["action"]) ? $_GET["action"] : "";

switch ($action) {
    case "register":
        include 'controllers/register.php';
        break;
    case "logout":
        include 'controllers/logout.php';
        break;
    case "logeado":
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'form/formPrecompra.php';
        break;
    case "index":
        include 'views/aside.php';
        include 'views/footer.php';
        include 'views/header.php';
        include 'controllers/indice.php';
        break;
    case "cerrando":
        include 'metodos/cerrarSesion.php';
        break;
    default:
        include 'controllers/login.php';
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
    <script src="assets/js/pages/dashboard.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>


</body>
</html>
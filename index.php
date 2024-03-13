<?php 


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preventas</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
<script src="assets/js/config.js"></script>
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>
<body>
    <?php
$action = isset($_GET["action"]) ? $_GET["action"] : "";

switch ($action) {
    case "login":
        include 'controllers/login.php';
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
    default:
        include 'controllers/register.php';
         break;
 }

?>


</body>
</html>
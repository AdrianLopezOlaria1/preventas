<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['ususario'])){
        header('Location: ../index.php');
    }
?>
<?php
    session_start();
    unset($_SESSION['idusuario']);
    header("location: index.php");

?>


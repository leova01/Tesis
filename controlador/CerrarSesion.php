<?php
    session_start();
    session_destroy();
    header("location: ../index.php");

    //modulo que se encarga de cerrar la sesion del ususario
?>
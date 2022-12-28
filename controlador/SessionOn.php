<?php
session_start();
if (empty($_SESSION["id"])){
    header("location: index.php");
}
//modulo que se encarga de verificar si alguien esta en session
?>
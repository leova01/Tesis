<?php
session_start(); //inicia la sesion del navegador

require 'database.php'; // conexion con la base de datos

$ubicacion = $_POST['UbicacionPc'];

$sql=$conex->query("SELECT * FROM equipos WHERE Ubicacion='$ubicacion' ");



$datos[] =[$sql];

echo json_encode($datos);
?>
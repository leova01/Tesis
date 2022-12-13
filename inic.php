<?php
session_start();

require 'database.php';


if (isset($_POST['btnIngreso'])) {
    if ( strlen($_POST['email']) >= 1 && strlen($_POST['password']) >= 1) {

        $email = trim($_POST['email']);
        $pass = trim($_POST['password']);

        $sql=$conex->query("SELECT * FROM usuario WHERE email='$email' AND Clave='$pass' ");

        if($datos=$sql->fetch_object()){
            $_SESSION["id"]=$datos->ID;
            $_SESSION["nombre"]=$datos->Nombre;
            $_SESSION["apellido"]=$datos->Apellido;
            header("location: Home.php");
        }else{
            echo "<h3 class='bad'>Acceso Denegado</h3>";
        }




       // $resultado = mysqli_query($conex, $consulta);
    }else{
        echo "<h3 class='bad'>¡Por favor complete los campos!</h3>";
    }
};
?>
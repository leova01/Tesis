<?php
session_start(); //inicia la sesion del navegador

require 'database.php'; // conexion con la base de datos


if (isset($_POST['btnIngreso'])) { //linea que confirma que se presiono el boton de login y ejecuta proceso de inicio de sesion
    if ( strlen($_POST['email']) >= 1 && strlen($_POST['password']) >= 1) {//confirma que los campos no esten vacios

        $email = trim($_POST['email']);
        $pass = md5(trim($_POST['password']));

        $sql=$conex->query("SELECT * FROM usuario WHERE email='$email' AND Clave='$pass' ");// consulta a la base de datos

        if($datos=$sql->fetch_object()){
            $_SESSION["id"]=$datos->ID;
            $_SESSION["nombre"]=$datos->Nombre;
            $_SESSION["apellido"]=$datos->Apellido;
            $_SESSION["Rango"]=$datos->Nivel;
            header("location: Home.php");//redireccionamiento luego de loguear
        }else{
            echo "<h3 class='bad'>Acceso Denegado</h3>";
        }




       // $resultado = mysqli_query($conex, $consulta);
    }else{
        echo "<h3 class='bad'>¡Por favor complete los campos!</h3>";
    }
};
?>
<?php
 require 'database.php';//conexion a la base de datos

 if (isset($_POST['Registrar'])) { //validacion del boton siendo presionado
    if (
		strlen($_POST['Nombre']) >= 1 &&
		strlen($_POST['Apellido'])>=1 &&
		strlen($_POST['email']) >= 1 &&
		strlen($_POST['pass']) >=1 &&
		strlen($_POST['pass2']) >=1 &&
		(strlen($_POST['rango'])>=1 &&  strlen($_POST['rango'])<=2) &&
		strlen($_POST['pass'])===strlen($_POST['pass2'])
		//validaciones varias
		 ) {
	    $Nombre = trim($_POST['Nombre']);
	    $Apellido = trim($_POST['Apellido']);
		$email = trim($_POST['email']);
		$Contraseña = trim($_POST['pass']);
		$Contraseña2 = trim($_POST['pass2']);
		$Rango=  trim($_POST['rango']);
		//almacenando Data en Variables

	    $consulta = "INSERT INTO usuario(Nombre,Apellido,email,Clave,Nivel) VALUES ('$Nombre','$Apellido','$email','$Contraseña','$Rango')";//consulta a la BD
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Te has inscripto correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
	//respuestas referentes a lo sucedido con la BD
}

?>
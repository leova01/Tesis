<?php
 require 'database.php';

 if (isset($_POST['Registrar'])) {
    if (
		strlen($_POST['Nombre']) >= 1 &&
		strlen($_POST['Apellido'])>=1 &&
		strlen($_POST['email']) >= 1 &&
		strlen($_POST['pass']) >=1 &&
		strlen($_POST['pass2']) >=1 &&
		(strlen($_POST['rango'])>=1 &&  strlen($_POST['rango'])<=2) &&
		strlen($_POST['pass'])===strlen($_POST['pass2'])
		 ) {
	    $Nombre = trim($_POST['Nombre']);
	    $Apellido = trim($_POST['Apellido']);
		$email = trim($_POST['email']);
		$Contraseña = trim($_POST['pass']);
		$Contraseña2 = trim($_POST['pass2']);
		$Rango=  trim($_POST['rango']);


	    $consulta = "INSERT INTO usuario(Nombre,Apellido,email,Clave,Nivel) VALUES ('$Nombre','$Apellido','$email','$Contraseña','$Rango')";
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
}

?>
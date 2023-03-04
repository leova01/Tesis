<?php
require 'database.php'; //conexion a la base de datos

if (isset($_POST['Registrar'])) { //validacion del boton siendo presionado
	if (
		strlen($_POST['nombre']) >= 1 &&
		strlen($_POST['ubicacion']) >= 1 && 
		strlen($_POST['ip']) >= 1 &&
		strlen($_POST['user']) >= 1 &&
		strlen($_POST['pass']) >= 1 &&
		strlen($_POST['pass2']) >= 1 &&
        (strlen($_POST['estado']) >= 1 && strlen($_POST['estado']) <= 1) &&
        $_POST['estado'] === "A" || $_POST['estado'] === "I"

        //validaciones varias
	) {

        if(strlen($_POST['pass']) ===strlen($_POST['pass2'])){


        if(strlen($_POST['ubicacion']) <= 3){

		$Nombre = trim($_POST['nombre']);
		$Ubicacion = trim($_POST['ubicacion']);
		$Ip = trim($_POST['ip']);
        $User = trim($_POST['user']);
		$Contraseña = trim($_POST['pass']);
		$Estado =  trim($_POST['estado']);
		//almacenando Data en Variables

		$consulta = "INSERT INTO `equipos` (`user`, `contraseña`, `Nombre`, `Ubicacion`, `Estado`, `IP`)
                     VALUES ('$User', '$Contraseña', '$Nombre', '$Ubicacion', '$Estado', '$Ip');"; //consulta a la BD
		
		$resultado = mysqli_query($conex, $consulta);
		if ($resultado) {
?>
			<h3 class="ok">¡Te has inscripto correctamente!</h3>
		<?php
		} else {
		?>
			<h3 class="bad">¡Ups ha ocurrido un error!</h3>
		<?php
		}  
        }else{
            ?>
                <h3 class="bad">¡La ubicacion debe ser de 3 digitos EJ: F01!</h3>
            <?php

        }

 

        }else{
            ?>
                <h3 class="bad">¡Las contraseñas deben coincidir !</h3>
            <?php
        }


	} else {
		?>
		<h3 class="bad">¡Por favor complete los campos!</h3>
<?php
	}
	//respuestas referentes a lo sucedido con la BD
}

?>
<?php

include("database.php");


if(isset($_POST['cambios'])){


    $ID=trim($_POST['ID']);
    $nombre=trim($_POST['Nombre']) ;
    $apellido=trim($_POST['Apellido']) ;
    $email=trim($_POST['email']) ;
    $Nivel=trim($_POST['Nivel']) ;

    if(strlen($_POST['ID'])>=1 && strlen($nombre)>=1 && strlen($apellido)>=1 && strlen($email)>=1 && strlen($Nivel)>=1 &&  strlen($Nivel <= 2)){


        $sql="UPDATE usuario SET Nombre='$nombre',Apellido='$apellido',email='$email',Nivel='$Nivel' WHERE ID='$ID'";
    
        $query=mysqli_query($conex,$sql);
            if($query){
                ?>
                <h3 class="ok">¡Te has inscripto correctamente!</h3>
            <?php
            }
    } else {
		?>
			<h3 class="bad">¡Ups ha ocurrido un error, corregir datos ingresados!</h3>
		<?php
		}

}


    ?>


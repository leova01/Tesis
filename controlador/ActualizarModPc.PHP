<?php

include("database.php");


if(isset($_POST['cambios'])){


    $ID=trim($_POST['ID']);
    $user=trim($_POST['user']);
    $contraseña=trim($_POST['contraseña']);
    $Ubicacion=trim($_POST['Ubicacion']) ;
    $IP=trim($_POST['IP']) ;
    $Nivel=trim($_POST['Nivel']) ;

    if(strlen($_POST['ID'])>=1 && strlen($user)>=1 && strlen($contraseña)>=1 && strlen($Ubicacion)>=1 && strlen($IP)&& strlen($Nivel)>=1 && strlen($Nivel)<=2){

    

        $sql="UPDATE equipos SET user='$user',contraseña='$contraseña',Ubicacion='$Ubicacion',Estado='$Nivel',IP='$IP' where id='$ID'";
    
          

        $query=mysqli_query($conex,$sql);
            if($query){
                ?>
                <h3 class="ok">¡Pc registrada!</h3>
            <?php
            sleep(1);
            header('location: ./modiEquipos.php');
            }
    } else {
		?>
			<h3 class="bad">¡Ups ha ocurrido un error, corregir datos ingresados!</h3>
		<?php
		}

}


    ?>

<?php

include("database.php");


if(isset($_POST['cambios'])){


    $ID=trim($_POST['ID']);
    $descripcion=trim($_POST['DESCRIPCION']);

    if(strlen($_POST['ID'])>=1){

    
        $sql="UPDATE  chequeo  SET descripcion = '$descripcion' where id='$ID'";
          

        $query=mysqli_query($conex,$sql);
            if($query){
                ?>
                <h3 class="ok">¡Anotacion registrada!</h3>
            <?php
            sleep(1);
            header('location: ./anotaciones.php');
            }
    } else {
		?>
			<h3 class="bad">¡Ups ha ocurrido un error, corregir datos ingresados!</h3>
		<?php
		}

}


    ?>


<?php
try{
    $conex = mysqli_connect("localhost","root","","dailylabcomp");
}
catch(Exception $e){
    echo "Ups, ha ocurrido un error";
    ?>
    <h3>Ocurrio un error con la conexion a la Base de datos</h3>
    <?php
}
//Conexcion BD
?>





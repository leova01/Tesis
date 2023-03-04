<?php

include("./database.php");


$ID=$_GET['ID'];

$sql="DELETE FROM equipos  WHERE ID='$ID'";
$query=mysqli_query($conex,$sql);

    if($query){
        Header("Location:../ModiEquipos.php");
    }
?>
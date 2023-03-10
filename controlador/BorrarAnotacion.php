<?php

include("./database.php");


$ID=$_GET['ID'];

$sql="DELETE FROM chequeo  WHERE ID='$ID'";
$query=mysqli_query($conex,$sql);

    if($query){
        Header("Location:../anotaciones.php");
    }
?>